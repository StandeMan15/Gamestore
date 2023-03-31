@extends('components.shopping-cart')


@section('content')
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Prijs</th>
            <th style="width:8%">Aantal</th>
            <th style="width:22%" class="text-center">Subtotaal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
        @php $items = count(session('cart')) @endphp
        @foreach(session('cart') as $id => $details)

        @php
        if ($details['discount_price'] != null) {
        $details['price'] = $details['discount_price'];
        }
        $total += $details['price'] * $details['quantity']
        @endphp
        <tr data-id="{{ $id }}">
            <td data-th="Product">
                <div class="row">
                    @if ($details['image'] == null)
                    <img src="https://via.placeholder.com/400x300" width="100" height="100" class="img-responsive" alt="Product Thumbnail" />
                    @else
                    <div class="col-sm-3 hidden-xs">
                        <img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive" alt="Product Thumbnail" />
                    </div>
                    @endif
                    <div class="col-sm-8">
                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price">€{{ $details['price'] }}</td>
            <td data-th="Quantity">
                <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
            </td>
            <td data-th="Subtotal" class="text-center">€{{ $details['price'] * $details['quantity'] }}</td>
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
                €&nbsp;{{session('checkout.order_price')}}
            </td>
        </tr>
        <tr>
            <td>
                <a href={{route('mollie.payment')}}><button class="btn btn-success">Door naar betalen</button></a>
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