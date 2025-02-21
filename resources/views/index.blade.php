@extends('layouts.app')

@section('title', 'Home')

@section('description', 'Yellow Tech, your one stop destination for tailored software solutions, AI
integration, and cutting-edge technology.')

@section('keywords', 'innovation, technology solutions, custom software, AI integration, business growth,
Yellow Tech, yellowtech, yellowtech dev, yellow tech lebanon, yellowtech lebanon')

@section('content')

{{-- start hero section --}}
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
                                        <img src="{{ asset('assets/images/software-development.png') }}"
                                            alt="Slider 1" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-box">
                                        <h2>
                                            Customized
                                            <br />
                                            Softwares
                                        </h2>
                                        <p>
                                            Tailored systems for diverse business needs.
                                        </p>
                                        <a href="{{ route('contact') }}">
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
                                    <div class="detail-box">
                                        <h2>
                                            Web
                                            <br />
                                            Design
                                        </h2>
                                        <p>
                                            Crafting responsive web designs with intuitive user interfaces for optimal
                                            experiences.
                                        </p>
                                        <a href="{{ route('contact') }}">
                                            Contact Us
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="img-box">
                                        <img src="{{ asset('assets/images/web-design.png') }}" alt="Slider 2" />
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
                                        <img src="{{ asset('assets/images/ai-image.png') }}" alt="Slider 3" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="detail-box">
                                        <h2>
                                            AI
                                            <br />
                                            Solutions
                                        </h2>
                                        <p>
                                            Implementing artificial intelligence to enhance services and customer
                                            interactions.
                                        </p>
                                        <a href="{{ route('contact') }}">
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
                    <img src="{{ asset('assets/images/line.png') }}" alt="Line" />
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
            <p class="mt-4">
                Explore our services for a comprehensive overview of what we offer.
            </p>
        </div>
        <div class="row">
            <div class="col-lg-6 ">
                <div class="img-container tab-content">
                    <div class="img-box tab-pane fade show active" id="img1" role="tabpanel">
                        <img src="{{ asset('assets/images/software.png') }}" alt="Software Icon" />
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
                        <img src="{{ asset('assets/images/ai-image.png') }}" alt="AI Icon" />
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
                        <img src="{{ asset('assets/images/web-design.png') }}" alt="SEO ICON" />
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
                        <img src="{{ asset('assets/images/phone_vector.png') }}" alt="Phone Icon" />
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
                        aria-selected="false">
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

<!-- started section -->
<section class="started_section layout_padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>
                            Bring your <span>idea</span> to life
                        </h2>
                        <p class="mt-4">
                            Book a <a href="https://calendly.com/yellowtech/30min" target="blank"
                                class="text-yellow">FREE</a> meeting to explore how we can bring it to life
                            for you.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <svg id="svg" width="100" height="100" viewBox="0 0 100 100">
                    <defs>
                        <mask id="thinkMask" width="100" height="100" style="position: absolute;">
                            <circle cy="48.483498" cx="21.232237" r="18.812815" fill="white" class="thinkMaskCircle" />
                        </mask>
                        <mask id="createMask">
                            <circle cx="69.173874" cy="49.998726" r="25" fill="white" class="createMaskCircle" />
                        </mask>
                    </defs>
                    <g style="font-style:normal;font-weight:normal;font-size:5px;line-height:125%;font-family:sans-serif;letter-spacing:0px;word-spacing:0px;fill:#d1dce1;fill-opacity:1;stroke:none;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
                        id="textTHINK">
                        <path
                            d="m 3.7754183,44.826611 6.9378657,0 0,0.933837 -2.9113765,0 0,7.267457 -1.1151123,0 0,-7.267457 -2.9113769,0 0,-0.933837 z" />
                        <path
                            d="m 11.811917,44.826611 1.109619,0 0,3.361816 4.031983,0 0,-3.361816 1.109619,0 0,8.201294 -1.109619,0 0,-3.90564 -4.031983,0 0,3.90564 -1.109619,0 0,-8.201294 z" />
                        <path d="m 20.27139,44.826611 1.109619,0 0,8.201294 -1.109619,0 0,-8.201294 z" />
                        <path
                            d="m 23.589261,44.826611 1.494141,0 3.636474,6.860961 0,-6.860961 1.07666,0 0,8.201294 -1.49414,0 -3.636475,-6.860962 0,6.860962 -1.07666,0 0,-8.201294 z" />
                        <path
                            d="m 32.004788,44.826611 1.10962,0 0,3.466186 3.680419,-3.466186 1.428223,0 -4.070434,3.823242 4.361572,4.378052 -1.461182,0 -3.938598,-3.949585 0,3.949585 -1.10962,0 0,-8.201294 z" />
                    </g>
                    <g style="font-style:normal;font-weight:normal;font-size:5px;line-height:125%;font-family:sans-serif;letter-spacing:0px;word-spacing:0px;fill:#f6dc00;fill-opacity:1;stroke:none;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
                        id="textTHINK-dark" mask="url(#thinkMask)">
                        <path
                            d="m 3.7754183,44.826611 6.9378657,0 0,0.933837 -2.9113765,0 0,7.267457 -1.1151123,0 0,-7.267457 -2.9113769,0 0,-0.933837 z" />
                        <path
                            d="m 11.811917,44.826611 1.109619,0 0,3.361816 4.031983,0 0,-3.361816 1.109619,0 0,8.201294 -1.109619,0 0,-3.90564 -4.031983,0 0,3.90564 -1.109619,0 0,-8.201294 z" />
                        <path d="m 20.27139,44.826611 1.109619,0 0,8.201294 -1.109619,0 0,-8.201294 z" />
                        <path
                            d="m 23.589261,44.826611 1.494141,0 3.636474,6.860961 0,-6.860961 1.07666,0 0,8.201294 -1.49414,0 -3.636475,-6.860962 0,6.860962 -1.07666,0 0,-8.201294 z" />
                        <path
                            d="m 32.004788,44.826611 1.10962,0 0,3.466186 3.680419,-3.466186 1.428223,0 -4.070434,3.823242 4.361572,4.378052 -1.461182,0 -3.938598,-3.949585 0,3.949585 -1.10962,0 0,-8.201294 z" />
                    </g>
                    <g style="font-style:normal;font-weight:normal;font-size:40px;line-height:125%;font-family:sans-serif;letter-spacing:0px;word-spacing:0px;fill:#d1dce1;fill-opacity:1;stroke:none;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
                        id="textCREATE">
                        <path
                            d="m 53.430572,47.018058 -1.15412,0 q -0.09766,-0.45277 -0.412819,-0.772372 -0.315163,-0.324042 -0.754617,-0.492721 -0.439453,-0.173117 -0.909978,-0.173117 -0.754617,0 -1.35831,0.439453 -0.603693,0.435014 -0.954368,1.251775 -0.350675,0.812323 -0.350675,1.948686 0,1.136364 0.350675,1.953125 0.350675,0.812323 0.954368,1.251776 0.603693,0.435014 1.35831,0.435014 0.470525,0 0.905539,-0.168679 0.435015,-0.173118 0.750178,-0.49272 0.315163,-0.324041 0.421697,-0.776811 l 1.15412,0 q -0.150923,0.78125 -0.621449,1.336115 -0.470526,0.550426 -1.14968,0.843395 -0.679155,0.28853 -1.460405,0.28853 -1.091975,0 -1.93537,-0.563743 -0.838956,-0.563743 -1.318359,-1.611328 -0.474964,-1.047586 -0.474964,-2.494674 0,-1.43821 0.474964,-2.485795 0.479403,-1.047585 1.318359,-1.615767 0.843395,-0.568182 1.93537,-0.568182 0.776811,0 1.455966,0.292969 0.683593,0.28853 1.154119,0.843395 0.470526,0.550426 0.621449,1.331676 z" />
                        <path
                            d="m 60.357507,53.765217 -1.85103,-3.533381 -2.17951,0 0,3.533381 -1.100852,0 0,-9.090909 2.911932,0 q 1.02983,0 1.731179,0.395064 0.705788,0.395064 1.065341,1.043146 0.363991,0.648082 0.363991,1.402699 0,0.847834 -0.443892,1.500355 -0.443892,0.652521 -1.229581,0.981001 l 1.97532,3.697621 0,0.07102 -1.242898,0 z m -4.03054,-8.114347 0,3.568892 1.81108,0 q 0.763494,0 1.220703,-0.248579 0.461648,-0.24858 0.665838,-0.639205 0.208629,-0.390625 0.208629,-0.816761 0,-0.435014 -0.208629,-0.86559 -0.208629,-0.430575 -0.670277,-0.714666 -0.461648,-0.284091 -1.216264,-0.284091 l -1.81108,0 z" />
                        <path
                            d="m 68.718214,52.788654 0,0.976563 -5.557529,0 0,-9.090909 5.486506,0 0,0.976562 -4.385653,0 0,3.071733 3.924005,0 0,0.976563 -3.924005,0 0,3.089488 4.456676,0 z" />
                        <path
                            d="m 70.899943,53.765217 -1.171875,0 3.125,-9.090909 1.136364,0 3.125,9.090909 -1.171875,0 -0.803445,-2.432529 -3.426846,0 -0.812323,2.432529 z m 2.46804,-7.404119 -1.331676,3.995028 2.778764,0 -1.322798,-3.995028 -0.12429,0 z" />
                        <path
                            d="m 83.763935,44.674308 0,0.976562 -2.858665,0 0,8.114347 -1.100852,0 0,-8.114347 -2.858665,0 0,-0.976562 6.818182,0 z" />
                        <path
                            d="m 90.935011,52.788654 0,0.976563 -5.557529,0 0,-9.090909 5.486506,0 0,0.976562 -4.385653,0 0,3.071733 3.924005,0 0,0.976563 -3.924005,0 0,3.089488 4.456676,0 z" />
                    </g>
                    <g style="font-style:normal;font-weight:normal;font-size:40px;line-height:125%;font-family:sans-serif;letter-spacing:0px;word-spacing:0px;fill:#f6dc00;fill-opacity:1;stroke:none;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"
                        class="textCREATE-dark" mask="url(#createMask)">
                        <path
                            d="m 53.430572,47.018058 -1.15412,0 q -0.09766,-0.45277 -0.412819,-0.772372 -0.315163,-0.324042 -0.754617,-0.492721 -0.439453,-0.173117 -0.909978,-0.173117 -0.754617,0 -1.35831,0.439453 -0.603693,0.435014 -0.954368,1.251775 -0.350675,0.812323 -0.350675,1.948686 0,1.136364 0.350675,1.953125 0.350675,0.812323 0.954368,1.251776 0.603693,0.435014 1.35831,0.435014 0.470525,0 0.905539,-0.168679 0.435015,-0.173118 0.750178,-0.49272 0.315163,-0.324041 0.421697,-0.776811 l 1.15412,0 q -0.150923,0.78125 -0.621449,1.336115 -0.470526,0.550426 -1.14968,0.843395 -0.679155,0.28853 -1.460405,0.28853 -1.091975,0 -1.93537,-0.563743 -0.838956,-0.563743 -1.318359,-1.611328 -0.474964,-1.047586 -0.474964,-2.494674 0,-1.43821 0.474964,-2.485795 0.479403,-1.047585 1.318359,-1.615767 0.843395,-0.568182 1.93537,-0.568182 0.776811,0 1.455966,0.292969 0.683593,0.28853 1.154119,0.843395 0.470526,0.550426 0.621449,1.331676 z" />
                        <path
                            d="m 60.357507,53.765217 -1.85103,-3.533381 -2.17951,0 0,3.533381 -1.100852,0 0,-9.090909 2.911932,0 q 1.02983,0 1.731179,0.395064 0.705788,0.395064 1.065341,1.043146 0.363991,0.648082 0.363991,1.402699 0,0.847834 -0.443892,1.500355 -0.443892,0.652521 -1.229581,0.981001 l 1.97532,3.697621 0,0.07102 -1.242898,0 z m -4.03054,-8.114347 0,3.568892 1.81108,0 q 0.763494,0 1.220703,-0.248579 0.461648,-0.24858 0.665838,-0.639205 0.208629,-0.390625 0.208629,-0.816761 0,-0.435014 -0.208629,-0.86559 -0.208629,-0.430575 -0.670277,-0.714666 -0.461648,-0.284091 -1.216264,-0.284091 l -1.81108,0 z" />
                        <path
                            d="m 68.718214,52.788654 0,0.976563 -5.557529,0 0,-9.090909 5.486506,0 0,0.976562 -4.385653,0 0,3.071733 3.924005,0 0,0.976563 -3.924005,0 0,3.089488 4.456676,0 z" />
                        <path
                            d="m 70.899943,53.765217 -1.171875,0 3.125,-9.090909 1.136364,0 3.125,9.090909 -1.171875,0 -0.803445,-2.432529 -3.426846,0 -0.812323,2.432529 z m 2.46804,-7.404119 -1.331676,3.995028 2.778764,0 -1.322798,-3.995028 -0.12429,0 z" />
                        <path
                            d="m 83.763935,44.674308 0,0.976562 -2.858665,0 0,8.114347 -1.100852,0 0,-8.114347 -2.858665,0 0,-0.976562 6.818182,0 z" />
                        <path
                            d="m 90.935011,52.788654 0,0.976563 -5.557529,0 0,-9.090909 5.486506,0 0,0.976562 -4.385653,0 0,3.071733 3.924005,0 0,0.976563 -3.924005,0 0,3.089488 4.456676,0 z" />
                    </g>
                    <circle
                        style="opacity:1;fill:#f6dc00;fill-opacity:1;stroke:none;stroke-width:0.5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                        class="ball-top" cx="0" cy="0" r="2" />
                    <circle
                        style="opacity:1;fill:#f6dc00;fill-opacity:1;stroke:none;stroke-width:0.5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                        class="ball-bottom" cx="0" cy="0" r="2" />
                </svg>
            </div>
            <div class="col-md-12">
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

{{-- start why choose us --}}
<div class="feat bg-gray pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="section-head col-sm-12">
                <h4><span>Why Choose</span> Yellow Tech?</h4>
                <p class="pt-4">
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

<!-- logo section -->
<section class="logo_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                <span>Tech</span>nologies
            </h2>
            <p class="mt-4">
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
                                <img src="{{ asset('assets/images/testimonial1.png') }}" alt="Testimonial 1">
                            </div>
                        </div>
                        <div class="detail-box">
                            <img src="{{ asset('assets/images/quote.png') }}" alt="Left Quote">
                            <p>
                                Joe stands out as a professional web developer. From the first encounter, when I asked
                                him to create my website, I knew I was making the right choice. He is always ready to
                                help and very flexible in proposing solutions and very punctual with deadlines. His
                                creativity, his vast technical knowledge, his attention to details, and his exceptional
                                customer service make him the “go-to” engineer that I would turn to for any of my web
                                projects.
                            </p>
                            <img src="{{ asset('assets/images/quote_rotated.png') }}" alt="Right Quote">
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
                                <img src="{{ asset('assets/images/testimonial2.png') }}" alt="Testimonial 2">
                            </div>
                        </div>
                        <div class="detail-box">
                            <img src="{{ asset('assets/images/quote.png') }}" alt="Left Quote">
                            <p>
                                You did a great job. It's clear that you put a lot of effort and attention to detail
                                into the design and functionality of the site. The layout is clean and easy to navigate,
                                and the content is well-organized and informative. I appreciate how you were able to
                                incorporate our branding elements seamlessly into the design. Additionally, the site is
                                responsive and loads quickly, which is essential for providing a positive user
                                experience. Overall, you've done an excellent job, and we're very pleased with the
                                results. Thank you for your hard work and dedication to this project
                            </p>
                            <img src="{{ asset('assets/images/quote_rotated.png') }}" alt="Right Quote">
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
                                <img src="{{ asset('assets/images/testimonial3.png') }}" alt="Testimonial 3">
                            </div>
                        </div>
                        <div class="detail-box">
                            <img src="{{ asset('assets/images/quote.png') }}" alt="Left Quote">
                            <p>
                                As a first-time customer, I was unsure of what to expect when I asked them to make my
                                website. However, I was pleasantly surprised by their prompt service and the high
                                quality of their services. I recommend this business to everyone and it's my go-to
                                business every time I require something tech related.
                            </p>
                            <img src="{{ asset('assets/images/quote_rotated.png') }}" alt="Right Quote">
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