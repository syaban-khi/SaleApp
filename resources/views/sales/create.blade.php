<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Create Sale Data</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="" />
        <meta name="keywords" content="">
        <meta name="author" content="Phoenixcoded" />
        <link rel="icon" href="{{ asset('assets/images/logo-item.png') }}" type="image/png">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                                    <h5 class="m-b-10">Transaction</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}"><i class="feather icon-file-text"></i></a></li>
                                    <li class="breadcrumb-item">Transaction</li>
                                    <li class="breadcrumb-item">Sale Create</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Create Sale Data</h5>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <form action="{{ route('sales.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="sale_date">Sale Date</label>
                                            <input type="date" name="sale_date" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="customerID" class="form-label">Customer Name</label>
                                            <select name="customerID" id="customerID" class="form-control select2">
                                                <option value="">General Customer</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->customerID }}">{{ $customer->customer_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="cashier_name">Cashier Name</label>
                                            <input type="text" id="cashier_name" class="form-control" value="{{ $user->name }}" readonly>
                                            <input type="hidden" name="cashier_name" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div id="sale_details">
                                        <div class="sale-detail form-row">
                                            <div class="form-group col-md-9">
                                                <label for="productID">Product Name</label>
                                                <select name="sale_details[0][productID]" id="productID_0" class="form-control select2" required>
                                                    <option value="" disabled selected>Select Item</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->productID }}" data-price="{{ $product->price }}">
                                                            {{ $product->product_name }} - Rp {{ number_format($product->price, 2) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="quantity">Quantity</label>
                                                <input type="number" name="sale_details[0][quantity]" class="form-control quantity-input" min="1" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" id="add_item" class="btn btn-primary mt-3">Add Item</button>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="total_quantity">Total Quantity</label>
                                            <input type="number" id="total_quantity" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="total_amount">Total Amount</label>
                                            <input type="number" name="total_amount" id="total_amount" class="form-control" required readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="paid_amount">Amount Paid</label>
                                            <input type="number" name="paid_amount" id="paid_amount" class="form-control" min="0" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="change">Change</label>
                                            <input type="number" name="change" id="change" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ route('sales.index') }}" class="btn btn-secondary">Back</a>
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
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const saleDetails = document.querySelector('#sale_details');
                const totalAmountInput = document.querySelector('#total_amount');
                const totalQuantityInput = document.querySelector('#total_quantity');
                const paidAmountInput = document.querySelector('#paid_amount');
                const changeInput = document.querySelector('#change');
                const addItemButton = document.querySelector('#add_item');

                let itemCount = 1;

                function calculateTotals() {
                    let total = 0;
                    let totalQuantity = 0;

                    Array.from(saleDetails.getElementsByClassName('sale-detail')).forEach(function (detail) {
                        const productSelect = detail.querySelector('select');
                        const quantityInput = detail.querySelector('input');
                        const productPrice = parseFloat(productSelect.selectedOptions[0].getAttribute('data-price'));
                        const quantity = parseInt(quantityInput.value);

                        if (quantity > 0) {
                            total += productPrice * quantity;
                            totalQuantity += quantity;
                        }
                    });

                    totalAmountInput.value = total.toFixed(2);
                    totalQuantityInput.value = totalQuantity;
                    calculateChange();
                }

                function calculateChange() {
                    const totalAmount = parseFloat(totalAmountInput.value);
                    const paidAmount = parseFloat(paidAmountInput.value);

                    if (!isNaN(paidAmount) && paidAmount >= totalAmount) {
                        const change = paidAmount - totalAmount;
                        changeInput.value = change.toFixed(2);
                    } else {
                        changeInput.value = 0;
                    }
                }

                $('#add_item').click(function() {
                    let newItemRow = `
                        <div class="sale-detail form-row mt-2">
                            <div class="form-group col-md-9">
                                <label>Product Name</label>
                                <select name="sale_details[${itemCount}][productID]" class="form-control select2 product-select" required>
                                    <option value="" disabled selected>Select Item</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->productID }}" data-price="{{ $product->price }}">
                                            {{ $product->product_name }} - Rp {{ number_format($product->price, 2) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Quantity</label>
                                <input type="number" name="sale_details[${itemCount}][quantity]" class="form-control quantity-input" min="1" required>
                            </div>
                        </div>
                    `;

                    $('#sale_details').append(newItemRow);
                    itemCount++;

                    $('.product-select').last().select2({
                        placeholder: "Search Product...",
                        allowClear: true,
                        width: '100%',
                        dropdownParent: $('#sale_details')
                    });
                });
                
                saleDetails.addEventListener('change', calculateTotals);
                paidAmountInput.addEventListener('input', calculateChange);

                document.querySelector('#sales-form').addEventListener('submit', function (event) {
                    event.preventDefault();
                    alert('Form submitted');
                });
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#customerID').select2({
                    placeholder: "Search Customer...",
                    allowClear: true,
                    width: '100%',
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#customerID, #productID_0').select2({
                    placeholder: "Search...",
                    allowClear: true,
                    width: '100%',
                    dropdownParent: $('#sale_details')
                });
            });
        </script>
    </body>
</html>
   
