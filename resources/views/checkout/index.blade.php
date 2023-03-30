@php
$total = 0;
$items = 0;
@endphp

<x-layout>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-7">
            <form method="post" action="">
                @csrf

                <div class="col-span-6 flex justify-around">
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="fname">Voornaam</label>

                    <input class="p-2 border border-gray-200" type="text" id="fname" name="fname">

                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="lname">Achternaam</label>

                    <input class="p-2 border border-gray-200" type="text" id="lname" name="lname">
                </div>

                <div class="col-span-6 flex justify-around">
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="compname">Bedrijfsnaam</label>

                    <input class="p-2 border border-gray-200" type="text" id="compname" name="compname">

                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>

                    <input class="p-2 border border-gray-200" type="email" id="email" name="email">
                </div>

                <div class="col-span-6 flex justify-around">
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="address">Straat</label>

                    <input class="p-2 border border-gray-200" type="text" id="address" name="address">

                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="zipcode">Postcode</label>

                    <input class="p-2 border border-gray-200" type="text" id="zipcode" name="zipcode">
                </div>

                <div class="col-span-6 flex justify-around">
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmr">Huisnummer</label>

                    <input class="p-2 border border-gray-200" type="text" id="housenmr" name="housenmr">

                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmradd">Toevoeging Huisnummer</label>

                    <input class="p-2 border border-gray-200" type="text" id="housenmradd" name="housenmradd">
                </div>

                <div class="col-span-3 flex justify-content-end">
                    <input class="p-2 border border-gray-200 checked:bg-blue-500" type="checkbox" id="housenmradd" name="housenmradd">
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmr">
                        <a class="text-black no-underline hover:text-black" href='https://www.artitex.nl/juridisch/algemene-voorwaarden/' target="_blank">
                            Ik ga akkoord met de algemene voorwaarden
                        </a>
                    </label>
                </div>

                <div class="col-span-3 flex justify-content-end">
                    <input class="p-2 border border-gray-200 checked:bg-blue-500" type="checkbox" id="housenmradd" name="housenmradd" checked>
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmr">
                        Deze gegevens als factuurgegevens gebruiken
                    </label>
                </div>
            </form>
        </div>

        <!-- <div class="col-span-5">
            <table class="table-auto">
                @foreach ($orders as $order)
                <tr>
                    @foreach ($users as $user)
                    @if (auth()->id() == $user->user_id)
                    <td>
                        {{$order->name}}
                    </td>

                    <td>
                        @php
                        $items += $order->quantity
                        @endphp
                        {{$order->quantity}}
                    </td>

                    <td>
                        @php
                        $total += $order->price;
                        @endphp
                        €{{$order->price}}
                    </td>
                    @break
                    @endif

                    @endforeach
                </tr>
                @endforeach
                <tr class="border-t-4 border-gray-800">
                    <td class="flex justify-content-end font-bold">
                        Totaal:
                    </td>
                    <td>
                        {{$items}}
                    </td>
                    <td>
                        €{{$total}}
                    </td>
                </tr>
            </table>
        </div> -->
    </div>

</x-layout>