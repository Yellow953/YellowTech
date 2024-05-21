<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>YellowTech | Invoice {{ $invoice->id }}</title>
</head>

<body
    style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #e2e2e2; color: #333; margin: 0; padding: 0;">
    <div
        style="width: 100%; max-width: 800px; margin: auto; background-color: #fff; padding: 20px; border-radius: 5px;">
        <section style="padding-bottom: 20px; border-bottom: 1px solid #ccc;">
            <h1 style="font-size: 24px; color: #000;">Invoice {{ $invoice->invoice_number }}</h1>
        </section>

        <section class="invoice" style="padding: 20px 0;">
            <div style="margin-bottom: 20px;">
                <div style="width: 50%; float: left;">
                    <h2 style="margin: 0;">
                        <img src="{{ asset('assets/logo/logo_Y_vector.png') }}" alt="YellowTech" style="width: 100px;">
                    </h2>
                </div>
                <div style="width: 50%; float: right; text-align: right;">
                    <small style="margin-top: 25px; color: #999;">Date: {{ $invoice->date }}</small>
                </div>
                <div style="clear: both;"></div>
            </div>

            <div style="margin-bottom: 20px;">
                <div style="width: 50%; float: left;">
                    <h3 style="margin: 0;">From</h3>
                    <address style="margin: 0;">
                        <strong>YellowTech</strong><br>
                        werkstrasse 2<br>
                        Gronau Leine, 31028<br>
                        Phone: +961 70 285 659<br>
                        Email: yellow.tech.953@gmail.com
                    </address>
                </div>
                <div style="width: 50%; float: right;">
                    <h3 style="margin: 0;">To</h3>
                    <address style="margin: 0;">
                        <strong>{{ $invoice->user->name }}</strong><br>
                        {{ $invoice->user->city }}, {{ $invoice->user->address }}<br>
                        Phone: {{ $invoice->user->phone }}<br>
                        Email: {{ $invoice->user->email }}
                    </address>
                </div>
                <div style="clear: both;"></div>
            </div>

            <div style="margin-bottom: 20px;">
                <div style="width: 50%; float: left;">
                    <h3 style="margin: 0;">Project</h3>
                    <address style="margin: 0;">
                        <strong>{{ $invoice->project->name }}</strong><br>
                        {{ $invoice->project->description }}
                    </address>
                </div>
                <div style="width: 50%; float: right;">
                    <b>Invoice #:</b> {{ $invoice->invoice_number }}<br>
                    <b>Payment Due:</b> {{ $invoice->date }}<br>
                </div>
                <div style="clear: both;"></div>
            </div>

            <div style="margin-bottom: 20px;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">#</th>
                            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Item</th>
                            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Unit Price</th>
                            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Quantity</th>
                            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($invoice->items as $index => $item)
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $index }}</td>
                            <td style="border: 1px solid #ddd; padding: 8px;">{{ ucwords($item->item) }}</td>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: right;">${{
                                number_format($item->unit_price, 2) }}</td>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">{{ $item->quantity }}
                            </td>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: right;">${{
                                number_format($item->unit_price * $item->quantity, 2) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="border: 1px solid #ddd; padding: 8px; text-align: center;">No Data
                                Yet ...</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div style="margin-bottom: 20px;">
                <div style="width: 50%; float: left;">
                </div>
                <div style="width: 50%; float: right;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Subtotal:</th>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: right;">${{
                                number_format($invoice->sub_total, 2) }}</td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Shipping:</th>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: right;">$0.00</td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Discount:</th>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: right;">%{{ $invoice->discount
                                }}</td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Total:</th>
                            <td style="border: 1px solid #ddd; padding: 8px; text-align: right;">${{
                                number_format($invoice->total_price, 2) }}</td>
                        </tr>
                    </table>
                </div>
                <div style="clear: both;"></div>
            </div>
        </section>
    </div>
</body>

</html>