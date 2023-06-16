@props(['product'])
@props(['image'])

@php
$available = true;
$date = Carbon\Carbon::parse($product->release_date);
@endphp


@if ($product->active == 1)

<article {{ $attributes->merge(['class' => 'border-2 border-black border-opacity-10 col-span-2 duration-300 hover:bg-gray-200 hover:bg-gray-200 m-1 rounded-xl transition-colors transition-transform transform-gpu hover:scale-110 mix-blend-multiply']) }}>
    <div class="py-6 px-5">
        <a href="/{{ $product->category->slug }}/{{ $product->slug }}">
            <div class="flex justify-around">
                @if (isset($image))
                <img src="{{ asset($image)}}" alt="{{ $product->title }}" class="rounded-xl mix-blend-multiply object-fit h-40">  
                @else
                <img src="https://via.placeholder.com/400x300" alt="{{ $product->title }}" class="rounded-xl">
                @endif

            </div>
        </a>
        @if (isset($product->release_date))
            @if ($date->isFuture())
            <span class="mt-2 block text-gray-400 text-xs">
                {{ __('messages.admin.product.soon_available') }}
            </span>
            @php
            $available = false;
            @endphp
            @else
            <span class="mt-2 block text-gray-400 text-xs no-underline">
                {{ __('messages.admin.product.release') }}: {{ $product->release_date }}
            </span>
            @endif
            @elseif (isset($product->preorder_date))
            <span class="mt-2 block text-gray-400 text-xs">
                {{ __('messages.admin.product.preorder') }}: {{ $product->preorder_date }}
            </span>
        @endif
        <a href="/{{ $product->category->slug }}/{{ $product->slug }}">
            <div class="flex justify-start mt-2">
                <x-category-button :category="$product->category" />
            </div>
            <x-product-card-footer :product="$product" :available="$available"  />          

            @if (isset($product->discount_price))
                <div class="mt-2"><span class="line-through bg-red-400 p-1 mt-2 rounded-xl">€ {{ $product->price }}</span>
                    <span class="mt-3 bg-green-500 w-1/5 text-center p-1 rounded-xl text-white">
                        € {{ $product->discount_price }}
                    </span>
                </div>

            @else
                <div class="mt-2"> <span class="mt-3 bg-green-500 w-1/5 text-center p-1 rounded-xl text-white">
                    € {{ $product->price }} 
                    </span>
                </div>
            @endif
            <div class="mt-8 flex flex-col justify-between">
                <header>
                    <div class="mt-4">
                        <h1 class="text-3xl text-black">
                            <a class="text-black" href="/{{ $product->category->slug }}/{{ $product->slug }}">
                                {{ $product->title }}
                            </a>
                        </h1>
                    </div>
                </header>

                <div class="text-sm mt-4 space-y-4">
                    {!! $product->excerpt !!}
                </div>
            </div>
        </a>
    </div>
</article> 
@endif