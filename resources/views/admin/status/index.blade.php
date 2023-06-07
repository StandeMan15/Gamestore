<x-admin-layout>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-1">
            <x-admin-sidebar />
        </div>
        <div class="col-start-3">
                <button class="mt-32 ">
                    <a href="{{route('createStatus')}}" class="bg-green-500 text-white rounded-md p-2">{{ __('messages.admin.index.create') }}</a>
                </button>
        </div>
    

        <div class="col-span-6 col-start-4 m-auto">
            <table>
                <th class="col-span-2">{{ __('messages.admin.status.title') }}</th>
                <th class="col-span-2">{{ __('messages.admin.index.actions') }}</th>
                @foreach ( $statuses as $status )
                <tr>
                    <td>
                        {{$status->title}}
                    </td>
                    <td>
                        <a href="{{route('editStatus', $status->id)}}" class="bg-yellow-400 text-white flex rounded-md px-1">{{ __('messages.admin.index.edit') }}</a>
                    </td>
                    <td>
                        <form action="{{route('destroyStatus', $status->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="bg-red-400 text-white flex rounded-md px-1">
                                {{ __('messages.admin.index.delete') }}
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

</x-admin-layout>