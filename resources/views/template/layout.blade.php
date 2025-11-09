<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tambang Pasir Jambi')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
        <div class="container-fluid">
            <!-- Brand (kalau mau bisa dihapus) -->
            <a class="navbar-brand text-warning fw-bold" href="/index">TAMBANG PASIR JAMBI</a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Items -->
            <div class="navbar-collapse justify-content-between" id="mainNav">
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

                <!-- Tombol Login di Kanan -->
                @guest
                    <div class="d-flex">
                        <a href="/login" class="btn btn-warning fw-semibold px-3 py-1 rounded-pill">
                            LOGIN
                        </a>
                    </div>
                @endguest

                @auth
                    <div class="d-flex">
                        <a href="/profile" class="btn fw-semibold px-3 py-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="35"
                                height="35">
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
                    </div>
                @endauth
            </div>
        </div>
    </nav>

</head>

<body>

    <section class="bg-black text-light py-5">
        <div class="container">
            @yield('content')
        </div>
    </section>

    <footer class="w-100" style="background-image: url(image/footer-bg.png); background-position: center;">
        <div class="d-flex justify-content-between gap-2 row">
            <div class="m-8 d-flex-col col">
                <h4>About us</h4>
                <p>
                    Tambang Pasir Jambi adalah perusahaan yang bergerak di bidang penambangan pasir berkualitas tinggi
                    di wilayah Jambi.
                    Dengan pengalaman bertahun-tahun, kami berkomitmen untuk menyediakan produk pasir yang memenuhi
                    standar industri dan kebutuhan pelanggan kami.
                </p>
            </div>
            <div class="m-8 d-flex-col col">
                <h4>Adress</h4>
                <a href="https://maps.app.goo.gl/qCAGJ2ks5MVr1BDr5">Jl. Lintas Timur, Desa Sungai Gelam,
                    Kec. Sungai Gelam, Kab. Muaro Jambi,
                    Jambi 36361, Indonesia</a>
            </div>
            <div id = "contact" class="m-8 d-flex-col col">
                <h4>Contact info</h4>
                <a href="https://wa.me/6281357719992">81357719992</a>
                <br>
                <a href="mailto:malthafhilmi@student.ciputra.ac.id">malthafhilmi@student.ciputra.ac.id</a>
            </div>
        </div>
        <div class="border-top border-secondary">
            <p class="text-center p-3">All right reserved</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
