@extends('layouts.app')

@section('title', 'Contact')

@section('description', "Connect with Yellow Tech today! Reach out for tailored technology solutions, expert
consultations, or inquiries. Let's shape the future of your business together.")

@section('keywords', 'Yellow Tech contact, technology solutions, expert consultations, business inquiries,
Yellow Tech, yellowtech, yellowtech dev, yellow tech lebanon, yellowtech lebanon')

@section('content')
<!-- contact section -->
<section class="contact_section layout_padding">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>

            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif
        @if ($message = Session::get('danger'))
        <div class="alert alert-danger mb-3">
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            {{ $message }}
        </div>
        @endif
        @if ($message = Session::get('success'))
        <div class="alert alert-success mb-3">
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            {{ $message }}
        </div>
        @endif
    </div>

    <div class="container px-0">
        <div class="heading_container">
            <h2>
                Contact <span>Us</span>
            </h2>
        </div>
    </div>
    <div class="container container-bg">
        <div class="row">
            <div class="col-md-8 px-0">
                <div class="map_container">
                    <div class="map-responsive">
                        <img src="{{ asset('assets/images/map.png') }}" alt="Locations Map"
                            style="border:0; width: 100%; height:100%">
                    </div>
                </div>
            </div>
            <div class="col-md-4 px-0">
                <form action="{{ route('contact.create') }}" method="POST" enctype="multipart/form-data"
                    id="contact-form">
                    @csrf
                    <div>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="Name *" />
                    </div>
                    <div>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="Email *" />
                    </div>
                    <div>
                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="Phone" />
                    </div>
                    <div>
                        <input type="text" class="message-box" name="message" value="{{ old('message') }}" required
                            placeholder="Message *" />
                    </div>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/images/spam1.png') }}" class="spam-img">
                        <span class="mx-1">+</span>
                        <img src="{{ asset('assets/images/spam2.png') }}" class="spam-img">
                        <span class="mx-1">=</span>
                        <input type="number" name="spam" class="spam-input my-auto mx-3" required />
                    </div>

                    <div class="d-flex">
                        <button class="g-recaptcha w-100" data-sitekey="{{ config('services.recaptcha.key') }}"
                            data-callback='onSubmit' data-action='submit'>SEND</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- end contact section -->

<script src="https://www.google.com/recaptcha/api.js"></script>

<script>
    function onSubmit(token) {
      document.getElementById("contact-form").submit();
    }
</script>
@endsection