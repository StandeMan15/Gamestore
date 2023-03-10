<x-layout>
    <?php //dd($categories)  ?>
    <form method="POST" action="{{route('updateCategory', $categories->id)}}">
        @csrf

        <div class="grid grid-cols-12 gap-4">


            <div class="col-start-3 col-span-1">
                <label  class="static mb-2 uppercase font-bold text-xs text-gray-700"
                        for="name">
                    Categorie Naam
                </label>
            </div>

            <div class="col-span-2">
                <input  class="p-2 border border-gray-200" type="text" name="name"
                        id="name" value="{{ $categories->name }}" required>
            </div>

            <div class="col-span-2">
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
    </form>
</x-layout>