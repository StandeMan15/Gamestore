<x-layout>
    <div class="grid grid-cols-12 gap-4">
        <table class="col-start-4 col-span-6">

            @foreach($category as $categories)
            <tr>
                <td>
                    {{ $categories->name }}
                </td>

                <td>
                    <a href="admin/categories/edit/{{$categories->id}}"
                        class="bg-yellow-400 text-white flex rounded-md px-1">
                        Edit
                    </a>
                </td>

                <td>
                    <form method="post" action="#">
                        @csrf

                            <input type="hidden" name="categoriesID" value="$categories->id" />

                        @if ($categories->is_active == 1)
                            <button class="bg-green-400 text-white flex rounded-md px-1" type="submit">
                                Actief
                            </button>
                        @else
                            <button class="bg-red-400 text-white flex rounded-md px-1" type="submit">
                                Inactief
                            </button>

                        @endif
                    </form>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
</x-layout>