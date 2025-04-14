<!DOCTYPE html>
<html lang="en">
    <head>
        <title>App Sale</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="" />
        <meta name="keywords" content="">
        <meta name="author" content="Phoenixcoded" />
        <link rel="icon" href="assets/images/logo-item.png" type="image/png">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body class="">
        <div class="loader-bg">
            <div class="loader-track">
                <div class="loader-fill"></div>
            </div>
        </div>
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
                            <img class="img-radius" src="assets/images/user/profile.jpg" alt="User-Profile-Image">
                            <div class="user-details">
                                <span>{{ $user->name }}</span>
                                <div id="more-details">Junior Web<i class="fa fa-chevron-down m-l-5"></i></div>
                            </div>
                        </div>
                        <div class="collapse" id="nav-user-link">
                            <ul class="list-unstyled">
                                <li class="list-group-item">
                                    <a href="{{ route('logout') }}" onclick="return confirm('Are you sure you want to log out?')"><i class="feather icon-log-out m-r-5"></i>Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <ul class="nav pcoded-inner-navbar ">
                        <li class="nav-item pcoded-menu-caption">
                            <label>Menu</label>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                        </li>
                        <li class="nav-item pcoded-menu-caption">
                            <label>Form &amp; table</label>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('suppliers.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span><span class="pcoded-mtext">Supplier</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layers"></i></span><span class="pcoded-mtext">Category</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Product</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customers.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Customer</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sales.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Transaction</span></a>
                        </li>
                        <li class="nav-item pcoded-menu-caption">
                            <label>Report</label>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reportSale') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-print"></i></span><span class="pcoded-mtext">Sale Report</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reportDetail') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-print"></i></span><span class="pcoded-mtext">Detail Report</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
            <div class="m-header">
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
                <a href="#!" class="b-brand">
                    <img src="assets/images/logo-icon.png" alt="" class="logo-thumb">
                </a>
                <a href="#!" class="mob-toggler">
                    <i class="feather icon-more-vertical"></i>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <div class="dropdown mega-menu">
                            <a class="dropdown-toggle h-drop" href="{{ route('shops.index') }}">
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
                                    <img src="assets/images/user/profile.jpg" class="img-radius" alt="User-Profile-Image">
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
        <div class="pcoded-main-container">
            <div class="pcoded-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Dashboard Analytics</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item">Dashboard</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xl-6 mb-4">
                        <div class="card bg-warning text-white">
                            <div class="card-header">
                                <h5 class="mb-0">⚠️ Stock Alert</h5>
                            </div>
                            <div class="card-body bg-white text-dark">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="bg-warning text-white">
                                            <tr>
                                                <th>No</th>
                                                <th>Product Name</th>
                                                <th>Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($lowStockProducts->count() > 0)
                                                @foreach ($lowStockProducts as $index => $product)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $product->product_name }}</td>
                                                        <td class="text-danger font-weight-bold">{{ $product->stock }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="3" class="text-center text-muted">There are no products with low stock</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6 mb-4">
                        <div class="card bg-success text-white">
                            <div class="card-header">
                                <h5 class="mb-0">🔥 Bestseller Products</h5>
                            </div>
                            <div class="card-body bg-white text-dark">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="bg-success text-white">
                                            <tr>
                                                <th>No</th>
                                                <th>Product Name</th>
                                                <th>Total Sold</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($bestsellerProducts->count() > 0)
                                                @foreach ($bestsellerProducts as $index => $product)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $product->product_name }}</td>
                                                        <td class="text-primary font-weight-bold">{{ $product->total_sold }}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="3" class="text-center text-muted">No bestseller products yet</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Monthly Revenue Chart</h5>
                            </div>
                            <div class="card-body">
                                <div id="line-chart-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Account</h5>
                            </div>
                            <div class="card-body bg-white text-dark">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="bg-warning text-white">
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6 mb-4">
                        <div class="card support-bar overflow-hidden">
                            <div class="card-body pb-0 text-center">
                                <h2 class="m-0">{{ $sales->count() }}</h2>
                                <span class="text-c-blue">Total Transactions</span>
                                <p class="mb-3 mt-3">The total number of transactions that have been carried out.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6 mb-4">
                        <div class="card support-bar overflow-hidden">
                            <div class="card-body pb-0 text-center">
                                <h2 class="m-0">Rp {{ number_format($sales->sum('total_amount'), 2) }}</h2>
                                <span class="text-c-blue">Total Revenue</span>
                                <p class="mb-3 mt-3">The total revenue from all transactions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/vendor-all.min.js"></script>
        <script src="assets/js/plugins/bootstrap.min.js"></script>
        <script src="assets/js/pcoded.min.js"></script>
        <script src="assets/js/pages/dashboard-main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
           document.addEventListener("DOMContentLoaded", function () {
                var options = {
                    series: [{
                        name: "Revenue",
                        data: @json($data)
                    }],
                    chart: {
                        type: 'line',
                        height: 350
                    },
                    xaxis: {
                        categories: @json($labels),
                        type: 'category'
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    tooltip: {
                        x: {
                            format: 'MMM yyyy'
                        }
                    }
                };

                var chart = new ApexCharts(document.querySelector("#line-chart-1"), options);
                chart.render();
            });
        </script>
    </body>
</html>
