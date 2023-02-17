<x-layout>
    <form method="post" action="{{route('updateCategory', $categories->id)}}">
        @csrf
        <div class="mb-6">
        <?php //dd($categories) ?>

                <div class="grid grid-cols-12 gap-4">
                    <div class="col-start-5 col-span-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                            Categorie Naam
                        </label>

                        <input class="p-2  border border-gray-200" type="text" name="name" id="name" value="{{ $categories->name }}" required>

                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                            Slug Naam
                        </label>

                        <input class="p-2  border border-gray-200" type="text" name="slug" id="slug" value="{{ $categories->slug }}" required>

                        @error('name')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                        @enderror

                    </div>

                </div>
                <div class="grid grid-cols-12 gap-4">
                    <button class="col-start-7 col-span-1 bg-green-500 text-white rounded-xl" type="submit">Submit</button>
                </div>
            </div>
    </form>
</x-layout>