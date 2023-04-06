@php
$total = 0;
$items = 0;
$user = Auth::user();
//dd($user);
@endphp

<x-layout>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-7">
            <h4 class="font-bold uppercase">
                Adresgegevens
            </h4>
            <form method="post" action="">
                @csrf
                <table>
                    <tr>
                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="fname">Voornaam</label>
                        </td>

                        <td>
                            <input class="p-2 border border-gray-200" type="text" id="fname" name="fname" value="{{$user->fname}}">
                        </td>

                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="lname">Achternaam</label>
                        </td>

                        <td>
                            <input class="p-2 border border-gray-200" type="text" id="lname" name="lname" value="{{$user->lname}}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class=" static mb-2 uppercase font-bold text-xs text-gray-700" for="compname">Bedrijfsnaam</label>
                        </td>

                        <td>
                            @if (is_null($user->compname))
                            <input class="p-2 border border-gray-200" type="text" id="compname" name="compname">
                            @else
                            <input class="p-2 border border-gray-200" type="text" id="compname" name="compname" value="{{$user->compname}}">
                            @endif
                        </td>

                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
                        </td>

                        <td>
                            <input class="p-2 border border-gray-200" type="email" id="email" name="email" value="{{$user->email}}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class=" static mb-2 uppercase font-bold text-xs text-gray-700" for="address">Straat</label>
                        </td>

                        <td>
                            @if (is_null($user->street))
                            <input class="p-2 border border-gray-200" type="text" id="address" name="address">
                            @else
                            <input class="p-2 border border-gray-200" type="text" id="address" name="address" value="{{$user->street}}">
                            @endif
                        </td>

                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="zipcode">Postcode</label>
                        </td>

                        <td>
                            @if (is_null($user->zipcode))
                            <input class="p-2 border border-gray-200" type="text" id="zipcode" name="zipcode">
                            @else
                            <input class="p-2 border border-gray-200" type="text" id="zipcode" name="zipcode" value="{{$user->zipcode}}">
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmr">Huisnummer</label>
                        </td>

                        <td>
                            @if (is_null($user->housenmr))
                            <input class="p-2 border border-gray-200" type="text" id="housenmr" name="housenmr">
                            @else
                            <input class="p-2 border border-gray-200" type="text" id="housenmr" name="housenmr" value="{{$user->housenmr}}">
                            @endif
                        </td>

                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmradd">Toevoeging Huisnummer</label>
                        </td>

                        <td>
                            @if (is_null($user->housenmradd))
                            <input class="p-2 border border-gray-200" type="text" id="housenmradd" name="housenmradd">
                            @else
                            <input class="p-2 border border-gray-200" type="text" id="housenmradd" name="housenmradd" value="{{$user->housenmradd}}">
                            @endif
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