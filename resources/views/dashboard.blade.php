<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mt-5">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="tabelaPedidos">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <th>Pedido</th>
                                <th>Cliente</th>
                                <th>Produtos</th>
                                <th>Data</th>
                                <th width="100px">Ações</th>
                            </thead>
                            <tbody>
                                @if (isset($orders))
                                    @foreach ($orders as $order)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->client->name }}</td>
                                            <td class="flex flex-col">
                                                @foreach ($order->products()->get() as $product)
                                                    <span>{{ $product->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>
                                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                            
                                                    <a href="{{ route('orders.show', $order->id) }}" title="editar" class="mr-2">
                                                        <i class="fas fa-edit text-blue-500"></i>
                                                    </a>
                            
                                                    @csrf
                                                    @method('DELETE')
                            
                                                    <button type="submit" title="deletar" class="mr-2" onclick="return confirm('Deseja deletar esse item?')" style="border: none; background-color:transparent;">
                                                        <i class="fas fa-trash text-red-700"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>