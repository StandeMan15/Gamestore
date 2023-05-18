@php
$subtotal = 0;
@endphp

<head>
  <title>{{ __('messages.pdf.title') }}</title>
</head>
<style type="text/css">
  body {
    font-family: 'Roboto Condensed', sans-serif;
  }

  .m-0 {
    margin: 0px;
  }

  .p-0 {
    padding: 0px;
  }

  .pt-5 {
    padding-top: 5px;
  }

  .mt-10 {
    margin-top: 10px;
  }

  .text-center {
    text-align: center !important;
  }

  .w-100 {
    width: 100%;
  }

  .w-50 {
    width: 50%;
  }

  .w-85 {
    width: 85%;
  }

  .w-15 {
    width: 15%;
  }

  .logo img {
    width: 45px;
    height: 45px;
    padding-top: 30px;
  }

  .logo span {
    margin-left: 8px;
    top: 19px;
    position: absolute;
    font-weight: bold;
    font-size: 25px;
  }

  .gray-color {
    color: #5D5D5D;
  }

  .text-bold {
    font-weight: bold;
  }

  .border {
    border: 1px solid black;
  }

  table tr,
  th,
  td {
    border: 1px solid #d2d2d2;
    border-collapse: collapse;
    padding: 7px 8px;
  }

  table tr th {
    background: #F4F4F4;
    font-size: 15px;
  }

  table tr td {
    font-size: 13px;
  }

  table {
    border-collapse: collapse;
  }

  .box-text p {
    line-height: 10px;
  }

  .float-left {
    float: left;
  }

  .total-part {
    font-size: 16px;
    line-height: 12px;
  }

  .total-right p {
    padding-right: 20px;
  }
</style>

<body>
  <div class="head-title">
    <h1 class="text-center m-0 p-0">{{ __('messages.index.title') }}</h1>
  </div>
  <div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
      @php $date = substr($orderbase->created_at, 0, -9); @endphp
      <p class="m-0 pt-5 text-bold w-100">{{ __('messages.pdf.purchase') }}<span class="gray-color">{{ $date }}</span></p>
      <p class="m-0 pt-5 text-bold w-100">{{ __('messages.admin.order.num') }}<span class="gray-color">{{ $orderbase->order_number }}</span></p>
    </div>
    <div style="clear: both;"></div>
  </div>
  <div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
      <tr>
        <th class="w-50">{{ __('messages.index.from') }}</th>
        <th class="w-50">{{ __('messages.index.to') }}</th>
      </tr>
      <tr>
        <td>
          <div class="box-text">
            <p>{{ __('messages.artitex.title') }}</p>
            <p>{{ __('messages.artitex.address') }}</p>
            <p>{{ __('messages.artitex.postalcode') }}</p>
            <p>{{ __('messages.artitex.country') }}</p>
            <p>{{ __('messages.artitex.mail') }}</p>
            <p>{{ __('messages.artitex.phone') }}</p>
          </div>
        </td>
        <td>
          <div class="box-text">
            <p>{{$orderbase->user->fname}}&nbsp;{{$orderbase->user->addition}}&nbsp;{{$orderbase->user->lname}}</p>
            <p>{{$shippingdetails->streetname}}&nbsp;{{$orderbase->user->housenmr}}&nbsp;{{$orderbase->user->housenmr_extra}}</p>
            <p>{{$shippingdetails->postalcode}}</p>
            <p>{{$orderbase->user->email}}</p>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
      <tr>
        <th class="w-50">{{ __('messages.pdf.payment_mth') }}</th>
        <th class="w-50">{{ __('messages.pdf.shipping_mth') }}</th>
      </tr>
      <tr>
        <td>{{$orderbase->status->title}}</td>
        <td>TBC</td>
      </tr>
    </table>
  </div>
  <div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
      <tr>
        <th class="w-50">{{ __('messages.pdf.product_name') }}</th>
        <th class="w-50">{{ __('messages.admin.order.price') }}</th>
        <th class="w-50">{{ __('messages.admin.product.qty') }}</th>
        <th class="w-50">{{ __('messages.admin.order.subtotal') }}</th>
      </tr>

      @foreach($orderdetails as $details)
      <tr align="center">
        @php
        $subtotal += $details->price;
        $subtotal = number_format($subtotal, 2, '.');
        $producttotal = $details->price * $details->quantity;
        if(!str_contains($details->price, '.')) {
        $details->price = number_format($details->price, 2, '.');
        }
        @endphp
        <td>{{$details->name}}</td>
        <td>€{{$details->price}}</td>
        <td>{{$details->quantity}}</td>
        <td>€{{$subtotal}}</td>
      </tr>
      @endforeach

      <tr>
        <td colspan="7">
          <div class="total-part">
            @php $btw = config('config.BTW') * 100; @endphp
            <div class="total-left w-85 float-left" align="right">
              <p>{{ __('messages.admin.order.subtotal') }}</p>
              <p>{{ __('messages.pdf.btw', ['attribute' => $btw]) }}</p>
              <p>{{ __('messages.admin.order.total') }}</p>
            </div>
            @php
            $tax = $subtotal * config('config.BTW');
            $tax = number_format($tax, 2, '.');

            $total = $tax + $subtotal;
            $total = number_format($total, 2, '.')
            @endphp
            <div class="total-right w-15 float-left text-bold" align="right">
              <p>€{{$subtotal}}</p>
              <p>€{{$tax}}</p>
              <p>€{{$total}}</p>
            </div>
            <div style="clear: both;"></div>
          </div>
        </td>
      </tr>
    </table>
  </div>

  </html>