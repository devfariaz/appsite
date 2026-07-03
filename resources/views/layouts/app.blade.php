<!doctype html>
<html lang="pt-BR" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('site.name', 'Healthy Way DV'))</title>
    <meta name="description" content="@yield('description', 'Qualidade de vida, saúde e bem-estar com a Healthy Way DV.')">

    <!-- CSS do Vite (Tailwind) -->
    @vite(['resources/css/site.css', 'resources/js/app.js'])
</head>

<body class="text-brand-text bg-white font-sans antialiased flex flex-col min-h-screen">

    <header x-data="{ mobileMenuOpen: false }">
        <nav
            class="fixed top-0 w-full bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm z-50 min-h-[94px] flex flex-col justify-center">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 w-full flex justify-between items-center relative">

                <a href="{{ route('home') }}" aria-label="Healthy Way DV">
                    <img class="w-[180px] lg:w-[220px] object-contain" src="{{ asset('assets/logo-oficial.png') }}"
                        alt="Healthy Way DV">
                </a>

                <button @click="mobileMenuOpen = !mobileMenuOpen"
                    class="lg:hidden text-brand-950 focus:outline-none z-50">
                    <svg x-show="!mobileMenuOpen" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg x-show="mobileMenuOpen" style="display: none;" class="w-8 h-8" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <ul class="hidden lg:flex items-center gap-8 absolute left-1/2 -translate-x-1/2">
                    <li>
                        <a href="{{ route('home') }}"
                            class="relative font-bold text-[15px] pb-1 transition-colors {{ request()->routeIs('home') ? 'text-brand-950 after:content-[\'\'] after:absolute after:left-0 after:right-0 after:-bottom-1 after:h-[2px] after:bg-brand-600' : 'text-brand-800 hover:text-brand-950' }}">Início</a>
                    </li>
                    <li>
                        <a href="{{ route('products') }}"
                            class="relative font-bold text-[15px] pb-1 transition-colors {{ request()->routeIs('products') ? 'text-brand-950 after:content-[\'\'] after:absolute after:left-0 after:right-0 after:-bottom-1 after:h-[2px] after:bg-brand-600' : 'text-brand-800 hover:text-brand-950' }}">Produtos</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"
                            class="relative font-bold text-[15px] pb-1 transition-colors {{ request()->routeIs('about') ? 'text-brand-950 after:content-[\'\'] after:absolute after:left-0 after:right-0 after:-bottom-1 after:h-[2px] after:bg-brand-600' : 'text-brand-800 hover:text-brand-950' }}">Quem
                            Somos</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}"
                            class="relative font-bold text-[15px] pb-1 transition-colors {{ request()->routeIs('contact') ? 'text-brand-950 after:content-[\'\'] after:absolute after:left-0 after:right-0 after:-bottom-1 after:h-[2px] after:bg-brand-600' : 'text-brand-800 hover:text-brand-950' }}">Contato</a>
                    </li>
                </ul>

                <div class="hidden lg:block">
                    <a href="{{ route('contact') }}"
                        class="bg-brand-800 hover:bg-brand-900 text-white font-bold py-2.5 px-6 rounded-full transition-colors flex items-center gap-2 text-[15px]">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 16 16">
                            <path
                                d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                        </svg>
                        Fale conosco
                    </a>
                </div>
            </div>

            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4"
                @click.away="mobileMenuOpen = false" style="display: none;"
                class="lg:hidden absolute top-full left-0 w-full bg-white border-t border-gray-100 px-6 py-6 shadow-xl z-50">

                <ul class="flex flex-col gap-5">
                    <li>
                        <a href="{{ route('home') }}"
                            class="block font-bold text-base {{ request()->routeIs('home') ? 'text-brand-600' : 'text-brand-800' }}">Início</a>
                    </li>
                    <li>
                        <a href="{{ route('products') }}"
                            class="block font-bold text-base {{ request()->routeIs('products') ? 'text-brand-600' : 'text-brand-800' }}">Produtos</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"
                            class="block font-bold text-base {{ request()->routeIs('about') ? 'text-brand-600' : 'text-brand-800' }}">Quem
                            Somos</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}"
                            class="block font-bold text-base {{ request()->routeIs('contact') ? 'text-brand-600' : 'text-brand-800' }}">Contato</a>
                    </li>
                </ul>

                <div class="mt-6 pt-6 border-t border-gray-100">
                    <a href="{{ route('contact') }}"
                        class="w-full bg-brand-800 hover:bg-brand-900 text-white font-bold py-3 px-6 rounded-full transition-colors flex items-center justify-center gap-2 text-base">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 16 16">
                            <path
                                d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                        </svg>
                        Fale conosco
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow pt-[94px]">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-brand-950 text-white pt-16 pb-8 mt-auto">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 lg:gap-8">
                <div class="md:col-span-12 lg:col-span-5 pr-0 lg:pr-12">
                    <img class="w-[180px] brightness-0 invert opacity-90" src="{{ asset('assets/logo-oficial.png') }}"
                        alt="Healthy Way DV">
                    <p class="mt-6 text-white/80 text-[15px] leading-relaxed">Qualidade de vida, saúde e escolhas
                        conscientes para uma rotina mais leve, natural e possível.</p>
                </div>
                <div class="md:col-span-6 lg:col-span-3">
                    <h2 class="font-serif font-bold text-xl mb-6">Mapa do site</h2>
                    <ul class="flex flex-col gap-3 text-white/80 text-[15px]">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Início</a></li>
                        <li><a href="{{ route('products') }}" class="hover:text-white transition-colors">Produtos</a>
                        </li>
                        <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">Quem Somos</a>
                        </li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contato</a>
                        </li>
                    </ul>
                </div>
                <div class="md:col-span-6 lg:col-span-4">
                    <h2 class="font-serif font-bold text-xl mb-6">Contato</h2>
                    <ul class="flex flex-col gap-4 text-white/80 text-[15px]">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                            </svg>
                            {{ config('site.phone_display', '(11) 94110-1227') }}
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            {{ config('site.email', 'contato@healthywaydv.com.br') }}
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                            Atendimento online
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-16 pt-8 border-t border-white/10 text-center text-white/60 text-sm">
                &copy; {{ date('Y') }} Healthy Way DV. Todos os direitos reservados.
            </div>
        </div>
    </footer>

    <!-- Botão Flutuante do WhatsApp -->
    <a href="https://wa.me/{{ config('site.phone', '5511941101227') }}" target="_blank" rel="noopener"
        class="fixed right-6 bottom-6 z-50 grid place-items-center w-[60px] h-[60px] rounded-full text-white bg-[#00a884] shadow-lg text-3xl hover:scale-105 transition-transform duration-300">
        <span class="absolute -inset-1 rounded-full bg-[#00a884]/30 animate-ping"></span>
        <svg class="w-8 h-8 fill-current relative z-10" viewBox="0 0 16 16">
            <path
                d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
        </svg>
    </a>
</body>

</html>
