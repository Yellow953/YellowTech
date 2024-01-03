@extends('layouts.app')

@section('title', 'About')

@section('description', 'Explore the story behind Yellow Tech – A team of tech enthusiasts crafting customized
solutions. Learn about our passion for excellence and client-centric approach.')

@section('keywords', 'Yellow Tech, technology solutions, custom software, AI integration, innovation, client-centric
approach')

@section('content')

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
                    YellowTech is a freelancing initiative aimed to help businesses to excell in the new
                    digital world. From Cutting edge software solutions to advanced AI tools, all you need to manage
                    your business.
                </p>
                <a href="{{ route('about') }}">
                    Read More
                </a>
            </div>
        </div>
    </div>
</section>
<!-- end agency section -->

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
                            <img src="{{ asset('assets/images/laravel.png') }}" alt="Laravel Logo">
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
                            <img src="{{ asset('assets/images/php.png') }}" alt="PHP Logo">
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
                            <img src="{{ asset('assets/images/python.png') }}" alt="Python Logo">
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
                            <img src="{{ asset('assets/images/java.png') }}" alt="Java Logo">
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
                            <img src="{{ asset('assets/images/bootstrap.png') }}" alt="Bootstrap Logo">
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
                            <img src="{{ asset('assets/images/html.png') }}" alt="HTML Logo">
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
                            <img src="{{ asset('assets/images/css.png') }}" alt="CSS Logo">
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
                            <img src="{{ asset('assets/images/mysql.png') }}" alt="MYSQL Logo">
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
                            <img src="{{ asset('assets/images/postgresql.png') }}" alt="POSTGRESQL Logo">
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
                            <img src="{{ asset('assets/images/sqlite.png') }}" alt="SQLITE Logo">
                        </div>
                        <div class="detail-box">
                            <h4>
                                SQLITE
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box b2">
                        <div class="img-box">
                            <img src="{{ asset('assets/images/openai.png') }}" alt="OPENAI Logo">
                        </div>
                        <div class="detail-box">
                            <h4>
                                OpenAI
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end logo section -->

{{-- start why choose us --}}
<div class="feat bg-gray pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="section-head col-sm-12">
                <h4><span>Why Choose</span> Yellow Tech?</h4>
                <p>
                    At Yellow Tech, we stand at the forefront of technology, delivering unparalleled solutions tailored
                    to elevate your business. Here's why you should choose us:
                </p>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="item-why"> <span class="icon feature_box_col_one">
                        <i class="fa-solid fa-microchip"></i>
                    </span>
                    <h6>Expertise Across Technologies</h6>
                    <p>
                        Our seasoned professionals excel in diverse technologies, ensuring cutting-edge solutions for
                        your unique requirements.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="item-why"> <span class="icon feature_box_col_two">
                        <i class="fa-solid fa-fingerprint"></i>
                    </span>
                    <h6>Customized Approach</h6>
                    <p>We don't believe in one-size-fits-all. Every project receives a bespoke touch, aligning perfectly
                        with your business goals.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="item-why"> <span class="icon feature_box_col_three">
                        <i class="fa-solid fa-headset"></i>
                    </span>
                    <h6>Reliable Support & Maintenance</h6>
                    <p>Beyond delivery, our commitment extends to continuous support, updates, and maintenance, ensuring
                        your systems run seamlessly</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="item-why"> <span class="icon feature_box_col_four">
                        <i class="fa-solid fa-swatchbook"></i>
                    </span>
                    <h6>User-Centric Design</h6>
                    <p>Experience matters. We prioritize user-centric design, creating interfaces that captivate and
                        applications that resonate with your audience.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="item-why"> <span class="icon feature_box_col_five">
                        <i class="fa-solid fa-seedling"></i>
                    </span>
                    <h6>Scalability for Growth</h6>
                    <p>
                        Our solutions are designed with scalability in mind, adapting seamlessly to your evolving
                        business needs and facilitating growth.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="item-why"><span class="icon feature_box_col_six">
                        <i class="fa-solid fa-wallet"></i>
                    </span>
                    <h6>Affordable Excellence</h6>
                    <p>Unlock top-tier tech solutions at budget-friendly rates. Choose Yellow Tech for excellence
                        without compromise.</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end why choose us --}}

@endsection