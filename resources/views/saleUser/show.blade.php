<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sales Receipt</title>
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

            .shop-info {
                margin-bottom: 20px;
            }

            .shop-info img.shop-logo {
                width: 120px;
                height: auto;
                display: block;
                margin: 0 auto 10px;
            }

            .header {
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 10px;
                border-bottom: 1px dashed #000;
                padding-bottom: 5px;
                text-align: center;
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
                margin-top: 20px;
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
        <div class="loader-bg">
            <div class="loader-track">
                <div class="loader-fill"></div>
            </div>
        </div>
        <nav class="pcoded-navbar">
            <div class="navbar-wrapper">
                <div class="navbar-content scroll-div">
                    <div class="">
                        <div class="main-menu-header">
                            <img class="img-radius" src="{{ asset('assets/images/user/profile.jpg') }}" alt="User-Profile-Image">
                            <div class="user-details">
                                <span>{{ $user->name }}</span>
                                <div id="more-details">Junior Web<i class="fa fa-chevron-down m-l-5"></i></div>
                            </div>
                        </div>
                        <div class="collapse" id="nav-user-link">
                            <ul class="list-unstyled">
                                <li class="list-group-item">
                                    <a href="{{ route('logout') }}" onclick="return confirm('Are you sure you want to log out?')">
                                        <i class="feather icon-log-out m-r-5"></i>Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <ul class="nav pcoded-inner-navbar ">
                        <li class="nav-item pcoded-menu-caption">
                            <label>Menu</label>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('homeUser') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                        </li>
                        <li class="nav-item pcoded-menu-caption">
                            <label>Form &amp; table</label>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customerUser.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Customer</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('saleUser.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Transaction</span></a>
                        </li>
                        <li class="nav-item pcoded-menu-caption">
                            <label>Report</label>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reportDetailUser') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-print"></i></span><span class="pcoded-mtext">Detail Report</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
            <div class="m-header">
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
                <a href="#!" class="b-brand">
                    <img src="{{ asset('assets/images/logo-icon.png') }}" alt="" class="logo-thumb">
                </a>
                <a href="#!" class="mob-toggler">
                    <i class="feather icon-more-vertical"></i>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <div class="dropdown mega-menu">
                            <a class="dropdown-toggle h-drop" href="#" data-toggle="dropdown">
                                Sale App
                            </a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li>
                        <div class="dropdown drp-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="feather icon-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-notification">
                                <div class="pro-head">
                                    <img src="{{ asset('assets/images/user/profile.jpg') }}" class="img-radius" alt="User-Profile-Image">
                                    <span>{{ $user->name }}</span>
                                    <a href="{{ route('logout') }}" class="dud-logout" title="Logout" onclick="return confirm('Are you sure you want to log out?')">
                                        <i class="feather icon-log-out"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <section class="pcoded-main-container">
            <div class="pcoded-content">
                <div class="receipt-container">
                    <div class="shop-info text-center">
                        <img src="{{ asset('assets/images/logo-item.png') }}" alt="Shop Logo" class="shop-logo">
                        <p><strong>{{ $shop->shop_name }}</strong></p>
                        <p>Alamat: {{ $shop->address }}</p>
                        <p>Telp: {{ $shop->phone_number }}</p>
                        <p>Email: {{ $shop->email }}</p>
                    </div>
                    <div class="header text-center">Sales Receipt</div>
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
                <div class="button-container text-center">
                    <button class="btn btn-print" onclick="window.print()">Print Receipt</button>
                    <a href="{{ route('saleUser.index') }}" class="btn btn-back">Back</a>
                </div>
            </div>
        </section>
        <script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
    </body>
</html>
