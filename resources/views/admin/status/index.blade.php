<x-layout>
    <div class="grid grid-cols-6 gap-4">
        <div class="col-span-1">
            <x-admin-sidebar />
        </div>
        <div class="col-span-6 col-start-2">
            <a href="{{route('createStatus')}}" class="bg-green-500 text-white rounded-md p-2">Create
            </a>
        </div>

        <div class="col-start-2 col-span-12 m-auto">
            <table>
                <th class="col-span-2">Status</th>
                <th class="col-span-2">Actions</th>
                @foreach ( $statuses as $status )
                <tr>
                    <td>
                        {{$status->title}}
                    </td>
                    <td>
                        <a href="{{route('editStatus', $status->id)}}" class="bg-yellow-400 text-white flex rounded-md px-1">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('destroyStatus', $status->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="bg-red-400 text-white flex rounded-md px-1">
                                Delete
                            </button>

                        </form>
                        <!-- <a href="" class="bg-red-400 text-white flex rounded-md px-1">Delete</a> -->
                    </td>
                </tr>

                @endforeach


            </table>
            <div class="top-1/2 right-2/5">
                {{ $statuses->links() }}
            </div>
        </div>
    </div>

</x-layout>