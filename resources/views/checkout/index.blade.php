@php
$total = 0;
$items = 0;
$user = Auth::user();
//dd($user->company);
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
                            @if (is_null($user->company->streetname))
                            <input class="p-2 border border-gray-200" type="text" id="address" name="address">
                            @else
                            <input class="p-2 border border-gray-200" type="text" id="address" name="address" value="{{$user->company->streetname}}">
                            @endif
                        </td>

                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="zipcode">Postcode</label>
                        </td>

                        <td>
                            @if (is_null($user->company->zipcode))
                            <input class="p-2 border border-gray-200" type="text" id="zipcode" name="zipcode">
                            @else
                            <input class="p-2 border border-gray-200" type="text" id="zipcode" name="zipcode" value="{{$user->company->zipcode}}">
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmr">Huisnummer</label>
                        </td>

                        <td>
                            @if (is_null($user->company->postalcode))
                            <input class="p-2 border border-gray-200" type="text" id="housenmr" name="housenmr">
                            @else
                            <input class="p-2 border border-gray-200" type="text" id="housenmr" name="housenmr" value="{{$user->company->postalcode}}">
                            @endif
                        </td>

                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmradd">Toevoeging Huisnummer</label>
                        </td>

                        <td>
                            @if (is_null($user->company->postalcode_extra))
                            <input class="p-2 border border-gray-200" type="text" id="housenmradd" name="housenmradd">
                            @else
                            <input class="p-2 border border-gray-200" type="text" id="housenmradd" name="housenmradd" value="{{$user->company->postalcode_extra}}">
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="col-span-3 flex justify-content-end">
                                <input class="p-2 border border-gray-200 checked:bg-blue-500" type="checkbox" id="termsbox" name="terms" onclick="checkBox()">
                            </div>
                        </td>

                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="terms">
                                <a class="text-black no-underline hover:text-black" href='https://www.artitex.nl/juridisch/algemene-voorwaarden/' target="_blank" id="termsofservice" name="terms">
                                    Ik ga akkoord met de algemene voorwaarden
                                </a>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="col-span-3 flex justify-content-end">
                                <input class="p-2 border border-gray-200 checked:bg-blue-500" type="checkbox" id="shippinginfo" name="housenmradd" checked>
                            </div>
                        </td>

                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmr">
                                Deze gegevens als factuurgegevens gebruiken
                            </label>
                        </td>

                        <td>
                            <a href={{route('mollie.payment')}} id="terms" style="pointer-events: none">
                                <button class="p-2">Door naar betalen</button>
                            </a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-7">
                <h4 class="font-bold uppercase">
                    Factuurgegevens
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
                                @if (is_null($user->company->name))
                                <input class="p-2 border border-gray-200" type="text" id="compname" name="compname">
                                @else
                                <input class="p-2 border border-gray-200" type="text" id="compname" name="compname" value="{{$user->company->name}}">
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
                                @if (is_null($user->company->streetname))
                                <input class="p-2 border border-gray-200" type="text" id="address" name="address">
                                @else
                                <input class="p-2 border border-gray-200" type="text" id="address" name="address" value="{{$user->company->streetname}}">
                                @endif
                            </td>

                            <td>
                                <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="zipcode">Postcode</label>
                            </td>

                            <td>
                                @if (is_null($user->company->zipcode))
                                <input class="p-2 border border-gray-200" type="text" id="zipcode" name="zipcode">
                                @else
                                <input class="p-2 border border-gray-200" type="text" id="zipcode" name="zipcode" value="{{$user->company->zipcode}}">
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmr">Huisnummer</label>
                            </td>

                            <td>
                                @if (is_null($user->company->postalcode))
                                <input class="p-2 border border-gray-200" type="text" id="housenmr" name="housenmr">
                                @else
                                <input class="p-2 border border-gray-200" type="text" id="housenmr" name="housenmr" value="{{$user->company->postalcode}}">
                                @endif
                            </td>

                            <td>
                                <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmradd">Toevoeging Huisnummer</label>
                            </td>

                            <td>
                                @if (is_null($user->company->postalcode_extra))
                                <input class="p-2 border border-gray-200" type="text" id="housenmradd" name="housenmradd">
                                @else
                                <input class="p-2 border border-gray-200" type="text" id="housenmradd" name="housenmradd" value="{{$user->company->postalcode_extra}}">
                                @endif
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
</x-layout>

<script>
    function checkBox() {
        var checkBox = document.getElementById("termsbox");
        var terms = document.getElementById("terms");
        if (checkBox.checked == true) {
            terms.style.pointerEvents = "auto";
            terms.style.backgroundColor = "green";
            terms.style.color = "white";
        } else {
            terms.style.pointerEvents = "none";
            terms.style.backgroundColor = "white";
            terms.style.color = "black";
            terms.style.padding = "0.3rem";
            terms.style.border = "solid";
        }
    }
</script>