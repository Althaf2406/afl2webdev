@extends('template.layout')

@section('title', 'Beranda - Tambang Pasir Jambi')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="d-flex align-items-center justify-content-center text-center"
        style="background-color: #000; height: 70vh;
               background-image: url('{{ asset('images/hero-bg.png') }}');
               background-size: cover;
               background-position: center;
               background-repeat: no-repeat;">
        <div>
            <div class="main-text">GROWING BEYOND</div><br>
            <div class="highlight">EXPECTATION</div>
        </div>
    </section>

    <!-- Section Company Overview -->
    <section id="companyOverview" class="py-5"  style="scroll-margin-top: 100px; 
           background-image: url('{{ asset('') }}');
           background-size: cover;
           background-position: center;
           background-repeat: no-repeat;">
        <div class="container my-5">

            <!-- Bagian Atas: Gambar Kiri & Deskripsi Singkat Kanan -->
            <div class="row align-items-center mb-5">
                <!-- Gambar -->
                <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                    <img src="{{ asset('images/company-overview.webp') }}" alt="Tambang Pasir Jambi"
                        class="img-fluid rounded-3 shadow" style="max-height: 400px; object-fit: cover; width: 100%;">
                </div>

                <!-- Teks Singkat -->
                <div class="col-lg-6 col-md-12 text-white">
                    <h2 class="fw-bold mb-3">Company Overview</h2>
                    <p class="text-white-50 mb-4">
                        Mengenal lebih dekat tentang <strong>Tambang Pasir Jambi</strong> — perusahaan yang berkomitmen
                        untuk menyediakan pasir berkualitas tinggi dan berkelanjutan di wilayah Jambi.
                    </p>
                    <a href="#companyStats" class="btn btn-light fw-semibold px-4 py-2 rounded-pill">Lihat Selengkapnya</a>
                </div>
            </div>

            <!-- Garis Pembatas -->
            <hr style="height: 3px; background-color: #ffffff; opacity: 0.5; border: none; border-radius: 2px;">

            <!-- Bagian Bawah: Detail Company -->
            <div id="companyDetails" class="row justify-content-center mt-5">
                <div class="col-lg-10">
                    <p class="lead text-white">
                        Tambang Pasir Jambi adalah perusahaan yang bergerak di bidang penambangan pasir berkualitas tinggi
                        di wilayah Jambi.
                        Dengan pengalaman bertahun-tahun, kami berkomitmen untuk menyediakan produk pasir yang memenuhi
                        standar industri dan kebutuhan pelanggan kami.
                    </p>
                    <p class="text-white-50">
                        Visi kami adalah menjadi pemimpin dalam industri penambangan pasir di Indonesia dengan mengutamakan
                        kualitas,
                        keberlanjutan, dan kepuasan pelanggan. Misi kami meliputi:
                    </p>
                    <ul class="text-white-50">
                        <li>Menyediakan produk pasir berkualitas tinggi yang sesuai dengan kebutuhan konstruksi dan
                            industri.</li>
                        <li>Menerapkan praktik penambangan yang ramah lingkungan dan berkelanjutan.</li>
                        <li>Membangun hubungan jangka panjang dengan pelanggan melalui layanan yang unggul.</li>
                        <li>Berinvestasi dalam teknologi dan inovasi untuk meningkatkan efisiensi operasional.</li>
                    </ul>
                    <p class="text-white-50">
                        Kami percaya bahwa keberhasilan kami tidak hanya diukur dari keuntungan finansial, tetapi juga dari
                        dampak positif
                        yang kami berikan kepada komunitas dan lingkungan sekitar. Oleh karena itu, kami berkomitmen untuk
                        menjalankan bisnis
                        kami dengan integritas, transparansi, dan tanggung jawab sosial.
                    </p>
                    <p class="text-white-50">
                        Terima kasih telah mengunjungi halaman Company Overview kami. Kami berharap dapat bekerja sama
                        dengan Anda dan memenuhi
                        kebutuhan pasir Anda dengan produk berkualitas tinggi dari Tambang Pasir Jambi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-5">
        <!-- Company Data -->
    <section id="companyStats" class="py-5" style="background-color: white; color: black;">
        <div class="container text-center">

            <div class="row align-items-center justify-content-center gy-4">
                <!-- Company Name -->
                <div class="col-12 col-md-3">
                    <h3 class="fw-bold" style="font-size: 24px;">FAJAR PUTIH ASSET</h3>
                </div>

                <!-- Counter 1 -->
                <div class="col-12 col-md-3">
                    <h1 class="counter fw-bold text-warning" data-target="170" style="font-size: 64px;">0</h1>
                    <h5 class="text-uppercase" style="color: black;">Luas Lahan / H</h5>
                </div>

                <!-- Counter 2 -->
                <div class="col-12 col-md-3">
                    <h1 class="counter fw-bold text-warning" data-target="9800" style="font-size: 64px;">0</h1>
                    <h5 class="text-uppercase" style="color: black;">Cadangan Raw Mineral</h5>
                </div>


    


                <!-- Counter 3 -->
                <div class="col-12 col-md-3">
                    <h1 class="counter fw-bold text-warning" data-target="115" style="font-size: 64px;">0</h1>
                    <h5 class="text-uppercase" style="color: black;">Volume Produksi</h5>
                </div>
            </div>
        </div>
    </section>

<!-- Company Partner -->
    <section id="partnerCarousel" class="carousel slide bg-white" data-bs-ride="carousel">
        <h2 class="text-center text-black">Our Partner</h2>
        <br>
        <div class="carousel-inner">
            @foreach ($partnerList->chunk(3) as $index => $chunk)
                <div class="carousel-item @if ($index == 0) active @endif" data-bs-interval="3000">
                    <div class="container">
                        <div class="row justify-content-center">
                            @foreach ($chunk as $partner)
                                <div class="col-10 col-sm-6 col-md-4 col-lg-3 mb-3 position-relative partner-card">
                                    <img src="{{ asset($partner->gambar) }}" class="img-fluid rounded shadow-sm"
                                        style="width: 100%; height: 200px; object-fit: cover;">
                                    <div class="overlay d-flex align-items-center justify-content-center">
                                        <div class="overlay-text text-white fw-bold text-center">
                                            {{ $partner->nama }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev " type="button" style="filter: invert(1);" data-bs-target="#partnerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" style="filter: invert(1);" data-bs-target="#partnerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon color" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </section>
    </section>



@endsection


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const counters = document.querySelectorAll('.counter');
        const speed = 200;

        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const increment = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCount, 20);
                } else {
                    counter.innerText = target.toLocaleString();
                }
            };
            updateCount();
        });
    });
</script>
