<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Agendamento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('agendamentos.store') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Cliente -->
                            <div>
                                <label for="cliente_id" class="block text-sm font-medium text-gray-700">Cliente *</label>
                                <select name="cliente_id" id="cliente_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#006A5C] focus:ring-[#006A5C] sm:text-sm px-4 py-2 border transition bg-white">
                                    <option value="">Selecione um cliente...</option>
                                    @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Técnico -->
                            <div>
                                <label for="tecnico_id" class="block text-sm font-medium text-gray-700">Técnico Responsável</label>
                                <select name="tecnico_id" id="tecnico_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#006A5C] focus:ring-[#006A5C] sm:text-sm px-4 py-2 border transition bg-white">
                                    <option value="">A definir depois...</option>
                                    @foreach($tecnicos as $tecnico)
                                    <option value="{{ $tecnico->id }}">{{ $tecnico->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Data -->
                            <div>
                                <label for="data" class="block text-sm font-medium text-gray-700">Data do Serviço *</label>
                                <input type="date" name="data" id="data" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#006A5C] focus:ring-[#006A5C] sm:text-sm px-4 py-2 border transition">
                            </div>

                            <!-- Faixa Horária -->
                            <div>
                                <label for="faixa_horario" class="block text-sm font-medium text-gray-700">Faixa de Horário *</label>
                                <select name="faixa_horario" id="faixa_horario" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#006A5C] focus:ring-[#006A5C] sm:text-sm px-4 py-2 border transition bg-white">
                                    <option value="">Selecione um horário...</option>
                                    <option value="08:00 - 10:00">08:00 - 10:00 (Manhã)</option>
                                    <option value="10:00 - 12:00">10:00 - 12:00 (Manhã)</option>
                                    <option value="13:30 - 15:30">13:30 - 15:30 (Tarde)</option>
                                    <option value="15:30 - 18:00">15:30 - 18:00 (Tarde)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#006A5C] focus:ring-[#006A5C] sm:text-sm px-4 py-2 border transition bg-white">
                                <option value="AGENDADO">Agendado (Aguardando confirmação)</option>
                                <option value="CONFIRMADO">Confirmado</option>
                            </select>
                        </div>

                        <!-- Observações -->
                        <div>
                            <label for="observacoes" class="block text-sm font-medium text-gray-700">Observações (Opcional)</label>
                            <textarea name="observacoes" id="observacoes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#006A5C] focus:ring-[#006A5C] sm:text-sm px-4 py-2 border transition" placeholder="Ex: Cliente pediu para ligar antes de ir..."></textarea>
                        </div>

                        <div class="pt-4 flex items-center justify-end border-t border-gray-100 mt-8 space-x-3">
                            <a href="{{ route('agendamentos.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 transition">Cancelar</a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-[#006A5C] border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#005247] transition">Confirmar Agendamento</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>