<x-layout>
    <?php //dd($orderdetails)
    ?>
    <form method="POST" action="{{route('updateOrdersAdmin', $order_number)}}">
        @csrf

        <div class="grid grid-cols-12 gap-4">
            @if (isset($statuses))
            <select class="p-2 border border-gray-200" type="text" name="status_id" id="status_id" onchange="this.form.submit()">
                @foreach ($statuses as $status)
                @if ($status->id == $order->status->id)
                <option id="{{$status->id}}" value="{{$status->id}}" name="{{$status->id}}" selected>{{$status->title}}</option>
                @elseif ($status->id != $order->status->id)
                <option id="{{$status->id}}" value="{{$status->id}}" name="{{$status->id}}">{{$status->title}}</option>
                @endif
                @endforeach
            </select>
            @endif

            <div class="col-span-4">
                <div>
                    Producten:&nbsp;
                    <ul>
                    @foreach ($orderdetails as $details)
                        <li>{{$details->name}}</li>
                    @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-span-2">
                @error('name')
                <p class="text-red-500 text-xs mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div>


        </div>

        <!-- <div class="grid grid-cols-12 gap-4">
            <button class="col-start-7 col-span-1 bg-green-500 text-white rounded-xl" type="submit">Submit</button>
        </div> -->
    </form>
</x-layout>