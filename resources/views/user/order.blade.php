<x-header />

<x-layout>
  <div class="flex justify-center">
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
          <td>{{ $order->order_number }}</td>
          <td>
            <button class="m-2">
              <a href="{{ route('download.order', ['id' => $order->order_number]) }}" class="hover:no-underline bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="far fa-file-pdf" style="font-size: 24px;"></i>
              </a>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</x-layout>