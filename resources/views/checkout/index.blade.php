@php
$total = 0;
$items = 0;
@endphp

<x-layout>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-7">
            <form method="post" action="">
                @csrf
                <table>
                    <tr>
                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="fname">Voornaam</label>
                        </td>

                        <td>
                            <input class="p-2 border border-gray-200" type="text" id="fname" name="fname">
                        </td>

                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="lname">Achternaam</label>
                        </td>

                        <td>
                            <input class="p-2 border border-gray-200" type="text" id="lname" name="lname">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="compname">Bedrijfsnaam</label>
                        </td>

                        <td>
                            <input class="p-2 border border-gray-200" type="text" id="compname" name="compname">
                        </td>

                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
                        </td>

                        <td>
                            <input class="p-2 border border-gray-200" type="email" id="email" name="email">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="address">Straat</label>
                        </td>

                        <td>
                            <input class="p-2 border border-gray-200" type="text" id="address" name="address">
                        </td>

                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="zipcode">Postcode</label>
                        </td>

                        <td>
                            <input class="p-2 border border-gray-200" type="text" id="zipcode" name="zipcode">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmr">Huisnummer</label>
                        </td>

                        <td>
                            <input class="p-2 border border-gray-200" type="text" id="housenmr" name="housenmr">
                        </td>

                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmradd">Toevoeging Huisnummer</label>
                        </td>

                        <td>
                            <input class="p-2 border border-gray-200" type="text" id="housenmradd" name="housenmradd">
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="col-span-3 flex justify-content-end">
                                <input class="p-2 border border-gray-200 checked:bg-blue-500" type="checkbox" id="housenmradd" name="housenmradd">
                            </div>
                        </td>

                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmr">
                                <a class="text-black no-underline hover:text-black" href='https://www.artitex.nl/juridisch/algemene-voorwaarden/' target="_blank">
                                    Ik ga akkoord met de algemene voorwaarden
                                </a>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="col-span-3 flex justify-content-end">
                                <input class="p-2 border border-gray-200 checked:bg-blue-500" type="checkbox" id="housenmradd" name="housenmradd" checked>
                            </div>
                        </td>

                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmr">
                                Deze gegevens als factuurgegevens gebruiken
                            </label>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <a href={{route('mollie.payment')}}><button class="btn btn-success">Door naar betalen</button></a>
    </div>

</x-layout>