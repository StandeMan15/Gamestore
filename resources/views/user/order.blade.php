<x-header />

<x-layout>
  <div class="flex justify-center">
    @if (count($orders) > 0)
    <table>
      <thead>
        <tr>
          <th>{{ __('messages.admin.status.title') }}</th>
          <th>{{ __('messages.admin.order.num') }}</th>
          <th>{{ __('messages.admin.index.actions') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)
        @php
        $ordernmr = $order->order_number;
        @endphp

        <tr>
          <td>{{ $order->status->title }}</td>
          <td>#{{ $order->order_number }}</td>
          @if ($order->status->id == 1)
          <td>
            <div class="m-2">
              <a href="{{ route('download.order', ['id' => $order->order_number]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                <i class="far fa-file-pdf" style="font-size: 24px;"></i>
              </a>
              </button>
            </div>
          </td>

          @else
          <td>
            <button class="m-2">
              <a href="{{ route('download.order', ['id' => $order->order_number]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                <i class="far fa-file-pdf" style="font-size: 24px;"></i>
              </a>
            </button>
          </td>
          @endif

        </tr>
        @endforeach
      </tbody>
    </table>


    @else
    <p>{{__('messages.order.empty')}}</p>
    @endif

  </div>
  <div class="flex justify-center">
    {{ $orders->links() }}
  </div>
</x-layout>