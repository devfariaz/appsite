<?php

namespace App\Policies;

use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PermissionPolicy
{
    public function viewAny(User $user): bool { return $user->hasPermissionTo('listar_permissoes'); }
    public function view(User $user, Permission $permission): bool { return $user->hasPermissionTo('listar_permissoes'); }
    public function create(User $user): bool { return $user->hasPermissionTo('criar_permissoes'); }
    public function update(User $user, Permission $permission): bool { return $user->hasPermissionTo('editar_permissoes'); }
    public function delete(User $user, Permission $permission): bool { return $user->hasPermissionTo('excluir_permissoes'); }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Permission $permission): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Permission $permission): bool
    {
        return false;
    }
}
