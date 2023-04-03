<x-layout>
    <form method="POST" action="">
        @csrf
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:40%">Product</th>
                    <th style="width:10%">Prijs</th>
                    <th style="width:8%">Aantal</th>
                    <th style="width:20%" class="text-center">Subtotaal</th>
                    <th style="width:12%" class="text-center">Status</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                @php
                $total = 0;
                $items = 0;
                @endphp
                @foreach($orderdetails as $id => $details)

                @php
                if ($details['discount_price'] != null) {
                $details['price'] = $details['discount_price'];
                }
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

                    <td>
                        <select name="status" id="status">
                            <option value={{$details}}></option>
                        </select>
                    </td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
            </tfoot>
        </table>

        <div class="grid grid-cols-12 gap-4">
            <button class="col-start-7 col-span-1 bg-green-500 text-white rounded-xl" type="submit">Submit</button>
        </div>
    </form>
</x-layout>