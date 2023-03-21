@props(['products'])
@props(['images'])

@if ($products->count())
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if($images->count())
            @foreach ($images as $image)
                @if ($image->product_id != $products[0]->id)
                    @php
                        $noImg = true;
                    @endphp
                @elseif ($image->product_id == $products[0]->id)
                    @php
                        $noImg = false;
                    @endphp
                    <x-product-featured-card :product="$products[0]" :image="$image->image" id="$product->id" />
                @endif


            @endforeach
                @if ($noImg)
                    <x-product-featured-card :product="$products[0]" id="$product->id" />
                @endif
        @endif

    @if ($products->count() > 1)
        <?php $i = 0; ?>
        <!-- Display the remaining products in rows of three -->
        <div class="lg:grid lg:grid-cols-6">
            @foreach ($products->skip(1) as $product)
                @if ($product->is_active == 1)
                    @if($images->count())
                        @foreach ($images as $image)
                            @if ($image->product_id != $product->id)
                                @php
                                    $noImg = true;
                                @endphp
                            @else
                                @php
                                    $noImg = false;
                                @endphp
                                <x-product-card :product="$product" :image="$image->image" class="col-span-2" id="$product->id" />
                                @break
                            @endif
                        @endforeach
                    @endif
                    @if ($noImg)
                        <x-product-card :product="$product" class="col-span-2" id="$product->id" />    
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