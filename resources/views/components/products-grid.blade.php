@props(['products'])
@props(['images'])



@if ($products->count())
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

    @if ($images->count())

        @foreach ($images as $image)
            @if ($image->product_id != $products[0]->id)
                @php
                    $noImg = true;
                @endphp
            @elseif ($image->product_id == $products[0]->id)
                <x-product-featured-card :product="$products[0]" :image="$image->image" />
                @break
            @endif
        @endforeach

        @if(isset($noImg))
            <x-product-featured-card :product="$products[0]" />
        @endif

    @else
        <x-product-featured-card :product="$products[0]" />
    @endif

    @if ($products->count())
        <?php $i = 0; ?>
        <!-- Display two products bigger than the remaining grid -->
        <div class="lg:grid lg:grid-cols-6">
            @foreach ($products->skip(1) as $product)
                @if ($product->is_active == 1)
                    @foreach ($images as $image)
                        @php 
                            $i++; 
                        @endphp

                        @if ($image->product_id == $product->id)
                            <x-product-card
                                :product="$product" :image="$image->image"
                                class="{{ $i <= 2 ? 'col-span-2' : 'col-span-2' }}"/>
                                @break
                        @elseif ($image->product_id != $product->id)
                            <x-product-card
                                :product="$product"
                                class="{{ $i <= 2 ? 'col-span-2' : 'col-span-2' }}"/>
                                @break
                        @endif
                    @endforeach

                    @if (empty($images->count()))
                            <x-product-card
                                :product="$product"
                                class="{{ $i <= 2 ? 'col-span-2' : 'col-span-2' }}"/>
                        @endif
                @endif
            @endforeach
        </div>
    @endif
@else
    <p class="text-center">
        No products yet. Please check back later
    </p>
@endif