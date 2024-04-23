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

                <div class="row w-100">
                    <div class="col-4">
                        <a onclick="updateMainImage('{{ asset($product->image) }}')" style="cursor: pointer">
                            <img class="card-img img-fluid p-1" src="{{ asset($product->image) }}"
                                alt="Main Product Image">
                        </a>
                    </div>
                    @foreach ($product->secondary_images as $attachment)
                    <div class="col-4">
                        <a onclick="updateMainImage('{{ asset($attachment->path) }}')" style="cursor: pointer">
                            <img class="card-img img-fluid p-1" src="{{ asset($attachment->path) }}"
                                alt="Product Image {{ $loop->index + 1 }}">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
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
                        <div class="container">{!! $product->description !!}</div>

                        <form action="" method="GET">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="row my-3">
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
    function updateMainImage(imageUrl) {
        document.getElementById('product-detail').src = imageUrl;
    }

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