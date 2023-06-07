<x-admin-layout>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-1">
            <x-admin-sidebar />
        </div>
        <div class="col-start-3">
                <button class="mt-32 ">
                    <a href="{{route('createOrdersAdmin')}}" class="bg-green-500 text-white rounded-md p-2">{{ __('messages.admin.index.create') }}</a>
                </button>
        </div>
    

        <div class="col-span-6 col-start-4 m-auto">
            <table>
                <th class="col-span-2">{{ __('messages.user.title') }}</th>
                <th class="col-span-2">{{ __('messages.admin.order.num') }}</th>
                <th class="col-span-2">{{ __('messages.admin.status.title') }}</th>
                <th class="col-span-2">{{ __('messages.admin.index.actions') }}</th>
                @foreach ( $orders as $order )
                @php //dd($order)
                @endphp
                <tr>
                    <td>
                        {{$order->user->fname}}&nbsp;{{$order->user->lname}}
                    </td>
                    <td class="flex place-content-center">
                        {{$order->order_number}}
                    </td>
                    <td>
                        <form method="POST" action="{{route('updateOrdersAdmin', $order->order_number)}}">
                            @csrf

                            @foreach ($statuses as $status)
                            @if ($status->id == $order->status_id)
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
                            @endforeach

                            <div class="col-span-2">
                                @error('name')
                                <p class="text-red-500 text-xs mt-1">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('readOrdersAdmin', $order->order_number)}}" class="bg-blue-400 text-white flex rounded-md px-1">{{ __('messages.admin.index.read') }}</a>
                    </td>
                    <!-- <td>
                        <a href="{{route('editOrdersAdmin', $order->order_number)}}" class="bg-gray-400 text-white flex rounded-md px-1 pointer-events-none">{{ __('messages.admin.index.edit') }}</a>
                    </td> -->
                </tr>

                @endforeach


            </table>
            <div class="top-1/2 right-2/5">
                {{ $orders->links() }}
            </div>
        </div>
    </div>

</x-admin-layout>