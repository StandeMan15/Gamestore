@php
$date = substr($order->created_at, 0, -9);
@endphp

<x-mail::message>
  # {{__('messages.admin.order.num')}}: #{{$order->order_number}}
  {{__('messages.mail.opener')}} {{$order->user->fname}} {{$order->user->addition}} {{$order->user->lname}},

  U heeft op {{$date}} een bestelling bij {{__('messages.artitex.title')}} geplaatst. <br>
  Deze is succesvol ontvangen. <br>
  Wij gaan zo spoedig mogelijk aan de slag <br>

  <table class="min-w-full border border-gray-300">
    <thead>
      <tr>
        <th class="py-2 px-4 border-b">Name</th>
        <th class="py-2 px-4 border-b">Quantity</th>
        <th class="py-2 px-4 border-b">Price</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orderDetails as $details)
      @php
      $total= $details->price + ($details->price * config('config.BTW'));
      $total = number_format($total, 2, '.');

      $btw = $details->price * config('config.BTW');
      $btw = number_format($btw, 2, '.');
      @endphp
      @foreach ($details->product->images as $images)
      <td class="py-2 px-4 border-b">
        <img src="{{asset($images->image)}}" alt="Product thumbnail">
      </td>
      @endforeach
      <tr>
        <td class="py-2 px-4 border-b">{{$details->name}}</td>
        <td class="py-2 px-4 border-b">{{$details->quantity}}</td>
        @if(!str_contains($details->price, '.'))
        @php $details->price = $details->price . ".00"; @endphp
        @endif
        <td class="py-2 px-4 border-b">€{{$details->price}}</td>
      </tr>
      @endforeach
      <tr>
        <td colspan="2">
          BTW
        </td>
        <td>
          €{{$btw}}
        </td>
      </tr>
      <tr>
        <td colspan="2">
          Totaal
        </td>
        <td>
          €{{$total}}
        </td>
      </tr>
    </tbody>
  </table>


  <!-- <x-mail::button :url="''">
    Button Text
  </x-mail::button> -->

  {{__('messages.mail.closer')}}<br>
  {{__('messages.artitex.title')}}
</x-mail::message>