@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">

<!---Hero Section-->
<section id="hero" style="background-image: url({{ asset('assets/images/checkout.png') }});">
    <div class="hero-container">
        <div class="hero-logo">
            <h1 class="font-weight-bold">Checkout</h1>
        </div>
    </div>
</section>
<!---End of Hero Section-->

<div class="container">
    <form action="{{ route('checkout.order') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 order-1 order-md-0">
                <h2 class="text-center text-primary my-5 text-uppercase">Order Informations</h2>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name *</label>
                        <input type="text" class="form-control space" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Please enter your name  . . ." required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone">Payment Method *</label>
                        <select name="payment_method" required id="payment_method" class="form-control">
                            <option value="cash on delivery" selected>Cash On Delivery</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="email">Email *</label>
                        <input type="email" class="form-control space" id="email" name="email"
                            value="{{ old('email') }}" placeholder="Please enter your email . . ." required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone">Phone Number *</label>
                        <input type="text" class="form-control space" id="phone" name="phone" value="{{ old('phone') }}"
                            placeholder="Please enter your phone number . . ." required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="city">City *</label>
                        <input type="text" class="form-control space" id="city" name="city" value="{{ old('city') }}"
                            placeholder="Please enter your city . . ." required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="address">Address *</label>
                        <input type="text" class="form-control space" id="address" name="address"
                            value="{{ old('address') }}" placeholder="Please enter your address . . ." required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Submit Order
                    <i class="fa fa-arrow-right"></i>
                </button>
            </div>
            <div class="col-md-6">
                <h2 class="text-center text-primary my-5 text-uppercase">Checkout</h2>
                <div class="p-4 card">
                    <ul class="list-group mb-3">
                        @foreach ($cart_items as $id => $quantity)
                        @php
                        $product = Helper::get_product($id);
                        @endphp

                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <span class="my-0">{{ ucwords($product->name)
                                    }}</span>
                            </div>
                            <span class="text-muted">{{
                                number_format($quantity['quantity']) }}pc(s)</span>
                            <span class="text-muted">${{
                                number_format($product->unit_price, 2) }}</span>
                        </li>
                        @endforeach
                        <hr>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Sub Total (USD)</span>
                            <span>
                                $<span id="subtotal">{{ number_format($subtotal, 2) }}</span>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <span class="my-0">Promo code</span>
                            <span id="promoValue">0.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Delivery (USD)</span>
                            <span>
                                $<span id="delivery">0.00</span>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <span>
                                $<span id="total">{{ number_format($total, 2) }}</span>
                            </span>
                        </li>
                    </ul>
                    <br>
                    <div class="d-flex">
                        <input type="text" class="form-control my-auto" placeholder="Promo code" name="promo" id="promo"
                            value="">
                        <a id="apply" class="btn btn-secondary btn-redeem text-white my-auto">Redeem</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function () {
        $('#apply').click(function () {
            const promoCode = $('#promo').val();
            
            $.ajax({
                method: 'POST',
                url: '{{ route("check_promo") }}',
                data: { promo: promoCode, _token: '{{ csrf_token() }}' },
                success: function (response) {
                    if (response.exists) {
                        let promoValue = response.value;
                        const subtotal = parseFloat($('#total').text().replace(/\$/g, '').replace(/,/g, ''));
                        const total = calculateNewTotal(subtotal, promoValue);

                        $('#promo').hide();
                        $('#apply').hide();
                        $('.promo-value').show();
                        $('#promoValue').text(promoValue.toString() + "%");
                        
                        $('#total').text(total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
                    } else {
                        alert('Invalid promo code.');
                    }
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });

        function calculateNewTotal(subtotal, promoValue) {
            const newTotal = subtotal - (subtotal * promoValue / 100);
            return newTotal; 
        }
    });
</script>

@endsection