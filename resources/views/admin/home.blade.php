<x-layout>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-1">
            <x-admin-sidebar />
        </div>

        <div class="col-span-12 col-start-3">
            <a href="{{route('createProduct')}}" class="bg-green-500 text-white rounded-md p-2">Create
            </a>
        </div>

        <div class="col-span-2 col-start-3 pt-8">
            <ul class="space-y-2">
                <li>
                    <a href="{{route('filterActive')}}" class="bg-green-400 rounded-xl p-1 m-5 text-white">
                        Actieve producten
                    </a>
                </li>
                <li>
                    <a href="{{route('filterInactive')}}" class="bg-red-400 rounded-xl p-1 m-5 text-white">
                        Inactie producten
                    </a>
                </li>
                <li>
                    <a href="/admin" class="bg-yellow-400 rounded-xl p-1 m-5 text-white">
                        Alle producten
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-span-6 m-auto">
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
                        <a href="{{route('readProduct', $product->id)}}" class="bg-blue-400 text-white flex rounded-md px-1">Read</a>
                    </td>
                    <td>
                        <a href="{{route('editProduct', $product->id)}}" class="bg-yellow-400 text-white flex rounded-md px-1">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="#">
                            @csrf

                            @if ($product->is_active == 1)
                            <a href="{{route('statusProduct', $product->id)}}" class="bg-green-400 text-white flex rounded-md px-3" type="submit">
                                Actief
                            </a>
                            @else
                            <a href="{{route('statusProduct', $product->id)}}" class="bg-red-400 text-white flex rounded-md px-2" type="submit">
                                Inactief
                            </a>
                            @endif
                        </form>
                    </td>

                </tr>
                @endforeach
            </table>
            <div class="top-1/2 right-2/5">
                {{ $products->links() }}
            </div>
        </div>
    </div>

</x-layout>