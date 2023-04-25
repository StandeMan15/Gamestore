 @php
 $isReadonly = true;
 @endphp
 <div class="grid grid-cols-12 gap-4">
 	<div class="col-span-7">
 			@if (!old('agree'))
 			<div id="conditionalForm" style="display:block;">
 				<form method="POST" action="{{ route('storeShippingDetails', $user->id) }}">
 					@csrf
 					<table>
 						<th class="font-bold uppercase">
 							Factuurgegevens
 						</th>
 						<tr>
 							<td>
 								<x-form-label for="order_number">Bestelnummer</x-form-label>
 							</td>

 							<td>
 								<x-user-edit type="text" name="order_numer" id="order_numer" value="{{$orderid}}" :readonly="$isReadonly" />
 							</td>
 						</tr>
 						<tr>
 							<td>
 								<x-form-label for="fname">Voornaam</x-form-label>
 							</td>

 							<td>
 								<x-user-edit type="text" name="fname" id="fname" />
 							</td>

 							<td>
 								<x-form-label for="lname">Achternaam</x-form-label>
 							</td>

 							<td>
 								<x-user-edit type="text" name="lname" id="lname" />
 							</td>
 						</tr>

 						<tr>

 							<td>
 								<x-form-label for="compname">Bedrijfsnaam</x-form-label>
 							</td>

 							<td>
 								<x-user-edit type="text" name="compname" id="compname" />
 							</td>
 							<td>
 								<x-form-label for="email">Email</x-form-label>
 							</td>

 							<td>
 								<x-user-edit type="email" name="email" id="email" />
 							</td>


 						</tr>

 						<tr>
 							<td>
 								<x-form-label for="address">Straat</x-form-label>
 							</td>

 							<td>
 								<x-user-edit type="text" name="streetname" id="streetname" />
 							</td>

 							<td>
 								<x-form-label for="postalcode">Postcode</x-form-label>
 							</td>

 							<td>
 								<x-user-edit type="text" name="postalcode" id="postalcode" />
 							</td>
 						</tr>

 						<tr>
 							<td>
 								<x-form-label for="housnmr">Huisnummer</x-form-label>
 							</td>

 							<td>
 								<x-user-edit type="text" name="housenmr" id="housenmr" />
 							</td>

 							<td>
 								<x-form-label for="housenmradd">Toevoeging Huisnummer</x-form-label>
 							</td>

 							<td>
 								<x-user-edit type="text" name="housenmradd" id="housenmradd" />
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
 									Zie bezorgopties
 								</button>
 							</td>

 						</tr>
 					</table>
 				</form>
 			</div>
 			@endif
 	</div>
 </div>