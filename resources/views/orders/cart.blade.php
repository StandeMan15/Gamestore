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
<table>
    <th>
        Overzicht
    </th>
    <tr>
        Artikelen
    </tr>
    <tr>
        <td colspan="5" class="text-right">
            <p class="p-2"><strong>Nog te betalen € &nbsp;{{ $total }}</strong></p>
        </td>
    </tr>
    <tr>
        <td colspan="5" class="text-right">
            <a href="{{route('storeorder')}}"><button class="btn btn-success">Verder naar bestellen</button></a>
        </td>
    </tr>

</table>

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