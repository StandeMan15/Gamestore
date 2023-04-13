        <div class="col-span-7">
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
                            <input class="p-2 border border-gray-200 bg-gray-200" type="text" id="fname" name="fname" value="{{$user->fname}}" readonly>
                        </td>

                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="lname">Achternaam</label>
                        </td>

                        <td>
                            <input class="p-2 border border-gray-200 bg-gray-200" type="text" id="lname" name="lname" value="{{$user->lname}}" readonly>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
                        </td>

                        <td>
                            <input class="p-2 border border-gray-200 bg-gray-200 bg-gray-200" type="email" id="email" name="email" value="{{$user->email}}" readonly>
                        </td>


                    </tr>

                    <tr>
                        <td>
                            <label class=" static mb-2 uppercase font-bold text-xs text-gray-700" for="streetname">Straat</label>
                        </td>

                        <td>
                            @if (is_null($user->company->streetname))
                            <input class="p-2 border border-gray-200 bg-gray-200" type="text" id="streetname" name="streetname" readonly>
                            @else
                            <input class="p-2 border border-gray-200 bg-gray-200" type="text" id="streetname" name="streetname" value="{{$user->company->streetname}}" readonly>
                            @endif
                        </td>

                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="postalcode">Postcode</label>
                        </td>

                        <td>
                            @if (is_null($user->company->zipcode))
                            <input class="p-2 border border-gray-200 bg-gray-200" type="text" id="postalcode" name="postalcode" readonly>
                            @else
                            <input class="p-2 border border-gray-200 bg-gray-200" type="text" id="postalcode" name="postalcode" value="{{$user->company->zipcode}}" readonly>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmr">Huisnummer</label>
                        </td>

                        <td>
                            @if (is_null($user->company->postalcode))
                            <input class="p-2 border border-gray-200 bg-gray-200" type="text" id="housenmr" name="housenmr" readonly>
                            @else
                            <input class="p-2 border border-gray-200 bg-gray-200" type="text" id="housenmr" name="housenmr" value="{{$user->company->postalcode}}" readonly>
                            @endif
                        </td>

                        <td>
                            <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmradd">Toevoeging Huisnummer</label>
                        </td>

                        <td>
                            @if (is_null($user->company->postalcode_extra))
                            <input class="p-2 border border-gray-200 bg-gray-200" type="text" id="housenmradd" name="housenmradd" readonly>
                            @else
                            <input class="p-2 border border-gray-200 bg-gray-200" type="text" id="housenmradd" name="housenmradd" value="{{$user->company->postalcode_extra}}" readonly>
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