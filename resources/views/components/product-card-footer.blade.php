@props(['product'])

<footer class="flex justify-between items-center mt-8">
    <div>
<<<<<<< Updated upstream
        <a href="/{{ $product->category->slug }}/{{ $product->slug }}"
            class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">
            More Details
=======
        <button onclick="addtocart()" class="bg-green-500 text-white rounded-xl p-2" id='$product->id'>
            Add to Cart
        </button>

    </div>
    <div>
        <a href="/{{ $product->category->slug }}/{{ $product->slug }}" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">
            Read More
>>>>>>> Stashed changes
        </a>
    </div>

<<<<<<< Updated upstream
    <div>
        <button class="add-to-cart bg-gray-500 text-white rounded-xl p-2 fas fa-shopping-cart"> Add to cart</button>
    </div>
</footer>
=======
<script>
    $orderprice = 0;
    console.log("<?php echo "$product->title" ?>");

    function addtocart() {
        var products = [
            [
                'title', "<?php echo "$product->title" ?>",
                'price', "<?php echo "$product->discount_price" ?>"
            ],
        ];
// hang een ID aan de product item, dan pakt je JSON niet telkens de laatste beschikbare
        $orderprice += "<?php echo "$product->discount_price" ?>";
        var order = JSON.stringify(products);
        console.log(order);
    }
</script>
>>>>>>> Stashed changes
