<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tambang Pasir Jambi')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
        <div class="container-fluid">
            <!-- Brand (kalau mau bisa dihapus) -->
            <a class="navbar-brand text-warning fw-bold" href="/index">PT Mendapo Tunggal Perkasa </a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <!-- Navbar Items -->
            <div class="collapse navbar-collapse justify-content-between" id="mainNav" style="visibility: visible">
                <!-- Menu Tengah -->
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white fw-semibold" href="/index">About Us</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white fw-semibold" href="/product">Our Product</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white fw-semibold" href="/galeri">Gallery</a>
                    </li>
                </ul>

                <!-- Tombol login/profile di kanan -->
                <div class="d-flex align-items-center ms-lg-auto mt-3 mt-lg-0 flex-column flex-lg-row">
                    @guest
                        <a href="/login" class="btn btn-warning fw-semibold px-3 py-1 rounded-pill mb-2 mb-lg-0">
                            LOGIN
                        </a>
                    @endguest

                    @auth
                        <a href="/profile" class="btn text-white fw-semibold px-3 py-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="30"
                                height="30">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10
                                   10-4.48 10-10S17.52 2 12 2zm0 3
                                   c1.66 0 3 1.34 3 3s-1.34 3-3 3
                                   -3-1.34-3-3 1.34-3 3-3zm0 14.2
                                   c-2.5 0-4.71-1.28-6-3.22
                                   .03-1.99 4-3.08 6-3.08
                                   1.99 0 5.97 1.09 6 3.08
                                   -1.29 1.94-3.5 3.22-6 3.22z" />
                            </svg>
                        </a>
                    @endauth
                </div>

            </div>
        </div>
    </nav>

    <section class="bg-black text-light py-5">
        <div class="container">
            @yield('content')
        </div>
    </section>

    <footer class="w-100 text-white py-5"
        style="background-image: url('image/footer-bg.png'); background-position: center; background-size: cover; background-repeat: no-repeat;">
        <div class="container">
            <div class="row text-center text-md-start justify-content-between">
                <!-- About Us -->
                <div class="col-12 col-md-4 mb-4">
                    <h4 class="fw-bold mb-3">About Us</h4>
                    <p class="mb-0">
                        PT Mendapo Tunggal Perkasa memulai bisnis dalam bidang pertambangan,penjualan,dan penyuplai
                        pasir.
                        PT MTP adalah perusahaan swasta nasional yang didirikan di Jambi pada tahun 2021, Perusahaan
                        kami ini masih tergolong baru dalam dunia usaha, akan tetapi Perusahaan kami ini memiliki
                        manajerial yang baik dalam memberikan layanan kepada setiap pelanggan atau mitra

                    </p>
                </div>

                <!-- Address -->
                <div class="col-12 col-md-4 mb-4">
                    <h4 class="fw-bold mb-3">Address</h4>
                    <a href="https://maps.app.goo.gl/qCAGJ2ks5MVr1BDr5" target="_blank"
                        class="text-white text-decoration-none">
                        Jl. Lintas Timur, Desa Sungai Gelam, Kec. Sungai Gelam, Kab. Muaro Jambi,<br>
                        Jambi 36361, Indonesia
                    </a>
                </div>

                <!-- Contact Info -->
                <div class="col-12 col-md-3 mb-4">
                    <h4 class="fw-bold mb-3">Contact Info</h4>
                    <a href="https://wa.me/6281357719992" class="d-block text-white text-decoration-none mb-2">
                        📞 0813-5771-9992
                    </a>
                    <a href="mailto:malthafhilmi@student.ciputra.ac.id" class="d-block text-white text-decoration-none">
                        ✉️ malthafhilmi@student.ciputra.ac.id
                    </a>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-top border-secondary mt-4 pt-3">
                <p class="text-center mb-0">&copy; 2025 Tambang Pasir Jambi — All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
