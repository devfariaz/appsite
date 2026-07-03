@extends('layouts.app')

@section('title', $product->name . ' | Healthy Way DV')

@section('content')
    <div class="bg-[#edf6eb] min-h-screen py-12 lg:py-20">
        <div class="container mx-auto px-4 max-w-6xl">
            
            <a href="{{ url('/produtos') }}" class="inline-flex items-center gap-2 text-brand-800 hover:text-brand-950 font-medium mb-8 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Voltar ao Catálogo
            </a>

            <div class="flex flex-col lg:flex-row gap-12 lg:gap-20">
                
                <div class="w-full lg:w-1/2" x-data="productCarousel()">
                    <div class="relative bg-white aspect-[4/5] sm:aspect-square flex items-center justify-center rounded-sm overflow-hidden mb-4 group border border-white/50 shadow-sm">
                        
                        <button @click="prev()" x-show="images.length > 1" class="absolute left-4 bg-purple-100/80 hover:bg-purple-200 text-purple-600 p-2 rounded-full shadow-sm transition-all z-10 opacity-0 group-hover:opacity-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                        </button>
                        
                        <img :src="images[currentIndex]" class="w-full h-full object-contain p-8 transition-all duration-300" :alt="'{{ $product->name }}'">

                        <button @click="next()" x-show="images.length > 1" class="absolute right-4 bg-purple-100/80 hover:bg-purple-200 text-purple-600 p-2 rounded-full shadow-sm transition-all z-10 opacity-0 group-hover:opacity-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                        </button>
                    </div>

                    <div class="flex gap-4 overflow-x-auto pb-2" x-show="images.length > 1">
                        <template x-for="(image, index) in images" :key="index">
                            <button @click="currentIndex = index" 
                                    class="w-20 h-20 bg-white border-2 flex-shrink-0 transition-all overflow-hidden p-1"
                                    :class="currentIndex === index ? 'border-brand-800' : 'border-transparent hover:border-gray-300 opacity-70 hover:opacity-100'">
                                <img :src="image" class="w-full h-full object-contain">
                            </button>
                        </template>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 flex flex-col justify-center">
                    
                    <h1 class="text-4xl md:text-5xl font-serif font-bold text-[#1f4e3d] mb-4 leading-tight">
                        {{ $product->name }}
                    </h1>
                    
                    @if($product->description)
                        <h2 class="text-xl md:text-2xl font-bold text-[#1f4e3d] mb-6">
                            {{ $product->description }}
                        </h2>
                    @endif

                    <p class="text-xl text-[#3b795f] mb-8 font-medium">
                        R${{ number_format($product->price, 2, '.', '') }}
                    </p>

                    <div class="prose prose-lg text-gray-700 leading-relaxed mb-8">
                        {!! $product->long_description !!}
                    </div>

                    @if($features && count($features) > 0)
                        <ul class="space-y-3 mb-10">
                            @foreach($features as $feature)
                                <li class="flex items-start gap-3 text-[#3b795f] font-bold">
                                    <svg class="w-6 h-6 flex-shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    
                </div>
            </div>

            @if($recommendedProducts->count() > 0)
                <div class="mt-32 pt-16 border-t border-brand-900/10">
                    <h3 class="text-4xl font-serif font-bold text-[#1f4e3d] mb-12">Você também pode gostar</h3>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($recommendedProducts as $rec)
                            <a href="{{ route('produto.show', $rec->slug) }}" class="group block bg-white hover:shadow-xl transition-shadow duration-300 border border-gray-100 p-4 relative">
                                @if($loop->first)
                                    <!--<span class="absolute top-4 left-4 bg-[#2f3336] text-white text-[10px] font-bold px-3 py-1.5 uppercase tracking-widest z-10">Nova Fórmula</span>-->
                                @endif
                                
                                <div class="relative bg-gray-50 aspect-square mb-6 overflow-hidden flex items-center justify-center p-4">
                                    <img src="{{ $rec->images->where('is_main', true)->first() ? asset('storage/' . $rec->images->where('is_main', true)->first()->path) : asset('assets/images/produtos.jpg') }}" 
                                         alt="{{ $rec->name }}" 
                                         class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500">
                                </div>
                                
                                <h4 class="font-serif font-bold text-xl text-[#1f4e3d] mb-2">{{ $rec->name }}</h4>
                                <p class="text-[#3b795f] font-medium">R${{ number_format($rec->price, 2, '.', '') }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('productCarousel', () => ({
                // Passa as imagens do produto ou uma imagem padrão
                images: [
                    @forelse($product->images as $img)
                        '{{ asset('storage/' . $img->path) }}',
                    @empty
                        '{{ asset('assets/images/produtos.jpg') }}'
                    @endforelse
                ],
                currentIndex: 0,
                
                next() {
                    this.currentIndex = (this.currentIndex === this.images.length - 1) ? 0 : this.currentIndex + 1;
                },
                prev() {
                    this.currentIndex = (this.currentIndex === 0) ? this.images.length - 1 : this.currentIndex - 1;
                }
            }));
        });
    </script>
@endsection