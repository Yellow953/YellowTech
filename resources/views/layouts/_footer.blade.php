<!-- footer section -->
<footer class="mt-5">
    <section class="info_section m-0 layout_padding2-top">
        <div class="info_container ">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset('assets/logo/logo.png') }}" alt="YellowTech Logo" class="img-fluid">
                    </div>
                    <div class="col-md-9 my-auto">
                        <h6>
                            ABOUT US
                        </h6>
                        <p>
                            <span class="text-yellow">YellowTech</span> is a freelancing initiative aimed to help
                            businesses
                            to excell in the
                            new digital world. From Cutting edge software solutions to advanced AI tools, all you need
                            to
                            manage your business.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            Pages
                        </h6>
                        <ul class="pages-list">
                            <li><a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home
                            </li>
                            <li><a href="{{ route('service') }}"
                                    class="{{ request()->is('service') ? 'active' : '' }}">Services</a></li>
                            <li><a href="{{ route('portfolio') }}"
                                    class="{{ request()->is('portfolio') ? 'active' : '' }}">Portfolio</a></li>
                            <li><a href="{{ route('contact') }}"
                                    class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>
                            <li><a href="{{ route('about') }}"
                                    class="{{ request()->is('about') ? 'active' : '' }}">About</a></li>
                            <li><a href="{{ route('terms_and_conditions') }}"
                                    class="{{ request()->is('terms_and_conditions') ? 'active' : '' }}">Terms &
                                    Conditions</a></li>
                            <li><a href="{{ route('privacy_policy') }}"
                                    class="{{ request()->is('privacy_policy') ? 'active' : '' }}">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            Social Media
                        </h6>
                        <div class="info_link-box">
                            <a href="https://www.instagram.com/yellow.tech.953/" target="blank">
                                <img src="{{ asset('assets/images/instagram.png') }}" alt="Instagram Icon">
                                <span>yellow.tech.953</span>
                            </a>
                            <a href="https://www.facebook.com/people/Yellowtech/100089876063961/" target="blank">
                                <img src="{{ asset('assets/images/facebook.png') }}" alt="Facebook Icon">
                                <span>YellowTech</span>
                            </a>
                            <a href="https://www.linkedin.com/company/yellow-tech-953/" target="blank">
                                <img src="{{ asset('assets/images/linkedin.png') }}" alt="LinkedIn Icon">
                                <span>yellow-tech-953</span>
                            </a>
                            <a href="https://www.tiktok.com/@yellow.tech" target="blank">
                                <img src="{{ asset('assets/images/tiktok.png') }}" alt="TikTok Icon">
                                <span>yellow.tech</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            NEED HELP?
                        </h6>
                        <p>
                            Book a <a href="https://calendly.com/yellowtech/30min" target="blank"
                                class="text-yellow">FREE</a> meeting to explore how we can
                            bring it to life for you.
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h6>
                            CONTACT US
                        </h6>
                        <div class="info_link-box">
                            <a href="#">
                                <img src="{{ asset('assets/images/location.png') }}" alt="Location Icon">
                                <span> werkstra&szlig;e 2, Berlin, Germany </span>
                            </a>
                            <a href="tel:+4915204820649">
                                <img src="{{ asset('assets/images/phone.png') }}" alt="Phone Icon">
                                <span>+4915204820649</span>
                            </a>
                            <a href="mailto:yellow.tech.953@gmail.com">
                                <img src="{{ asset('assets/images/mail.png') }}" alt="Mail Icon">
                                <span> yellow.tech.953@gmail.com</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="footer_section">
            <div class="container">
                <p>
                    &copy; <span id="displayYear"></span> All Rights Reserved By
                    <a href="{{ route('home') }}" class="text-yellow">YellowTech</a>
                </p>
            </div>
        </section>
    </section>
</footer>
<!-- end footer section -->