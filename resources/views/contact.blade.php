@extends('layouts.app')

@section('title', 'Contato | Healthy Way DV')

@section('content')
    <!-- Seção de Contato (Preenche a altura da tela) -->
    <section class="bg-[#0f4d30] min-h-[calc(100vh-94px)] flex items-center py-16 lg:py-0">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-12 lg:gap-20 items-center max-w-7xl mx-auto">

                <!-- Coluna Esquerda: Textos e Botões de Contato -->
                <div class="lg:col-span-6 text-white">
                    <span
                        class="inline-flex items-center gap-2 text-white/80 font-bold text-xs uppercase tracking-[0.15em] mb-4">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 0 1 1.037-.443 48.282 48.282 0 0 0 5.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                        </svg>
                        CONTATO
                    </span>
                    <h1 class="font-serif text-5xl lg:text-[4.5rem] font-bold leading-[1.05] tracking-tight mb-6">
                        Vamos <br> conversar?
                    </h1>
                    <p class="text-white/80 text-[1.1rem] leading-relaxed max-w-md mb-10">
                        Envie uma mensagem e dê o primeiro passo para uma rotina mais leve, saudável e organizada.
                    </p>

                    <!-- Botões de Contato Laterais -->
                    <div class="flex flex-col gap-4 max-w-md">
                        <a href="https://wa.me/{{ config('site.phone', '5511941101227') }}" target="_blank" rel="noopener"
                            class="flex items-center gap-5 p-4 rounded-xl bg-white/10 border border-white/10 hover:bg-white/20 transition-all duration-300">
                            <div
                                class="w-12 h-12 bg-[#dff7d2] text-[#0f4d30] rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 fill-current" viewBox="0 0 16 16">
                                    <path
                                        d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                                </svg>
                            </div>
                            <div>
                                <strong class="block text-white font-bold text-[15px]">WhatsApp</strong>
                                <span
                                    class="text-white/80 text-sm">{{ config('site.phone_display', '(11) 94110-1227') }}</span>
                            </div>
                        </a>

                        <a href="mailto:{{ config('site.email', 'contato@healthywaydv.com.br') }}"
                            class="flex items-center gap-5 p-4 rounded-xl bg-white/10 border border-white/10 hover:bg-white/20 transition-all duration-300">
                            <div
                                class="w-12 h-12 bg-[#dff7d2] text-[#0f4d30] rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                            </div>
                            <div>
                                <strong class="block text-white font-bold text-[15px]">E-mail</strong>
                                <span
                                    class="text-white/80 text-sm">{{ config('site.email', 'contato@healthywaydv.com.br') }}</span>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Coluna Direita: Formulário -->
                <div class="lg:col-span-6">
                    <div class="bg-white rounded-[2rem] p-8 md:p-10 shadow-sm w-full max-w-[540px]" x-data="{
                        nome: '',
                        telefone: '',
                        assunto: 'Quero melhorar minha rotina',
                        mensagem: 'Olá! Quero saber mais sobre a Healthy Way DV.',
                    
                        // Função que aplica a máscara de telefone (DDD) 9XXXX-XXXX enquanto digita
                        maskTelefone(valor) {
                            if (!valor) return '';
                            valor = valor.replace(/\D/g, ''); // Remove tudo o que não for número
                            valor = valor.replace(/^(\d{2})(\d)/g, '($1) $2'); // Coloca parênteses no DDD
                            valor = valor.replace(/(\d{5})(\d)/, '$1-$2'); // Coloca hífen no número com 9 dígitos
                            return valor.substring(0, 15); // Limita o tamanho máximo do campo
                        },
                    
                        enviarWhats() {
                            if (!this.nome || !this.mensagem) {
                                alert('Por favor, preencha pelo menos o seu nome e a mensagem.');
                                return;
                            }
                    
                            // REGEX de validação: Verifica se o telefone tem o formato correto: (XX) XXXXX-XXXX ou (XX) XXXX-XXXX
                            const regexTelefone = /^\(\d{2}\)\s\d{4,5}-\d{4}$/;
                    
                            if (this.telefone && !regexTelefone.test(this.telefone)) {
                                alert('Por favor, insira um número de telefone válido com DDD. Exemplo: (11) 94110-1227');
                                return;
                            }
                    
                            const textoPreparado = `Olá! Meu nome é *${this.nome}*.\n` +
                                `*Telefone:* ${this.telefone || 'Não informado'}\n` +
                                `*Assunto:* ${this.assunto}\n\n` +
                                `*Mensagem:* ${this.mensagem}`;
                    
                            const numeroWhats = '5511941101227';
                            const url = `https://wa.me/${numeroWhats}?text=${encodeURIComponent(textoPreparado)}`;
                            window.open(url, '_blank');
                        }
                    }">

                        <h2 class="font-serif text-3xl font-bold text-brand-950 mb-2">Envie sua mensagem</h2>
                        <p class="text-sm text-brand-muted mb-8">O formulário abre uma conversa no WhatsApp com a mensagem
                            pronta.</p>

                        <div class="flex flex-col space-y-4">

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <input type="text" x-model="nome" placeholder="Seu nome"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-[15px] focus:outline-none focus:border-brand-600 focus:ring-1 focus:ring-brand-600/20">

                                <input type="text" x-model="telefone"
                                    @input="telefone = maskTelefone($event.target.value)" placeholder="Seu telefone"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-[15px] focus:outline-none focus:border-brand-600 focus:ring-1 focus:ring-brand-600/20">
                            </div>

                            <div class="relative">
                                <select x-model="assunto"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-[15px] bg-white focus:outline-none focus:border-brand-600 focus:ring-1 focus:ring-brand-600/20 appearance-none cursor-pointer">
                                    <option value="Quero melhorar minha rotina">Quero melhorar minha rotina</option>
                                    <option value="Dúvida sobre produtos">Dúvida sobre produtos</option>
                                    <option value="Outros assuntos">Outros assuntos</option>
                                </select>
                            </div>

                            <textarea x-model="mensagem" rows="4"
                                class="w-full border border-gray-100 rounded-xl px-4 py-3 text-[15px] bg-gray-50/50 focus:outline-none focus:border-brand-600 focus:ring-1 focus:ring-brand-600/20 resize-none"></textarea>

                            <button @click="enviarWhats()"
                                class="w-full bg-[#167a53] hover:bg-brand-950 text-white font-bold py-4 px-6 rounded-full transition-colors flex items-center justify-center gap-2 text-[15px] mt-2 shadow-sm">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 16 16">
                                    <path
                                        d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                                </svg>
                                Enviar pelo WhatsApp
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
