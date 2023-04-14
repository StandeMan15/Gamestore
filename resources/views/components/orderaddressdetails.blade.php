@php
$isReadonly = true;
@endphp

<div class="col-span-6">
    <h4 class="font-bold uppercase">
        Adresgegevens
    </h4>
    <form method="post" action={{route('storeShippingDetails')}}>
        @csrf
        <table>
            <tr>
                <td>
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="fname">Voornaam</label>
                </td>

                <td>
                    <x-user-edit type="text" name="fname" id="fname" value="{{$user->fname}}" :readonly="$isReadonly" />
                </td>

                <td>
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="lname">Achternaam</label>
                </td>

                <td>
                    <x-user-edit type="text" name="lname" id="lname" value="{{$user->lname}}" :readonly="$isReadonly" />
                </td>
            </tr>

            <tr>
                <td>
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
                </td>

                <td>
                    <x-user-edit type="email" name="email" id="email" value="{{$user->email}}" :readonly="$isReadonly" />
                </td>


            </tr>

            <tr>
                <td>
                    <label class=" static mb-2 uppercase font-bold text-xs text-gray-700" for="streetname">Straat</label>
                </td>

                <td>
                    @if (is_null($user->streetname))
                    <x-user-edit type="text" name="streetname" id="streetname" :readonly="$isReadonly" />
                    @else
                    <x-user-edit type="text" name="streetname" id="streetname" value="{{$user->streetname}}" :readonly="$isReadonly" />
                    @endif
                </td>

                <td>
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmr_extra">Toevoeging</label>
                </td>

                <td>
                    @if (is_null($user->zipcode))
                    <x-user-edit type="text" name="housenmr_extra" id="housenmr_extra" :readonly="$isReadonly" />
                    @else
                    <x-user-edit type="text" name="housenmr_extra" id="housenmr_extra" value="{{$user->housenmr_extra}}" :readonly="$isReadonly" />
                    @endif
                </td>
            </tr>

            <tr>
                <td>
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="postalcode">Postcode</label>
                </td>

                <td>
                    @if (is_null($user->postalcode))
                    <x-user-edit type="text" name="postalcode" id="postalcode" :readonly="$isReadonly" />
                    @else
                    <x-user-edit type="text" name="postalcode" id="postalcode" value="{{$user->postalcode}}" :readonly="$isReadonly" />
                    @endif
                </td>

                <td>
                    <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmradd">Toevoeging Huisnummer</label>
                </td>

                <td>
                    @if (is_null($user->postalcode_extra))
                    <x-user-edit type="text" name="housenmradd" id="housenmradd" :readonly="$isReadonly" />
                    @else
                    <x-user-edit type="text" name="housenmradd" id="housenmradd" value="{{$user->housenmradd}}" :readonly="$isReadonly" />
                    @endif
                </td>
            </tr>

            <tr>
                <td>
                    <div class="flex justify-content-end">
                        <input type="checkbox" id="checkbox1">
                    </div>
                </td>

                <td>
                    <label class=" static mb-2 uppercase font-bold text-xs text-gray-700" for="myCheckbox">
                        <a class="text-black no-underline hover:text-black" href='https://www.artitex.nl/juridisch/algemene-voorwaarden/' target="_blank" id="termsofservice" name="terms">
                            Ik ga akkoord met de algemene voorwaarden
                        </a>
                    </label>

                </td>
            </tr>

            <tr>
                <td>
                    <div class="form-group flex justify-content-end">
                        <input type="checkbox" id="checkbox3" name="agree" class="mr-2">
                    </div>
                </td>

                <td>
                    <label class=" static mb-2 uppercase font-bold text-xs text-gray-700" for="checkbox3">
                        Deze gegevens als factuurgegevens gebruiken
                    </label>

                </td>
            </tr>
            <tr>
                <td></td>

                <td>
                    <button type="submit" id="myButton1" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" disabled>
                        Door naar betalen
                    </button>
                </td>
            </tr>
        </table>
    </form>


</div>