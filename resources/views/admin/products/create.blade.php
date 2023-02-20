<x-layout>
    <form method="post" action="{{route('createProduct')}}">
        @csrf
        <div class="mb-6">

            <div class="grid grid-cols-12 gap-4">
                <div class="col-start-3 col-span-3">
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                        Game Naam
                    </label>

                    <input class="p-2 border border-gray-200" type="text" name="name" id="name" required>
                </div>

                <div class="col-span-6">
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="price">
                        Prijs in €
                    </label>

                    <input class="p-2 border border-gray-200" type="text" name="price" id="price" required>
                </div>

                <div class="col-start-3 col-span-3">
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
                        Game Categorie
                    </label>

                    <select class="p-2 border border-gray-200" type="text" name="category_id" id="category_id" required>
                        @foreach ( $categories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-span-6">
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="release_date">
                        Release Datum
                    </label>

                    <input class="p-2 border border-gray-200" type="text" name="release_date" id="release_date"
                        required>
                </div>

                <div class="col-span-6">
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                        Korte beschrijving
                    </label>

                    <textarea class="p-2 border border-gray-200" type="text" name="excerpt" id="excerpt" rows="5"
                        cols="30"></textarea>
                </div>

                <div class="col-span-6">
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                        Volledige beschrijving
                    </label>

                    <textarea class="p-2 border border-gray-200" type="text" name="body" id="body" rows="10"
                        cols="50"></textarea>
                </div>





                <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="minimum_age">
                    Minimale leeftijd
                </label>

                <input class="p-2 border border-gray-200" type="text" name="minimum_age" id="minimum_age" required>



                <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="preorder_date">
                    Preorder Datum
                </label>

                <input class="p-2 border border-gray-200" type="text" name="preorder_date" id="preorder_date" required>

                <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="image">
                    Thumbnail
                </label>

                <input class="p-2 border border-gray-200" type="file" name="image" id="image" required>

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