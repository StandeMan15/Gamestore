<?php $timeNow = Carbon\Carbon::now(); ?>
<x-layout>

    <section class="px-6 py-8">

        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="{{ url()->previous() }}" class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>
                            {{ __('messages.index.back') }}
                        </a>
                        <div class="space-x-2">
                            <x-category-button :category="$product->category" />
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $product->title }}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {!! $product->body !!}
                    </div>
                </div>

                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    @foreach ($images as $image)
                    @if ((isset($image)) && ($product->id == $image->product_id))
                    <img src="{{ asset($image->image)}}" alt="" class="rounded-xl mix-blend-multiply">
                    @else
                    @continue
                    @endif
                    @endforeach


                    <div class="uppercase semi-bold text-xl bg-green-500 text-white p-2 m-2 rounded-xl">
                        @if ($timeNow < $product->preorder_date)
                            <span class="uppercase semi-bold text-xl">{{ __('messages.admin.product.soon_available') }}</span>
                            @elseif (($timeNow > $product->preorder_date) && ($timeNow < $product->release_date))
                                <span class="">
                                    {{ __('messages.admin.product.preorder_now') }}
                                </span>
                                @else
                                {{ __('messages.admin.product.release') }}: <time>{{ date('M-Y', strtotime($product->release_date)) }}</time>
                                @endif

                                <span class="flex justify-end pr-4">€{{ $product->price }}</span>
                    </div>
                </div>

                <section class="col-span-8 col-start-1 space-y-6">
                    @auth
                    <x-panel>
                        <form method="POST" action="/products/{{ $product->slug }}/comments">
                            @csrf

                            <header class="flex items-center">
                                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">

                                <h2 class="ml-4">{{ __('messages.index.participate') }}</h2>
                            </header>

                            <div class="mt-6">
                                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" cols="30" rows="5" placeholder="Think of something to say"></textarea>
                            </div>

                            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                                <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Post</button>
                            </div>
                        </form>
                    </x-panel>
                    @else
                    <p class="semi-bold">
                        <a href="/register" class="hover:underline">{{ __('messages.nav.register') }}</a>
                        {{ __('messages.index.or') }}
                        <a href="/login" class="hover:underline">{{ __('messages.nav.login') }}</a>
                        {{ __('messages.index.leave_comment') }}
                    </p>
                    @endauth

                    @foreach ( $product->comments as $comment )
                    <x-product-comment :comment="$comment" />
                    @endforeach

                </section>

            </article>
        </main>

    </section>
    </body>

</x-layout>