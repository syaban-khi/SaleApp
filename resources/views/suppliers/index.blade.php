<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Supplier List</title>
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
        <section class="pcoded-main-container">
            <div class="pcoded-content">
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="page-header-title">
                                    <h5 class="m-b-10">Supplier</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('suppliers.index') }}"><i class="feather icon-shopping-cart"></i></a></li>
                                    <li class="breadcrumb-item">Supplier</a></li>
                                    <li class="breadcrumb-item">Supplier List</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <a href="{{ route('suppliers.create') }}" class="btn btn-primary btn-sm">+ Create</a>
                                    <a href="{{ route('suppliers.print') }}" class="btn btn-secondary btn-sm">🖨 Print</a>
                                </div>
                            </div>
                            <form action="{{ route('suppliers.index') }}" method="GET">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request()->input('search') }}">
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Supplier List</h5>
                        </div>
                        <div class="card-body table-border-style">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Supplier Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($suppliers as $supplier)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $supplier->supplier_name }}</td>
                                                <td>
                                                    <a href="{{ route('suppliers.edit', $supplier->supplierID) }}" class="btn btn-warning btn-sm" title="Edit">
                                                        <i class="feather icon-edit"></i>
                                                    </a>
                                                    <form action="{{ route('suppliers.destroy', $supplier->supplierID) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this supplier?')" title="Delete">
                                                            <i class="feather icon-trash-2"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                    {{ $suppliers->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="assets/js/vendor-all.min.js"></script>
        <script src="assets/js/plugins/bootstrap.min.js"></script>
        <script src="assets/js/pcoded.min.js"></script>
    </body>
</html>
