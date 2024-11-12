<?php

namespace App\Modules\Brands;

use Illuminate\Foundation\Auth\User;
use App\Modules\Base\BasePolicy;

class BrandPolicy extends BasePolicy
{
    public function view(User $user)
    {
        return $this->can($user, 'view', 'brands');
    }

    public function create(User $user)
    {
        return $this->can($user, 'create', 'brands');
    }

    public function update(User $user)
    {
        return $this->can($user, 'update', 'brands');
    }

    public function delete(User $user)
    {
        return $this->can($user, 'delete', 'brands');
    }

    public function restore(User $user)
    {
        return $this->can($user, 'restore', 'brands');
    }
}
