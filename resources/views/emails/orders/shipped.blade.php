@php $date = substr($order->created_at, 0, -9); @endphp
<x-mail::message>
  # {{__('messages.admin.order.num')}}: #{{$order->order_number}}
  {{__('messages.mail.opener')}} {{$order->user->fname}} {{$order->user->addition}} {{$order->user->lname}},

  U heeft op {{$date}} een bestelling bij {{__('messages.artitex.title')}} geplaatst.
  Deze is succesvol ontvangen.
  Wij gaan zo spoedig mogelijk aan de slag
  <!-- <x-mail::button :url="''">
    Button Text
  </x-mail::button> -->

  {{__('messages.mail.closer')}}<br>
  {{__('messages.artitex.title')}}
</x-mail::message>