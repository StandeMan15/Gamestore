<x-layout>
    <div class="grid grid-cols-6 gap-4">
        <div class="col-span-1">
            <x-admin-sidebar />
        </div>

        <div class="col-span-6 col-start-2">
                <a href="{{route('createUser')}}" class="bg-green-500 text-white rounded-md p-2">Create
                </a>
        </div>

        <div class="col-start-2 col-span-4 m-auto">
            <table>
                <th>Gebruikersnaam</th>
                <th>email</th>
                <th class="col-span-2">Actions</th>
                @foreach ( $users as $user )
                <tr>
                    <td>
                        {{ $user->username }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>

                    <td>
                        <a href="{{route('readUser', $user->id)}}"
                            class="bg-blue-400 text-white flex rounded-md px-1">Read</a>
                    </td>
                    <td>
                        <a href="{{route('editUser', $user->id)}}"
                            class="bg-yellow-400 text-white flex rounded-md px-1">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="#">
                            @csrf

                            @if ($user->is_admin == 1)
                            <a href="{{route('statusUser', $user->id)}}"
                                class="bg-green-400 text-white flex rounded-md px-3" type="submit">
                                Admin
                            </a>
                            @else
                            <a href="{{route('statusUser', $user->id)}}"
                                class="bg-red-400 text-white flex rounded-md px-2" type="submit">
                                User
                            </a>
                            @endif
                        </form>
                    </td>

                </tr>
                @endforeach
            </table>
            <div class="fixed top-1/2 right-2/5">
                {{ $users->links() }}
            </div>
        </div>
    </div>

</x-layout>