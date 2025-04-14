<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Welcome</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link rel="icon" href="assets/images/logo-item.png" type="image/png">
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets2/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <link href="assets2/css/main.css" rel="stylesheet">
    </head>
    <body class="index-page">
        <header id="header" class="header d-flex align-items-center fixed-top">
            <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
                <a href="#" class="logo d-flex align-items-center">
                    <h1 class="sitename">Sale App</h1>
                </a>
                <nav id="navmenu" class="navmenu">
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            </div>
        </header>
        <main class="main">
            <section id="hero" class="hero section dark-background">
                <img src="assets2/img/background.jpg" alt="" data-aos="fade-in">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4">
                            <h1 data-aos="fade-up">Create an Account</h1>
                            <div class="card p-4 border-0 shadow-lg mt-4" data-aos="fade-up" data-aos-delay="300">
                                <hr>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('register.post') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="text" name="name" class="form-control" placeholder="Username" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="password" name="confirmation_password" class="form-control" placeholder="Confirm Password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                                </form>
                                <hr>
                                <p class="mb-0 text-muted">Already have an account? <a href="{{ route('login') }}" class="f-w-400">Sign in</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        <div id="preloader"></div>
        <script src="assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets2/vendor/php-email-form/validate.js"></script>
        <script src="assets2/vendor/aos/aos.js"></script>
        <script src="assets2/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets2/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets2/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="assets2/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets2/js/main.js"></script>
    </body>
</html>
