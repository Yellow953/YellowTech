<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>YellowTech | New Contact Email</title>

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
            <div class="message text-center my-5">
                <h2>Contact Form Submission</h2>
                <p><strong>Name:</strong> {{ $details ['name'] }}</p>
                <p><strong>Email:</strong> {{ $details ['email'] }}</p>
                <p><strong>Message:</strong> {{ $details ['message'] }}</p>
            </div>
            <br><br><br>
        </div>
    </div>
</body>

</html>