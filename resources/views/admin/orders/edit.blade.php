<x-layout>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="text-xs uppercase bg-gray-600">
                <tr class="text-white">
                    <th scope="col" class="px-6 py-3">
                        Producten
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prijs
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aantal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                @foreach ($orderdetails as $details)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$details->name}}</th>
                    <td class="px-6 py-4">€{{$details->price}}</td>
                    <td class="px-6 py-4">{{$details->quantity}}</td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <span class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-white bg-red-500 rounded-md">
                                <i class="fas fa-trash text-white"></i>
                            </span>
                        </a>
                    </td>
                </tr>
                @endforeach
                <tr class="bg-white border-b">
                    <form method="POST" action="{{route('updateOrdersAdmin', $order_number)}}">
                        @csrf
                            <td class="px-6 py-4">
                                @if (isset($statuses))
                                <select class="p-2 border border-gray-200" type="text" name="status_id" id="status_id" onchange="this.form.submit()">
                                    @foreach ($statuses as $status)
                                    @if ($status->id == $order->status->id)
                                    <option id="{{$status->id}}" value="{{$status->id}}" name="{{$status->id}}" selected>{{$status->title}}</option>
                                    @elseif ($status->id != $order->status->id)
                                    <option id="{{$status->id}}" value="{{$status->id}}" name="{{$status->id}}">{{$status->title}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @endif
                            </td>

                        <div class="col-span-2">
                            @error('name')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </form>
                </tr>
        </table>
    </div>

    <!--
            Producten laten zien in een tabel, met een net overzicht van de producten
            Alleen de status hoeft te bewerken zijn
            -->
</x-layout>