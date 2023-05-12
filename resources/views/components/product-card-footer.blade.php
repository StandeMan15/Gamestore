@props(['product'])
@props(['available'])

<footer {{ $attributes }} class="flex justify-between items-center mt-16">
    <div class="relative bottom-0">
        <a href="{{ route('addtocart', $product->id) }}" class="bg-green-400 rounded-xl text-white p-2 btn-block text-center" role="button">{{ __('messages.cart.add') }}</a>
    </div>
    <div class="relative bottom-0">
        <a href="/{{ $product->category->slug }}/{{ $product->slug }}" class="transition-colors duration-300 text-black text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">
            {{ __('messages.index.read_mr') }}
        </a>
    </div>
</footer>

<script>
    $orderprice = 0;

    function addtocart() {
        var products = [

            'title': "<?php echo "$product->title" ?>",
            'price': "<?php echo "$product->discount_price" ?>"

        ];
        $orderprice += "<?php echo "$product->discount_price" ?>";
        JSON.stringify(item);
        order.push(item);

        let countItems = order.length;
    }
</script>