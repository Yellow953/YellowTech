@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Add these links to the head section of your HTML -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<div class="hero_area">
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
                Explore our services for a comprehensive overview of what we offer.
            </p>
        </div>
        <div class="row">
            <div class="col-lg-6 ">
                <div class="img-container tab-content">
                    <div class="img-box tab-pane fade show active" id="img1" role="tabpanel">
                        <img src="{{ asset('assets/images/software.png') }}" alt="" />
                        <div class="service-description">
                            <p>
                                Tailored systems for diverse business needs.
                            <p>
                            <ul>
                                <li><span>Custom Software Development</span></li>
                                <li><span>Software Maintenance and Support</span></li>
                                <li><span>API Development</span></li>
                                <li><span>Content Management Systems (CMS)</span></li>
                                <li><span>Inventory Management Systems (IMS)</span></li>
                                <li><span>Accounting Systems</span></li>
                                <li><span>Invoicing Systems</span></li>
                                <li><span>Point Of Sales (POS)</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="img-box tab-pane fade" id="img2" role="tabpanel">
                        <img src="{{ asset('assets/images/ai.png') }}" alt="" />
                        <div class="service-description">
                            <p>
                                Implementing artificial intelligence to enhance services and customer interactions.
                            </p>
                            <ul>
                                <li><span>Machine Learning and AI Services</span></li>
                                <li><span>Customer Service AI Bot (leveraging Chat GPT intelligence)</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="img-box tab-pane fade" id="img3" role="tabpanel">
                        <img src="{{ asset('assets/images/seo.png') }}" alt="" />
                        <div class="service-description">
                            <p>
                                Crafting responsive websites with intuitive user interfaces for optimal experiences.
                            </p>
                            <ul>
                                <li><span>Web Development</span></li>
                                <li><span>SEO Optimization</span></li>
                                <li><span>UI/UX Design Services</span></li>
                                <li><span>E-commerce Solutions</span></li>
                                <li><span>Content Management Systems (CMS)</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="img-box tab-pane fade" id="img4" role="tabpanel">
                        <img src="{{ asset('assets/images/phone_vector.png') }}" alt="" />
                        <div>
                            <p>
                                Building cross-platform mobile apps for seamless user experiences and functionality.
                            </p>
                            <ul>
                                <li><span>Mobile App Development</span></li>
                                <li><span>E-commerce Solutions</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="detail-container nav nav-tabs" id="myTab" role="tablist">
                    <div class="detail-box active" id="img1-tab" data-toggle="tab" href="#img1" role="tab"
                        aria-selected="true">
                        <h4>
                            Software<br />
                            Solutions
                        </h4>
                    </div>
                    <div class="detail-box" id="img2-tab" data-toggle="tab" href="#img2" role="tab"
                        aria-selected="true">
                        <h4>
                            AI <br />
                            Integrations
                        </h4>
                    </div>
                    <div class="detail-box" id="img3-tab" data-toggle="tab" href="#img3" role="tab"
                        aria-selected="false">
                        <h4>
                            Web <br />
                            Development
                        </h4>
                    </div>
                    <div class="detail-box" id="img4-tab" data-toggle="tab" href="#img4" role="tab"
                        aria-selected="false">
                        <h4>
                            Mobile <br />
                            Development
                        </h4>
                    </div>
                </div>
            </div>
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
            Check out our portfolio for a glimpse of our past projects.
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
                <span>Tech</span>nologies
            </h2>
            <p>
                Explore the cutting edge technologies that we use to develop our apps...
            </p>
        </div>
    </div>
    <div class="logo_container mx-0 layout_padding">
        <div class="carousel-wrap">
            <div class="owl-carousel">
                <div class="item">
                    <div class="box b1">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/laravel.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Laravel
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box b2">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/django.png') }}" alt="Django Logo">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Django
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box b1">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/php.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                PHP
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box b2">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/python.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Python
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box b1">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/java.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Java
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box b2">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/bootstrap.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                Bootstrap
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box b1">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/html.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                HTML
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box b2">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/css.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                CSS
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box b1">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/mysql.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                MYSQL
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box b2">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/postgresql.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                POSTGRESQL
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box b1">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/sqlite.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h4>
                                SQLITE
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
            <div class="col-md-8 px-0">
                <div class="map_container">
                    <div class="map-responsive">
                        <img src="{{ asset('assets/images/map.png') }}" alt=""
                            style="border:0; width: 100%; height:100%">
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-0">
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
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="box">
                        <div class="client_id">
                            <div class="name">
                                <h4>
                                    Rania R.
                                </h4>
                            </div>
                            <div class="img-box">
                                <img src="{{ asset('assets/images/testimonial1.png') }}" alt="">
                            </div>
                        </div>
                        <div class="detail-box">
                            <img src="{{ asset('assets/images/quote.png') }}" alt="">
                            <p>
                                Joe stands out as a professional web developer. From the first encounter, when I asked
                                him to create my website, I knew I was making the right choice. He is always ready to
                                help and very flexible in proposing solutions and very punctual with deadlines. His
                                creativity, his vast technical knowledge, his attention to details, and his exceptional
                                customer service make him the “go-to” engineer that I would turn to for any of my web
                                projects.
                            </p>
                            <img src="{{ asset('assets/images/quote_rotated.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="box">
                        <div class="client_id">
                            <div class="name">
                                <h4>
                                    Lynn K.
                                </h4>
                            </div>
                            <div class="img-box">
                                <img src="{{ asset('assets/images/testimonial2.png') }}" alt="">
                            </div>
                        </div>
                        <div class="detail-box">
                            <img src="{{ asset('assets/images/quote.png') }}" alt="">
                            <p>
                                You did a great job. It's clear that you put a lot of effort and attention to detail
                                into the design and functionality of the site. The layout is clean and easy to navigate,
                                and the content is well-organized and informative. I appreciate how you were able to
                                incorporate our branding elements seamlessly into the design. Additionally, the site is
                                responsive and loads quickly, which is essential for providing a positive user
                                experience. Overall, you've done an excellent job, and we're very pleased with the
                                results. Thank you for your hard work and dedication to this project
                            </p>
                            <img src="{{ asset('assets/images/quote_rotated.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="box">
                        <div class="client_id">
                            <div class="name">
                                <h4>
                                    Sleiman B.A.
                                </h4>
                            </div>
                            <div class="img-box">
                                <img src="{{ asset('assets/images/testimonial3.png') }}" alt="">
                            </div>
                        </div>
                        <div class="detail-box">
                            <img src="{{ asset('assets/images/quote.png') }}" alt="">
                            <p>
                                As a first-time customer, I was unsure of what to expect when I asked them to make my
                                website. However, I was pleasantly surprised by their prompt service and the high
                                quality of their services. I recommend this business to everyone and it's my go-to
                                business every time I require something tech related.
                            </p>
                            <img src="{{ asset('assets/images/quote_rotated.png') }}" alt="">
                        </div>
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
</section>
<!-- end client section -->

@endsection