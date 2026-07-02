<?php

namespace App\Policies;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    public function viewAny(User $user): bool { return $user->hasPermissionTo('listar_funcoes'); }
    public function view(User $user, Role $role): bool { return $user->hasPermissionTo('listar_funcoes'); }
    public function create(User $user): bool { return $user->hasPermissionTo('criar_funcoes'); }
    public function update(User $user, Role $role): bool { return $user->hasPermissionTo('editar_funcoes'); }
    public function delete(User $user, Role $role): bool { return $user->hasPermissionTo('excluir_funcoes'); }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Role $role): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Role $role): bool
    {
        return false;
    }
}
