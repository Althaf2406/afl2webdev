<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tambang Pasir Jambi')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">


    <style>
        body {
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        /* --- Top bar --- */
        .top-bar {
            width: 100%;
            background: transparent;
            color: #fff;
            font-size: 0.9rem;
            position: absolute;
            top: 0;
            left: 0;
            height: 40px;
            padding-right: 2rem;
            padding-top: 3rem;
        }

        .lang-switch a {
            color: #fff;
            text-decoration: none;
            transition: 0.3s;
        }

        .lang-switch a:hover {
            color: #f5c542;
        }

        /* --- Search box --- */
        .search-container {
            position: relative;
        }

        .search-box {
            border: 1px solid #fff;
            background: transparent;
            color: #fff;
            border-radius: 20px;
            padding: 4px 30px 4px 10px;
            width: 140px;
            transition: all 0.3s ease;
        }

        .search-box:focus {
            outline: none;
            width: 180px;
            border-color: #f5c542;
        }

        .search-btn {
            background: none;
            border: none;
            position: absolute;
            right: 8px;
            top: 3px;
            cursor: pointer;
        }

        /* --- Contact button --- */
        .contact-btn {
            background-color: #d35400;
            border: none;
            color: #fff;
            padding: 4px 14px;
            border-radius: 20px;
            font-weight: 600;
            transition: 0.3s;
        }

        .contact-btn:hover {
            background-color: #f39c12;
        }



        /* --- Nav bar --- */
        .navbar {
            background: transparent !important;
            border: none;
            padding-top: 3rem;
            position: relative;
            top: 0;
            width: 100%;
            z-index: 1050;


        }

        .navbar-nav {
            margin: 0 auto;
            gap: 3rem;
            /* jarak antar item */
        }

        .nav-item {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        /* Garis dasar */
        .nav-item::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: #ffffff22;
            transition: width 700ms linear 0s;
            overflow: hidden;
        }

        /* Efek saat hover */
        .nav-item:hover::before {
            width: 100%;
            background: white;
            animation: lineSweep 700ms linear 0s forwards, flowLine 2s linear infinite;

        }

        /* Efek sweep kiri ke kanan */
        @keyframes lineSweep {
            0% {
                width: 0;
                background-position: 200% 0;
                opacity: 0.8;
                box-shadow: 0 0 4px white;
            }

            50% {
                width: 50%;
                background-position: 100% 0;
                opacity: 1;
                box-shadow: 0 0 6px white;
            }

            100% {
                width: 100%;
                background-position: 0 0;
                background: rgb(255, 255, 255);
                box-shadow: 0 0 2px rgb(255, 255, 255);
            }
        }


        .nav-link {
            color: #fff !important;
            font-weight: 600;
            text-transform: capitalize;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #f8f8f8 !important;
        }

        .dropdown-menu {
            background-color: rgba(15, 15, 15, 0.95);
            border: none;
            margin-top: 0.5rem;
            border-radius: 0;
        }

        .dropdown-item {
            color: #fff;
        }

        .dropdown-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .navbar-toggler {
            border-color: #fff;
        }

        .lang-switch a {
            color: white;
            text-decoration: none;
            margin-right: 8px;
            font-weight: 600;
        }

        .lang-switch span {
            color: white;
            margin-right: 8px;
        }

        .contact-btn {
            background-color: #63c14f;
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            padding: 10px 25px;

        }

        @media (max-width: 992px) {
            .navbar-nav {
                gap: 1.5rem;
            }
        }

        footer {
            padding: 100px;
        }

        /* --- End Nav bar --- */

        /* --- Content --- */



        /* --- About Us --- */

        .highlight {
            display: inline-block;
            background-color: #f39c12;
            /* merah terang seperti di gambar */
            color: white;
            padding: 10px 25px;
            margin-top: 10px;
            font-weight: 900;
            font-size: 64px;
            letter-spacing: 2px;
        }

        .main-text {
            font-size: 64px;
            font-weight: 900;
            color: white;
            text-shadow: 0px 4px 10px rgba(0, 0, 0, 0.8);
            letter-spacing: 2px;
        }
    </style>

    <nav class="navbar navbar-expand-lg fixed-top">
        <!-- TOP BAR -->
        <div class="top-bar d-flex align-items-center justify-content-end px-4">

            <!-- Contact Button -->
            <button class="contact-btn">CONTACT US</button>
        </div>

        <!-- MAIN NAVBAR -->
        <div class="container-fluid justify-content-center">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="mainNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/index" id="aboutDropdown">
                            About Us
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/product" id="miningDropdown" role="button">
                            Our Product
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="/gallery" id="projectDropdown" role="button">
                            Galery
                        </a>
                </ul>
            </div>
        </div>
    </nav>
</head>

<body>


    <div class="container-fluid" style="margin-top:20px;">
        @yield('content')
    </div>
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
            <div class="m-8 d-flex-col col">
                <h4>Contact info</h4>
                <a href="wa.me/6281357719992">81357719992</a>
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
