<x-layout>
    <?php //dd($product)  ?>
    <form method="POST" action="{{route('updateProduct', $product->id)}}" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-12 gap-4">


            <div class="col-start-3 col-span-1">
                <label  class="static mb-2 uppercase font-bold text-xs text-gray-700"
                        for="title">
                    Game Naam
                </label>
            </div>

            <div class="col-span-2">
                <input  class="p-2 border border-gray-200" type="text" name="title"
                        id="title" value="{{ $product->title }}" required>
            </div>

            <div class="col-span-1">
                <label  class="static mb-2 uppercase font-bold text-xs text-gray-700"
                        for="price">
                    Prijs in €
                </label>
            </div>

            <div class="col-span-5">
                <input  class="p-2 border border-gray-200" type="number" name="price"
                        id="price" step='0.01' value="{{ $product->price }}" required>
            </div>



            <div class="col-start-3 col-span-1">
                <label  class="static mb-2 uppercase font-bold text-xs text-gray-700"
                        for="category_id">
                    Game Categorie
                </label>
            </div>

            <div class="col-span-2">
                <select class="p-2 border border-gray-200" type="text" name="category_id"
                        id="category_id" required>

                    <option value="{{ $product->category->id }}" selected
                            >{{ $product->category->name }}
                    </option>
                    @foreach ( $categories as $category )
                        @if ($product->category->name == $category->name)
                            @continue
                        @endif
                        <option value="{{ $category->id }}"
                                    >{{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-1">
                <label  class="static mb-2 uppercase font-bold text-xs text-gray-700"
                        for="release_date">
                    Release Datum
                </label>
            </div>
            <div class="col-span-5">
                <input  class="p-2 border border-gray-200" type="date" name="release_date"
                        id="release_date" value="{{ $product->release_date }}">
            </div>



            <div class="col-start-3 col-span-1">
                <label  class="static mb-2 uppercase font-bold text-xs text-gray-700"
                        for="excerpt">
                    Korte beschrijving
                </label>
            </div>
            <div class="col-span-9 w-full">
                <textarea   class="p-2 border border-gray-200 w-1/2" type="text" name="excerpt"
                            id="excerpt" rows="5" maxlength="255" value="{!! $product->excerpt !!}"
                >{!! $product->excerpt !!}
                </textarea>
            </div>

            <div class="col-start-3 col-span-1">
                <label  class="static mb-2 uppercase font-bold text-xs text-gray-700"
                        for="body">
                    Volledige beschrijving
                </label>
            </div>
            <div class="col-span-9">
                <textarea   class="p-2 border border-gray-200 w-1/2" type="text" name="body"
                            id="body" rows="15" cols="50" value="{!! $product->excerpt !!}"
                >{!! $product->body !!}
                </textarea>
            </div>

            <div class="col-start-3 col-span-1">
                <label  class="static mb-2 uppercase font-bold text-xs text-gray-700"
                        for="minimum_age">
                    Minimale leeftijd
                </label>
            </div>
            <div class="col-span-2">
                <input  class="p-2 border border-gray-200" type="number" name="minimum_age"
                        id="minimum_age" max='21' value="{{ $product->minimum_age }}">
            </div>

            <div class="col-span-1">
                <label  class="static mb-2 uppercase font-bold text-xs text-gray-700"
                        for="preorder_date">
                    Preorder Datum
                </label>
            </div>
            <div class="col-span-2">
                <input  class="p-2 border border-gray-200" type="date" name="preorder_date"
                        id="preorder_date" value="{{ $product->preorder_date }}">
            </div>

            <div class="col-start-3 col-span-1">
                <label  class="mb-2 uppercase font-bold text-xs text-gray-700"
                        for="image">
                    Thumbnail
                </label>
            </div>

            <div class="col-span-3">
                <input  class="p-2 border border-gray-200" type="file" name="image" id="image">

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