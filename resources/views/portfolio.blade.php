@extends('layouts.app')

@section('title', 'Portfolio')

@section('description', "Dive into Yellow Tech's portfolio – a showcase of successful projects spanning software
development, AI integration, web, and mobile applications. See our expertise in action.")

@section('keywords', 'Yellow Tech portfolio, software development, AI integration, web applications, mobile
apps, Yellow Tech, yellowtech, yellowtech dev, yellow tech lebanon, yellowtech lebanon')

@section('content')
<br>
<!-- portfolio section -->
<section class="portfolio_section">
    <div class="heading_container">
        <h2>
            Por<span>tf</span>olio
        </h2>
        <p class="mt-4">
            Check out our portfolio for a glimpse of our past projects.
        </p>
    </div>

    <div class="portfolio_container mx-0 layout_padding">
        <div class="box-1">
            <div class="img-box b-1">
                <img src="{{ asset('assets/images/portfolio/radiant_1.png') }}" alt="Radiant">
                <div class="btn-box">
                    <a href="#" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-2">
                <img src="{{ asset('assets/images/portfolio/radiant_2.png') }}" alt="Radiant">
                <div class="btn-box">
                    <a href="#" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-2">
            <div class="img-box b-1">
                <img src="{{ asset('assets/images/portfolio/lcpa_1.png') }}" alt="LCPA">
                <div class="btn-box">
                    <a href="#" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-2">
                <img src="{{ asset('assets/images/portfolio/lcpa_2.png') }}" alt="LCPA">
                <div class="btn-box">
                    <a href="#" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-1">
            <div class="img-box b-1">
                <img src="{{ asset('assets/images/portfolio/calories_1.png') }}" alt="Calories">
                <div class="btn-box">
                    <a href="https://calories-shop.com" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-2">
                <img src="{{ asset('assets/images/portfolio/calories_2.png') }}" alt="Calories">
                <div class="btn-box">
                    <a href="https://calories-shop.com" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-2">
            <div class="img-box b-1">
                <img src="{{ asset('assets/images/portfolio/Mira24K_1.png') }}" alt="Mira24K">
                <div class="btn-box">
                    <a href="#" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-2">
                <img src="{{ asset('assets/images/portfolio/Mira24K_2.png') }}" alt="Mira24K">
                <div class="btn-box">
                    <a href="#" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-1">
            <div class="img-box b-1">
                <img src="{{ asset('assets/images/portfolio/Dashboard.png') }}" alt="YellowPOS Dashboard">
                <div class="btn-box">
                    <a href="https://yellow-pos.com/" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-2">
                <img src="{{ asset('assets/images/portfolio/Dashboard_Calculator.png') }}"
                    alt="YellowPOS Dashboard Calculator">
                <div class="btn-box">
                    <a href="https://yellow-pos.com/" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-2">
            <div class="img-box b-3">
                <img src="{{ asset('assets/images/portfolio/Auth_Signup.png') }}" alt="YellowPOS Login">
                <div class="btn-box">
                    <a href="https://yellow-pos.com" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-4">
                <img src="{{ asset('assets/images/portfolio/Other_Business_Profile.png') }}"
                    alt="YellowPOS Business Profile">
                <div class="btn-box">
                    <a href="https://yellow-pos.com" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-1">
            <div class="img-box b-1">
                <img src="{{ asset('assets/images/portfolio/Bestsellers.png') }}"
                    alt="Deutschefahrrad Bestsellers display">
                <div class="btn-box">
                    <a href="https://deutschefahrrad.de/" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-2">
                <img src="{{ asset('assets/images/portfolio/Tracking.png') }}" alt="Deutschefahrrad Tracking System">
                <div class="btn-box">
                    <a href="https://deutschefahrrad.de/pages/verfolgen-sie-ihre-bestellung" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-2">
            <div class="img-box b-1">
                <img src="{{ asset('assets/images/portfolio/BestsellerDress.png') }}" alt="Vestelle BestSellers">
                <div class="btn-box">
                    <a href="https://vestelle.eu/" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-2">
                <img src="{{ asset('assets/images/portfolio/Checkout.png') }}" alt="Vestelle Payment System">
                <div class="btn-box">
                    <a href="https://vestelle.eu/" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-1">
            <div class="img-box b-1">
                <img src="{{ asset('assets/images/portfolio/AloeVera.png') }}" alt="Aloe Vera Front Page">
                <div class="btn-box">
                    <a href="https://aloeveranaturale.it/" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-2">
                <img src="{{ asset('assets/images/portfolio/NewsLetter.png') }}" alt="Aloe Vera NewsLetter">
                <div class="btn-box">
                    <a href="https://aloeveranaturale.it/" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-2">
            <div class="img-box b-1">
                <img src="{{ asset('assets/images/portfolio/sellieretbellot.png') }}" alt="Sellier & Bellot System">
                <div class="btn-box">
                    <a href="#" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-2">
                <img src="{{ asset('assets/images/portfolio/sellieretbellot2.png') }}" alt="Sellier & Bellot System">
                <div class="btn-box">
                    <a href="#" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-1">
            <div class="img-box b-1">
                <img src="{{ asset('assets/images/portfolio/mecanix1.png') }}" alt="Mecanix Stock Management System">
                <div class="btn-box">
                    <a href="https://mecanixstocksystem.com" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-2">
                <img src="{{ asset('assets/images/portfolio/mecanix2.png') }}" alt="Mecanix Stock Management System">
                <div class="btn-box">
                    <a href="https://mecanixstocksystem.com" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-2">
            <div class="img-box b-3">
                <img src="{{ asset('assets/images/portfolio/philippefarhat1.png') }}" alt="Philippe Farhat Website">
                <div class="btn-box">
                    <a href="https://philippefarhat.com" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-4">
                <img src="{{ asset('assets/images/portfolio/philippefarhat2.png') }}" alt="Philippe Farhat Website">
                <div class="btn-box">
                    <a href="https://philippefarhat.com" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-1">
            <div class="img-box b-1">
                <img src="{{ asset('assets/images/portfolio/sports1.png') }}" alt="Sports System">
                <div class="btn-box">
                    <a href="https://www.athleticsperformance.org/" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-2">
                <img src="{{ asset('assets/images/portfolio/sports2.png') }}" alt="Sports System">
                <div class="btn-box">
                    <a href="https://www.athleticsperformance.org/" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-2">
            <div class="img-box b-3">
                <img src="{{ asset('assets/images/portfolio/zspecial1.png') }}" alt="ZSpecial Website">
                <div class="btn-box">
                    <a href="https://z-special.com" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-4">
                <img src="{{ asset('assets/images/portfolio/zspecial2.png') }}" alt="ZSpecial Website">
                <div class="btn-box">
                    <a href="https://z-special.com" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>



    </div>
</section>

<!-- end portfolio section -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#2d2d2d" fill-opacity="1"
        d="M0,224L48,218.7C96,213,192,203,288,213.3C384,224,480,256,576,229.3C672,203,768,117,864,85.3C960,53,1056,75,1152,117.3C1248,160,1344,224,1392,256L1440,288L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
    </path>
</svg>
@endsection
