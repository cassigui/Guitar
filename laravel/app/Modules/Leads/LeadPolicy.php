<?php

namespace App\Modules\Leads;

use Illuminate\Foundation\Auth\User;
use App\Modules\Base\BasePolicy;

class LeadPolicy extends BasePolicy
{
    public function view(User $user)
    {
        return $this->can($user, 'view', 'leads');
    }

    public function create(User $user)
    {
        return $this->can($user, 'create', 'leads');
    }

    public function update(User $user)
    {
        return $this->can($user, 'update', 'leads');
    }

    public function delete(User $user)
    {
        return $this->can($user, 'delete', 'leads');
    }

    public function restore(User $user)
    {
        return $this->can($user, 'restore', 'leads');
    }
}
