@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">

<!---Hero Section-->
<section id="hero" style="background-image: url({{ asset('assets/images/cart.png') }})">
    <div class="hero-container">
        <div class="hero-logo">
            <h1 class="font-weight-bold">Cart Products</h1>
        </div>
    </div>
</section>
<!---End of Hero Section-->

<!--Cart Section-->
<section class="mt-5">
    <div class="container">
        <div class="cart">
            @include('admin.layouts._flash')

            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark text-white">
                        <tr>
                            <th class="col-4">Product</th>
                            <th class="col-2">Price</th>
                            <th class="col-2">Quantity</th>
                            <th class="col-2">Total</th>
                            <th class="col-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cart_items as $productID => $cart_item)
                        <tr class="cartItem" id="cartItem{{ $productID }}">
                            @php
                            $product = Helper::get_product($productID);
                            @endphp

                            <td class="col-4 p-0">
                                <div class="row">
                                    <div class="col-6">
                                        <img class="w-100 cart_image rounded" src="{{ asset($product->image) }}"
                                            alt="Image">
                                    </div>
                                    <div class="col-6 my-auto">
                                        {{ ucwords($product->name) }}
                                    </div>
                                </div>
                            </td>
                            <td class="col-2 pt-4">$<span id="cartItem{{ $productID }}Price">{{
                                    number_format($product->unit_price, 2) }}</span></td>
                            <td class="col-2 pt-4">
                                {{ $cart_item['quantity'] }}
                            </td>
                            <td class="col-2 pt-4">${{ number_format($product->unit_price *
                                $cart_item['quantity'], 2)
                                }}
                            </td>
                            <td class="col-2 pt-4">
                                <a href="#" class="btn btn-danger text-dark px-2"
                                    onclick="deleteCartItem({{ $productID }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z">
                                        </path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No Items In Cart Yet...</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="col-lg-4 offset-lg-4">
    <div class="checkout">
        <ul>
            <li class="subtotal">subtotal
                <span>$0.00</span>
            </li>
            <li class="delivery">delivery
                <span>$0.00</span>
            </li>
            <li class="cart-total">Total
                <span>$0.00</span>
            </li>
        </ul>
        <a href="{{ route('checkout') }}" class="proceed-btn">Proceed to Checkout</a>
    </div>
</div>

<script>
    function calculateTotals() {
        var subtotal = 0;

        var rows = document.querySelectorAll('.cartItem');
        rows.forEach(function(row) {
            var price = parseFloat(row.querySelector('.col-2:nth-child(2)').innerText.replace('$', ''));
            var quantity = parseInt(row.querySelector('.col-2:nth-child(3)').innerText);
            var total = price * quantity;
            
            row.querySelector('.col-2:nth-child(4)').innerText = '$' + total.toFixed(2);

            subtotal += total;
        });

        var subtotalElement = document.querySelector('.subtotal span');
        var totalElement = document.querySelector('.cart-total span');
        subtotalElement.innerText = '$' + subtotal.toFixed(2);
        totalElement.innerText = '$' + subtotal.toFixed(2);
    }

    window.addEventListener('load', function() {
        calculateTotals();
    });

    function updateTotals() {
        calculateTotals();
    }

    function deleteCartItem(productId) {
        var cartItemElement = document.getElementById('cartItem' + productId);
        if (cartItemElement) {
            cartItemElement.remove();
            calculateTotals(); 
        }

        try {
            var cart = JSON.parse(getCookie('cart'));

            delete cart[productId];

            document.cookie = 'cart=' + JSON.stringify(cart) + ';path=/';

            var currentCount = parseInt(document.getElementById('cartCount').innerText);
            if (currentCount > 0) {
                var newCount = currentCount - 1;
                document.getElementById('cartCount').innerText = newCount;
            }

            alert('Item removed from cart!');
        } catch (error) {
            console.log('Error deleting cart item' + error);
        }
    }

    function getCookie(name) {
        var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        if (match) return match[2];
    }

</script>

@endsection