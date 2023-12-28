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

@endsection