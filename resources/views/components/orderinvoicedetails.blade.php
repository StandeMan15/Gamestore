        <div class="grid grid-cols-12 gap-4">
          <div class="col-span-7">
            <form>
              @if (!old('agree'))
              <div id="conditionalForm" style="display:block;">
                <form method="post" action={{route('storeShippingDetails')}}>
                  @csrf
                  <table>
                    <th class="font-bold uppercase">
                      Factuurgegevens
                    </th>
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
                        <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="postalcode">Postcode</label>
                      </td>

                      <td>
                        @if (is_null($user->company->zipcode))
                        <input class="p-2 border border-gray-200" type="text" id="postalcode" name="postalcode">
                        @else
                        <input class="p-2 border border-gray-200" type="text" id="postalcode" name="postalcode" value="{{$user->company->zipcode}}">
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
                        <div class="flex justify-content-end">
                          <input type="checkbox" id="checkbox2">
                        </div>
                      </td>

                      <td>
                        <label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="myCheckbox">
                          <a class="text-black no-underline hover:text-black" href='https://www.artitex.nl/juridisch/algemene-voorwaarden/' target="_blank" id="termsofservice" name="terms">
                            Ik ga akkoord met de algemene voorwaarden
                          </a>
                        </label>

                      </td>
                    </tr>
                    <tr>
                      <td>
                        <button type="submit" id="myButton2" disabled class="mt-4 px-4 py-2 bg-blue-500 text-white rounded disabled:opacity-50">
                          Door naar betalen
                        </button>
                      </td>

                    </tr>
                  </table>
                </form>
              </div>
              @endif
            </form>
          </div>
        </div>