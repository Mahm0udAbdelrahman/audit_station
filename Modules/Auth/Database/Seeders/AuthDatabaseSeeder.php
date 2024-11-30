<?php

namespace Modules\Auth\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\Accountant\Models\Accountant;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Company\Models\Company;
use Modules\Instructor\Models\Instructor;
use Modules\Interviewerr\Models\Interviewerr;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alphaTypes = UserTypeEnum::alphaTypes();

        foreach($alphaTypes as $type => $alphaType)
        {
            $user = User::create([
                'name' => $alphaType,
                'email' => "$alphaType@gmail.com",
                'password' => Hash::make('123456789'),
                'phone' => '0124357869',
                'type' => $type,
            ]);

            if($type == UserTypeEnum::ADMIN)
            {
                $role = Role::create(['name' => 'admin' ,'guard_name' => 'web']);
                $allPermissions = Permission::all();
                $role->syncPermissions($allPermissions);
                $user->assignRole($role);
            }
            if($type == UserTypeEnum::ADMIN_EMPLOYEE)
            {
                $role = Role::create(['name' => 'sup_admin' ,'guard_name' => 'web']);
            }

            switch($type)
            {
                case UserTypeEnum::COMPANY:
                    Company::factory(1)->create([
                        'user_id' => $user->id,
                    ]);
                    break;

                case UserTypeEnum::INSTRUCTOR:
                    Instructor::factory(1)->create([
                        'user_id' => $user->id,
                    ]);
                    break;

                case UserTypeEnum::INTERVIEWER:
                    Interviewerr::factory(1)->create([
                        'user_id' => $user->id,
                    ]);

                    break;

                case UserTypeEnum::ACCOUNTANT:
                    Accountant::factory(1)->create([
                        'user_id' => $user->id,
                    ]);
                    break;
            }
        }
    }
}


