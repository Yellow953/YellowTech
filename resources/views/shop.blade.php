@extends('layouts.app')

@section('title', 'Shop')

@section('description', "Enjoy Shopping in Yellow Tech's Hardware and Software shop. We offer a wide variety of hardware
and software solutions to suit your needs.")

@section('keywords', 'Yellow Tech, yellowtech, yellowtech dev, yellow tech lebanon, yellowtech lebanon, yellowtech shop,
yellowtech hardware shop, yellowtech software shop')

@section('content')

<div class="container-fluid my-4">
    <div class="row">
        <div class="col-12">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                    <li data-target="#carouselExampleControls" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active shop-banner"
                        style="background-image: url({{ asset('assets/images/shop_banner1.png') }})">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Offer 1 Heading</h5>
                            <p>Offer 1 Description</p>
                        </div>
                    </div>
                    <div class="carousel-item shop-banner"
                        style="background-image: url({{ asset('assets/images/shop_banner2.png') }})">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Offer 2 Heading</h5>
                            <p>Offer 2 Description</p>
                        </div>
                    </div>
                    <div class="carousel-item shop-banner"
                        style="background-image: url({{ asset('assets/images/shop_banner3.png') }})">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Offer 3 Heading</h5>
                            <p>Offer 3 Description</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container my-4">
    <div class="row">
        <div class="col-4">
            <div class="row">
                <div class="col-2 p-0 d-flex justify-content-center my-auto">
                    <i class="fa-solid fa-truck"></i>
                </div>
                <div class="col-lg-6 col-10 ml-1">
                    <h4>Free Delivery</h4>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-2 p-0 d-flex justify-content-center my-auto">
                    <i class="fa-solid fa-star"></i>
                </div>
                <div class="col-lg-6 col-10 ml-1">
                    <h4>Highest Quality</h4>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-2 p-0 d-flex justify-content-center my-auto">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="col-lg-6 col-10 ml-1">
                    <h4>Best Offers</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3 p-0">
            <h4 class="my-4 mx-2">Filter Products</h4>

            <div class="card mx-1">
                <div class="card-body bg-light">
                    <form action="{{ route('shop', $category->name) }}" method="get">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{request()->query('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="condition">Condition</label>
                            <select name="condition" id="condition" class="form-control">
                                <option value=""></option>
                                @foreach (Helper::get_conditions() as $condition)
                                <option value="{{ $condition }}" {{ request()->query('condition') == $condition ?
                                    'selected' : '' }}>{{ ucwords($condition) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price_range">Price Range</label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="number" name="price_min" id="price_min" class="form-control"
                                        placeholder="Min..." value="{{ request()->query('price_min') }}">
                                </div>
                                <div class="col-6">
                                    <input type="number" name="price_max" id="price_max" class="form-control"
                                        placeholder="Max..." value="{{ request()->query('price_max') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="reset" class="btn btn-secondary btn-block">reset</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary btn-block">apply</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <section class="py-2">
                <div class="container px-4 px-lg-5 mt-5">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                        @foreach ($products as $product)
                        <!-- Product card -->
                        <div class="col-md-4 mb-5">
                            <div class="card product-card h-100">
                                <!-- "Sale"/"new" badge -->
                                <div class="badge bg-danger text-white position-absolute mt-1 ms-1">Sale</div>
                                <!-- Product image -->
                                <img class="card-img-top" src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                <!-- Product details  p-4 -->
                                <div class="card-body text-center p-2">
                                    <!-- Product name -->
                                    <a href="#" class="h4 text-primary text-decoration-none">{{
                                        ucwords($product->name)
                                        }}</a>
                                    <!-- Product price -->
                                    <div class="product-price">
                                        <span class="text-danger text-decoration-line-through price-old">${{
                                            number_format($product->compare_price, 2) }}</span>
                                        <span class="price fw-bold ms-2">${{ number_format($product->unit_price, 2)
                                            }}</span>
                                    </div>
                                </div>
                                <!-- Product actions -->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-details mt-auto"
                                            href="{{ route('product', [$category->name, $product->name]) }}"
                                            role="button"><span class="bi bi-cart4"></span>Details
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        {{ $products->links() }}
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection