<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>YellowTech | Order</title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset('admin/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="skin-blue">
    <div class="container" style="background-color: #e2e2e2 ">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Order
                {{ $order->id }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('orders') }}">Orders</a></li>
                <li class="active">Show</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <img src="{{ asset('assets/logo/logo_Y_vector.png') }}" alt="YellowTech Logo" width="100">
                        <small class="pull-right" style="margin-top: 25px">Date: {{ $order->created_at->format('d/m/Y')
                            }}</small>
                    </h2>
                </div><!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>YellowTech</strong><br>
                        werkstrasse 2<br>
                        Gronau Leine, 31028<br>
                        Phone: +961 70 285 659<br />
                        Email: yellow.tech.953@gmail.com
                    </address>
                </div><!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>{{ $order->client->name }}</strong><br>
                        {{ $order->client->city }}, {{ $order->client->address }}<br>
                        Phone: {{ $order->client->phone }}<br />
                        Email: {{ $order->client->email }}
                    </address>
                </div><!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Order:</b> {{ $order->id }}<br />
                    <b>Payment Due:</b> {{ $order->created_at->format('d/m/Y') }}<br />
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($order->products as $index => $product)
                            <tr>
                                <td class="center">{{ $index }}</td>
                                <td class="left strong">{{ ucwords($product->name) }}</td>
                                <td class="right">${{ number_format($product->unit_price, 2) }}</td>
                                <td class="center">{{ $product->pivot->quantity }}</td>
                                <td class="right">${{ number_format($product->unit_price * $product->pivot->quantity, 2)
                                    }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Data Yet ...</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                </div><!-- /.col -->
                <div class="col-xs-6">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Subtotal:</th>
                                <td>${{ number_format($order->total_price,2) }}</td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td>$0.00</td>
                            </tr>
                            <tr>
                                <th>Discount:</th>
                                <td>$0.00</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>${{ number_format($order->total_price,2) }}</td>
                            </tr>
                        </table>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div>

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset('admin/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('admin/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/js/app.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin/js/demo.js') }}" type="text/javascript"></script>
</body>

</html>