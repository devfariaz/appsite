<?php

namespace App\Policies;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SettingPolicy
{
    public function viewAny(User $user): bool { return $user->hasPermissionTo('listar_configuracoes'); }
    public function view(User $user, Setting $setting): bool { return $user->hasPermissionTo('listar_configuracoes'); }
    public function create(User $user): bool { return $user->hasPermissionTo('criar_configuracoes'); }
    public function update(User $user, Setting $setting): bool { return $user->hasPermissionTo('editar_configuracoes'); }
    public function delete(User $user, Setting $setting): bool { return $user->hasPermissionTo('excluir_configuracoes'); }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Setting $setting): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Setting $setting): bool
    {
        return false;
    }
}
