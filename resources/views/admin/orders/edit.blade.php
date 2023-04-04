<x-layout>
    <form method="POST" action="{{route('updateOrdersAdmin', $order_number)}}">
        @csrf


        @foreach ($orderdetails as $details)
            <div class="grid grid-cols-12 gap-4">
                <div class="col-start-3 col-span-1">
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                        Product Naam
                    </label>
                </div>

                <div class="col-span-4">
                    <input class="p-2 border border-gray-200 w-96" type="text" name="title" id="title" value="{{ $details->name }}" readonly>
                </div>

                <div class="col-start-3 col-span-1">
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="quantity">
                        Aantal
                    </label>
                </div>

                <div class="col-span-4">
                    <input class="p-2 border border-gray-200 w-auto mb-16" type="number" name="quantity" id="quantity" value="{{ $details->quantity }}" required>
                </div>

                <div class="col-span-2">
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
            </div>
        @endforeach

        <div class="grid grid-cols-12 gap-4">
            <button class="col-start-7 col-span-1 bg-green-500 text-white rounded-xl" type="submit">Submit</button>
        </div>
    </form>
</x-layout>