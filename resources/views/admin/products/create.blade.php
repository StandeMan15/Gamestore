<x-layout>
    <form method="POST" action="{{route('storeProduct')}}" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-12 gap-4">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            @endif

            <div class="col-start-3 col-span-1">
                <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                    Game Naam
                </label>
            </div>

            <div class="col-span-2">
                <input class="p-2 border border-gray-200" type="text" name="title" id="title" required>
            </div>

            <div class="col-span-1">
                <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="price">
                    Prijs in €
                </label>
            </div>

            <div class="col-span-5">
                <input class="p-2 border border-gray-200" type="number" name="price" id="price" step='0.01' required>
            </div>



            <div class="col-start-3 col-span-1">
                <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
                    Game Categorie
                </label>
            </div>

            <div class="col-span-2">
                <select class="p-2 border border-gray-200" type="text" name="category_id" id="category_id" required>
                    @foreach ( $categories as $category )
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-1">
                <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="release_date">
                    Release Datum
                </label>
            </div>
            <div class="col-span-5">
                <input class="p-2 border border-gray-200" type="date" name="release_date" id="release_date">
            </div>



            <div class="col-start-3 col-span-1">
                <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                    Korte beschrijving
                </label>
            </div>
            <div class="col-span-9 w-full">
                <textarea class="p-2 border border-gray-200 w-1/2" type="text" name="excerpt" id="excerpt"></textarea>
            </div>

            <div class="col-start-3 col-span-1">
                <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                    Volledige beschrijving
                </label>
            </div>
            <div class="col-span-9">
                <textarea class="p-2 border border-gray-200 w-1/2" type="text" name="body" id="body" rows="10"
                    cols="50"></textarea>
            </div>



            <div class="col-start-3 col-span-1">
                <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="minimum_age">
                    Minimale leeftijd
                </label>
            </div>
            <div class="col-span-2">
                <input class="p-2 border border-gray-200" type="number" name="minimum_age" id="minimum_age" max='21'>
            </div>

            <div class="col-span-1">
                <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="preorder_date">
                    Preorder Datum
                </label>
            </div>
            <div class="col-span-2">
                <input class="p-2 border border-gray-200" type="date" name="preorder_date" id="preorder_date">
            </div>

            <div class="col-start-3 col-span-1">
                <label class="mb-2 uppercase font-bold text-xs text-gray-700" for="image">
                    Image
                </label>
            </div>

            <div class="col-span-1">
                <input class="p-2 border border-gray-200" type="file" multiple name="image[]" id="image" >
            </div>

            @error('name')
            <p class="text-red-500 text-xs mt-1">
                {{ $message }}
            </p>
            @enderror

        </div>

        <div class="grid grid-cols-12 gap-4">
            <button class="col-start-7 col-span-1 bg-green-500 text-white rounded-xl" type="submit">Submit</button>
        </div>
    </form>
</x-layout>