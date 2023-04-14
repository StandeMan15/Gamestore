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
        								<x-user-edit type="text" name="fname" id="fname" />
        							</td>

        							<td>
        								<label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="lname">Achternaam</label>
        							</td>

        							<td>
        								<x-user-edit type="text" name="lname" id="lname" />
        							</td>
        						</tr>

        						<tr>

        							<td>
        								<label class=" static mb-2 uppercase font-bold text-xs text-gray-700" for="compname">Bedrijfsnaam</label>
        							</td>

        							<td>
        								<x-user-edit type="text" name="compname" id="compname" />
        							</td>
        							<td>
        								<label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="email">Email</label>
        							</td>

        							<td>
        								<x-user-edit type="email" name="email" id="email" />
        							</td>


        						</tr>

        						<tr>
        							<td>
        								<label class=" static mb-2 uppercase font-bold text-xs text-gray-700" for="address">Straat</label>
        							</td>

        							<td>
        								<x-user-edit type="text" name="streetname" id="streetname" />
        							</td>

        							<td>
        								<label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="postalcode">Postcode</label>
        							</td>

        							<td>
        								<x-user-edit type="text" name="postalcode" id="postalcode" />
        							</td>
        						</tr>

        						<tr>
        							<td>
        								<label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmr">Huisnummer</label>
        							</td>

        							<td>
        								<x-user-edit type="text" name="housenmr" id="housenmr" />
        							</td>

        							<td>
        								<label class="static mb-2 uppercase font-bold text-xs text-gray-700" for="housenmradd">Toevoeging Huisnummer</label>
        							</td>

        							<td>
        								<x-user-edit type="text" name="fname" id="fname" />
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