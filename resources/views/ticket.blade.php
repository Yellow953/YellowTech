<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('assets/logo/favicon.png') }}" type="image/x-icon">

    <title>YellowTech | Ticket</title>

    {{-- Coding Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/css/ticket.css') }}">
</head>

<body>
    <section class="vh-100">
        <div class="container py-auto h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-12">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('assets/images/tickets5.jpg') }}" alt="login form"
                                    class="img-fluid left-image" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    @include('admin.layouts._flash')
                                    <form method="POST" action="{{ route('tickets.create') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="d-flex justify-content-center align-items-center mb-3 pb-1">
                                            <img src="{{ asset('assets/logo/logo.png') }}" alt="YellowTech Logo"
                                                class="logo" />
                                            <h2 class="mx-3">Ticket Portal</h2>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn text-dark" data-toggle="modal"
                                                data-target="#ticketModal">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                    fill="currentColor" class="bi bi-info-circle-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
                                                </svg>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="ticketModal" tabindex="-1" role="dialog"
                                                aria-labelledby="ticketModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ticketModalLabel">Tickets</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container">
                                                                <h4>What is a Ticket?</h4>
                                                                <p class="text-sm mb-3">
                                                                    A ticket serves as a formal request for service or
                                                                    support. For instance, if you
                                                                    encounter a bug or error, you can create a ticket,
                                                                    and we will promptly address the
                                                                    issue. Similarly, if you have suggestions for
                                                                    improvement, submitting a ticket is the
                                                                    way to go.
                                                                </p>

                                                                <h4>How many Tickets am i allowed to create?</h4>
                                                                <p class="text-sm mb-3">
                                                                    The number of tickets you are permitted to create
                                                                    depends on the terms outlined in
                                                                    your contract or agreement. If this information is
                                                                    not specified, you have the
                                                                    flexibility to create unlimited tickets for bugs or
                                                                    errors and up to three tickets for
                                                                    improvements.
                                                                </p>

                                                                <h4>What is the typical process?</h4>
                                                                <p class="text-sm mb-3">
                                                                    Upon submission of your ticket, our team receives an
                                                                    immediate notification, and our
                                                                    development experts swing into action. Should any
                                                                    clarification be required or
                                                                    additional information needed, we will reach out to
                                                                    you promptly. Once the task is
                                                                    completed, you will be notified via email or
                                                                    WhatsApp.
                                                                </p>

                                                                <h4>What is the estimated time of completion?</h4>
                                                                <p class="text-sm mb-3">
                                                                    The time required to address each ticket varies
                                                                    depending on the complexity of the
                                                                    task. Typically, you can anticipate completion
                                                                    within 2 to 5 days, although this
                                                                    timeframe may fluctuate based on the intricacy of
                                                                    the issue at hand.
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="name">Name *</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                value="{{ old('name') }}" placeholder="Please Enter your Name..."
                                                required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email">Email *</label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                value="{{ old('email') }}" placeholder="Please Enter your Email..."
                                                required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="subject">Subject *</label>
                                            <input type="text" id="subject" class="form-control" name="subject"
                                                value="{{ old('subject') }}"
                                                placeholder="Please Enter the Ticket's Subject..." required />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="description">Description *</label>
                                            <textarea type="text" id="description" class="form-control"
                                                name="description" rows="3"
                                                placeholder="Please Describe your Issue in Details..."
                                                required>{{ old('description') }}</textarea>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="attachments">Attachments
                                                <small>(Max:20MB, Screenshots/Images/File...)</small></label>
                                            <input type="file" id="attachments" name="attachments[]"
                                                class="form-control-file form-control border" multiple>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Submit</button>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="{{ route('terms_and_conditions') }}"
                                                class="small text-muted no-underline">Terms of
                                                use.</a>

                                            <a data-toggle="modal" data-target="#ticketModal"
                                                class="small text-muted no-underline">What is a
                                                ticket?</a>

                                            <a href="{{ route('privacy_policy') }}"
                                                class="small text-muted no-underline">Privacy policy</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
</body>

</html>