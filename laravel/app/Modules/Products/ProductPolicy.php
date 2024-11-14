<?php

namespace App\Modules\Products;

use Illuminate\Foundation\Auth\User;
use App\Modules\Base\BasePolicy;

class ProductPolicy extends BasePolicy
{
    public function view(User $user)
    {
        return $this->can($user, 'view', 'products');
    }

    public function create(User $user)
    {
        return $this->can($user, 'create', 'products');
    }

    public function update(User $user)
    {
        return $this->can($user, 'update', 'products');
    }

    public function delete(User $user)
    {
        return $this->can($user, 'delete', 'products');
    }

    public function restore(User $user)
    {
        return $this->can($user, 'restore', 'products');
    }
}
