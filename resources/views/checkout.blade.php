@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">

<!---Hero Section-->
<section id="hero" style="background-image: url({{ asset('assets/images/checkout.png') }});">
    <div class="hero-container">
        <div class="hero-logo">
            <h1 class="font-weight-bold">Checkout</h1>
        </div>
    </div>
</section>
<!---End of Hero Section-->

<div class="container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="accordion" id="accordionExample">
                            <div class="card border-0">
                                <div class="card-header d-flex justify-content-between" id="headingOne">
                                    <h2 class="mb-0">
                                        <button id="turnbf" class="btn btn-link d-flex turnaf clps" type="button"
                                            data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <span class="mr-2">
                                                <i class="fa fa-eye"></i>
                                            </span>
                                            <p class="clps-btn-style">Show/Hide Cart Items</p>
                                        </button>
                                    </h2>
                                    <span class="my-2 text-danger h4">US $ 3600</span>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body p-0">
                                        <div>
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr class="ml-3">
                                                        <th></th>
                                                        <th class="text-left" width="50%">Product</th>
                                                        <th class="text-center" width="45%">Pieces</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="rounded"
                                                                style="background-image: url(https://unsplash.com/photos/ZBwQ2bCbJjw/download?force=true&w=640); width: 60px; height: 60px; background-size: cover;">
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-left">Spy Suit</td>
                                                        <td class="align-middle text-center">1 pieces</td>
                                                        <td class="align-middle text-right">$698</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="rounded"
                                                                style="background-image: url(https://unsplash.com/photos/vOwj38HFrJ0/download?force=true&w=640); width: 60px; height: 60px; background-size: cover;">
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-left">Hyper Hero Suit
                                                        </td>
                                                        <td class="align-middle text-center">2 pieces</td>
                                                        <td class="align-middle text-right">$1998</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="rounded"
                                                                style="background-image: url(https://unsplash.com/photos/FxraOMAkLOs/download?force=true&w=640); width: 60px; height: 60px; background-size: cover;background-position: center center;">
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-left">Stash Boots</td>
                                                        <td class="align-middle text-center">1 pieces</td>
                                                        <td class="align-middle text-right">$849</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" class="align-middle text-right">
                                                            Shipping</td>
                                                        <td class="align-middle text-right">55</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" class="align-middle text-right">
                                                            Total</td>
                                                        <td class="align-middle text-right">3600</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-secondary border-0 h4 text-center bg-alert rounded-0"
                                    role="alert">
                                    Order Information
                                </div>
                                <form action="{{ route('checkout.order') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control space" id="name" name="name"
                                                value="{{ old('name') }}" placeholder="Please enter your name  . . ."
                                                required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control space" id="email" name="email"
                                                value="{{ old('email') }}" placeholder="Please enter your email . . ."
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" class="form-control space" id="phone" name="phone"
                                                value="{{ old('phone') }}"
                                                placeholder="Please enter your phone number . . ." required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control space" id="city" name="city"
                                                value="{{ old('city') }}" placeholder="Please enter your city . . ."
                                                required>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control space" id="address" name="address"
                                                value="{{ old('address') }}"
                                                placeholder="Please enter your address . . ." required>
                                        </div>
                                    </div>

                                    <div class="list-group mt-5 p-0 justify-content-center" id="allList" role="tablist"
                                        style="flex-direction: row;">
                                        <button type="submit" class="w-50 py-2 rounded text-center btns">
                                            Submit Order
                                            <i class="fa fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
        var btns = document.querySelector('.home')
        btns.addEventListener('click', function() {
            alert('Thank for your order !');
        }, false);
        $(document).ready(function() {
            $('#delete').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var item = button.data('title')
                var modal = $(this)
                modal.find('.modal-title').text(item)
            })
            $(function() {
                $('#allList').tab('show')
            })
            $(function() {
                $('#card').tab('show')
            })
            $('.icons').click(function() {
                $(this).toggleClass('iconck').siblings().removeClass('iconck')
            })
            $('#turnbf').click(function() {
                $('#turnbf span').addClass('turn')
            })
            $('.turnaf').click(function() {
                $('.turnaf span').toggleClass('turnb')
            })
        });
</script>

@endsection