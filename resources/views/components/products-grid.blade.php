@props(['products'])
@props(['images'])

<div class="shopping-cart">
    <div class="shopping-cart-head">
        <span class="product-quantity">0</span> Product(s) in Cart
    </div>
    <ul class="shopping-cart-list">
    </ul>
    <div class="cart-buttons">
        <a href="#0" class="button empty-cart-btn">Empty</a>
        <a href="#0" class="button cart-checkout">Checkout - <span class="total-price">$0</span></a>
    </div>
</div>

@if ($products->count())
<main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

    @if ($images->count())
        <?php $imagefound = false; ?>
        @foreach ($images as $image)
            @if ($image->product_id == $products[0]->id)
                <?php $imagefound = true; ?>

                @if ($imagefound == true)
                    @break
                @endif

            @elseif ($image->product_id != $products[0]->id)
                @continue
            @endif
        @endforeach

        @if($imagefound)
            <x-product-featured-card :product="$products[0]" :image="$image->image" />
        @else
            <x-product-featured-card :product="$products[0]" />
        @endif
    @endif

    <!-- Display two products bigger than the remaining grid -->
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($products->skip(1) as $product)
            @if ($product->is_active == 1)
                @foreach ($images as $image)
                    @if ($image->product_id == $product->id)
                            <x-product-card :product="$product" :image="$image->image" class="{{ $loop->iteration ? 'col-span-2' : 'col-span-2' }}" />
                        @break
                    @else
                        <x-product-card :product="$product" class="{{ $loop->iteration ? 'col-span-2' : 'col-span-2' }}" />
                        @break
                    @endif
                @endforeach

                @if (empty($images->count()))
                    <x-product-card :product="$product" class="{{ $loop->iteration ? 'col-span-2' : 'col-span-2' }}" />
                @endif
            @endif
        @endforeach
    </div>

    @else
    <p class="text-center">
        No products yet. Please check back later
    </p>
    @endif