@extends('layouts.app')

@section('title', 'Produtos | Healthy Way DV')

@section('content')
    <section class="bg-[#f9fcf8] min-h-screen pb-12" x-data="produtosFiltro">

        <div class="bg-brand-950 py-16">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <span class="text-green-300 font-bold text-xs uppercase tracking-[0.2em] block mb-3">Catálogo</span>
                <h1 class="font-serif text-4xl lg:text-5xl font-bold text-white mb-4">Nossos Produtos</h1>
                <p class="text-white/80 max-w-xl text-[15px] sm:text-base leading-relaxed">
                    Linha completa de produtos selecionados para atender às necessidades do seu bem-estar.
                </p>
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 mt-12">

            <div class="lg:hidden mb-6">
                <button @click="mobileFiltrosOpen = true"
                    class="w-full bg-white border border-gray-200 text-brand-950 font-bold py-3 px-4 rounded-xl flex items-center justify-center gap-2 shadow-sm active:bg-gray-50 transition-colors">
                    <svg class="w-5 h-5 text-brand-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                    </svg>
                    Filtrar Produtos
                </button>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 items-start relative">

                <aside
                    :class="mobileFiltrosOpen ? 'fixed inset-0 z-50 flex lg:relative lg:inset-auto lg:z-auto lg:w-1/4' :
                        'hidden lg:block lg:w-1/4 shrink-0'">

                    <div x-show="mobileFiltrosOpen" x-transition:opacity @click="mobileFiltrosOpen = false"
                        class="fixed inset-0 bg-black/40 backdrop-blur-sm lg:hidden z-40"></div>

                    <div
                        :class="mobileFiltrosOpen ?
                            'fixed inset-y-0 left-0 w-[290px] bg-white p-6 shadow-2xl overflow-y-auto z-50' :
                            'w-full space-y-8 bg-white rounded-3xl border border-gray-100 p-6 shadow-sm'">

                        <div class="flex items-center justify-between mb-6 lg:mb-0">
                            <h2 class="font-serif text-2xl font-bold text-brand-950">Filtros</h2>

                            <button @click="mobileFiltrosOpen = false"
                                class="lg:hidden text-gray-400 hover:text-brand-950 p-1">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                            <button @click="limparFiltros()"
                                class="hidden lg:flex text-[11px] font-bold text-brand-600 hover:text-brand-950 uppercase tracking-widest transition-colors items-center gap-1 bg-brand-600/10 px-3 py-1.5 rounded-full">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Limpar
                            </button>
                        </div>

                        <hr class="my-6 lg:hidden border-gray-100">

                        <div class="mb-8 lg:mb-0">
                            <h3 class="text-xs font-bold text-brand-950 uppercase tracking-[0.1em] mb-4">Categorias</h3>
                            <div class="space-y-3">
                                @foreach ($categories as $category)
                                    <label class="flex items-center gap-3 cursor-pointer group">
                                        <input type="checkbox" value="{{ trim($category) }}" x-model="filtros.categorias"
                                            class="w-4 h-4 rounded border-gray-300 text-brand-600 focus:ring-brand-600/20 cursor-pointer">
                                        <span
                                            class="text-[15px] text-brand-muted group-hover:text-brand-950 transition-colors">{{ $category }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <hr class="my-6 border-gray-100">

                        <div class="mb-8 lg:mb-0">
                            <div class="flex justify-between items-center mb-3">
                                <h3 class="text-xs font-bold text-brand-950 uppercase tracking-[0.1em]">Preço Máximo</h3>
                                <span class="text-sm font-bold text-brand-800" x-text="'R$ ' + filtros.precoMax"></span>
                            </div>
                            <input type="range" min="0" max="{{ $maxPrice }}" step="10"
                                x-model="filtros.precoMax"
                                class="w-full accent-brand-600 h-1.5 bg-gray-100 rounded-lg appearance-none cursor-pointer">
                            <div class="flex justify-between text-[11px] text-gray-400 mt-2 font-medium">
                                <span>R$ 0</span>
                                <span>R$ {{ $maxPrice }}</span>
                            </div>
                        </div>

                        <hr class="my-6 border-gray-100">

                        <div class="mb-8 lg:mb-0">
                            <h3 class="text-xs font-bold text-brand-950 uppercase tracking-[0.1em] mb-4">Classificação</h3>
                            <div class="space-y-3">
                                @for ($stars = 5; $stars >= 1; $stars--)
                                    <button
                                        @click="filtros.avaliacao = (filtros.avaliacao === {{ $stars }} ? null : {{ $stars }})"
                                        class="flex items-center gap-3 group w-full transition-opacity align-middle"
                                        :class="filtros.avaliacao === {{ $stars }} ? 'opacity-100' : (filtros.avaliacao ?
                                            'opacity-40' : 'opacity-60 hover:opacity-100')">
                                        <div class="flex text-[#e69b55]">
                                            @for ($i = 0; $i < $stars; $i++)
                                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endfor
                                            @for ($i = 0; $i < 5 - $stars; $i++)
                                                <svg class="w-4 h-4 fill-gray-300" viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                </svg>
                                            @endfor
                                        </div>
                                        <span class="text-[15px] transition-colors"
                                            :class="filtros.avaliacao === {{ $stars }} ? 'text-brand-950 font-bold' :
                                                'text-brand-muted group-hover:text-brand-950'">
                                            {{ $stars }} Estrela{{ $stars > 1 ? 's' : '' }}
                                        </span>
                                    </button>
                                @endfor
                            </div>
                        </div>

                        <div class="lg:hidden mt-8 pt-4 border-t border-gray-100 space-y-2">
                            <button @click="limparFiltros(); mobileFiltrosOpen = false"
                                class="w-full bg-gray-100 hover:bg-gray-200 text-brand-950 font-bold py-2.5 px-4 rounded-xl text-sm transition-colors">
                                Limpar Filtros
                            </button>
                            <button @click="mobileFiltrosOpen = false"
                                class="w-full bg-brand-800 hover:bg-brand-900 text-white font-bold py-2.5 px-4 rounded-xl text-sm transition-colors">
                                Ver Resultados
                            </button>
                        </div>

                    </div>
                </aside>

                <div class="w-full lg:w-3/4 flex-grow">

                    <div
                        class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white rounded-2xl border border-gray-100 p-4 mb-6 shadow-sm">
                        <span class="text-sm text-brand-muted font-medium">
                            Mostrando <strong class="text-brand-950" x-text="produtosFiltrados.length"></strong> produtos
                        </span>
                        <div class="flex items-center gap-3 w-full sm:w-auto justify-between sm:justify-end">
                            <span class="text-sm text-brand-muted font-medium whitespace-nowrap">Ordenar por:</span>
                            <select x-model="ordenacao"
                                class="text-sm font-bold text-brand-950 border-0 bg-transparent pr-8 py-1 focus:ring-0 cursor-pointer rounded-lg hover:bg-gray-50">
                                <option value="populares">Mais Populares</option>
                                <option value="menor">Menor Preço</option>
                                <option value="maior">Maior Preço</option>
                                <option value="lancamentos">Lançamentos</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-6">
                        <template x-for="product in produtosFiltrados" :key="product.id">

                            <a :href="'/produto/' + product.slug"
                                class="bg-white rounded-[1.25rem] border border-gray-100 shadow-[0_4px_24px_rgba(0,0,0,0.04)] overflow-hidden flex flex-col group hover:shadow-[0_12px_36px_rgba(6,43,28,0.12)] transition-shadow duration-300 cursor-pointer">

                                <div class="relative h-48 bg-gray-50 overflow-hidden flex items-center justify-center p-4">
                                    <img :src="product.images && product.images.length > 0 ? product.images[0].path :
                                        '{{ asset('assets/images/produtos.jpg') }}'"
                                        class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500"
                                        :alt="product.name">

                                    <span
                                        class="absolute top-3 left-3 bg-white/95 backdrop-blur-sm text-brand-950 text-[10px] font-bold px-2.5 py-1 rounded uppercase tracking-[0.1em] shadow-sm"
                                        x-text="product.category"></span>

                                    <button @click.stop.prevent="alert('Adicionado aos favoritos!')"
                                        class="absolute top-3 right-3 w-8 h-8 bg-white/95 backdrop-blur-sm rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 shadow-sm transition-colors z-10">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="p-5 flex flex-col flex-grow">
                                    <div class="flex text-[#e69b55] mb-2">
                                        <template x-for="i in parseInt(product.rating || 5)">
                                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </template>
                                        <template x-for="i in (5 - parseInt(product.rating || 5))">
                                            <svg class="w-3.5 h-3.5 fill-gray-300" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </template>
                                    </div>

                                    <h3 class="font-serif font-bold text-[1.35rem] text-brand-950 mb-2 leading-tight group-hover:text-brand-800 transition-colors"
                                        x-text="product.name"></h3>
                                    <p class="text-[13px] text-brand-muted leading-relaxed mb-6 flex-grow"
                                        x-text="product.description"></p>

                                    <div
                                        class="flex flex-wrap items-center justify-between gap-3 border-t border-gray-100 pt-4 mt-auto">
                                        <span class="font-bold text-brand-800 text-lg flex-1 min-w-0 truncate"
                                            x-text="'R$ ' + formatMoney(product.price)"></span>
                                        <span
                                            class="bg-[#386c57] group-hover:bg-brand-950 text-white text-sm font-bold py-2 px-5 rounded-lg transition-colors shadow-sm inline-block text-center shrink-0">
                                            Ver Detalhes
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </template>
                    </div>

                    <div x-show="produtosFiltrados.length === 0" style="display: none;"
                        class="bg-white border border-gray-100 rounded-3xl p-12 text-center shadow-sm max-w-md mx-auto mt-12">
                        <div
                            class="w-16 h-16 bg-brand-50 rounded-full flex items-center justify-center text-brand-600 mx-auto mb-4">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.604 10.604Z" />
                            </svg>
                        </div>
                        <h3 class="font-serif text-xl font-bold text-brand-950 mb-2">Nenhum produto encontrado</h3>
                        <p class="text-sm text-brand-muted mb-6">Experimente ajustar os filtros ou redefinir a sua pesquisa
                            para ver outros resultados.</p>
                        <button @click="limparFiltros()"
                            class="bg-brand-800 hover:bg-brand-900 text-white font-bold py-2.5 px-6 rounded-xl text-sm transition-colors shadow-sm">
                            Limpar Todos os Filtros
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('produtosFiltro', () => ({
                // Dados vindos do Laravel Controller
                produtosBase: @json($products),

                // Controle da gaveta de filtros no mobile
                mobileFiltrosOpen: false,

                // Estado inicial dos filtros
                filtros: {
                    categorias: [],
                    precoMax: {{ $maxPrice ?? 1300 }},
                    avaliacao: null
                },

                // Ordenação padrão
                ordenacao: 'populares',

                // Método para limpar os filtros e resetar a ordenação
                limparFiltros() {
                    this.filtros.categorias = [];
                    this.filtros.precoMax = {{ $maxPrice ?? 1300 }};
                    this.filtros.avaliacao = null;
                    this.ordenacao = 'populares';
                },

                // Função reativa que filtra e ordena os produtos automaticamente
                get produtosFiltrados() {
                    return this.produtosBase.filter(p => {
                        // Limpa espaços extras da categoria caso existam no banco
                        const categoriaProduto = p.category ? p.category.trim() : 'Geral';

                        // 1. Validação de Categoria
                        const categoryMatch = this.filtros.categorias.length === 0 ||
                            this.filtros.categorias.includes(categoriaProduto);

                        // 2. Validação de Preço Máximo
                        const priceMatch = parseFloat(p.price) <= parseFloat(this.filtros
                            .precoMax);

                        // 3. Validação de Estrelas (Se o produto não tiver nota, assume 5 estrelas)
                        const ratingMatch = !this.filtros.avaliacao ||
                            parseInt(p.rating || 5) === parseInt(this.filtros.avaliacao);

                        return categoryMatch && priceMatch && ratingMatch;
                    }).sort((a, b) => {
                        // Aplica as regras de ordenação baseadas na seleção do combo-box
                        if (this.ordenacao === 'populares') {
                            return parseInt(b.rating || 5) - parseInt(a.rating || 5);
                        } else if (this.ordenacao === 'menor') {
                            return parseFloat(a.price) - parseFloat(b.price);
                        } else if (this.ordenacao === 'maior') {
                            return parseFloat(b.price) - parseFloat(a.price);
                        } else if (this.ordenacao === 'lancamentos') {
                            return parseInt(b.id) - parseInt(a.id);
                        }
                        return 0;
                    });
                },

                // Formatação de valores para moeda brasileira
                formatMoney(value) {
                    return parseFloat(value).toLocaleString('pt-BR', {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                }
            }));
        });
    </script>
@endsection
