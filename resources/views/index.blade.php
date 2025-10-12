@extends('template.layout')

@section('title', 'Beranda - Tambang Pasir Jambi')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="d-flex align-items-center justify-content-center text-center"
        style="background-color: #000; height: 70vh;">
        <div>
            <div class="main-text">GROWING BEYOND</div><br>
            <div class="highlight">EXPECTATION</div>
        </div>
    </section>

<!-- Section Company Overview -->
<section id="companyOverview" class="py-5" style="scroll-margin-top: 100px; background-color: #f39c12;">
    <div class="container my-5">
        <div class="row align-items-center">

            <!-- Kolom Kiri: Teks -->
            <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                <!-- Title -->
                <div class="mb-4">
                    <h2 class="fw-bold" style="color: #fff;">Company Overview</h2>
                    <p style="color: #fff8e1;">Mengenal lebih dekat tentang Tambang Pasir Jambi</p>
                    <hr style="width: 80px; height: 3px; background-color: #ffffff; border: none; border-radius: 2px;">
                </div>

                <!-- Content -->
                <div>
                    <p class="lead" style="color: #fffdf5;">
                        Tambang Pasir Jambi adalah perusahaan yang bergerak di bidang penambangan pasir berkualitas tinggi di wilayah Jambi.
                        Dengan pengalaman bertahun-tahun, kami berkomitmen untuk menyediakan produk pasir yang memenuhi standar industri dan kebutuhan pelanggan kami.
                    </p>
                    <p style="color: #fffdf5;">
                        Visi kami adalah menjadi pemimpin dalam industri penambangan pasir di Indonesia dengan mengutamakan kualitas,
                        keberlanjutan, dan kepuasan pelanggan. Misi kami meliputi:
                    </p>
                    <ul style="color: #fffdf5;">
                        <li>Menyediakan produk pasir berkualitas tinggi yang sesuai dengan kebutuhan konstruksi dan industri.</li>
                        <li>Menerapkan praktik penambangan yang ramah lingkungan dan berkelanjutan.</li>
                        <li>Membangun hubungan jangka panjang dengan pelanggan melalui layanan yang unggul.</li>
                        <li>Berinvestasi dalam teknologi dan inovasi untuk meningkatkan efisiensi operasional.</li>
                    </ul>
                    <p style="color: #fffdf5;">
                        Kami percaya bahwa keberhasilan kami tidak hanya diukur dari keuntungan finansial, tetapi juga dari dampak positif
                        yang kami berikan kepada komunitas dan lingkungan sekitar. Oleh karena itu, kami berkomitmen untuk menjalankan bisnis
                        kami dengan integritas, transparansi, dan tanggung jawab sosial.
                    </p>
                    <p style="color: #fffdf5;">
                        Terima kasih telah mengunjungi halaman Company Overview kami. Kami berharap dapat bekerja sama dengan Anda dan memenuhi
                        kebutuhan pasir Anda dengan produk berkualitas tinggi dari Tambang Pasir Jambi.
                    </p>
                </div>
            </div>

            <!-- Kolom Kanan: Gambar -->
            <div class="col-lg-6 col-md-12 text-center">
                <img src="{{ asset('images/company-overview.jpg') }}" 
                     alt="Tambang Pasir Jambi" 
                     class="img-fluid rounded-3 shadow"
                     style="max-height: 500px; object-fit: cover; width: 100%;">
            </div>

        </div>
    </div>
</section>


    <!-- Section Statistic / Company Data -->
    <section id="companyStats" class="py-5" style="background-color: #111; color: white;">
        <div class="container text-center">

            <div class="row align-items-center justify-content-center gy-4">
                <!-- Company Name -->
                <div class="col-12 col-md-3">
                    <h3 class="fw-bold" style="font-size: 24px;">FAJAR PUTIH ASSET</h3>
                </div>

                <!-- Counter 1 -->
                <div class="col-12 col-md-3">
                    <h1 class="counter fw-bold" data-target="170" style="font-size: 64px;">0</h1>
                    <h5 class="text-uppercase" style="color: #ccc;">Luas Lahan / H</h5>
                </div>

                <!-- Counter 2 -->
                <div class="col-12 col-md-3">
                    <h1 class="counter fw-bold" data-target="9800" style="font-size: 64px;">0</h1>
                    <h5 class="text-uppercase" style="color: #ccc;">Cadangan Raw Mineral</h5>
                </div>

                <!-- Counter 3 -->
                <div class="col-12 col-md-3">
                    <h1 class="counter fw-bold" data-target="115" style="font-size: 64px;">0</h1>
                    <h5 class="text-uppercase" style="color: #ccc;">Volume Produksi</h5>
                </div>
            </div>
        </div>
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
