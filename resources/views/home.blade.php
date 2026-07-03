@extends('layouts.app')

@section('title', 'Healthy Way DV | Qualidade de vida e saúde')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-[760px] flex items-center overflow-hidden isolate text-white">
        <video class="absolute inset-0 w-full h-full object-cover -z-20" autoplay muted loop playsinline
            poster="{{ asset('assets/images/exercicios.jpg') }}">
            <source src="{{ asset('assets/video/hero.mp4') }}" type="video/mp4">
        </video>
        <div class="absolute inset-0 -z-10 bg-gradient-to-r from-brand-950/95 via-brand-950/70 to-brand-950/30"></div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-20">
            <div class="max-w-[680px]">
                <span class="inline-block text-white/90 font-bold text-xs uppercase tracking-[0.15em] mb-4">
                    HEALTHY WAY DV
                </span>
                <h1
                    class="font-serif text-5xl md:text-6xl lg:text-[5.5rem] font-bold leading-[1.05] text-white tracking-tight">
                    Saúde, leveza <br> e qualidade de <br> vida.
                </h1>
                <p class="mt-6 text-lg text-white/90 leading-relaxed max-w-[500px]">Um caminho simples para cuidar melhor da
                    sua rotina, com escolhas conscientes e bem-estar de verdade.</p>
                <div class="mt-10 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('contact') }}"
                        class="bg-[#1a8e5e] hover:bg-brand-600 text-white font-bold py-3.5 px-8 rounded-full text-center transition-colors text-[15px]">Começar
                        agora</a>
                    <a href="{{ route('about') }}"
                        class="border border-white hover:bg-white hover:text-brand-950 text-white font-bold py-3.5 px-8 rounded-full text-center transition-all text-[15px]">Conhecer
                        a história</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Bem-Estar -->
    <section class="py-24 bg-[#f2faef]" x-data="{
        visible: false,
        init() {
            // Cria o observador para disparar quando a seção entrar na tela
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.visible = true;
                        observer.disconnect(); // Roda a animação apenas uma vez
                    }
                });
            }, { threshold: 0.1 });
            observer.observe($el);
        }
    }">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span
                        class="inline-flex items-center gap-2 text-brand-600 font-bold text-xs uppercase tracking-[0.1em] mb-4">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                        BEM-ESTAR NA PRÁTICA
                    </span>
                    <h2 class="font-serif text-4xl lg:text-[3.5rem] font-bold text-brand-950 leading-[1.1] tracking-tight">
                        Um cuidado mais <br> inteligente para o <br> dia a dia.</h2>
                    <p class="mt-6 text-brand-muted text-[1.1rem] leading-relaxed">A Healthy Way DV conecta alimentação,
                        movimento e orientação para ajudar você a construir uma rotina mais saudável, sem exageros e sem
                        complicação.</p>

                    <div class="grid grid-cols-2 gap-6 mt-10">

                        <div class="bg-white p-8 rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.04)]" x-data="{
                            current: 0,
                            target: 150,
                            animate() {
                                let start = null;
                                const duration = 2000; // 2 segundos de animação
                                const step = (timestamp) => {
                                    if (!start) start = timestamp;
                                    const progress = Math.min((timestamp - start) / duration, 1);
                                    this.current = Math.floor(progress * this.target);
                                    if (progress < 1) {
                                        window.requestAnimationFrame(step);
                                    }
                                };
                                window.requestAnimationFrame(step);
                            }
                        }"
                            x-effect="if (visible) animate()">
                            <strong class="block font-serif text-[3.5rem] text-brand-950 leading-none">
                                <span x-text="current">0</span>+
                            </strong>
                            <span class="block mt-2 text-[15px] text-brand-muted">pessoas orientadas</span>
                        </div>

                        <div class="bg-white p-8 rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.04)]" x-data="{
                            current: 0,
                            target: 15,
                            animate() {
                                let start = null;
                                const duration = 1500; // 1.5 segundos de animação
                                const step = (timestamp) => {
                                    if (!start) start = timestamp;
                                    const progress = Math.min((timestamp - start) / duration, 1);
                                    this.current = Math.floor(progress * this.target);
                                    if (progress < 1) {
                                        window.requestAnimationFrame(step);
                                    }
                                };
                                window.requestAnimationFrame(step);
                            }
                        }"
                            x-effect="if (visible) animate()">
                            <strong class="block font-serif text-[3.5rem] text-brand-950 leading-none"
                                x-text="current">0</strong>
                            <span class="block mt-2 text-[15px] text-brand-muted">anos de experiência</span>
                        </div>

                    </div>
                </div>
                <div>
                    <img src="{{ asset('assets/images/exercicios.jpg') }}" alt="Rotina de exercícios"
                        class="w-full h-auto rounded-3xl shadow-lg object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Produtos -->
    <section class="py-24 bg-[#0a422a]">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-flex items-center gap-2 text-white font-bold text-xs uppercase tracking-[0.1em] mb-4">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                    </svg>
                    OS QUERIDINHOS
                </span>
                <h2 class="font-serif text-4xl lg:text-[3.5rem] font-bold text-white leading-tight">Produtos e escolhas <br>
                    para apoiar sua rotina.</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <article class="bg-white rounded-2xl overflow-hidden shadow-lg transition-transform hover:-translate-y-2">
                    <img src="{{ asset('assets/images/produtos.jpg') }}" class="w-full h-[280px] object-cover"
                        alt="Chás">
                    <div class="p-8 text-center">
                        <h3 class="text-brand-950 font-serif font-bold text-2xl uppercase tracking-wide">Chás</h3>
                        <p class="text-brand-muted mt-3 text-[15px]">Opções práticas para trazer mais leveza ao dia.</p>
                    </div>
                </article>
                <article class="bg-white rounded-2xl overflow-hidden shadow-lg transition-transform hover:-translate-y-2">
                    <img src="{{ asset('assets/images/nutricao.jpg') }}" class="w-full h-[280px] object-cover"
                        alt="Shakes">
                    <div class="p-8 text-center">
                        <h3 class="text-brand-950 font-serif font-bold text-2xl uppercase tracking-wide">Shakes</h3>
                        <p class="text-brand-muted mt-3 text-[15px]">Praticidade para complementar uma rotina equilibrada.
                        </p>
                    </div>
                </article>
                <article class="bg-white rounded-2xl overflow-hidden shadow-lg transition-transform hover:-translate-y-2">
                    <img src="{{ asset('assets/images/produtos.jpg') }}" class="w-full h-[280px] object-cover"
                        alt="Fibras">
                    <div class="p-8 text-center">
                        <h3 class="text-brand-950 font-serif font-bold text-2xl uppercase tracking-wide">Fibras</h3>
                        <p class="text-brand-muted mt-3 text-[15px]">Suporte para escolhas mais conscientes e consistentes.
                        </p>
                    </div>
                </article>
            </div>

            <div class="text-center mt-16"><a href="{{ route('products') }}"
                    class="bg-white text-brand-800 hover:text-brand-950 font-bold py-3.5 px-8 rounded-full transition-colors inline-block text-[15px]">Conheça
                    nossos produtos</a></div>
        </div>
    </section>

    <!-- Seção Pilares -->
    <section class="py-24 bg-[#f2faef]">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span
                    class="inline-flex items-center gap-2 text-brand-600 font-bold text-xs uppercase tracking-[0.1em] mb-4">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09l2.846.813-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                    </svg>
                    PILARES
                </span>
                <h2 class="font-serif text-4xl lg:text-[3.5rem] font-bold text-brand-950 leading-tight">Pilares para uma
                    vida <br> saudável</h2>
                <p class="mt-4 text-brand-muted text-[1.1rem]">Três frentes simples para construir mais energia, equilíbrio
                    e constância.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <article
                    class="bg-white rounded-2xl overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.04)] transition-transform hover:-translate-y-2">
                    <img src="{{ asset('assets/images/nutricao.jpg') }}" class="w-full h-[240px] object-cover"
                        alt="Alimentação">
                    <div class="p-8">
                        <div class="w-12 h-12 bg-brand-800 text-white rounded-full flex items-center justify-center mb-6">
                            <!-- Ícone de Fogo/Energia (Heroicon) -->
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                            </svg>
                        </div>
                        <h3 class="text-brand-950 font-serif font-bold text-2xl mb-3">Alimentação</h3>
                        <p class="text-brand-muted text-[15px]">Escolhas naturais e simples para sustentar disposição no
                            dia a dia.</p>
                    </div>
                </article>

                <article
                    class="bg-white rounded-2xl overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.04)] transition-transform hover:-translate-y-2">
                    <img src="{{ asset('assets/images/exercicios.jpg') }}" class="w-full h-[240px] object-cover"
                        alt="Exercícios">
                    <div class="p-8">
                        <div class="w-12 h-12 bg-brand-800 text-white rounded-full flex items-center justify-center mb-6">
                            <!-- Ícone de Raio/Movimento (Heroicon) -->
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                            </svg>
                        </div>
                        <h3 class="text-brand-950 font-serif font-bold text-2xl mb-3">Exercícios</h3>
                        <p class="text-brand-muted text-[15px]">Movimento para fortalecer corpo, humor e disciplina com
                            leveza.</p>
                    </div>
                </article>

                <article
                    class="bg-white rounded-2xl overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.04)] transition-transform hover:-translate-y-2">
                    <img src="{{ asset('assets/images/produtos.jpg') }}" class="w-full h-[240px] object-cover"
                        alt="Produtos">
                    <div class="p-8">
                        <div class="w-12 h-12 bg-brand-800 text-white rounded-full flex items-center justify-center mb-6">
                            <!-- Ícone de Sacola (Heroicon) -->
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </div>
                        <h3 class="text-brand-950 font-serif font-bold text-2xl mb-3">Produtos</h3>
                        <p class="text-brand-muted text-[15px]">Itens práticos e confiáveis para apoiar objetivos
                            saudáveis.</p>
                    </div>
                </article>
            </div>
        </div>
    </section>
@endsection
