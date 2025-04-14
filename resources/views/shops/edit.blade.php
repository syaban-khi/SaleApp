<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Shop Data</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="" />
        <meta name="keywords" content="">
        <meta name="author" content="Phoenixcoded" />
        <link rel="icon" href="{{ asset('assets/images/logo-item.png') }}" type="image/png">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
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
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Shop Profile</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('shops.index') }}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item">Shop</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Edit Shop Data</h5>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('shops.update', $shops->shopID) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="shop_name" class="form-label">Shop Name</label>
                                        <input type="text" class="form-control" id="shop_name" name="shop_name" value="{{ $shops->shop_name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ $shops->address }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $shops->phone_number }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $shops->email }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Logo</label>
                                        <input type="file" class="form-control" id="logo" name="logo">
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
    </body>
</html>
