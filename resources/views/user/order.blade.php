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
          @if ($order->status->title == 'Afwachten')
          <td>
            <div class="m-2">
              <button class=" bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded pointer-events-auto cursor-not-allowed">
                <i class="far fa-file-pdf" style="font-size: 24px;"></i>
              </button>
            </div>
          </td>

          @else
          <td>
            <button class="m-2">
              <a href="{{ route('download.order', ['id' => $order->order_number]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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
</x-layout>