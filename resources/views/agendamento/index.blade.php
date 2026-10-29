<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Agenda de Serviços') }}
            </h2>
            <a href="{{ route('agendamentos.create') }}" class="inline-flex items-center px-4 py-2 bg-[#006A5C] border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#005247] transition">
                Novo Agendamento
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Data / Hora</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Cliente</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Técnico</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($agendamentos as $agendamento)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ date('d/m/Y', strtotime($agendamento->data)) }}</div>
                                    <div class="text-xs text-gray-500">{{ $agendamento->faixa_horario }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $agendamento->cliente->nome ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $agendamento->tecnico->nome ?? 'Não atribuído' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $agendamento->status == 'CONFIRMADO' ? 'bg-green-100 text-green-800' : '' }}
                                            {{ $agendamento->status == 'AGENDADO' ? 'bg-blue-100 text-blue-800' : '' }}
                                            {{ $agendamento->status == 'CONCLUIDO' ? 'bg-gray-100 text-gray-800' : '' }}
                                            {{ $agendamento->status == 'CANCELADO' ? 'bg-red-100 text-red-800' : '' }}">
                                        {{ $agendamento->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('agendamentos.edit', $agendamento->id) }}" class="text-[#006A5C] hover:text-[#005247] bg-teal-50 px-3 py-1 rounded-md transition">Editar</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500">Nenhum agendamento encontrado.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($agendamentos->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                    {{ $agendamentos->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>