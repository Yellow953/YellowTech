@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="hero_area">
    @include('layouts._header')

    <!-- slider section -->
    <section class="slider_section p-0">
        <div class="slider_container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                        01
                    </li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1">
                        02
                    </li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2">
                        03
                    </li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 px-0">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/slider-img.jpg') }}" alt="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-box">
                                        <h1>
                                            Design
                                            <br />
                                            Agency
                                        </h1>
                                        <p>
                                            There are many variations of passages of Lorem Ipsum available, but the
                                        </p>
                                        <a href="">
                                            Contact Us
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 px-0">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/slider-img.jpg') }}" alt="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-box">
                                        <h1>
                                            Design
                                            <br />
                                            Agency
                                        </h1>
                                        <p>
                                            There are many variations of passages of Lorem Ipsum available, but the
                                        </p>
                                        <a href="">
                                            Contact Us
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 px-0">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/slider-img.jpg') }}" alt="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-box">
                                        <h1>
                                            Design
                                            <br />
                                            Agency
                                        </h1>
                                        <p>
                                            There are many variations of passages of Lorem Ipsum available, but the
                                        </p>
                                        <a href="">
                                            Contact Us
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel_btn-box">
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="sr-only">Previous</span>
                    </a>
                    <img src="{{ asset('assets/images/line.png') }}" alt="" />
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- end slider section -->
</div>
<!-- end hero area -->

<!-- service section -->

<section class="service_section layout_padding">
    <div class="container-fluid">
        <div class="heading_container">
            <h2>
                Ser<span>vi</span>ces
            </h2>
            <p>
                adipiscingelit,sed do eiusmod tempor incididunt ut labore et dolore magn
            </p>
        </div>
        <div class="row">
            <div class="col-lg-6 ">
                <div class="img-container tab-content">
                    <div class="img-box tab-pane fade show active" id="img1" role="tabpanel">
                        <img src="{{ asset('assets/images/service-img.jpg') }}" alt="" />
                    </div>
                    <div class="img-box tab-pane fade  " id="img2" role="tabpanel">
                        <img src="{{ asset('assets/images/service-img.jpg') }}" alt="" />
                    </div>
                    <div class="img-box tab-pane fade  " id="img3" role="tabpanel">
                        <img src="{{ asset('assets/images/service-img.jpg') }}" alt="" />
                    </div>
                    <div class="img-box tab-pane fade  " id="img4" role="tabpanel">
                        <img src="{{ asset('assets/images/service-img.jpg') }}" alt="" />
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="detail-container nav nav-tabs" id="myTab" role="tablist">
                    <div class="detail-box active" id="img1-tab" data-toggle="tab" href="#img1" role="tab"
                        aria-selected="true">
                        <h4>
                            Website <br />
                            design
                        </h4>
                    </div>
                    <div class="detail-box" id="img2-tab" data-toggle="tab" href="#img2" role="tab"
                        aria-selected="false">
                        <h4>
                            Logo <br />
                            design
                        </h4>
                    </div>
                    <div class="detail-box" id="img2-tab" data-toggle="tab" href="#img3" role="tab"
                        aria-selected="false">
                        <h4>
                            brochure <br />
                            design
                        </h4>
                    </div>
                    <div class="detail-box" id="img2-tab" data-toggle="tab" href="#img4" role="tab"
                        aria-selected="false">
                        <h4>
                            visiting card <br />
                            design
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-box">
            <a href="">
                Read More
            </a>
        </div>
    </div>
</section>

<!-- end service section -->

<!-- portfolio section -->

