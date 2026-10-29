<x-app-layout>
    <!-- Removemos o header padrão para o ecrã ficar totalmente limpo e branco -->

    <div class="py-16 flex flex-col items-center min-h-screen">

        <!-- Mensagem de Boas-vindas Centralizada -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-serif text-gray-900 mb-2">Bem-vindo, {{ Auth::user()->name }}!</h1>
            <p class="text-gray-500 text-sm">Escolha uma área para explorar no sistema Mult Filtros.</p>
        </div>

        <!-- Grelha de Cartões -->
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- Cartão 1: Clientes -->
                <div class="bg-white rounded-2xl shadow-[0_2px_15px_rgba(0,0,0,0.06)] border border-gray-100 p-6 flex flex-col items-center text-center transition duration-300 hover:shadow-[0_8px_25px_rgba(0,0,0,0.12)] hover:-translate-y-1">
                    <div class="w-20 h-20 bg-teal-50 rounded-full flex items-center justify-center mb-4 text-teal-700">
                        <!-- Ícone de Utilizador -->
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-1">Clientes</h3>
                    <p class="text-sm text-gray-500 mb-6 flex-grow">Explore o registo e gestão da base de clientes da empresa.</p>

                    <a href="{{ route('clientes.index') }}" class="w-full bg-[#006A5C] hover:bg-[#005247] text-white font-semibold py-3 rounded text-sm transition-colors">
                        Acessar
                    </a>
                </div>

                <!-- Cartão 2: Ordens de Serviço (Estrutura pronta para quando criar a rota) -->
                <div class="bg-white rounded-2xl shadow-[0_2px_15px_rgba(0,0,0,0.06)] border border-gray-100 p-6 flex flex-col items-center text-center transition duration-300 hover:shadow-[0_8px_25px_rgba(0,0,0,0.12)] hover:-translate-y-1">
                    <div class="w-20 h-20 bg-amber-50 rounded-full flex items-center justify-center mb-4 text-amber-600">
                        <!-- Ícone de Prancheta -->
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-1">Serviços</h3>
                    <p class="text-sm text-gray-500 mb-6 flex-grow">Controlo de manutenções e instalações de purificadores.</p>

                    <a href="#" class="w-full bg-[#32A89C] hover:bg-[#258B80] text-white font-semibold py-3 rounded text-sm transition-colors">
                        Acessar
                    </a>
                </div>

                <!-- Cartão 3: Agendamentos / Técnicos -->
                <div class="bg-white rounded-2xl shadow-[0_2px_15px_rgba(0,0,0,0.06)] border border-gray-100 p-6 flex flex-col items-center text-center transition duration-300 hover:shadow-[0_8px_25px_rgba(0,0,0,0.12)] hover:-translate-y-1">
                    <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mb-4 text-blue-600">
                        <!-- Ícone de Calendário -->
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mb-1">Agenda</h3>
                    <p class="text-sm text-gray-500 mb-6 flex-grow">Gestão de técnicos e planeamento de rotas e horários.</p>

                    <a href="{{ route('tecnicos.index') }}" class="w-full bg-[#32A89C] hover:bg-[#258B80] text-white font-semibold py-3 rounded text-sm transition-colors">
                        Acessar
                    </a>
                </div>

            </div>
        </div>

        <!-- Botão de Sair Minimalista no Fundo -->
        <div class="mt-16">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-8 py-2 border border-gray-300 rounded text-gray-600 text-sm hover:bg-gray-50 transition-colors">
                    Sair
                </button>
            </form>
            <p class="text-xs text-gray-400 mt-4 text-center">Mult Filtros — Sistema de Ordens de Serviço</p>
        </div>

    </div>
</x-app-layout>