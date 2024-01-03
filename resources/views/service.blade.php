@extends('layouts.app')

@section('title', 'Service')

@section('description', 'Yellow Tech offers a spectrum of technology services – from custom software and web development
to AI integration. Explore our diverse solutions tailored for you.')

@section('keywords', 'technology services, custom software, web development, AI integration, tailored solutions, Yellow
Tech')

@section('content')

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
                        <img src="{{ asset('assets/images/ai.png') }}" alt="AI Icon" />
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
                        <img src="{{ asset('assets/images/seo.png') }}" alt="SEO ICON" />
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
                        <p>
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

@endsection