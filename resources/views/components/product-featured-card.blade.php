@props(['product'])
@props(['image'])

@php
$available = true;
$date = Carbon\Carbon::parse($product->release_date);
@endphp

<article class="border-2 border-black border-opacity-10 col-span-2 duration-300 hover:bg-gray-200 hover:bg-gray-200 m-1 rounded-xl transition-colors transition-transform transform-gpu hover:scale-105 mix-blend-multiply">
    <div class="py-6 px-5 lg:flex">
        <a href="/{{ $product->category->slug }}/{{ $product->slug }}">
            <div class="flex-1 lg:mr-8">
                @if (isset($image))
                <img src="{{ asset($image)}}" alt="{{$product->title}}" class="rounded-xl h-96 object-fit mix-blend-multiply">
                @else
                <img src="https://via.placeholder.com/500x300" alt="{{$product->title}}" class="rounded-xl mix-blend-multiply">
                @endif
            </div>

            <div class="flex-1 flex flex-col justify-between">
                <header>
                    <div class="mt-4">


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
                        
                        <div class="flex justify-start mt-2">
                            <x-category-button :category="$product->category" />
                        </div>

                        <h1 class="text-3xl">
                            <a class="text-black" href="/{{ $product->category->slug }}/{{ $product->slug }}">
                                {{ $product->title }}
                            </a>
                        </h1>
                    </div>
                </header>

                <div class="text-sm mt-2 space-y-4">
                    {!! $product->excerpt !!}
                </div>

                <x-product-card-footer :product="$product" :available="$available" />

                @if (isset($product->discount_price))
                <p><span class="line-through bg-red-400 p-1 mt-2 rounded-xl">€ {{ $product->price }}</span>
                    <span class="mt-1 bg-green-500 w-1/5 text-center p-1 rounded-xl text-white">
                        € {{ $product->discount_price }}
                    </span>
                </p>

                @else
                <div class="mt-2 bg-green-500 w-1/5 text-center p-1 rounded-xl text-white">
                    € {{ $product->price }}
                </div>
                @endif
            </div>
        </a>
    </div>
</article>