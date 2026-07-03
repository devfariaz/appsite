@extends('layouts.app')

@section('title', $product->name . ' | Healthy Way DV')

@section('content')
    <div class="bg-[#edf6eb] min-h-screen py-12 lg:py-20">

        <div class="container mx-auto px-4 max-w-6xl">

            <a href="{{ url('/produtos') }}"
                class="inline-flex items-center gap-2 text-brand-800 hover:text-brand-950 font-medium mb-8 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Voltar ao Catálogo
            </a>

            <div class="flex flex-col lg:flex-row gap-12 lg:gap-20">

                <div class="w-full lg:w-1/2" x-data="productCarousel()">
                    <div
                        class="relative bg-white aspect-[4/5] sm:aspect-square flex items-center justify-center rounded-sm overflow-hidden mb-4 group border border-white/50 shadow-sm">

                        <button @click="prev()" x-show="images.length > 1"
                            class="absolute left-4 bg-purple-100/80 hover:bg-purple-200 text-purple-600 p-2 rounded-full shadow-sm transition-all z-10 opacity-0 group-hover:opacity-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        <img :src="images[currentIndex]"
                            class="w-full h-full object-contain p-8 transition-all duration-300"
                            :alt="'{{ $product->name }}'">

                        <button @click="next()" x-show="images.length > 1"
                            class="absolute right-4 bg-purple-100/80 hover:bg-purple-200 text-purple-600 p-2 rounded-full shadow-sm transition-all z-10 opacity-0 group-hover:opacity-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex gap-4 overflow-x-auto pb-2" x-show="images.length > 1">
                        <template x-for="(image, index) in images" :key="index">
                            <button @click="currentIndex = index"
                                class="w-20 h-20 bg-white border-2 flex-shrink-0 transition-all overflow-hidden p-1"
                                :class="currentIndex === index ? 'border-brand-800' :
                                    'border-transparent hover:border-gray-300 opacity-70 hover:opacity-100'">
                                <img :src="image" class="w-full h-full object-contain">
                            </button>
                        </template>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 flex flex-col justify-center">

                    <h1 class="text-4xl md:text-5xl font-serif font-bold text-[#1f4e3d] mb-2 leading-tight">
                        {{ $product->name }}
                    </h1>

                    <div class="flex items-center gap-2 mb-6">
                        <div class="flex text-[#e69b55]">
                            @php
                                // Pega a nota do produto ou assume 5 caso não tenha
                                $productRating = intval($product->rating ?? 5);
                            @endphp

                            {{-- Estrelas Preenchidas --}}
                            @for ($i = 0; $i < $productRating; $i++)
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor

                            {{-- Estrelas Vazias (caso a nota seja menor que 5) --}}
                            @for ($i = 0; $i < 5 - $productRating; $i++)
                                <svg class="w-4 h-4 fill-gray-300" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>

                        <span class="text-xs text-[#3b795f] font-semibold bg-white/60 px-2 py-0.5 rounded-md">
                            {{ $product->reviews ? $product->reviews->count() : 0 }}
                            {{ $product->reviews && $product->reviews->count() == 1 ? 'avaliação' : 'avaliações' }}
                        </span>
                    </div>

                    @if ($product->description)
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

                    @if ($features && count($features) > 0)
                        <ul class="space-y-3 mb-10">
                            @foreach ($features as $feature)
                                <li class="flex items-start gap-3 text-[#3b795f] font-bold">
                                    <svg class="w-6 h-6 flex-shrink-0 mt-0.5" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span>{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="mt-20 pt-16 border-t border-brand-900/10 w-full block">
                <h3 class="text-3xl font-serif font-bold text-[#1f4e3d] mb-10">Avaliações de Clientes</h3>

                <div class="flex flex-col lg:flex-row gap-12 lg:gap-20 items-start w-full">

                    <div class="w-full lg:w-1/2">
                        <div class="flex flex-col gap-6 overflow-y-auto pr-4 custom-scrollbar" style="max-height: 650px;">

                            @forelse($product->reviews ?? [] as $review)
                                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div
                                            class="w-10 h-10 bg-brand-50 rounded-full flex items-center justify-center text-brand-800 font-bold font-serif uppercase shrink-0">
                                            {{ substr($review->user_name, 0, 1) }}
                                        </div>
                                        <div>
                                            <div class="flex items-center gap-2">
                                                <span
                                                    class="font-bold text-sm text-brand-950">{{ $review->user_name }}</span>
                                                <span class="text-xs text-gray-400">•
                                                    {{ $review->created_at->format('d/m/Y') }}</span>
                                            </div>
                                            <div class="flex text-[#e69b55] mt-0.5">
                                                @for ($i = 0; $i < $review->rating; $i++)
                                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                @endfor
                                                @for ($i = 0; $i < 5 - $review->rating; $i++)
                                                    <svg class="w-3.5 h-3.5 fill-gray-200" viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-brand-muted text-[15px] leading-relaxed">{{ $review->comment }}</p>
                                </div>
                            @empty
                                <div
                                    class="bg-white p-10 md:p-12 rounded-3xl border border-gray-100 flex flex-col items-center justify-center text-center shadow-sm w-full min-h-[320px]">
                                    <div
                                        class="w-20 h-20 bg-[#edf6eb] rounded-full flex items-center justify-center text-[#3b795f] mb-6">
                                        <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                        </svg>
                                    </div>
                                    <h4 class="font-serif text-2xl font-bold text-[#1f4e3d] mb-3">Nenhuma avaliação ainda
                                    </h4>
                                    <p class="text-brand-muted text-[15px] max-w-sm">Seja o primeiro a compartilhar sua
                                        experiência e ajude outras pessoas com a sua opinião!</p>
                                </div>
                            @endforelse

                        </div>
                    </div>

                    <div class="w-full lg:w-1/2">

                        @if (session('success'))
                            <div
                                class="bg-[#e6f4ea] border border-[#c3e6cb] text-[#155724] px-4 py-3 rounded-xl mb-6 flex items-center gap-3">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-sm font-bold">{{ session('success') }}</span>
                            </div>
                        @endif

                        <div class="bg-white p-8 rounded-3xl shadow-md border border-gray-100 sticky top-24"
                            x-data="{ rating: 0, hoverRating: 0, isSubmitting: false }">
                            <h4 class="font-serif font-bold text-2xl text-[#1f4e3d] mb-6">Deixe sua avaliação</h4>

                            <form action="{{ route('reviews.store', $product->id) }}" method="POST"
                                class="flex flex-col gap-5" @submit="isSubmitting = true">
                                @csrf

                                <div>
                                    <label class="block text-sm font-bold text-brand-950 mb-2">Sua nota</label>
                                    <div class="flex gap-1 text-[#e69b55] cursor-pointer">
                                        <template x-for="star in 5">
                                            <svg @click="rating = star" @mouseenter="hoverRating = star"
                                                @mouseleave="hoverRating = 0"
                                                class="w-8 h-8 transition-colors duration-150"
                                                :class="(hoverRating >= star || (!hoverRating && rating >= star)) ?
                                                'fill-current' : 'fill-gray-200'"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </template>
                                    </div>
                                    <input type="hidden" name="rating" :value="rating" required>
                                </div>

                                <div>
                                    <input type="text" name="user_name" placeholder="Seu nome" required
                                        class="w-full rounded-xl border-gray-200 focus:border-brand-600 focus:ring focus:ring-brand-600/20 px-4 py-3.5 text-[15px] bg-gray-50/50">
                                </div>

                                <div>
                                    <textarea name="comment" rows="4" placeholder="O que você achou do produto?" required
                                        class="w-full rounded-xl border-gray-200 focus:border-brand-600 focus:ring focus:ring-brand-600/20 px-4 py-3.5 text-[15px] resize-none bg-gray-50/50"></textarea>
                                </div>

                                <div class="mt-2">
                                    <button type="submit"
                                        class="w-full bg-brand-800 hover:bg-brand-900 text-white font-bold py-4 rounded-full transition-all text-[15px] disabled:opacity-50 disabled:cursor-not-allowed shadow-sm flex items-center justify-center gap-2"
                                        :disabled="rating === 0 || isSubmitting">

                                        <svg x-show="isSubmitting" style="display: none;"
                                            class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>

                                        <span x-text="isSubmitting ? 'Enviando...' : 'Enviar Avaliação'"></span>
                                    </button>
                                    <p x-show="rating === 0" class="text-xs text-red-500 text-center mt-3">Selecione uma
                                        nota em estrelas para avaliar.</p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($recommendedProducts->count() > 0)
        <div class="bg-white py-16 lg:py-24 border-t border-gray-100">
            <div class="container mx-auto px-4 max-w-6xl">
                <h3 class="text-4xl font-serif font-bold text-[#1f4e3d] mb-12">Você também pode gostar</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($recommendedProducts as $rec)
                        <a href="{{ route('produto.show', $rec->slug) }}"
                            class="group block bg-[#edf6eb] hover:shadow-xl transition-shadow duration-300 p-5 relative rounded-[1.25rem]">

                            <div
                                class="relative bg-white aspect-square mb-6 overflow-hidden flex items-center justify-center p-4 rounded-xl border border-gray-100">
                                <img src="{{ $rec->images->where('is_main', true)->first() ? asset('storage/' . $rec->images->where('is_main', true)->first()->path) : asset('assets/images/produtos.jpg') }}"
                                    alt="{{ $rec->name }}"
                                    class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500">
                            </div>

                            <h4 class="font-serif font-bold text-xl text-[#1f4e3d] mb-2 px-1">{{ $rec->name }}</h4>
                            <p class="text-[#3b795f] font-medium px-1">R${{ number_format($rec->price, 2, '.', '') }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('productCarousel', () => ({
                images: [
                    @forelse($product->images as $img)
                        '{{ asset('storage/' . $img->path) }}',
                    @empty
                        '{{ asset('assets/images/produtos.jpg') }}'
                    @endforelse
                ],
                currentIndex: 0,
                next() {
                    this.currentIndex = (this.currentIndex === this.images.length - 1) ? 0 : this
                        .currentIndex + 1;
                },
                prev() {
                    this.currentIndex = (this.currentIndex === 0) ? this.images.length - 1 : this
                        .currentIndex - 1;
                }
            }));
        });
    </script>
@endsection
