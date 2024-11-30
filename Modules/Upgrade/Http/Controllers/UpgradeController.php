<?php

namespace Modules\Upgrade\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Upgrade\Enums\StatusOrderEnum;
use Modules\Upgrade\Enums\TargetTypeEnum;
use Modules\Upgrade\Enums\TypeEnum;
use Modules\Upgrade\Models\Certifide;
use Modules\Upgrade\Models\Upgrade;
use Modules\Upgrade\Transformers\CertifideResource;

class UpgradeController extends Controller
{
    public function requestUpgrade(Request $request)
    {
        $user = auth()->user();

        if (Upgrade::where('user_id', $user->id)
            ->whereIn('status', ['Waiting', 'Rejected', 'Approved'])
            ->exists()
        ) {
            return response()->json(['message' => 'لقد قمت بتقديم طلب مسبقا'], 400);
        }

        if (in_array($user->type, ['company', 'instructor']) && $request->target_type !== 'user') {
            return response()->json(['message' => 'هذا الطلب خارج الصلاحيات المتاحة لك'], 403);
        }

        $validated = $request->validate([
            'target_type' => 'required|in:instructor,accountant,company,interviewer,certified,user',
        ]);

        if ($user->type === $validated['target_type']) {
            return response()->json(['message' => 'لا يمكنك الترقية مرة أخرى إلى نفس الرتبة'], 400);
        }

        if ($validated['target_type'] === 'certified') {
            if ($user->type !== 'accountant') {
                return response()->json(['message' => 'يجب ان تجتاز الامتحان للترقى من accountant الى certified'], 403);
            }

            $upgrade = Upgrade::where('user_id', $user->id)
                ->where('status', TypeEnum::Waitting)
                ->first();

            if ($upgrade && !$upgrade->exam_passed) {
                return response()->json([
                    'message' => 'يجب عليك اجتياز الامتحان قبل الترقية إلى رتبة certified',
                    'can_take_exam' => true,
                ], 400);
            }
        }

        if ($validated['target_type'] === 'interviewer') {
            if ($user->type !== 'certified') {
                return response()->json(['message' => 'يجب أن تكون حاصلًا على رتبة certified قبل الترقية إلى interviewer'], 403);
            }
        }

        $targetTypeValue = TargetTypeEnum::getValue($validated['target_type']);

        if ($targetTypeValue === null) {
            return response()->json(['message' => 'The selected target type is invalid.'], 400);
        }

        if ($user->type === 'accountant' && in_array($validated['target_type'], ['instructor', 'company'])) {
            $user->roles()->syncWithoutDetaching([$targetTypeValue]);
        }

        $upgrade = Upgrade::create([
            'user_id' => $user->id,
            'target_type' => $targetTypeValue,
            'status' => TypeEnum::Waitting,
        ]);

        $statusLabel = TypeEnum::getLabel($upgrade->status);

        return response()->json([
            'message' => 'تم ارسال طلب الترقى في انتظار موافقة Admin',
            'status' => $statusLabel,
        ], 201);
    }



    public function approveOrRejectUpgrade(Request $request, $id)
    {
        $admin = auth()->user();
        if ($admin->type !== TargetTypeEnum::ADMIN) {
            return response()->json(['message' => 'غير مصرح لك'], 403);
        }

        $upgrade = Upgrade::find($id);
        if (!$upgrade) {
            return response()->json(['message' => 'الطلب غير موجود'], 404);
        }

        if ($upgrade->status !== TypeEnum::Waitting) {
            return response()->json(['message' => 'لا يمكن تعديل الطلب إلا إذا كان في حالة انتظار'], 400);
        }

        $validated = $request->validate([
            'status' => 'required|in:Approved,Rejected',
            'activate_account' => 'sometimes|boolean',
        ]);

        if ($validated['status'] === 'Approved') {
            $upgrade->status = TypeEnum::Approved;

            if (isset($validated['activate_account'])) {
                $upgrade->interaction = $validated['activate_account'] ? StatusOrderEnum::ACTIVE : StatusOrderEnum::UNACTIVE;
            }

            $user = User::findOrFail($upgrade->user_id);
            $user->type = TargetTypeEnum::CERTIFIED;
            $user->save();
        } else {
            $upgrade->status = TypeEnum::Rejected;
        }

        $upgrade->save();

        return response()->json([
            'message' => 'تم تحديث حالة طلب الترقية بنجاح',
            'status' => TypeEnum::getLabel($upgrade->status),
            'activation' => $upgrade->interaction ?? null,
        ]);
    }





