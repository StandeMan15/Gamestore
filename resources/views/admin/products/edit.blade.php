<x-layout>
    <form method="post" action="{{route('updateProduct', $product->id)}}">
        @csrf
        <div class="mb-6">
            <?php //dd($product) ?>

            <div class="grid grid-cols-12 gap-4">
                <div class="col-start-3 col-span-1 m-auto">
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="name">
                        Product Naam
                    </label>
                </div>

                <div class="col-span-6">
                    <input class="p-2 border border-gray-200 w-full" type="text" name="name" id="name"
                        value="{{ $product->title }}" required>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-4">
                <div class="col-start-3 1 m-auto">
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="price">
                        Prijs
                    </label>
                </div>

                <div class="col-span-3">
                    €<input class="p-2 border border-gray-200" type="text" name="price" id="price"
                        value="{{ $product->price }}" required>

                </div>

                <div class="col-span-1">
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="price">
                        Actie Prijs
                    </label>
                </div>

                <div class="col-span-4">
                    €<input class="p-2 border border-gray-200" type="text" name="price" id="price"
                        value="{{ $product->price }}" required>
                </div>

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