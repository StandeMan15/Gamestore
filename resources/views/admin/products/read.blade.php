<?php $timeNow = Carbon\Carbon::now(); ?>

<x-layout>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-1 w-auto">
            <x-admin-sidebar />
        </div>

        <div class="col-span-6 col-start-4 m-auto">
                        <div class="col-span-6 col-start-4 flex justify-around">
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
            <div class="flex flex-wrap">
                @foreach ( $images as $image )  
                @if ($image->product_id == $product->id)
                    <img src="{{ asset($image->image) }}" alt="" class="m-1 h-32 w-auto" />
                @endif
                @endforeach
            </div>

        <div class="flex justify-content-end m-2">
            <a href="{{ URL::previous() }}" class="bg-blue-500 text-white rounded-md p-2">{{ __('messages.form.back') }}</a>
        </div>
        </div>


    </div>
</x-layout>