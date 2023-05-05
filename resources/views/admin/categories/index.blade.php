<x-layout>
    <div class="grid grid-cols-6 gap-4">
        <div class="col-span-1">
            <x-admin-sidebar />
        </div>

        <div class="col-span-6 col-start-2">
            <a href="{{route('createCategory')}}" class="bg-green-500 text-white rounded-md p-2">{{ __('messages.admin.index.create') }}
            </a>
        </div>

        <div class="col-start-2 col-span-5 m-auto">
            <table>
                <th class="col-span-2">Categorie</th>
                <th class="col-span-3">{{ __('messages.admin.index.actions') }}</th>
                @foreach ( $category as $categorie )
                <tr>
                    <td>
                        {{ $categorie->name }}
                    </td>

                    <td>
                        <a href="{{route('readCategory', $categorie->id)}}" class="bg-blue-400 text-white flex rounded-md px-1">{{ __('messages.admin.index.read') }}</a>
                    </td>
                    <td>
                        <a href="{{route('editCategory', $categorie->id)}}" class="bg-yellow-400 text-white flex rounded-md px-1">{{ __('messages.admin.index.edit') }}</a>
                    </td>
                    <td>
                        <form method="post" action="#">
                            @csrf

                            @if ($categorie->active == 1)
                            <a href="{{route('statusCategory', $categorie->id)}}" class="bg-green-400 text-white flex rounded-md px-3" type="submit">
                                {{ __('messages.admin.index.active') }}
                            </a>
                            @else
                            <a href="{{route('statusCategory', $categorie->id)}}" class="bg-red-400 text-white flex rounded-md px-2" type="submit">
                                {{ __('messages.admin.index.inactive') }}
                            </a>
                            @endif
                        </form>
                    </td>

                </tr>
                @endforeach
            </table>
            <div class="top-1/2 right-2/5">
                {{ $category->links() }}
            </div>
        </div>
    </div>

</x-layout>