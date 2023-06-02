@props(['products'])
@props(['images'])

<x-layout>
    @if ($products->count())
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="grid grid-cols-12 gap-4 mt-1">

                <?php 
                    $imagefound = false;
                ?>   
                @foreach ($products as $product)

                    @if($images->count())
                        @if ($slug == $product->category->slug)

                            @foreach ($images as $image)
                                @if ($image->product_id == $product->id)
                                    <?php $imagefound = true; ?>
                                    <x-product-card :product="$product" class="col-span-4" :image="$image->image" />
                                    @break($image->product_id)
                                @else
                                    <?php $imagefound = false; ?>
                                    @continue
                                @endif
                            @endforeach

                            @if ($imagefound == false)
                                <x-product-card :product="$product" class="col-span-4" />    
                            @endif

                        @endif
                    @else
                        <x-product-card :product="$product" class="col-span-4" />
                    @endif

                @endforeach
        </div>
    @else
    <p class="text-center">
        There aren't any products in this category
    </p>
    @endif
</x-layout>
<x-layout-footer />