<x-layout>
    <form method="post" action="{{ route('categories.update', $categorie->id) }}">
        @csrf
        <div class="mb-6">
            @foreach ($category as $categorie )
            <div @if (!$loop->first) class="hidden" @endif>

                <div class="grid grid-cols-12 gap-4">
                    <div class="col-start-5 col-span-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                            Categorie Naam
                        </label>

                        <input class="p-2  border border-gray-200" type="text" name="name" id="name" value="{{ $categorie->name }}" required>

                        @error('name')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                </div>
                <div class="grid grid-cols-12 gap-4">
                    <a href="{{route('admin/categories/edit', $categorie->id)}}" class="col-start-7 col-span-1 bg-green-500 text-white rounded-xl" type="submit">Submit</button>
                </div>
            </div>
            @endforeach
    </form>
</x-layout>