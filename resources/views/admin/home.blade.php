<x-layout>
    <div class="grid grid-cols-6 gap-4">
        <div class="col-span-1">
            <x-admin-sidebar />
        </div>

        <div class="col-span-6 col-start-2">
                <a href="{{route('createProduct')}}" class="bg-green-500 text-white rounded-md p-2">Create
                </a>
        </div>

        <div class="col-start-2 col-span-4 m-auto">
            <table>
                <th>Title</th>
                <th>Price</th>
                <th>Min. age</th>
                <th class="col-span-3">Actions</th>
                @foreach ( $products as $product )
                <tr>
                    <td>
                        {{ $product->title }}
                    </td>
                    <td>
                        {{ $product->price }}
                    </td>
                    <td>
                        {{ $product->minimum_age }}
                    </td>

                    <td>
                        <a href="{{route('readProduct', $product->id)}}"
                            class="bg-blue-400 text-white flex rounded-md px-1">Read</a>
                    </td>
                    <td>
                        <a href="{{route('editProduct', $product->id)}}"
                            class="bg-yellow-400 text-white flex rounded-md px-1">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="#">
                            @csrf

                            @if ($product->is_active == 1)
                            <a href="{{route('statusProduct', $product->id)}}"
                                class="bg-green-400 text-white flex rounded-md px-3" type="submit">
                                Actief
                            </a>
                            @else
                            <a href="{{route('statusProduct', $product->id)}}"
                                class="bg-red-400 text-white flex rounded-md px-2" type="submit">
                                Inactief
                            </a>
                            @endif
                        </form>
                    </td>

                </tr>
                @endforeach
            </table>
            <div class="fixed top-1/2 right-2/5">
                {{ $products->links() }}
            </div>
        </div>
    </div>

</x-layout>