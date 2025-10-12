<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tambang Pasir Jambi')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='white' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
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

        .search-box {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(6px);
            border-radius: 8px;
            border: none;
            color: white;
            padding-left: 15px;
            width: 220px;
            height: 40px;
        }

        .search-box::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-btn {
            background: transparent;
            border: none;
            color: white;
            margin-left: -35px;
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

        /* --- End Nav bar --- */

        /* --- Content --- */



        /* --- About Us --- */

        .highlight {
            display: inline-block;
            background-color: #e31e24;
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
            <!-- Language Switcher -->
            <div class="lang-switch d-flex align-items-center me-3">
                <a href="#" class="lang-link">EN</a>
                <span class="mx-1">|</span>
                <a href="#" class="lang-link">ID</a>
            </div>

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
                        <a class="nav-link dropdown-toggle" href="/index" id="aboutDropdown">
                            About Us
                        </a>
                        {{-- <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="aboutDropdown">
                            <li><a class="dropdown-item" href="/companyoverview">Company Overview</a></li>
                            <li><a class="dropdown-item" href="/our_history">Our History</a></li>
                            <li><a class="dropdown-item" href="/leadership">Leadership</a></li>
                        </ul> --}}
                    </li>

                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="corpDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Corporate Governance
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="corpDropdown">
                            <li><a class="dropdown-item" href="#">Policies</a></li>
                            <li><a class="dropdown-item" href="#">Ethics & Compliance</a></li>
                            <li><a class="dropdown-item" href="#">Transparency Report</a></li>
                        </ul>
                    </li> --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/product" id="miningDropdown" role="button">
                            Our Product
                        </a>
                        {{-- <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="miningDropdown">
                            <li><a class="dropdown-item" href="/product">Our Product</a></li>
                            <li><a class="dropdown-item" href="#">Production Data</a></li>
                            <li><a class="dropdown-item" href="#">Logistics</a></li>
                        </ul> --}}
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/galery" id="projectDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Galery
                        </a>
                        {{-- <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="projectDropdown">
                            <li><a class="dropdown-item" href="#">Ongoing Projects</a></li>
                            <li><a class="dropdown-item" href="#">Completed Projects</a></li>
                            <li><a class="dropdown-item" href="#">Future Plans</a></li>
                        </ul> --}}
                    </li>

                    {{-- 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="investorDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Investor Relation
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="investorDropdown">
                            <li><a class="dropdown-item" href="#">Financial Reports</a></li>
                            <li><a class="dropdown-item" href="#">Annual Statements</a></li>
                            <li><a class="dropdown-item" href="#">Contact Investor Team</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
</head>

<body>


    <div class="container-fluid" style="margin-top:20px;">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
