@props(['product'])

<footer class="flex justify-between items-center mt-8">
    <div>
        <button onclick="addtocart()" class="bg-green-500 text-white rounded-xl p-2">
            Add to Cart
        </button>

    </div>
    <div>
        <a href="/{{ $product->category->slug }}/{{ $product->slug }}" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">
            Read More
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
        console.log(countItems);
        console.log(order);
    }
</script>