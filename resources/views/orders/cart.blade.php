@extends('components.shopping-cart')


@section('content')

<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">{{ __('messages.admin.product.title') }}</th>
            <th style="width:10%">{{ __('messages.admin.product.price') }}</th>
            <th style="width:8%">{{ __('messages.admin.product.qty') }}</th>
            <th style="width:22%" class="text-center">Subtotaal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php
        $total = 0;
        $items = 0;
        @endphp
        @if(session('cart'))
        @foreach(session('cart') as $id => $details)

        @php
        //dd($details);
        foreach($category as $categories) {
        if($categories->id == $details['category_id']) {
        $categoryslug = $categories->slug;
        }
        }

        if ($details['discount_price'] != null) {
        $details['price'] = $details['discount_price'];
        }
        @endphp
        <tr data-id="{{ $id }}">
            <td data-th="Product">
                <a href="/{{$categoryslug}}/{{$details['slug']}}">
                    <div class="row">
                        @if ($details['image'] == null)
                        <img src="https://via.placeholder.com/400x300" width="100" height="100" class="img-responsive" alt="Product Thumbnail" />
                        @else
                        <div class="col-sm-4 hidden-xs">

                            <img src="../{{ $details['image']['image'] }}" width="100" height="100" class="img-responsive m-3" alt="Product Thumbnail" />
                        </div>
                        @endif
                        <div class="col-sm-8">
                            <h4 class="ml-4">{{ $details['name'] }}</h4>
                        </div>
                    </div>
                </a>
            </td>
            <td data-th="Price">€{{ $details['price'] }}</td>
            <td data-th="Quantity">
                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" min="0" />
                @php $items += $details['quantity'] @endphp
            </td>

            @php
            $subtotal = $details['price'] * $details['quantity'];
            $total += $subtotal;
            if(!str_contains($subtotal, '.')) {
            $subtotal = $subtotal . ".00";
            }
            @endphp

            <td data-th="Subtotal" class="text-center">€{{ $subtotal }}</td>
            <td class="actions" data-th="">
                <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
    <tfoot>
    </tfoot>
</table>
@endsection

@section('overview')


@if (isset($items))
<table>
    <div class="col-span-5">
        <tr>
            <td>
                <h5 class="font-bold">Overzicht</h5>
            </td>
        </tr>
        <tr class="border-t-4 border-gray-800">
            <td class="flex justify-content-end">
                Artikelen({{$items}})
            </td>
            <td class="font-bold">
                €&nbsp;{{$total}}
            </td>
        </tr>
        <tr>
            <td class="col-span-2">
                @if (auth()->check())
                <a href={{route('storeorder')}}><button class="btn btn-success">Door naar bestellen</button></a>
                @else
                <a href={{route('storeorder')}}><button class="btn btn-success" disabled>Door naar bestellen</button></a>
                <h5>Je moet ingelogd zijn om te kunnen bestellen</h5>
                @endif
            </td>

        </tr>
    </div>
</table>
@else
<h1>
    Er liggen nog geen producten in jouw winkelwagentje
</h1>
@endif

@endsection

@section('scripts')
<script type="text/javascript">
    $(".update-cart").change(function(e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: 'update-cart',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function(e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Are you sure want to remove?")) {
            $.ajax({
                url: 'remove-from-cart',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection