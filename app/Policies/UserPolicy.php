<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function viewAny(User $user): bool { return $user->hasPermissionTo('listar_usuarios'); }
    public function view(User $user, User $model): bool { return $user->hasPermissionTo('listar_usuarios'); }
    public function create(User $user): bool { return $user->hasPermissionTo('criar_usuarios'); }
    public function update(User $user, User $model): bool { return $user->hasPermissionTo('editar_usuarios'); }
    public function delete(User $user, User $model): bool { return $user->hasPermissionTo('excluir_usuarios'); }
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
}
