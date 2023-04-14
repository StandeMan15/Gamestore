@php
$isReadonly = true;
@endphp

<div class="col-span-6">
    <h4 class="font-bold uppercase">
        Bestelgegevens
    </h4>
    <form action="{{ route('storeShippingDetails', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>
                    <x-form-label for="order_number">Bestelnummer</x-form-label>
                </td>

                <td>
                    <x-user-edit type="text" name="order_number" id="order_number" value="{{$orderid}}" :readonly="$isReadonly" />
                </td>
            </tr>
            <tr>
                <td>
                    <x-form-label for="fname">Voornaam</x-form-label>
                </td>

                <td>
                    <x-user-edit type="text" name="fname" id="fname" value="{{$user->fname}}" :readonly="$isReadonly" />
                </td>

                <td>
                    <x-form-label for="lname">Achternaam</x-form-label>
                </td>

                <td>
                    <x-user-edit type="text" name="lname" id="lname" value="{{$user->lname}}" :readonly="$isReadonly" />
                </td>
            </tr>

            <tr>
                <td>
                    <x-form-label for="email">Email</x-form-label>
                </td>

                <td>
                    <x-user-edit type="email" name="email" id="email" value="{{$user->email}}" :readonly="$isReadonly" />
                </td>


            </tr>

            <tr>
                <td>
                    <x-form-label for="housenmr">Huisnummer</x-form-label>
                </td>

                <td>
                    @if (!is_null($user->housnmr))
                    <x-user-edit type="text" name="housenmr" id="housenmr" :readonly="$isReadonly" />
                    @else
                    <x-user-edit type="text" name="housenmr" id="housenmr" value="{{$user->housenmr}}" :readonly="$isReadonly" />
                    @endif
                </td>

                <td>
                    <x-form-label for="housenmradd">Toevoeging Huisnummer</x-form-label>
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
                    <x-form-label for="postalcode">Postcode</x-form-label>
                </td>

                <td>
                    @if (is_null($user->postalcode))
                    <x-user-edit type="text" name="postalcode" id="postalcode" :readonly="$isReadonly" />
                    @else
                    <x-user-edit type="text" name="postalcode" id="postalcode" value="{{$user->postalcode}}" :readonly="$isReadonly" />
                    @endif
                </td>

                <td>
                    <x-form-label for="streetname">Straat</x-form-label>
                </td>

                <td>
                    @if (is_null($user->streetname))
                    <x-user-edit type="text" name="streetname" id="streetname" :readonly="$isReadonly" />
                    @else
                    <x-user-edit type="text" name="streetname" id="streetname" value="{{$user->streetname}}" :readonly="$isReadonly" />
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