@props(['products'])

@if ($products->count() > 1)

    @if ($products[0]->is_active == 1)
        <x-product-featured-card :product="$products[0]" />

        <div class="lg:grid lg:grid-cols-6">
            @foreach ($products->skip(1) as $product)
                @if ($product->is_active == 1)
                    <x-product-card
                        :product="$product"
                        class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
                @else
                    @continue
                @endif
            @endforeach
        </div>
    @else
        <x-product-featured-card :product="$products[1]" />

        <div class="lg:grid lg:grid-cols-6">
            @foreach ($products->skip(2) as $product)
                @if ($product->is_active == 1)
                    <x-product-card
                        :product="$product"
                        class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
                @endif
            @endforeach
        </div>
    @endif
@endif