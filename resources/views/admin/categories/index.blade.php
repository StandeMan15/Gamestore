<x-layout>
    <div class="grid grid-cols-12 gap-4">
        <table class="col-start-4 col-span-6">

            @foreach($category as $categories)
            <tr>
                <td>
                    {{ $categories->name }}
                </td>

                <td>
                    <a href="{{route('editCategory', $categories->id)}}"
                        class="bg-yellow-400 text-white flex rounded-md px-1">
                        Edit
                    </a>
                </td>

                <td>
                    <form method="post" action="#">
                        @csrf

                        @if ($categories->is_active == 1)
                            <a href="{{route('statusCategory', $categories->id)}}" class="bg-green-400 text-white flex rounded-md px-1" type="submit">
                                Actief
                            </a>
                        @else
                            <a href="{{route('statusCategory', $categories->id)}}" class="bg-red-400 text-white flex rounded-md px-1" type="submit">
                                Inactief
                            </a>
                        @endif
                    </form>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
</x-layout>