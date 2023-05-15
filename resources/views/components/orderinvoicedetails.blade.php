 @php
 $isReadonly = true;
 @endphp
 <div class="grid grid-cols-12 gap-4">
 	<div class="col-span-7">
 		@if (!old('agree'))
 		<div id="conditionalForm" style="display:block;">
 			<form method="POST" action="{{ route('storeShippingDetails', $orderid) }}">
 				@csrf
 				<table>
 					<th class="font-bold uppercase">
 						{{ __('messages.index.bil_title') }}
 					</th>
 					<tr>
 						<td>
 							<x-form-label for="order_number">{{ __('messages.admin.order.num') }}</x-form-label>
 						</td>

 						<td>
 							<x-user-edit type="text" name="order_numer" id="order_numer" value="{{$orderid}}" :readonly="$isReadonly" />
 						</td>
 					</tr>
 					<tr>
 						<td>
 							<x-form-label for="fname">{{ __('messages.form.fname') }}</x-form-label>
 						</td>

 						<td>
 							<x-user-edit type="text" name="fname" id="fname" />
 						</td>

 						<td>
 							<x-form-label for="lname">{{ __('messages.form.lname') }}</x-form-label>
 						</td>

 						<td>
 							<x-user-edit type="text" name="lname" id="lname" />
 						</td>
 					</tr>

 					<tr>

 						<td>
 							<x-form-label for="compname">{{ __('messages.form.comp_name') }}</x-form-label>
 						</td>

 						<td>
 							<x-user-edit type="text" name="compname" id="compname" />
 						</td>
 						<td>
 							<x-form-label for="email">{{ __('messages.form.email') }}</x-form-label>
 						</td>

 						<td>
 							<x-user-edit type="email" name="email" id="email" />
 						</td>


 					</tr>

 					<tr>
 						<td>
 							<x-form-label for="address">{{ __('messages.form.streetname') }}</x-form-label>
 						</td>

 						<td>
 							<x-user-edit type="text" name="streetname" id="streetname" />
 						</td>

 						<td>
 							<x-form-label for="postalcode">{{ __('messages.form.postalcode') }}</x-form-label>
 						</td>

 						<td>
 							<x-user-edit type="text" name="postalcode" id="postalcode" />
 						</td>
 					</tr>

 					<tr>
 						<td>
 							<x-form-label for="housnmr">{{ __('messages.form.housenmr') }}</x-form-label>
 						</td>

 						<td>
 							<x-user-edit type="text" name="housenmr" id="housenmr" />
 						</td>

 						<td>
 							<x-form-label for="housenmradd">{{ __('messages.form.housenmr_ex') }}</x-form-label>
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
 									{{ __('messages.index.privacy') }}
 								</a>
 							</label>

 						</td>
 					</tr>
 					<tr>
 						<td>
 							<button type="submit" id="myButton2" disabled class="mt-4 px-4 py-2 bg-blue-500 text-white rounded disabled:opacity-50">
 								{{ __('messages.checkout.shipment_mthd') }}
 							</button>
 						</td>

 					</tr>
 				</table>
 			</form>
 		</div>
 		@endif
 	</div>
 </div>