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
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-white">Product</th>
                            <th scope="col" class="text-white">Price</th>
                            <th scope="col" class="text-white">Quantity</th>
                            <th scope="col" class="text-white">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="main">
                                    <div class="d-flex">
                                        <img src="images/cart-1.jpg" alt="">
                                    </div>
                                    <div class="des">
                                        <p>lorem ipsum</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h6>$20.00</h6>
                            </td>
                            <td>
                                <div class="counter">
                                    <input class="form-control" type="number" value="1" min="0">
                                </div>
                            </td>
                            <td>
                                <h6>$20.00</h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="main">
                                    <div class="d-flex">
                                        <img src="images/cart-1.jpg" alt="">
                                    </div>
                                    <div class="des">
                                        <p>lorem ipsum</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h6>$20.00</h6>
                            </td>
                            <td>
                                <div class="counter">
                                    <input class="form-control" type="number" value="1" min="0">
                                </div>
                            </td>
                            <td>
                                <h6>$20.00</h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="main">
                                    <div class="d-flex">
                                        <img src="images/cart-1.jpg" alt="">
                                    </div>
                                    <div class="des">
                                        <p>lorem ipsum</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h6>$20.00</h6>
                            </td>
                            <td>
                                <div class="counter">
                                    <input class="form-control" type="number" value="1" min="0">
                                </div>
                            </td>
                            <td>
                                <h6>$20.00</h6>
                            </td>
                        </tr>
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
                <span>$60.00</span>
            </li>
            <li class="cart-total">Total
                <span>$60.00</span>
            </li>
        </ul>
        <a href="{{ route('checkout') }}" class="proceed-btn">Proceed to Checkout</a>
    </div>
</div>

<script>
    function deleteCartItem(productId) {
        // Remove the cart item's HTML
        var cartItemElement = document.getElementById('cartItem' + productId);
        if (cartItemElement) {
            cartItemElement.remove();
        }

        try {
            var cart = JSON.parse(getCookie('cart'));

            // Remove the cart item from the cart object
            delete cart[productId];

            // Update the cart cookie with the new cart object
            document.cookie = 'cart=' + JSON.stringify(cart) + ';path=/';

            // Decrease cart count
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