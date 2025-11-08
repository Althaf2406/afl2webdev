<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tambang Pasir Jambi')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
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
            <div class="collapse navbar-collapse justify-content-between" id="mainNav">
                <!-- Menu Tengah -->
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white fw-semibold" href="/index">About Us</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white fw-semibold" href="/product">Our Product</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white fw-semibold" href="/gallery">Gallery</a>
                    </li>
                </ul>

                <!-- Tombol Contact di Kanan -->
                <div class="d-flex">
                    <a href="https://wa.me/6281357719992" class="btn btn-warning fw-semibold px-3 py-1 rounded-pill">
                        CONTACT US
                    </a>
                </div>
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
