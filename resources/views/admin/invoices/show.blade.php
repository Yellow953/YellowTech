<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="shortcut icon" href="{{ asset('assets/logo/favicon.png') }}" type="image/x-icon">

    <title>YellowTech | Invoice {{ $invoice->id }}</title>

    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Theme style -->
    <link href="{{ asset('admin/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />

    <style>
        .mb-4 {
            margin-bottom: 20px;
        }

        @media print {

            .breadcrumb,
            .btn {
                display: none !important;
            }

            .container {
                background-color: #fff !important;
            }

            @page {
                margin: 0;
            }

            body {
                margin: 1.6cm;
            }
        }
    </style>
</head>

<body class="skin-blue">
    <div class="container" style="background-color: #e2e2e2 ">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Invoice
                {{ $invoice->invoice_number }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{ route('invoices') }}">Invoices</a></li>
                <li class="active">Show</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <img src="{{ asset('assets/logo/logo.png') }}" alt="YellowTech Logo" width="100">
                        <small class="pull-right" style="margin-top: 25px">Date: {{
                            $invoice->date }}</small>
                    </h2>
                </div>
            </div>
            <!-- info row -->
            <div class="row mb-4 invoice-info">
                <div class="col-md-3 my-auto invoice-col">
                    <strong>From</strong>
                    <address>
                        Joe Mazloum <br>
                        Beirut, Lebanon<br>
                        Phone: +961 70 285 659<br />
                        Email: yellow.tech.953@gmail.com
                    </address>
                </div><!-- /.col -->
                <div class="col-md-3 my-auto invoice-col">
                    <strong> To</strong>
                    <address>
                        {{ ucwords($invoice->user->name) }}<br>
                        {{ ucwords($invoice->user->city) }}, {{ $invoice->user->address }}<br>
                        Phone: {{ $invoice->user->phone }}<br />
                        Email: {{ $invoice->user->email }}
                    </address>
                </div>
                <div class="col-md-3 my-auto invoice-col">
                    <strong>Project</strong>
                    <address>
                        {{ ucwords($invoice->project->name) }}<br>
                        {{ $invoice->project->description }}
                    </address>
                </div>
                <div class="col-md-3 my-auto invoice-col">
                    <strong>Invoice #:</strong> {{ $invoice->invoice_number }}<br />
                    <strong>Payment Due:</strong> {{ $invoice->date }}<br />
                </div>
            </div>

            <!-- Table row -->
            <div class="row">
                <div class="col-md-12 table-responsive">
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
                            @forelse ($invoice->items as $index => $item)
                            <tr>
                                <td class="center">{{ $index }}</td>
                                <td class="left strong">{{ ucwords($item->item) }}</td>
                                <td class="right">${{ number_format($item->unit_price, 2) }}</td>
                                <td class="center">{{ $item->quantity }}</td>
                                <td class="right">${{ number_format($item->unit_price * $item->quantity, 2)
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
                </div>
            </div><!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                </div>
                <div class="col-xs-6">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Subtotal:</th>
                                <td>${{ number_format($invoice->sub_total,2) }}</td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td>$0.00</td>
                            </tr>
                            <tr>
                                <th>Discount:</th>
                                <td>%{{ $invoice->discount }}</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>${{ number_format($invoice->total_price,2) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div><!-- /.row -->
        </section><!-- /.content -->

        <a href="#" id="print" class="btn btn-sm btn-primary" style="position: fixed; bottom: 10%; right: 1%;">Print</a>
        <a href="{{ route('invoices.send', $invoice->id) }}" id="send" class="btn btn-sm btn-success"
            style="position: fixed; bottom: 5%; right: 1%;">Send</a>
    </div>

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset('admin/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset('admin/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/js/app.min.js') }}" type="text/javascript"></script>

    <script>
        // Print
        document.getElementById('print').addEventListener('click', ()=>{
            window.print();
        })

        // Send
        document.getElementById('send').addEventListener('click', function (event) {
            if (!confirm('This will send this Invoice to the Client via Gmail. Are you sure you want to proceed?')) {
                event.preventDefault();
            }
        });
    </script>
</body>

</html>