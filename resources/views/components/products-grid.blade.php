@props(['products'])
@props(['images'])

@if ($products->count() > 1)
    @foreach ($images as $image)

    @if ($products[0]->is_active == 1)
            @if($products[0]->id == $image->product_id)
                <x-product-featured-card :product="$products[0]" :image="$image->image" />
            @endif

            <div class="lg:grid lg:grid-cols-6">
                @foreach ($products->skip(1) as $product)
                    @if ($product->is_active == 1)
                        @if ($product->id == $image->product_id)
                            <x-product-card
                                :product="$product" :image="$image->image"
                                class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
                        @else
                            <x-product-card
                                :product="$product"
                                class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
                        @endif
                    @else
                        @continue
                    @endif
                @endforeach
            </div>

    @else
        <x-product-featured-card :product="$products[1]" />

        <div class="lg:grid lg:grid-cols-6">
            @foreach ($products->skip(2) as $product)

                @if($products[1]->id == $image->product_id)
                    <x-product-featured-card :product="$products[1]" :image="$image->image" />
                @endif

                @if ($product->is_active == 1)
                    @if ($product->id == $image->product_id)
                        <x-product-card
                            :product="$product" :image="$image->image"
                            class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
                    @else
                        <x-product-card
                            :product="$product"
                            class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"/>
                    @endif
                @endif
            @endforeach
        </div>
    @endif
    @endforeach
@endif