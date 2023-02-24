@props(['product'])
@props(['image'])

@if ($product->is_active == 1)
        <article
            {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
            <div class="py-6 px-5">
                <div>
                    <?php //dd($image) ?>
                    @if (isset($image))
                        <img src="{{ asset($image)}}" alt="{{ $product->title }}" class="rounded-xl">
                    @else
                        <img src="https://via.placeholder.com/450x500" alt="{{ $product->title }}" class="rounded-xl">
                    @endif

                </div>

                <div class="mt-8 flex flex-col justify-between">
                    <header>
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

                    <div class="text-sm mt-4 space-y-4">
                        {!! $product->excerpt !!}
                    </div>

                    <x-product-card-footer :product="$product"/>
                </div>
            </div>
        </article>

@endif