<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class DashboardStats extends BaseWidget
{
    // Atualiza os dados a cada 5 segundos buscando no banco de dados
    protected ?string $pollingInterval = '5s';

    public static function canView(): bool
    {
        return auth()->user()?->hasRole('Super Admin') ?? false;
    }

    protected function getStats(): array
    {
        // 1. Lógica para buscar os dados dos últimos 7 dias para o gráfico
        $produtosPorDia = Product::select(DB::raw('count(*) as count'))
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('created_at', 'ASC')
            ->pluck('count')
            ->toArray();

        // Se não houver dados, garantimos um array vazio para o gráfico não quebrar
        if (empty($produtosPorDia)) {
            $produtosPorDia = [0];
        }

        return [
            // Card 1: Produtos com gráfico real dos últimos 7 dias
            Stat::make('Total de Produtos', Product::count())
                ->description('Cadastrados na última semana')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('success')
                ->chart($produtosPorDia),

            // --- NOVO CARD DE SERVIÇOS AQUI ---
            Stat::make('Total de Serviços', Service::count())
                ->description('Serviços oferecidos')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('info'),

            // Card 2: Categorias ativas
            Stat::make('Categorias Ativas', Category::where('is_active', true)->count())
                ->description('Categorias prontas para o site')
                ->descriptionIcon('heroicon-m-tag')
                ->color('primary'),

            // Card 3: Fotos na galeria
            Stat::make('Arquivos de Imagem', ProductImage::count())
                ->description('Total de fotos na galeria')
                ->descriptionIcon('heroicon-m-photo')
                ->color('warning'),
        ];
    }
}