<section class="portfolio_section">
    <div class="heading_container">
        <h2>
            Por<span>tf</span>olio
        </h2>
        <p>
            adipiscingelit,sed do eiusmod tempor incididunt ut labore et dolore magn
        </p>
    </div>
    <div class="portfolio_container mx-0 layout_padding">
        <div class="box-1">
            <div class="img-box b-1">
                <img src="{{ asset('assets/images/p1.jpg') }}" alt="">
                <div class="btn-box">
                    <a href="" class="btn-1">

                    </a>
                    <a href="" class="btn-2">

                    </a>
                </div>
            </div>
            <div class="img-box b-2">
                <img src="{{ asset('assets/images/p2.jpg') }}" alt="">
                <div class="btn-box">
                    <a href="" class="btn-1">

                    </a>
                    <a href="" class="btn-2">

                    </a>
                </div>
            </div>
        </div>
        <div class="box-2">
            <div class="img-box b-3">
                <img src="{{ asset('assets/images/p3.jpg') }}" alt="">
                <div class="btn-box">
                    <a href="" class="btn-1">

                    </a>
                    <a href="" class="btn-2">

                    </a>
                </div>
            </div>
            <div class="img-box b-4">
                <img src="{{ asset('assets/images/p4.jpg') }}" alt="">
                <div class="btn-box">
                    <a href="" class="btn-1">

                    </a>
                    <a href="" class="btn-2">

                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end portfolio section -->

<!-- logo section -->

<section class="logo_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                A N<span>EW</span> Logo <br>
                FOR YOUR COMPANY
            </h2>
            <p>
                adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn
            </p>
        </div>
    </div>
    <div class="logo_container mx-0 layout_padding">
        <div class="carousel-wrap">
            <div class="owl-carousel">
                <div class="item">
                    <div class="box  b1">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/l1.jpg') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Logo
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box b2">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/l2.jpg') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Logo
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box  b1">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/l3.jpg') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Logo
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box b2">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/l4.jpg') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Logo
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box  b1">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/l5.jpg') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Logo
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box b2">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/l6.jpg') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Logo
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box  b1">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/l3.jpg') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Logo
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box b2">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/l4.jpg') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Logo
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- end logo section -->


<!-- started section -->

<section class="started_section layout_padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>
                            Bring your <span>idea</span> to life
                        </h2>
                        <p>
                            Book a FREE meeting to explore how we can bring it to life for you.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 offset-md-1">
                <div class="btn-box">
                    <a href="https://calendly.com/yellowtech/30min" target="blank">
                        Let’s talk
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end started section -->

<!-- agency section -->
<section class="agency_section layout_padding-bottom">
    <div class="agency_container ">
        <div class="box ">
            <div class="detail-box">
                <div class="heading_container">
                    <h2>
                        About <span>YellowTech</span>
                    </h2>
                </div>
                <p>
                    YellowTech is a freelancing initiative aimed to help small/medium businesses to excell in the new
                    digital world. From Cutting edge software solutions to advanced AI tools, all you need to manage
                    your business.
                </p>
                <a href="">
                    Read More
                </a>
            </div>
        </div>
    </div>
</section>
<!-- end agency section -->

<!-- contact section -->
<section class="contact_section layout_padding">
    <div class="container px-0">
        <div class="heading_container">
            <h2 class="">
                Con<span>ta</span>ct Us
            </h2>
        </div>

    </div>
    <div class="container container-bg">
        <div class="row">
            <div class="col-lg-8 col-md-7 px-0">
                <div class="map_container">
                    <div class="map-responsive">
                        <iframe
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                            width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-lg-4 px-0">
                <form action="">
                    <div>
                        <input type="text" placeholder="Name" />
                    </div>
                    <div>
                        <input type="email" placeholder="Email" />
                    </div>
                    <div>
                        <input type="text" placeholder="Phone" />
                    </div>
                    <div>
                        <input type="text" class="message-box" placeholder="Message" />
                    </div>
                    <div class="d-flex ">
                        <button>
                            SEND
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- end contact section -->

<!-- client section -->

<section class="client_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container">
            <h2>
                What <span>says</span> our clients
            </h2>
        </div>
        <div class="box">
            <div class="client_id">
                <div class="name">
                    <h4>
                        Sandy <br>
                        Nor
                    </h4>
                </div>
                <div class="img-box">
                    <img src="{{ asset('assets/images/client.jpg') }}" alt="">
                </div>
            </div>
            <div class="detail-box">
                <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout. The point of using Lorem
                </p>
                <img src="{{ asset('assets/images/quote.png') }}" alt="">
            </div>
        </div>
    </div>
</section>
<!-- end client section -->

@include('layouts._footer')

@endsection