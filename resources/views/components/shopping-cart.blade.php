<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-sm-12 col-12 main-section">
        <div class="dropdown">
          <button type="button" class="btn btn-info" data-toggle="dropdown">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
          </button>
          <div class="dropdown-menu">
            <div class="row total-header-section">
              <div class="col-lg-6 col-sm-6 col-6">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
              </div>
              @php $total = 0 @endphp
              @foreach((array) session('cart') as $id => $details)
              @php
              if ($details['discount_price'] != null) {
              $details['price'] = $details['discount_price'];
              }
              $total += $details['price'] * $details['quantity'] @endphp
              @endforeach
              <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                <p>Totaal: <span class="text-info">€ {{ $total }}</span></p>
              </div>
            </div>
            @if(session('cart'))
            @foreach(session('cart') as $id => $details)
            @php
            if ($details['discount_price'] != null) {
            $details['price'] = $details['discount_price'];
            }
            @endphp
            <div class="row cart-detail">
              <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                <img src="../{{ $details['image'] }}" alt="Product Thumbnail" width="80" height="80" />
              </div>
              <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                <p>{{ $details['name'] }}</p>
                <span class="price text-info"> €{{ $details['price'] }}</span> <span class="count"> Aantal:{{ $details['quantity'] }}</span>
              </div>
            </div>
            @endforeach
            @endif
            <div class="row">
              <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                <a href="{{ route('cart') }}" class="btn btn-primary btn-block">Naar bestellen</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br />
  <div class="container">
    @yield('content')
  </div>

  @yield('scripts')

</body>

</html>