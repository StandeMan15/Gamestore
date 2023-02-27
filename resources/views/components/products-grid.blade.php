@props(['products'])
@props(['images'])

@if ($products->count() > 1)
    @if ($products[0]->is_active == 1)
        @foreach ($images as $image)
            @if ($image->product_id == $products[0]->id)
                <x-product-featured-card :product="$products[0]" />

                <div class="lg:grid lg:grid-cols-6">
                @foreach ($products->skip(1) as $product)
                    @if ($product->is_active == 1)
                        @if ($image->product_id == $product->id)
                            <x-product-card
                                :product="$product" :image="$image"
                                class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
                        @elseif ($image->product_id != $product->id)
                            <x-product-card
                                :product="$product"
                                class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
                        @endif
                    @else
                        @continue
                    @endif
                @endforeach
                </div>
            @endif
        @endforeach
    @endif
@endif