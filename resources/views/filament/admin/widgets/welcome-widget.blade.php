<x-filament-widgets::widget>
    <x-filament::section>
        <!-- Wrapper principal forçando o Flexbox (lado a lado) -->
        <div style="display: flex; align-items: center; gap: 1rem;">
            
            <!-- Caixa do Ícone -->
            <div class="rounded-lg bg-gray-100 text-gray-900 dark:bg-gray-800 dark:text-gray-200" style="display: flex; align-items: center; justify-content: center; width: 50px; height: 50px; flex-shrink: 0;">
                <x-heroicon-o-computer-desktop style="width: 28px; height: 28px;" />
            </div>

            <!-- Textos -->
            <div style="flex: 1;">
                <h2 class="text-xl font-bold tracking-tight text-gray-950 dark:text-white" style="margin: 0;">
                    Bem-vindo(a) ao painel da Herba 👋
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400" style="margin: 0; font-size: 1rem; line-height: 2rem;">
                    Use o menu lateral esquerdo para navegar pelo sistema. Como colaborador, você tem acesso às ferramentas de gerenciamento de catálogo.
                </p>
            </div>
        </div>
        
        <!-- Botões -->
        <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; margin-top: 1.5rem; padding-top: 1rem; border-top: 1px solid #f3f4f6;">
            <x-filament::button href="/admin/products" tag="a" color="success" icon="heroicon-m-shopping-bag">
                Acessar Produtos
            </x-filament::button>

            <x-filament::button href="/admin/categories" tag="a" color="info" icon="heroicon-m-tag">
                Acessar Categorias
            </x-filament::button>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>