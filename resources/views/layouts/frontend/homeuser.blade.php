<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- css include costum -->
    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cart/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/style.css') }}">
    <!-- font google -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- icon font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"
        integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- script jquery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- header caraousel -->
    <header>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg bg-white">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('assets/SportZenth.png') }}" alt="Bootstrap" width="120">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('homeuser') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product_page') }}">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about_page') }}">About</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <div class="dropdown me-5">
                                <button type="button" class="btn border-0 bg-light position-relative ms-auto"
                                    data-bs-toggle="dropdown">
                                    <i class="fa fa-shopping-cart"><span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{ count((array) session('cart')) }}</span></i>
                                    Cart
                                </button>

                                <div class="dropdown-menu">
                                    <div class="row total-header-section">
                                        @php $total = 0 @endphp
                                        @foreach ((array) session('cart') as $id => $details)
                                            @php $total += $details['harga'] * $details['quantity'] @endphp
                                        @endforeach

                                        <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                            <p>Total: <span class="text-info">Rp. {{ $total }}</span></p>

                                        </div>

                                    </div>

                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                            <div class="row cart-details">
                                                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                    <img src="/img/{{ $details['image'] }}">
                                                </div>
                                                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                    <p>{{ $details['title'] }}</p>
                                                    <span class="price text-info">Rp.
                                                        {{ number_format($details['harga']) }}</span>
                                                    <span class="ms-2">Jumlah: {{ $details['quantity'] }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View
                                                all</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="header-top-right">
                        <div class="dropdown">
                            <a href="#" id="topbarUserDropdown"
                                class="user-dropdown d-flex align-items-center dropend dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="text">
                                    <h6 class="user-dropdown-name">{{ auth()->user()->name }}</h6>
                                    <p class="user-dropdown-status text-sm text-muted">
                                        Member
                                    </p>
                                </div>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown"
                                style="">
                                <li><a class="dropdown-item" href="#">My Account</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                        Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- Cart --}}

                </div>
            </div>
        </nav>

        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/images/carousel.jpg') }}" class="d-block w-75 m-auto shadow-nih"
                            alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/football_shoes.jpg') }}"
                            class="d-block w-75 m-auto shadow-nih" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/images/futsal.jpg') }}" class="d-block w-75 m-auto shadow-nih"
                            alt="...">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- start main -->
    <main>

        <div class="container">
            <!-- start section list product -->
            <section class="product">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <div class="d-flex justify-content-between">
                    <div class="title">
                        <p class="text-success">Recomended Product</p>
                        <h2>Our Popular Product</h2>
                    </div>
                    {{-- <button class="btn btn-primary lihat d-none d-md-block">
                        <i class="fas fa-list me-1"></i> Show More
                    </button> --}}
                </div>


                <div class="row justify-content-center" id="list-product">
                    @foreach ($product as $products)
                        <!-- 1 -->
                        <div class="col-md-3 col-10">
                            <div class="card p-3 shadow-nih rounded-20">
                                <div class="image">
                                    <img src="/img/{{ $products->image }}" alt="" class="w-50 img"
                                        style="margin-left: 4rem;">
                                </div>
                                <div class="topic">
                                    <h3>
                                        {{ $products->title }}
                                    </h3>
                                    <div class="d-flex justify-content-between">
                                        <div class="harga">
                                            <small>Price</small>
                                            <p>Rp. {{ number_format($products->harga) }}</p>
                                        </div>
                                        <a href="{{ route('add_to_cart', $products->id) }}"
                                            class="btn btn-primary beli">
                                            <i class="fas fa-shopping-cart me-1"></i>Tambah
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="d-flex mt-5">
                        {!! $product->links() !!}
                    </div>
                </div>

                <div class="text-center mt-4 d-md-none d-lg-none d-xl-none">
                    <button class="btn btn-primary lihat">
                        <i class="fas fa-list me-1"></i> Show More
                    </button>
                </div>
            </section>
            <!-- end section list product -->
        </div>
    </main>
    <!-- end main -->

    <!-- yield content -->
    @yield('content')
    <!-- yield content -->

    <!-- start footer -->
    <footer class="text-center text-lg-start text-muted shadow-nih bg-light">
        <div class="container">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                    <span>Mari Terhubung Dengan Sosial Media Kami</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="me-4 text-reset">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="" class="me-4 text-reset">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section>
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-10 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fas fa-gem me-3"></i>SportZenth
                            </h6>
                            <p>
                                SportZenth adalah sebuah toko online yang menjual segala jenis hal yang berhubungan
                                dengan
                                olahraga mulai dari sepatu, baju, hingga, alat olahraga.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Usefull Link
                            </h6>
                            <p>
                                <a href="#" class="text-reset">Categories</a>
                            </p>
                            <p>
                                <a href="#" class="text-reset">Product</a>
                            </p>
                            <p>
                                <a href="#" class="text-reset">Coupon</a>
                            </p>
                            <p>
                                <a href="#" class="text-reset">Term Of Service</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-10 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Usefull Link
                            </h6>
                            <p>
                                <a href="#" class="text-reset">Categories</a>
                            </p>
                            <p>
                                <a href="#" class="text-reset">Product</a>
                            </p>
                            <p>
                                <a href="#" class="text-reset">Coupon</a>
                            </p>
                            <p>
                                <a href="#" class="text-reset">Term Of Service</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Contact Us</h6>
                            <p><i class="fas fa-home me-3"></i>Kec Sumampir</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                faudincw@gmail.com
                            </p>
                            <p><i class="fas fa-phone me-3"></i> 0895 3248 35376</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

        </div>
        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2022 Copyright Made With
            <a class="text-reset" href="/">Faudin Cahyo Wijanarko</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- end footer -->

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- bootstrap 5 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    @yield('scripts')
</body>

</html>
