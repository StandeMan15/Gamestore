<x-layout>
    <div class="grid grid-cols-6 gap-4">
        <div class="col-span-1">
            <x-admin-sidebar />
        </div>
        <div class="col-span-6 col-start-2">
            <a href="{{route('createOrdersAdmin')}}" class="bg-green-500 text-white rounded-md p-2">Create
            </a>
        </div>

        <div class="col-start-2 col-span-12 m-auto">
            <table>
                <th class="col-span-2">User ID</th>
                <th class="col-span-2">Order nummer</th>
                <th class="col-span-2">Actions</th>
                @foreach ( $orders as $order )
                <tr>
                    <td>
                        {{$order->user->fname}}&nbsp;{{$order->user->lname}}
                    </td>
                    <td>
                        {{$order->order_number}}
                    </td>
                </tr>

                @endforeach


            </table>
            <div class="top-1/2 right-2/5">
                {{ $orders->links() }}
            </div>
        </div>
    </div>

</x-layout>