@props(['product'])
@props(['image'])

<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            @if (isset($image))
                <img    src="{{ asset($image)}}" alt="{{$product->title}}"
                        class="rounded-xl">
            @else
                <img src="https://via.placeholder.com/500x300" alt="{{$product->title}}"
                        class="rounded-xl">
            @endif
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <x-category-button :category="$product->category" />
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/{{ $product->category->slug }}/{{ $product->slug }}">
                            {{ $product->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $product->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2 space-y-4">
                {!! $product->excerpt !!}
            </div>

            @if (isset($product->discount_price))
            <p>
                <span class="line-through bg-red-400 p-1 mt-5 rounded-xl">
                    € {{ $product->price }}
                </span>

                <span class="mt-5 bg-green-500 w-1/5 text-center p-1 rounded-xl text-white">
                    € {{ $product->price }}
                </span>
            </p>
            @else
            <div class="mt-3 bg-green-500 w-1/5 text-center p-1 rounded-xl text-white">
                € {{ $product->price }}
            </div>
            @endif

            <x-product-card-footer :product="$product" />
        </div>
    </div>
</article>