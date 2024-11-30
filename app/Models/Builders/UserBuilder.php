<?php

namespace App\Models\Builders;

use Illuminate\Database\Eloquent\Builder;
use Modules\Auth\Helpers\UserTypeHelper;
use Modules\Auth\Traits\VerificationBuilderTrait;

class UserBuilder extends Builder
{
    use VerificationBuilderTrait;

    public function loginByType(array $data)
    {
        
        return $this->whereNotNull('email')->where('email', $data['email'])->whereIn('type', UserTypeHelper::emailTypes());
    }

    public function withMinimalDetails(bool $withAvatar = true)
    {
        return $this->select([
            'users.id',
            'users.first_name',
            'users.last_name',
            'users.phone',
            'users.email',
            'users.status',
        ])
            ->when($withAvatar, fn (self $q) => $q->with('avatar'));
    }
}
