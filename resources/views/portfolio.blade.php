@extends('layouts.app')

@section('title', 'Portfolio')

@section('description', "Dive into Yellow Tech's portfolio – a showcase of successful projects spanning software
development, AI integration, web, and mobile applications. See our expertise in action.")

@section('keywords', 'Yellow Tech portfolio, software development, AI integration, web applications, mobile apps')

@section('content')

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
                <img src="{{ asset('assets/images/portfolio/mecanix1.png') }}" alt="Mecanix Stock Management System">
                <div class="btn-box">
                    <a href="#" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-2">
                <img src="{{ asset('assets/images/portfolio/mecanix2.png') }}" alt="Mecanix Stock Management System">
                <div class="btn-box">
                    <a href="#" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-2">
            <div class="img-box b-3">
                <img src="{{ asset('assets/images/portfolio/philippefarhat1.png') }}" alt="Philippe Farhat Website">
                <div class="btn-box">
                    <a href="#" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-4">
                <img src="{{ asset('assets/images/portfolio/philippefarhat2.png') }}" alt="Philippe Farhat Website">
                <div class="btn-box">
                    <a href="#" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-1">
            <div class="img-box b-1">
                <img src="{{ asset('assets/images/portfolio/sports1.png') }}" alt="Sports System">
                <div class="btn-box">
                    <a href="#" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-2">
                <img src="{{ asset('assets/images/portfolio/sports2.png') }}" alt="Sports System">
                <div class="btn-box">
                    <a href="#" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="box-2">
            <div class="img-box b-3">
                <img src="{{ asset('assets/images/portfolio/zspecial1.png') }}" alt="ZSpecial Website">
                <div class="btn-box">
                    <a href="#" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
            <div class="img-box b-4">
                <img src="{{ asset('assets/images/portfolio/zspecial2.png') }}" alt="ZSpecial Website">
                <div class="btn-box">
                    <a href="#" class="btn text-yellow">
                        <i class="fa-solid fa-link"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end portfolio section -->

@endsection