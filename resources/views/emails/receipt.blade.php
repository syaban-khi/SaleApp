<!DOCTYPE html>
<html>
    <head>
        <title>Purchase Receipt</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <style>
            .receipt-container {
                width: 320px;
                margin: 30px auto;
                padding: 20px;
                background: #fff;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-family: 'Courier New', Courier, monospace;
                box-shadow: 2px 2px 10px rgba(0,0,0,0.1);
            }
            .header {
                text-align: center;
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 10px;
                border-bottom: 1px dashed #000;
                padding-bottom: 5px;
            }
            .info p {
                margin: 5px 0;
                font-size: 14px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 10px 0;
            }
            table th, table td {
                text-align: left;
                padding: 5px;
                font-size: 14px;
            }
            table th {
                border-bottom: 1px solid #000;
            }
            .total {
                font-weight: bold;
                font-size: 16px;
                text-align: right;
            }
            .button-container {
                text-align: center;
                margin-top: 10px;
            }
            .btn {
                display: inline-block;
                padding: 8px 20px;
                font-size: 14px;
                text-decoration: none;
                color: #fff;
                border-radius: 3px;
                cursor: pointer;
                margin: 5px;
            }
            .btn-print {
                background: #28a745;
            }
            .btn-back {
                background: #007bff;
            }
            .btn:hover {
                opacity: 0.8;
            }
            @media print {
                .pcoded-navbar {
                    display: none;
                }

                .button-container, .btn-back {
                    display: none;
                }

                .receipt-container {
                    margin: 0 auto;
                    padding: 20px;
                    background: #fff;
                    border: 1px solid #ccc;
                    font-family: 'Courier New', Courier, monospace;
                    font-size: 14px;
                }

                .info {
                    font-size: 12px;
                    margin-bottom: 10px;
                }

                table {
                    width: 100%;
                    margin-bottom: 20px;
                    border-collapse: collapse;
                    font-size: 12px;
                }

                table th, table td {
                    border: 1px solid #ccc;
                    padding: 8px;
                    text-align: left;
                }

                table th {
                    background-color: #f1f1f1;
                }

                .total {
                    font-weight: bold;
                    margin-top: 10px;
                }
            }
        </style>
    </head>
    <body>
        <section class="pcoded-main-container">
            <div class="pcoded-content">
                <body>
                    <div class="receipt-container">
                        <div class="store-info">
                            <img src="{{ asset('assets/images/logo-item.png') }}" alt="Store Logo">
                            <h1>K STORE</h1>
                            <p>Jalan Caia Blok K</p>
                        </div>
                        <div class="header">Sales Receipt</div>
                        <div class="info">
                            <p><strong>Transaction Id:</strong> {{ $sale->saleID }}</p>
                            <p><strong>Sale Date:</strong> {{ $sale->sale_date }}</p>
                            <p><strong>Customer Name:</strong> {{ $sale->customer ? $sale->customer->customer_name : 'General Customer' }}</p>
                            <p><strong>Cashier Name:</strong> {{ $sale->cashier_name }}</p>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Unit</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sale->saleDetail as $detail)
                                    <tr>
                                        <td>{{ $detail->product->product_name }}</td>
                                        <td>Rp {{ number_format($detail->product->price, 2) }}</td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>Rp {{ number_format($detail->product->price * $detail->quantity, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="info">
                            <p class="total"><strong>Total Amount:</strong> Rp {{ number_format($sale->total_amount, 2) }}</p>
                            <p><strong>Amount Paid:</strong> Rp {{ number_format($sale->paid_amount, 2) }}</p>
                            <p><strong>Change:</strong> Rp {{ number_format($sale->change, 2) }}</p>
                        </div>
                    </div>
                </body>
            </div>
        </section>
        <script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
    </body>
</html>
