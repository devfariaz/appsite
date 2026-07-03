@extends('layouts.app')

@section('title', 'Quem Somos | Healthy Way DV')

@section('content')
    <!-- Hero Section Quem Somos -->
    <section class="bg-[#185e3c] pt-20 pb-24 lg:pt-32 lg:pb-32 overflow-hidden">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-8 items-center">
                <!-- Coluna de Texto -->
                <div>
                    <span class="inline-flex items-center gap-2 text-white/90 font-bold text-xs uppercase tracking-[0.15em] mb-4">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z" clip-rule="evenodd" /><path d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.56.196-1.15.34-1.764.441Z" /></svg>
                        QUEM SOMOS
                    </span>
                    <h1 class="font-serif text-5xl lg:text-[4.5rem] font-bold leading-[1.05] text-white tracking-tight mb-6">
                        Transformação <br> com leveza e <br> direção.
                    </h1>
                    <p class="text-lg text-white/90 leading-relaxed max-w-[500px]">
                        A Healthy Way DV nasceu para inspirar pessoas a cuidarem melhor da saúde com escolhas simples, acompanhamento humano e constância.
                    </p>
                </div>
                
                <!-- Coluna da Logo (Card Branco) -->
                <div class="flex justify-center lg:justify-end">
                    <div class="bg-white rounded-3xl shadow-[0_20px_60px_rgba(0,0,0,0.15)] p-12 w-full max-w-[540px] aspect-[4/3] flex items-center justify-center">
                        <img src="{{ asset('assets/logo-oficial.png') }}" alt="Healthy Way DV" class="w-full max-w-[280px] object-contain">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Antes e Depois -->
    <section class="py-24 bg-[#f2faef]">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-flex items-center gap-2 text-brand-600 font-bold text-xs uppercase tracking-[0.1em] mb-4">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" /></svg>
                    ANTES E DEPOIS
                </span>
                <h2 class="font-serif text-4xl lg:text-[3.5rem] font-bold text-brand-950 leading-tight">
                    Pequenas mudanças, <br> grande diferença.
                </h2>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- Card Antes -->
                <article class="bg-white rounded-[2rem] overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.04)]">
                    <!-- ATENÇÃO: Verifique se o nome da imagem está correto na sua pasta public/assets/images/ -->
                    <img src="{{ asset('assets/images/antes.jpg') }}" class="w-full h-[340px] object-cover" alt="Antes da mudança de rotina">
                    <div class="p-10">
                        <span class="inline-block bg-[#ffc107] text-[#5c4400] text-xs font-bold px-3.5 py-1.5 rounded mb-5">Antes</span>
                        <h3 class="font-serif text-3xl font-bold text-brand-950 mb-5">Rotina sem direção</h3>
                        <ul class="text-brand-muted text-[15px] space-y-2 list-disc list-inside marker:text-brand-muted/40">
                            <li>Alimentação sem planejamento</li>
                            <li>Pouca energia no dia a dia</li>
                            <li>Exercícios sempre adiados</li>
                        </ul>
                    </div>
                </article>

                <!-- Card Depois -->
                <article class="bg-white rounded-[2rem] overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.04)]">
                    <!-- ATENÇÃO: Verifique se o nome da imagem está correto na sua pasta public/assets/images/ -->
                    <img src="{{ asset('assets/images/depois.jpg') }}" class="w-full h-[340px] object-cover" alt="Depois da mudança de rotina">
                    <div class="p-10">
                        <span class="inline-block bg-[#198754] text-white text-xs font-bold px-3.5 py-1.5 rounded mb-5">Depois</span>
                        <h3 class="font-serif text-3xl font-bold text-brand-950 mb-5">Rotina com constância</h3>
                        <ul class="text-brand-muted text-[15px] space-y-2 list-disc list-inside marker:text-brand-muted/40">
                            <li>Escolhas mais equilibradas</li>
                            <li>Mais disposição e autoestima</li>
                            <li>Cuidado com frequência</li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Seção Missão, Visão e Valores -->
    <section class="py-24 bg-white relative -mb-1">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Missão -->
                <article class="bg-white p-10 rounded-[2rem] shadow-[0_15px_50px_rgba(0,0,0,0.06)] border border-gray-50 transition-transform hover:-translate-y-2">
                    <div class="w-14 h-14 bg-[#185e3c] text-white rounded-full flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 3.75H6A2.25 2.25 0 0 0 3.75 6v1.5m13.5-3.75H18A2.25 2.25 0 0 1 20.25 6v1.5m-16.5 13.5H6A2.25 2.25 0 0 0 3.75 18v-1.5m13.5 3.75H18A2.25 2.25 0 0 0 20.25 18v-1.5M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" /></svg>
                    </div>
                    <h2 class="font-serif text-2xl font-bold text-brand-950 mb-3">Missão</h2>
                    <p class="text-brand-muted text-[15px] leading-relaxed">Incentivar uma rotina mais saudável, prática e sustentável.</p>
                </article>

                <!-- Visão -->
                <article class="bg-white p-10 rounded-[2rem] shadow-[0_15px_50px_rgba(0,0,0,0.06)] border border-gray-50 transition-transform hover:-translate-y-2">
                    <div class="w-14 h-14 bg-[#185e3c] text-white rounded-full flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>
                    </div>
                    <h2 class="font-serif text-2xl font-bold text-brand-950 mb-3">Visão</h2>
                    <p class="text-brand-muted text-[15px] leading-relaxed">Ser referência em cuidado, orientação e qualidade de vida.</p>
                </article>

                <!-- Valores -->
                <article class="bg-white p-10 rounded-[2rem] shadow-[0_15px_50px_rgba(0,0,0,0.06)] border border-gray-50 transition-transform hover:-translate-y-2">
                    <div class="w-14 h-14 bg-[#185e3c] text-white rounded-full flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" /></svg>
                    </div>
                    <h2 class="font-serif text-2xl font-bold text-brand-950 mb-3">Valores</h2>
                    <p class="text-brand-muted text-[15px] leading-relaxed">Leveza, proximidade, responsabilidade, consistência e respeito.</p>
                </article>
            </div>
        </div>
    </section>
@endsection