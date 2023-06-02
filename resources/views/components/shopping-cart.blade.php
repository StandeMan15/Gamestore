<x-header />

@php
$total = 0;

foreach((array) session('cart') as $id => $details) {
if ($details['discount_price'] != null) {
$details['price'] = $details['discount_price'];
}
$total += $details['price'] * $details['quantity'];
}

@endphp

<body>
	<div x-data="{ isOpen: sessionStorage.getItem('cartOpened') === 'true' }">
		<button @click="isOpen = !isOpen" id="showcart" class="w-24 py-3.5 bg-blue-500 text-white rounded-md hover:bg-blue-600">
			<i class="fa fa-shopping-cart" aria-hidden="true"></i>
			<span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
		</button>

		<div x-cloak x-show="isOpen">
			<div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
				<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

				<div class="fixed inset-0 overflow-hidden">
					<div class="absolute inset-0 overflow-hidden">
						<div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10" @click.away="sessionStorage.setItem('cartOpened', false); isOpen = false;">
							<div class="pointer-events-auto w-screen max-w-md">
								<div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
									<div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
										<div class="flex items-start justify-between">
											<h2 class="text-lg font-medium text-gray-900" id="slide-over-title">{{ __('messages.cart.title') }}</h2>
											<div class="ml-3 flex h-7 items-center">
												<button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500" @click="isOpen = false">
													<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
														<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
													</svg>
												</button>
											</div>
										</div>

										<div class="mt-8">
											<div class="flow-root">
												<ul role="list" class="-my-6 divide-y divide-gray-200" id="cart">
													@if(session('cart'))
													@foreach(session('cart') as $id => $details)
													@php
													if ($details['discount_price'] != null) {
													$details['price'] = $details['discount_price'];
													}
													@endphp

													<li class="flex py-6" data-id="{{ $id }}">

														<div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
															@if ($details['image'] == null)
															<img src="https://via.placeholder.com/400x300" alt="Product Thumbnail" width="80" height="80" class="h-full w-full object-cover object-center" />
															@else
															<img src="../{{$details['image']['image'] }}" alt="Product Thumbnail" width="80" height="80" class="h-full w-full object-cover object-center" />
															@endif

														</div>

														<div class="ml-4 flex flex-1 flex-col">
															<div>
																<div class="flex justify-between text-base font-medium text-gray-900">
																	<h3>
																		<p>{{ $details['name'] }}</p>
																	</h3>
																</div>
															</div>
															<div class="flex flex-1 items-end justify-between text-sm">
																<div>
																	<p class="text-gray-500" data-th="Quantity">{{ __('messages.admin.product.qty') }}:&nbsp;{{ $details['quantity'] }}</p>
																	<input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" min="0" />
																</div>
																<div>
																	@php
																	$product_total = $details['price'] * $details['quantity'];
																	$product_total = number_format($product_total, 2, '.');
																	@endphp

																	<p data-th="Price">€&nbsp;{{ $product_total}}</p>
																</div>
															</div>
															<div class="actions" data-th="">
																<button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
															</div>
														</div>
													</li>
													@endforeach
													@else
													<div>
														<img src="https://usagif.com/wp-content/uploads/upgifsok/tumbleweed-acegif-14.gif">
													</div>
													@endif
												</ul>
											</div>
										</div>
									</div>

									<div class="border-t border-gray-200 px-4 py-6 sm:px-6">
										<div class="flex justify-between text-base font-medium text-gray-900">
											@php
											$total = number_format($total, 2, '.');
											@endphp
											<p>{{ __('messages.admin.order.subtotal') }}</p>
											<p>€&nbsp;{{ $total }}</p>
										</div>
										<p class="mt-0.5 text-sm text-gray-500">{{ __('messages.admin.order.shipment_cost') }}</p>
										<div class="mt-6">
											@if (empty(session('cart')) || !auth()->check())
											<div class="checkoutBTN">
												<x-checkout-forbidden route="{{ route('orderdenied') }}" />
											</div>
											<div class="hide">You need to be logged in to order something.</div>
											@else
											<x-pay-button />
											@endif
										</div>
										<div class="mt-6 flex justify-center text-center text-sm text-gray-500">
											<p>
												{{ __('messages.index.or') }}
												<button type="button" class="font-medium text-indigo-600 hover:text-indigo-500" @click="isOpen = false">
													{{ __('messages.cart.continue') }}
													<span aria-hidden="true"> &rarr;</span>
												</button>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

<script type="text/javascript">
	$(".update-cart").change(function(e) {
		e.preventDefault();

		var ele = $(this);

		$.ajax({
			url: 'update-cart',
			method: "PATCH",
			data: {
				_token: '{{ csrf_token() }}',
				id: ele.parents("li").attr("data-id"),
				quantity: ele.parents("li").find(".quantity").val()
			},
			success: function(response) {
				sessionStorage.setItem('cartOpened', true);
				window.location.reload();
			}
		});
	});

	$(".remove-from-cart").click(function(e) {
		e.preventDefault();

		var ele = $(this);

		if (confirm("Are you sure want to remove?")) {
			$.ajax({
				url: 'remove-from-cart',
				method: 'DELETE',
				data: {
					_token: '{{ csrf_token() }}',
					id: ele.parents('li').attr('data-id')
				},
				success: function(response) {
					sessionStorage.setItem('cartOpened', true);
					window.location.reload();
				}
			});
		}
	});
</script>