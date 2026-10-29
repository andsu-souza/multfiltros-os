<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="nome" class="block text-sm font-medium text-gray-700">Nome Completo</label>
                            <input type="text" name="nome" id="nome" value="{{ $cliente->nome }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#006A5C] focus:ring-[#006A5C] sm:text-sm px-4 py-2 border transition">
                        </div>

                        <div>
                            <label for="telefone" class="block text-sm font-medium text-gray-700">Telefone / WhatsApp</label>
                            <input type="text" name="telefone" id="telefone" value="{{ $cliente->telefone }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#006A5C] focus:ring-[#006A5C] sm:text-sm px-4 py-2 border transition">
                        </div>

                        <div>
                            <label for="endereco" class="block text-sm font-medium text-gray-700">Endereço Completo</label>
                            <input type="text" name="endereco" id="endereco" value="{{ $cliente->endereco }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#006A5C] focus:ring-[#006A5C] sm:text-sm px-4 py-2 border transition">
                        </div>

                        <div class="pt-4 flex items-center justify-between border-t border-gray-100 mt-8">
                            <!-- Botão Excluir (aciona o form abaixo) -->
                            <button type="button" onclick="if(confirm('Tem certeza que deseja excluir este cliente?')) document.getElementById('form-delete').submit();"
                                class="text-sm text-red-600 hover:text-red-800 font-medium transition">
                                Excluir Cliente
                            </button>

                            <div class="flex space-x-3">
                                <a href="{{ route('clientes.index') }}"
                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition">
                                    Cancelar
                                </a>
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-[#006A5C] border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#005247] transition">
                                    Atualizar Cadastro
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Formulário oculto para a exclusão segura -->
                    <form id="form-delete" action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>