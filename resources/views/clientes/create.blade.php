<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('clientes.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome Completo</label>
                            <input type="text" name="nome" id="nome" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border transition">
                        </div>

                        <div>
                            <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone / WhatsApp</label>
                            <input type="text" name="telefone" id="telefone"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border transition">
                        </div>

                        <div>
                            <label for="endereco" class="block text-sm font-medium text-gray-700">Endereço Completo</label>
                            <input type="text" name="endereco" id="endereco"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-4 py-2 border transition">
                        </div>

                        <div class="pt-4 flex items-center justify-end border-t border-gray-100 space-x-3 mt-8">
                            <a href="{{ route('clientes.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition">
                                Cancelar
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-900 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
                                Salvar Cadastro
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>