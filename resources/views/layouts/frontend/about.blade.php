<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>About</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!-- css include costum -->
        <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/cart/cart.css') }}">
        <link rel="stylesheet" href="{{ asset('fe/css/style.css') }}">
        <!-- font google -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
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
    <header>
        <nav class="navbar navbar-expand-lg bg-white">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('assets/SportZenth.png') }}" alt="Bootstrap"
                    width="120">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('homeuser') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product_page') }}">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">About</a>
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
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                  <div class="card">
                    <img src="{{ asset('assets/SportZenth.png') }}" class="card-img-top w-50 m-auto">
                    <div class="card-body">
                      <h5 class="card-title">About Company</h5>
                      <p class="card-text">
                        SportZenth adalah sebuah toko online yang menjual segala jenis hal yang berhubungan dengan 
                        olahraga mulai dari sepatu, baju, hingga, alat olahraga. Kualitas produk toko ini juara
                        dan terjangkau, toko online ini dibuat untuk mempermudah pelanggan mencari peralatan olahraga
                        dan untuk memasarkan produk SportZenth agar dikenal oleh masyarakat. 
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card">
                    <img src="{{ asset('assets/me.png') }}" class="card-img-top w-25 m-auto rounded-circle">
                    <div class="card-body">
                      <h5 class="card-title">About me</h5>
                      <p class="card-text">
                        Nama Saya adalah Faudin Cahyo Wijanarko seorang mahasiswa jurusan 
                        Sistem Informasi yang merupakan developer website SportZenth dan murid kelas 04A.
                      </p>
                    </div>
                  </div>
                </div>
        </div>
        <div class="container mt-5 border-3">
            <h2>Kirim Pesan</h2>
            <div class="product">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input name="name" type="text" class="form-control border-2" id="exampleFormControlInput1" placeholder="Masukkan nama anda">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Alamat Email</label>
                        <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan email anda">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Berikan Pesan</label>
                        <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button class="btn btn-success btn-submit">Kirim</button>
                </form>
            </div>
        </div>
    </main>

        <!-- bootstrap 5 js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>
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
                            SportZenth adalah sebuah toko online yang menjual segala jenis hal yang berhubungan dengan 
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
</html>