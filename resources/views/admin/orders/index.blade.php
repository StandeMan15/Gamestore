<x-layout>
    <div class="grid grid-cols-6 gap-4">
        <div class="col-span-1">
            <x-admin-sidebar />
        </div>

        <div class="col-span-5 mt-4">
            <a href="{{('createOrder')}}" class="bg-green-500 p-2 text-white rounded-xl">Create</a>
        </div>

        <div class="col-start-2 col-span-5 m-auto">

            <table>
                <th class="col-span-1">User</th>
                <th class="col-span-2">Order ID</th>
                <th class="col-span-2">Actions</th>
                @foreach ( $orders as $order )
                    @php $id = $order->order_id @endphp
                <tr>
                    @foreach ($users as $user)
                    @if ($user->id == $order->user_id)
                    <td>
                        {{$user->fname}} {{$user->lname}}
                    </td>
                    @endif
                    @endforeach
                    <td>
                        {{ $order->order_id }}
                    </td>

                    <td>
                        <a href="{{route('readOrder', $id)}}" class="bg-blue-400 text-white flex rounded-md px-1">Read</a>
                    </td>
                    <td>
                        <a href="{{route('editOrder', $id)}}" class="bg-yellow-400 text-white flex rounded-md px-1">Edit</a>
                    </td>
                    <td>

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