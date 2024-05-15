<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YellowTech | Order Confirmation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="container">
        <div class="header text-center">
            <img src="{{ asset('assets/logo/logo_Y_vector.png') }}" alt="">
        </div>

        <div class="body">
            <div class="thankyou text-center my-5">
                <h2>Thank You For Your Purchase</h2>
                <p>This order is to confirm your order. Your Order Number is {{ $order->id }}.</p>
            </div>

            <div class="billing my-5">
                <h3 class="mb-4">Shipping Address</h3>
                <div class="row">
                    <div class="col-md-6">
                        <p>Name: {{ $order->user->name }}</p>
                        <p>Email: {{ $order->user->email }}</p>
                        <p>Phone Number: {{ $order->user->phone }}</p>
                    </div>
                    <div class="col-md-6">
                        <p>Payment Method: Cash On Delivery</p>
                        <p>City: {{ $order->user->city }}</p>
                        <p>Address: {{ $order->user->address }}</p>
                    </div>
                </div>
            </div>

            <div class="items my-5">
                <h3 class="mb-4">Order Details</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Product</td>
                            <td>Quantity</td>
                            <td>Unit Price</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total=0
                        @endphp

                        @foreach ($order->products as $product)
                        <tr>
                            <td>{{ ucwords($product->name) }}</td>
                            <td>{{ number_format($product->pivot->quantity) }}</td>
                            <td>{{ number_format($product->unit_price, 2) }}</td>
                            <td>{{ number_format($product->pivot->quantity * $product->unit_price, 2) }}</td>
                        </tr>

                        @php
                        $total+= $product->pivot->quantity * $product->unit_price
                        @endphp

                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="items my-5">
                <h3 class="mb-4">Total</h3>
                <div class="row">
                    <div class="offset-md-9 col-md-3 d-flex justify-content-between">
                        <span>Sub Total:</span> {{ number_format($total, 2) }}
                    </div>

                    <div class="offset-md-9 col-md-3 d-flex justify-content-between">
                        <span>Discount:</span> {{ number_format(($total - $order->total_price), 2) }}
                    </div>

                    <div class="offset-md-9 col-md-3 d-flex justify-content-between">
                        <span>Total:</span> {{ number_format($order->total_price, 2) }}
                    </div>
                </div>
            </div>
            <br><br><br>
        </div>
    </div>
</body>

</html>