@extends('layouts.app')

@section('title', $product->name)

@section('description', $product->description)

@section('keywords', $product->keywords)

@section('content')
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                        id="product-detail">
                </div>
                <div class="row">
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    <!--End Controls-->
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item pointer-event"
                        data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="https://technext.github.io/zay-shop/assets/img/product_single_01.jpg"
                                                alt="Product Image 1">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="https://technext.github.io/zay-shop/assets/img/product_single_02.jpg"
                                                alt="Product Image 2">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="https://technext.github.io/zay-shop/assets/img/product_single_03.jpg"
                                                alt="Product Image 3">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="https://technext.github.io/zay-shop/assets/img/product_single_04.jpg"
                                                alt="Product Image 4">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="https://technext.github.io/zay-shop/assets/img/product_single_05.jpg"
                                                alt="Product Image 5">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="https://technext.github.io/zay-shop/assets/img/product_single_06.jpg"
                                                alt="Product Image 6">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.Second slide-->

                            <!--Third slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="https://technext.github.io/zay-shop/assets/img/product_single_07.jpg"
                                                alt="Product Image 7">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="https://technext.github.io/zay-shop/assets/img/product_single_08.jpg"
                                                alt="Product Image 8">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid"
                                                src="https://technext.github.io/zay-shop/assets/img/product_single_09.jpg"
                                                alt="Product Image 9">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.Third slide-->
                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-dark fas fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h3 class="h2">{{ ucwords($product->name) }}</h3>
                        <div class="d-flex">
                            <h5 class="m-0">Condition:</h5>
                            <p class="text-muted m-0">{{ ucwords($product->condition) }}</p>
                        </div>
                        <div class="product-price">
                            <span class="text-danger text-decoration-line-through price-old">${{
                                number_format($product->compare_price, 2) }}</span>
                            <span class="price fw-bold ms-2">${{ number_format($product->unit_price, 2)
                                }}</span>
                        </div>

                        <h6 class="mt-4">Description:</h6>
                        <p>{{ $product->description }}</p>

                        <form action="" method="GET">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="row mb-3">
                                <div class="offset-md-6 col-6 col-md-3">
                                    <label for="quantity">Quantity: </label>
                                </div>
                                <div class="col-6 col-md-3">
                                    <input type="number" name="quanity" id="quantity" class="form-control" value="1"
                                        min="1">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary btn-lg"
                                    onclick="addToCart({{$product->id}}, this.form)">Add
                                    To Cart
                                    <span><i class="fas fa-shopping-cart"></i></span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function addToCart(productId, form) {
        var quantity = parseInt(form.querySelector('#quantity').value) || 1;
        
        try {
            var cart = JSON.parse(getCookie('cart'));
        } catch (error) {
            var cart = {};
        }

        if (cart[productId]) {
            cart[productId].quantity += quantity;
        } else {
            cart[productId] = {
                quantity: quantity,
            };
        }

        document.cookie = 'cart=' + JSON.stringify(cart) + ';path=/';

        var currentCount = parseInt(document.getElementById('cartCount').innerText);
        var newCount = currentCount + 1;
        document.getElementById('cartCount').innerText = newCount;

        alert('Item added to cart!');
    }

    function getCookie(name) {
        var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        if (match) return match[2];
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
@endsection