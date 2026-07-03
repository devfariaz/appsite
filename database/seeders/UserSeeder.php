<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Limpar o cache do Spatie (Prática obrigatória ao rodar seeders de permissão)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Gerar Permissões Dinamicamente
        $resources = ['categorias', 'produtos', 'configuracoes', 'servicos', 'usuarios', 'funcoes', 'permissoes'];
        $actions = ['listar', 'criar', 'editar', 'excluir'];

        foreach ($resources as $resource) {
            foreach ($actions as $action) {
                Permission::firstOrCreate(['name' => "{$action}_{$resource}"]);
            }
        }

        // 3. Criar a Função (Role) Super Admin e dar todas as permissões a ela
        $adminRole = Role::firstOrCreate(['name' => 'Super Admin']);
        $adminRole->givePermissionTo(Permission::all());

        // 4. Criar Usuário Admin e atribuir a Função
        $adminUser = User::updateOrCreate(
            ['email' => 'systemadmin@sanctyxstudios.com.br'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('@Aldo2026'),
            ]
        );

        if (!$adminUser->hasRole('Super Admin')) {
            $adminUser->assignRole($adminRole);
        }
    }
}
