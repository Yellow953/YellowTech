<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YellowTech | Ticket Confirmation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="container">
        <div class="header text-center">
            <img src="{{ asset('assets/logo/logo.png') }}" alt="">
        </div>

        <div class="body">
            <div class="thankyou text-center my-5">
                <h2>Dear {{ ucwords($ticket->name) }},</h2>
                <p>We received your ticket and working on finishing it as soon as possible. <br>Thank you for your
                    patience.
                    <br>If we require any more informations, we will be contacting you.
                    <br> Your Ticket Number is {{
                    $ticket->id }}.
                </p>
            </div>

            <div class="items my-5">
                <h3 class="mb-4 text-center">Ticket Details</h3>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="card p-4 text-center">
                        <h4>Name: {{ ucwords($ticket->name) }}</h4>
                        <h4>Email: {{ ucwords($ticket->email) }}</h4>
                        <h4>Subject: {{ ucwords($ticket->subject) }}</h4>
                        <h4>Description: </h4>
                        <p>{{ $ticket->description }}</p>
                        <h4>Attachments: {{ $ticket->attachments->count() }}</h4>
                    </div>
                </div>
            </div>

            <br><br><br>
        </div>
    </div>
</body>

</html>