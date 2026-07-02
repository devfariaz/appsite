<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Limpar o cache do Spatie (Prática obrigatória ao rodar seeders de permissão)
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Gerar Permissões Dinamicamente
        // Incluímos as ações básicas e os resources do seu sistema
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

        // 5. Criar Configurações Padrão
        $settings = [
            ['key' => 'telefone_whatsapp', 'value' => '5511999999999'],
            ['key' => 'email_contato', 'value' => 'contato@seusite.com.br'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        // 6. Criar Categorias
        $catNutricao = Category::updateOrCreate(
            ['slug' => 'nutricao'],
            ['name' => 'Nutrição', 'is_active' => true]
        );

        $catBeleza = Category::updateOrCreate(
            ['slug' => 'beleza'],
            ['name' => 'Beleza', 'is_active' => true]
        );

        $catVestuario = Category::updateOrCreate(
            ['slug' => 'vestuario'],
            ['name' => 'Vestuário', 'is_active' => true]
        );

        // 7. Criar Produtos de Exemplo
        Product::updateOrCreate(
            ['slug' => 'shake-baunilha-cremoso'],
            [
                'category_id' => $catNutricao->id,
                'name' => 'Shake Baunilha Cremoso',
                'description' => 'Shake nutritivo para controle de peso',
                'long_description' => '<p>O Shake de Baunilha é uma opção prática e saborosa para quem busca mais equilíbrio na rotina sem abrir mão do prazer de se alimentar bem.</p>',
                'price' => 125.00,
                'is_active' => true,
                'features' => [
                    'Sabor leve e agradável',
                    'Fácil e rápido de preparar',
                    'Mais praticidade para a rotina'
                ],
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'face-serum'],
            [
                'category_id' => $catBeleza->id,
                'name' => 'Face Serum',
                'description' => 'Sérum facial hidratante diário',
                'long_description' => '<p>Hidratação profunda para todos os tipos de pele.</p>',
                'price' => 51.00,
                'is_active' => true,
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'wool-sweater'],
            [
                'category_id' => $catVestuario->id,
                'name' => 'Wool Sweater',
                'description' => 'Suéter confortável de lã',
                'long_description' => '<p>Perfeito para os dias mais frios com muito estilo.</p>',
                'price' => 50.00,
                'is_active' => true,
            ]
        );

        // 8. Criar Serviços de Exemplo
        Service::updateOrCreate(
            ['name' => 'Consulta Nutricional Personalizada'],
            [
                'description' => 'Avaliação completa de bioimpedância e elaboração de plano alimentar exclusivo.',
                'duration' => '1 hora',
                'price' => 150.00,
            ]
        );

        Service::updateOrCreate(
            ['name' => 'Limpeza de Pele Profunda'],
            [
                'description' => 'Tratamento facial com extração, esfoliação e máscara de hidratação intensa.',
                'duration' => '1 hora e 30 minutos',
                'price' => 120.00,
            ]
        );
    }
}