    public function takeExam(Request $request, $id)
    {
        $user = auth()->user();
        $upgrade = Upgrade::where('id', $id)
            ->where('user_id', $user->id)
            ->where('status', TypeEnum::Waitting)
            ->first();
        if (!$upgrade) {
            return response()->json(['message' => 'لا يوجد طلب ترقية في حالة انتظار لهذا المستخدم'], 400);
        }

        if ($upgrade->exam_passed) {
            return response()->json(['message' => 'لقد اجتزت الامتحان مسبقًا'], 400);
        }
        $upgrade->exam_passed = true;
        $upgrade->save();

        return response()->json(['message' => 'تم التقديم للامتحان بنجاح'], 200);
    }


    public function showUpgradeDetails($id)
    {
        $upgrade = Upgrade::with('user')->findOrFail($id);
        return response()->json([
            'message' => 'بيانات الموظف',
            'data' => $upgrade,
        ]);
    }



    public function fillCertifiedData(Request $request)
    {
        $user = auth()->user();

        if ($user->type !== TargetTypeEnum::CERTIFIED) {
            return response()->json(['message' => 'يجب أن تكون معتمدًا لتعبئة هذه البيانات'], 403);
        }

        $validated = $request->validate([
            'education_qualifications' => 'required|string|max:255',
            'university_name' => 'required|string|max:255',
            'degree_title' => 'required|string|max:255',
            'GPA' => 'required|integer|between:0,100',
            'year_of_graduation' => 'required|date',
            'certificate_name' => 'required|string|max:255',
            'certificate_type' => 'required|string|max:255',
            'source_of_certificate' => 'required|string|max:255',
            'courses_name' => 'required|string|max:255',
            'years_of_experience' => 'required|integer|min:0',
            'company_name' => 'required|string|max:255',
            'company_title' => 'required|string|max:255',
            'company_location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'certificate' => 'required|file|max:2048|mimes:pdf,doc,docx',
            'exam_id' => 'nullable|exists:exams,id',
        ]);

        Certifide::updateOrCreate(
            ['user_id' => $user->id],
            $validated
        );
        if ($request->filled('exam_id')) {
            $upgrade = Upgrade::where('user_id', $user->id)->first();

            if ($upgrade) {
                $upgrade->exam_completed = true;
                $upgrade->save();
            } else {
                Upgrade::create([
                    'user_id' => $user->id,
                    'exam_id' => $request->exam_id,
                    'exam_completed' => true,
                ]);
            }
        }

        return response()->json(['message' => 'تم حفظ البيانات بنجاح'], 200);
    }



    public function viewCertifiedData($id)
    {
        $certifiedData = Certifide::find($id);

        if (!$certifiedData) {
            return response()->json(['message' => 'Certified data not found'], 404);
        }
        return response()->json([
            'id' => $certifiedData->id,
            'education_qualifications' => $certifiedData->education_qualifications,
            'university_name' => $certifiedData->university_name,
            'degree_title' => $certifiedData->degree_title,
            'year_of_graduation' => $certifiedData->year_of_graduation,
            'GPA' => $certifiedData->GPA,
            'certificate_name' => $certifiedData->certificate_name,
            'certificate_type' => $certifiedData->certificate_type,
            'source_of_certificate' => $certifiedData->source_of_certificate,
            'courses_name' => $certifiedData->courses_name,
            'years_of_experience' => $certifiedData->years_of_experience,
            'company_name' => $certifiedData->company_name,
            'company_title' => $certifiedData->company_title,
            'company_location' => $certifiedData->company_location,
            'start_date' => $certifiedData->start_date,
            'end_date' => $certifiedData->end_date,

            'certificate' => $certifiedData->relationLoaded('photo') && $certifiedData->photo->isNotEmpty()
                ? optional($certifiedData->photo->first())->original_url
                : asset('media/1/58cc5138-b545-4eb5-a038-cef16e880364.jpg'),
        ]);
    }

}
