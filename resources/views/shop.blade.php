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
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="https://via.placeholder.com/1920x500" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Offer 1 Heading</h5>
                            <p>Offer 1 Description</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://via.placeholder.com/1920x500" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Offer 2 Heading</h5>
                            <p>Offer 2 Description</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="https://via.placeholder.com/1920x500" alt="Third slide">
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
                <div class="col-2"><img class="rounded-circle" alt="Free Shipping"
                        src="https://via.placeholder.com/40x40"></div>
                <div class="col-lg-6 col-10 ml-1">
                    <h4>Free Shipping</h4>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-2"><img class="rounded-circle" alt="Free Shipping"
                        src="https://via.placeholder.com/40x40"></div>
                <div class="col-lg-6 col-10 ml-1">
                    <h4>Free Returns</h4>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col-2"><img class="rounded-circle" alt="Free Shipping"
                        src="https://via.placeholder.com/40x40"></div>
                <div class="col-lg-6 col-10 ml-1">
                    <h4>Low Prices</h4>
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
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price_range">Price Range</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="number" name="price_from" id="price_from" class="form-control">
                            </div>
                            <div class="col-6">
                                <input type="number" name="price_to" id="price_to" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <h2 class="text-center">PRODUCTS</h2>
            <!-- Products -->
            <section class="py-2">
                <div class="container px-4 px-lg-5 mt-5">
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                        <!-- Product card -->
                        <div class="col-md-4 mb-5">
                            <div class="card h-100">
                                <!-- "Sale"/"new" badge -->
                                <div class="badge bg-danger text-white position-absolute mt-1 ms-1">Sale</div>
                                <!-- Product image -->
                                <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    alt="...">
                                <!-- Product details  p-4 -->
                                <div class="card-body text-center">
                                    <!-- Product name -->
                                    <a href="#" class="h4 text-primary text-decoration-none">Product name</a>
                                    <!-- Product raiting -->
                                    <div class="d-flex justify-content-center small text-warning my-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-half"></div>
                                        <div class="bi-star"></div>
                                    </div>
                                    <!-- Product price -->
                                    <div class="product-price">
                                        <span class="text-muted text-decoration-line-through price-old">$20.55</span>
                                        <span class="price fw-bold ms-2">$18.55</span>
                                    </div>
                                </div>
                                <!-- Product actions -->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="#" role="button"><span
                                                class="bi bi-cart4"></span> Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-5">
                            <div class="card h-100">
                                <!-- "Sale"/"new" badge -->
                                <div class="badge bg-danger text-white position-absolute mt-1 ms-1">Sale</div>
                                <!-- Product image -->
                                <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    alt="...">
                                <!-- Product details  p-4 -->
                                <div class="card-body text-center">
                                    <!-- Product name -->
                                    <a href="#" class="h4 text-primary text-decoration-none">Product name</a>
                                    <!-- Product raiting -->
                                    <div class="d-flex justify-content-center small text-warning my-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-half"></div>
                                        <div class="bi-star"></div>
                                    </div>
                                    <!-- Product price -->
                                    <div class="product-price">
                                        <span class="text-muted text-decoration-line-through price-old">$20.55</span>
                                        <span class="price fw-bold ms-2">$18.55</span>
                                    </div>
                                </div>
                                <!-- Product actions -->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="#" role="button"><span
                                                class="bi bi-cart4"></span> Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-5">
                            <div class="card h-100">
                                <!-- "Sale"/"new" badge -->
                                <div class="badge bg-danger text-white position-absolute mt-1 ms-1">Sale</div>
                                <!-- Product image -->
                                <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    alt="...">
                                <!-- Product details  p-4 -->
                                <div class="card-body text-center">
                                    <!-- Product name -->
                                    <a href="#" class="h4 text-primary text-decoration-none">Product name</a>
                                    <!-- Product raiting -->
                                    <div class="d-flex justify-content-center small text-warning my-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-half"></div>
                                        <div class="bi-star"></div>
                                    </div>
                                    <!-- Product price -->
                                    <div class="product-price">
                                        <span class="text-muted text-decoration-line-through price-old">$20.55</span>
                                        <span class="price fw-bold ms-2">$18.55</span>
                                    </div>
                                </div>
                                <!-- Product actions -->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="#" role="button"><span
                                                class="bi bi-cart4"></span> Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-5">
                            <div class="card h-100">
                                <!-- "Sale"/"new" badge -->
                                <div class="badge bg-danger text-white position-absolute mt-1 ms-1">Sale</div>
                                <!-- Product image -->
                                <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                    alt="...">
                                <!-- Product details  p-4 -->
                                <div class="card-body text-center">
                                    <!-- Product name -->
                                    <a href="#" class="h4 text-primary text-decoration-none">Product name</a>
                                    <!-- Product raiting -->
                                    <div class="d-flex justify-content-center small text-warning my-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-half"></div>
                                        <div class="bi-star"></div>
                                    </div>
                                    <!-- Product price -->
                                    <div class="product-price">
                                        <span class="text-muted text-decoration-line-through price-old">$20.55</span>
                                        <span class="price fw-bold ms-2">$18.55</span>
                                    </div>
                                </div>
                                <!-- Product actions -->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="#" role="button"><span
                                                class="bi bi-cart4"></span> Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection