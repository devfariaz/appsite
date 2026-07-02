<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ColaboradorSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Limpar o cache do Spatie
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Criar a Função (Role) Colaborador
        $colaboradorRole = Role::firstOrCreate(['name' => 'Colaborador']);

        // 3. Sincronizar as permissões exatas solicitadas
        // Observação: 'editar_produtos' e 'editar_categorias' não foram incluídos.
        $colaboradorRole->syncPermissions([
            'listar_produtos',
            'criar_produtos',
            'excluir_produtos',
            'listar_categorias',
            'criar_categorias',
            'excluir_categorias',
        ]);

        // 4. Criar um Usuário Colaborador para testes
        $colaboradorUser = User::firstOrCreate(
            ['email' => 'colaborador@sanctyxstudios.com.br'],
            [
                'name' => 'Colaborador',
                'password' => Hash::make('@Aldo2026'),
            ]
        );

        // 5. Atribuir a função ao usuário
        if (!$colaboradorUser->hasRole('Colaborador')) {
            $colaboradorUser->assignRole($colaboradorRole);
        }
    }
}