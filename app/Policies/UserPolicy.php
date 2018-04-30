<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function view(User $user, User $model) {
        return true;
    }

    public function viewAll(User $user) {
        return $user->isSuperAdmin();
    }

    public function create(User $user) {
        return $user->isSuperAdmin();
    }

    public function update(User $user, User $model) {
        return $user->id == $model->id;
    }

    public function ban(User $user, User $model) {
        return $user->isSuperAdmin() and $user->id !== $model->id and !$model->isSuperAdmin();
    }

    public function delete(User $user, User $model) {
        return $user->isSuperAdmin() and $user->id !== $model->id and !$model->isSuperAdmin();
    }

    public function getForm(User $user) {
      return $user->isSuperAdmin();
    }
}
