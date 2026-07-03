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

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 5. Criar Configurações Padrão
        $settings = [
            ['key' => 'telefone_whatsapp', 'value' => '5511999999999'],
            ['key' => 'email_contato', 'value' => 'contato@seusite.com.br'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        // 6. Criar Categorias (Total: 6)
        $catNutricao = Category::updateOrCreate(['slug' => 'nutricao'], ['name' => 'Nutrição', 'is_active' => true]);
        $catBeleza = Category::updateOrCreate(['slug' => 'beleza'], ['name' => 'Beleza', 'is_active' => true]);
        $catVestuario = Category::updateOrCreate(['slug' => 'vestuario'], ['name' => 'Vestuário', 'is_active' => true]);
        $catChas = Category::updateOrCreate(['slug' => 'chas'], ['name' => 'Chás', 'is_active' => true]);
        $catFibras = Category::updateOrCreate(['slug' => 'fibras'], ['name' => 'Fibras', 'is_active' => true]);
        $catAcessorios = Category::updateOrCreate(['slug' => 'acessorios'], ['name' => 'Acessórios', 'is_active' => true]);

        // 7. Criar Produtos de Exemplo (Total: 10)
        
        // Produto 1
        Product::updateOrCreate(
            ['slug' => 'shake-baunilha-cremoso'],
            [
                'category_id' => $catNutricao->id,
                'name' => 'Shake Baunilha Cremoso',
                'description' => 'Shake nutritivo para controle de peso',
                'long_description' => '<p>O Shake de Baunilha é uma opção prática e saborosa.</p>',
                'price' => 125.00,
                'rating' => 5,
                'is_active' => true,
                'features' => ['Sabor leve e agradável', 'Fácil e rápido de preparar'],
            ]
        );

        // Produto 2
        Product::updateOrCreate(
            ['slug' => 'face-serum'],
            [
                'category_id' => $catBeleza->id,
                'name' => 'Face Serum',
                'description' => 'Sérum facial hidratante diário',
                'long_description' => '<p>Hidratação profunda para todos os tipos de pele.</p>',
                'price' => 51.00,
                'rating' => 4,
                'is_active' => true,
            ]
        );

        // Produto 3
        Product::updateOrCreate(
            ['slug' => 'wool-sweater'],
            [
                'category_id' => $catVestuario->id,
                'name' => 'Wool Sweater',
                'description' => 'Suéter confortável de lã',
                'long_description' => '<p>Perfeito para os dias mais frios com muito estilo.</p>',
                'price' => 250.00,
                'rating' => 5,
                'is_active' => true,
            ]
        );

        // Produto 4
        Product::updateOrCreate(
            ['slug' => 'kit-chas-premium'],
            [
                'category_id' => $catChas->id,
                'name' => 'Kit Chás Premium',
                'description' => 'Conjunto completo para organizar sua rotina matinal.',
                'long_description' => '<p>Equilíbrio e leveza para o seu dia a dia.</p>',
                'price' => 299.00,
                'rating' => 5,
                'is_active' => true,
            ]
        );

        // Produto 5
        Product::updateOrCreate(
            ['slug' => 'cha-verde-detox'],
            [
                'category_id' => $catChas->id,
                'name' => 'Chá Verde Detox',
                'description' => 'Acelera o metabolismo e ajuda na retenção de líquidos.',
                'long_description' => '<p>Refrescante e ideal para consumir a qualquer hora.</p>',
                'price' => 89.90,
                'rating' => 4,
                'is_active' => true,
            ]
        );

        // Produto 6
        Product::updateOrCreate(
            ['slug' => 'suplemento-fibras'],
            [
                'category_id' => $catFibras->id,
                'name' => 'Suplemento de Fibras',
                'description' => 'Design nutricional para saúde digestiva.',
                'long_description' => '<p>Fibras solúveis para o seu bem-estar.</p>',
                'price' => 149.00,
                'rating' => 5,
                'is_active' => true,
            ]
        );

        // Produto 7
        Product::updateOrCreate(
            ['slug' => 'fibras-sabor-maca'],
            [
                'category_id' => $catFibras->id,
                'name' => 'Fibras Sabor Maçã',
                'description' => 'Fibras em pó com delicioso sabor de maçã verde.',
                'long_description' => '<p>Fácil diluição e ótimo para misturar em sucos.</p>',
                'price' => 129.00,
                'rating' => 3, // Rating menor para testar o filtro de estrelas
                'is_active' => true,
            ]
        );

        // Produto 8
        Product::updateOrCreate(
            ['slug' => 'kit-limpeza-interna'],
            [
                'category_id' => $catAcessorios->id,
                'name' => 'Kit Limpeza Interna',
                'description' => 'Suporte essencial focado no funcionamento impecável.',
                'long_description' => '<p>Acessórios de alta qualidade para sua rotina.</p>',
                'price' => 149.00,
                'rating' => 4,
                'is_active' => true,
            ]
        );

        // Produto 9
        Product::updateOrCreate(
            ['slug' => 'coqueteleira-premium'],
            [
                'category_id' => $catAcessorios->id,
                'name' => 'Coqueteleira Premium 600ml',
                'description' => 'Ideal para preparar seus shakes em qualquer lugar.',
                'long_description' => '<p>Material resistente, livre de BPA e com compartimento extra.</p>',
                'price' => 45.00,
                'rating' => 5,
                'is_active' => true,
            ]
        );

        // Produto 10
        Product::updateOrCreate(
            ['slug' => 'shake-morango'],
            [
                'category_id' => $catNutricao->id,
                'name' => 'Shake Sabor Morango',
                'description' => 'Refeição completa e deliciosa.',
                'long_description' => '<p>Vitaminas e minerais na medida certa para o seu corpo.</p>',
                'price' => 125.00,
                'rating' => 3, // Rating menor para testar o filtro
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
