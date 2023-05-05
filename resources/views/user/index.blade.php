@php
//dd(auth()->user())
@endphp
<x-header />

<x-layout>

	<body class="bg-gray-100">
		<div class="flex justify-center items-center h-96 bg-gray-100">
			<div class="w-full max-w-md bg-white p-8 rounded shadow-md">
				<a href="{{route('edituser')}}" class="hover:no-underline hover:text-black visited:text-black text-black">
					<table class="w-full">
						<th>
							<h1 class="text-2xl font-semibold mb-6">{{ __('messages.nav.profile') }}</h1>
						</th>
						<th><i class="fas fa-edit fa-lg text-yellow-500"></i></th>
						<tr>
							@if (!isset(auth()->user()->addition))
							<td>
								{{ auth()->user()->fname }}
								{{ auth()->user()->lname }}
							</td>
							@else
							<td>
								{{ auth()->user()->fname }}
								{{ auth()->user()->addition }}
								{{ auth()->user()->lname }}
							</td>
							@endif

						</tr>
						<tr>
							<td>
								{{ auth()->user()->streetname }}
								{{ auth()->user()->housenmr }}
								@if (isset(auth()->user()->housenmr_extra))
								{{ auth()->user()->housenmr_extra }}
								@endif
							</td>
						</tr>
						<tr>
							<td>
								{{ auth()->user()->postalcode }}
							</td>
						</tr>
						<tr>
							<td>
								{{ __('messages.user.user_id') }}:
							</td>
							<td class="text-left">
								{{ auth()->user()->id }}
							</td>
						</tr>
						<tr>
							<td>‎</td>
						</tr>
						<tr>
							<td>
								{{ auth()->user()->email }}
							</td>
						</tr>
					</table>
				</a>
			</div>
		</div>
	</body>

</x-layout>