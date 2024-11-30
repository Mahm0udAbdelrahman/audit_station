<?php

namespace Modules\Auth\Transformers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\BuyCoins\Models\BuyCoins;
use Modules\BuyCoins\Transformers\BuyCoinResource;
use Modules\PaymentMethod\Models\PaymentMethod;

class ProfileResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     */
    protected function socialMedia()
    {
        return SocialMedia::where('user_id', $this->id)->first();
    }

    protected function payment()
    {
        return PaymentMethod::where('user_id', $this->id)->first();
    }
    public function BuyCoins()
    {
        return BuyCoins::where('user_id', $this->id)->get();
    }

    public function toArray(Request $request): array
    {
        $socialMedia = $this->socialMedia();
        $payment = $this->payment();

        return [
            'id' => $this->id,
            'name' => $this->name ?? null,
            'email' => $this->email ?? null,
            'phone' => $this->phone ?? null,
            'coins' => $this->coins ?? null,
            'age' => $this->age ?? null,
            'gender' => $this->gender ?? null,
            'country' => $this->country ?? null,
            'city' => $this->city ?? null,
            'address' => $this->address ?? null,
            'role' => $this->roles->first()->name ?? 'user',
            'image' => $this->getFirstMediaUrl('profile_image') ?? null,
            'facebook' => $socialMedia->facebook ?? null,
            'instagram' => $socialMedia->instagram ?? null,
            'twitter' => $socialMedia->twitter ?? null,
            'youtube' => $socialMedia->youtube ?? null,
            'github' => $socialMedia->github ?? null,
            'linkedin' => $socialMedia->linkedin ?? null,
            'whatsapp' => $this->user->whatsapp ?? null,
            'payout_account' => $payment->payout_account ?? null,
            'holder_name' => $payment->holder_name ?? null,
            'card_number' => $payment->card_number ?? null,
            'cvv' => $payment->cvv ?? null,
            'expire_date' => $payment->expire_date ?? null,
            'BuyCoins' => BuyCoinResource::collection($this->BuyCoins()),
            'created_at' => $this->created_at->format('Y-m-d H:i:s A'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s A'),
        ];
    }
}
