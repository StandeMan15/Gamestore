<?php $timeNow = Carbon\Carbon::now(); ?>

<x-layout>
    <div class="grid grid-cols-6 gap-4">
        <div class="col-span-1 w-auto">
            <x-admin-sidebar />
        </div>

        <div class="col-span-2">
            <div class="w-64 h-64">
                {{ $product->thumbnail }}
            </div>
        </div>

        <div class="col-span-3">
            <table>
                <tr>
                    <td>
                        Categorie:
                    </td>

                    <td>
                        {{ $product->category->name}}
                    </td>
                </tr>

                <tr>
                    <td>
                        Game:
                    </td>

                    <td>
                        {{ $product->title }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Prijs:
                    </td>

                    @if ($product->discount_price)
                        <td>
                            <span class="line-through">{{ $product->price }}</span>
                            {{ $product->discount_price }}
                        </td>
                    @endif


                </tr>

                <tr>
                    <td>
                        Minimale leeftijd:
                    </td>

                    <td>
                        {{ $product->minimum_age }}
                    </td>
                </tr>

                <tr>
                    @if ($timeNow < $product->release_date)
                        <td>
                            Pre-order datum:
                        </td>

                        <td>
                            {{ $product->preorder_date }}
                        </td>
                    @else
                        <td>
                            Uitgebracht op:
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
            Beschrijving: {!! $product->body !!}
        </div>
    </div>

    <div class="grid grid-cols-6 gap-4">
        <div class="col-span-5"></div>
        <div class="col-span-1">
            <a href="{{ URL::previous() }}" class="bg-blue-500 text-white rounded-md p-2">Go Back</a>
        </div>
    </div>



</x-layout>