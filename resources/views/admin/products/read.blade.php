<?php $timeNow = Carbon\Carbon::now(); ?>

<x-layout>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-1 w-auto">
            <x-admin-sidebar />
        </div>

        <div class="col-start-3 col-span-4">
            <div class="w-64 h-64">
                @foreach ( $images as $image )
                @if ($image->product_id == $product->id)
                <img src="{{ asset($image->image) }}" alt="" class="h-auto w-auto" />
                @endif
                @endforeach

            </div>
        </div>

        <div class="col-span-4">
            <table>
                <tr>
                    <td>
                        {{ __('messages.admin.category.title') }}
                    </td>

                    <td>
                        {{ $product->category->name}}
                    </td>
                </tr>

                <tr>
                    <td>
                        {{ __('messages.admin.product.title') }}
                    </td>

                    <td>
                        {{ $product->title }}
                    </td>
                </tr>

                <tr>
                    <td>
                        {{ __('messages.admin.order.price') }}:
                    </td>
                    @if ($product->discount_price != null)
                    <td>
                        <span class="line-through">{{ $product->price }}</span>
                        {{ $product->discount_price }}
                    </td>
                    @else
                    <td>
                        <span>{{ $product->price }} </span>
                    </td>

                    @endif


                </tr>

                <tr>
                    @if (isset($product->minimum_age))
                    <td>
                        {{ __('messages.admin.product.min_age') }}:
                    </td>

                    <td>
                        {{ $product->minimum_age }}
                    </td>
                    @else
                    <td class="col-span-2 col-start-2">
                        {{ __('messages.admin.product.all_ages') }}
                    </td>
                    @endif

                </tr>

                <tr>
                    @if ($timeNow < $product->release_date)
                        <td>
                            {{ __('messages.admin.product.preorder') }}:
                        </td>

                        <td>
                            {{ $product->preorder_date }}
                        </td>
                        @else
                        <td>
                            {{ __('messages.admin.product.release') }}:
                        </td>

                        <td>
                            {{ $product->release_date }}
                        </td>
                        @endif
                </tr>
            </table>


        </div>
    </div>

    <div class="grid grid-cols-6 gap-4">
        <div class="col-span-1"></div>
        <div class="col-span-4">
            {{ __('messages.admin.product.desc') }}: {!! $product->body !!}
        </div>
    </div>

    <div class="grid grid-cols-6 gap-4">
        <div class="col-span-5"></div>
        <div class="col-span-1">
            <a href="{{ URL::previous() }}" class="bg-blue-500 text-white rounded-md p-2">{{ __('messages.form.back') }}</a>
        </div>
    </div>



</x-layout>