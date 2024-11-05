<!DOCTYPE php>
<php>

    <head>
        <!-- Basic -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Site Metas -->
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" href="images/Lambang_Kota_Palangka_Raya.png" type="image/x-icon">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

        <title>SISTEM PELAYANAN UMUM KECAMATAN PAHANDUT</title>

        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!-- fonts style -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap"
            rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet" />
        <!-- responsive style -->
        <link href="css/responsive.css" rel="stylesheet" />
        <style>
            .service_section .box {
                display: flex;
                /* Menggunakan Flexbox untuk tata letak */
                flex-direction: column;
                /* Mengatur arah kolom */
                height: 90%;
                /* Mengatur tinggi card menjadi 100% dari kontainer */
                min-height: 300px;
                /* Tinggi minimum untuk card */
                padding: 20px;
                /* Tambahkan padding di dalam card */
                border: 1px solid #ddd;
                /* Batas untuk memperjelas */
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                /* Tambahkan bayangan (opsional) */
                border-radius: 8px;
                /* Sudut melingkar (opsional) */
                margin-bottom: 20px;
                /* Jarak antar card */
            }

            .service_section .detail-box {
                flex-grow: 1;
                /* Memungkinkan konten untuk tumbuh dan mengisi ruang */
                display: flex;
                /* Menggunakan Flexbox untuk tata letak dalam detail box */
                flex-direction: column;
                /* Mengatur arah kolom untuk detail box */
                justify-content: space-between;
                /* Menjaga jarak antara elemen atas dan bawah */
            }

            .service_section .box a {
                margin-top: auto;
                /* Memindahkan tombol ke bawah */
            }

            .chart-container {
                padding: 5px;
                background-color: #f8f9fa;
                border-radius: 8px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            }

            .chart-wrapper {
                margin-bottom: 20px;
            }

            .chart-wrapper h2 {
                text-align: center;
                margin-bottom: 15px;
            }

            .chart-wrapper canvas {
                width: 100% !important;
                /* Tinggi default */
                height: 400px !important;
            }

            /* Tinggi khusus untuk layar besar */
            @media (min-width: 768px) {
                .chart-wrapper canvas {
                    height: 500px !important;
                }
            }

            .chart-box {
                flex: 1;
                min-width: 300px;
                /* Set minimum width for responsive design */
                max-width: 400px;
                /* Set maximum width for each chart box */
                margin: 10px;
            }

            .statistics_section .card {
                margin: 20px 0;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .statistics_section canvas {
                margin-top: 20px;
            }

            html {
                scroll-behavior: smooth;
                /* Ini membuat transisi menjadi halus saat menggulir */
            }
        </style>
    </head>

    <body>
        <div class="hero_area">
            <!-- header section strats -->
            <div class="hero_bg_box">
                <div class="img-box">
                    <img src="images/3.jpg" alt="">
                </div>
            </div>

            <header class="header_section">
                <div class="header_bottom">
                    <div class="container-fluid">
                        <nav class="navbar navbar-expand-lg custom_nav-container">
                            <a class="navbar-brand" href="index.php">
                                <span>
                                    KECAMATAN PAHANDUT
                                </span>
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class=""></span>
                            </button>

                            <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
                                <ul class="navbar-nav  ">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#profil"> Profil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#layanan"> Layanan </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#lokasi"> Lokasi </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#statistik">Statistik</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="login/index.php"> Login</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </header>
            <!-- end header section -->
            <!-- slider section -->
            <section class=" slider_section ">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="detail-box">
                                            <h1>
                                                Pelayanan Cepat <br>
                                                <span>
                                                    dan Tepat
                                                </span>
                                            </h1>
                                            <p>
                                                Dapatkan berbagai layanan administrasi dengan mudah dan efisien,
                                                langsung dari perangkat Anda.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="detail-box">
                                            <h1>
                                                Layanan Praktis, <br>
                                                <span>
                                                    Tanpa Ribet
                                                </span>
                                            </h1>
                                            <p>
                                                Mengurus keperluan administrasi kini lebih mudah dan cepat melalui
                                                sistem online kami.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="detail-box">
                                            <h1>
                                                Kemudahan Administrasi <br>
                                                <span>
                                                    Melayani dengan Teknologi
                                                </span>
                                            </h1>
                                            <p>
                                                Nikmati kemudahan layanan modern untuk kebutuhan administrasi dan
                                                surat-menyurat di Kecamatan Pahandut.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container idicator_container">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                    </div>
                </div>
            </section>
            <!-- end slider section -->
        </div>

        <!-- about section -->

        <section class="about_section layout_padding" id="profil">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 px-0">
                        <div class="img_container">
                            <div class="img-box">
                                <img src="images/pintu.jpg" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 px-0">
                        <div class="detail-box">
                            <div class="heading_container ">
                                <h2>
                                    TENTANG SISTEM PELAYANAN UMUM KECAMATAN PAHANDUT
                                </h2>
                            </div>
                            <p>
                                Sistem Pelayanan Umum Kecamatan Pahandut adalah sebuah platform digital yang dirancang
                                untuk mempermudah akses masyarakat terhadap berbagai layanan administrasi secara cepat,
                                transparan, dan efisien. Dengan sistem ini, warga Kecamatan Pahandut dapat mengajukan
                                permohonan surat, melakukan pengecekan status pengajuan, dan mendapatkan informasi
                                layanan secara daring tanpa harus datang langsung ke kantor kecamatan. Tujuan utama dari
                                sistem ini adalah meningkatkan kualitas pelayanan publik, mengurangi waktu tunggu, dan
                                memberikan pengalaman yang lebih nyaman serta modern bagi masyarakat dalam mengurus
                                administrasi kependudukan dan pelayanan lainnya.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end about section -->

        <!-- service section -->

        <section class="service_section layout_padding" id="layanan">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Layanan Kami
                    </h2>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="box">
                            <div class="img-box" style="font-size: 48px;">
                                <i class="fas fa-paper-plane"></i>
                            </div>
                            <div class="detail-box">
                                <h6>
                                    Layanan Kecamatan Pahandut
                                </h6>
                                <p>
                                    Layanan Kecamatan Pahandut adalah platform yang dirancang untuk memfasilitasi
                                    pelayanan publik di Kecamatan Pahandut, Kota Palangka Raya.
                                </p>
                                <a href="">
                                    Kunjungi
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="box">
                            <div class="img-box">
                                <i class="fas fa-file-alt" style="font-size: 48px;"></i>
                                <!-- Ikon untuk SKTM Pendidikan -->
                            </div>
                            <div class="detail-box">
                                <h6>
                                    SKTM Pendidikan
                                </h6>
                                <p>
                                    Layanan untuk pengajuan Surat Keterangan Tidak Mampu (SKTM) bagi keperluan
                                    pendidikan, seperti beasiswa atau bantuan sekolah.
                                </p>
                                <a href="sktm_pendidikan.php">
                                    Kunjungi
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="box ">
                            <div class="img-box">
                                <i class="fas fa-medkit" style="font-size: 48px;"></i> <!-- Ikon untuk SKTM Berobat -->
                            </div>
                            <div class="detail-box">
                                <h6>
                                    SKTM Berobat
                                </h6>
                                <p>
                                    Fasilitas pengajuan SKTM untuk keperluan kesehatan, termasuk bantuan biaya
                                    pengobatan bagi warga kurang mampu.
                                </p>
                                <a href="sktm_berobat.php">
                                    Kunjungi
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="box ">
                            <div class="img-box">
                                <i class="fas fa-heartbeat" style="font-size: 48px;"></i>
                                <!-- Ikon untuk layanan lain -->
                            </div>
                            <div class="detail-box">
                                <h6>
                                    Permohonan BPJS
                                </h6>
                                <p>
                                    Layanan pendaftaran BPJS Kesehatan bagi warga yang membutuhkan jaminan kesehatan
                                    dengan proses yang lebih mudah.
                                </p>
                                <a href="permohonan_bpjs.php">
                                    Kunjungi
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="box ">
                            <div class="img-box">
                                <i class="fas fa-file-signature" style="font-size: 48px;"></i>
                                <!-- Ikon untuk layanan lain -->
                            </div>
                            <div class="detail-box">
                                <h6>
                                    Permohonan SKCK
                                </h6>
                                <p>
                                    Layanan pengajuan Surat Keterangan Catatan Kepolisian (SKCK) untuk keperluan
                                    administrasi, pekerjaan, atau lainnya.
                                </p>
                                <a href="">
                                    Kunjungi
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="box ">
                            <div class="img-box">
                                <i class="fas fa-hands-helping" style="font-size: 48px;"></i>
                                <!-- Ikon untuk layanan lain -->
                            </div>
                            <div class="detail-box">
                                <h6>
                                    Permohonan Umum
                                </h6>
                                <p>
                                    Layanan pengajuan berbagai surat keterangan umum yang dibutuhkan oleh warga
                                    Kecamatan Pahandut untuk berbagai keperluan.
                                </p>
                                <a href="">
                                    Kunjungi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end service section -->


        <!-- client section -->

        <section class="client_section layout_padding">
            <div class="container ">
                <div class="heading_container heading_center">
                    <h2>
                        Apa Kata Pengunjung?
                    </h2>
                </div>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="box">
                                <div class="img-box">
                                    <img src="images/user.png" alt="">
                                </div>
                                <div class="detail-box">
                                    <h4>
                                        Ibu Siti, Warga Kecamatan Pahandut
                                    </h4>
                                    <p>
                                        Saya sangat puas dengan pelayanan di Kecamatan Pahandut. Proses pengajuan SKTM
                                        untuk anak saya sangat cepat dan mudah. Petugasnya ramah dan membantu
                                        menjelaskan semua langkah yang harus dilakukan. Terima kasih!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="box">
                                <div class="img-box">
                                    <img src="images/user.png" alt="">
                                </div>
                                <div class="detail-box">
                                    <h4>
                                        Bapak Joko, Pengunjung Baru
                                    </h4>
                                    <p>
                                        Layanan di sini cukup baik. Saya mendaftar untuk BPJS Kesehatan dan semua
                                        prosesnya berjalan lancar. Hanya saja, antrian di pagi hari cukup panjang,
                                        tetapi petugas bekerja dengan cepat untuk mengatasi hal ini.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class="box">
                                <div class="img-box">
                                    <img src="images/user.png" alt="">
                                </div>
                                <div class="detail-box">
                                    <h4>
                                        Ibu Rina, Warga Setempat
                                    </h4>
                                    <p>
                                        Pengalaman saya di Layanan Kecamatan Pahandut sangat positif. Mereka menyediakan
                                        berbagai layanan yang sangat membantu masyarakat. Saya mengajukan permohonan
                                        SKCK dan mendapatkan hasil dalam waktu yang singkat. Sangat rekomendasi!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel_btn-box">
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- end client section -->

        <!-- contact section -->

        <section class="contact_section layout_padding" id="lokasi">
            <div class="contact_bg_box">
                <div class="img">
                    <img src="images/4.jpg" alt="">
                </div>
            </div>
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Lokasi Kecamatan Pahandut
                    </h2>
                </div>
                <div class="map_box" style="display: flex; justify-content: center;">
                    <iframe <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.0359027854003!2d113.97471201475607!3d-2.211115997968932!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de97b9000000001%3A0x64c60a008e450e2e!2sKecamatan%20Pahandut%2C%20Palangka%20Raya!5e0!3m2!1sid!2sid!4v1698231234567!5m2!1sid!2sid&z=0"
                        width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </section>

        <!-- end contact section -->

        <!-- team section -->

        <section class="team_section layout_padding" id="statistik">
            <div class="container">
                <div class="heading_container heading_center">
                    <h2>
                        Statistik Penduduk
                    </h2>
                </div>
                <div class="row">
                    <!-- Card Total Penduduk -->
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Total Penduduk</h5>
                                <p class="card-text" style="font-size: 48px;">98.827</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card Laki-laki -->
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Laki-laki</h5>
                                <p class="card-text" style="font-size: 48px;">50.147</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card Perempuan -->
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Perempuan</h5>
                                <p class="card-text" style="font-size: 48px;">48.680</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Wrapper untuk menampilkan dua diagram bersebelahan di layar besar, dan tumpuk di layar kecil -->
                <div class="row justify-content-center">
                    <!-- Diagram Batang untuk Jumlah Penduduk Per Kelurahan -->
                    <div class="col-md-5 col-sm-12 mb-4 chart-wrapper text-center">
                        <canvas id="populationChart"></canvas>
                    </div>

                    <!-- Diagram Pie untuk Distribusi Usia Penduduk -->
                    <div class="col-md-5 col-sm-12 mb-4 chart-wrapper text-center">
                        <canvas id="ageDistributionChart"></canvas>
                    </div>
                </div>
            </div>
        </section>

        <!-- end team section -->

        <!-- info section -->
        <section class="info_section ">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="info_logo">
                            <img src="images/Lambang_Kota_Palangka_Raya.png" alt="" srcset="" style="width: 60%;">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info_links">
                            <h5>
                                Kecamatan Pahandut
                            </h5>
                            <ul>
                                <li>
                                    <a href="">
                                        Kota Palangka Raya
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Provinsi Kalimantan Tengah
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Indonesia
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info_info">
                            <h5>
                                Kontak Kami
                            </h5>
                        </div>
                        <div class="info_contact">
                            <a href="" class="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                    Jl. Diponegoro No.19, Langkai, Kec. Jekan Raya, Kota Palangka Raya, Kalimantan
                                    Tengah 74874
                                </span>
                            </a>
                            <a href="" class="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Telp : (0536) 3221784
                                </span>
                            </a>
                            <a href="" class="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    kec-pahandut@palangkaraya.go.id
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info_form ">
                            <img src="images/Logo-Provinsi-Kalimantan-Tengah.png" alt="" srcset="" style="width: 50%;">
                            <div class="social_box">
                                <a href="https://web.facebook.com/kecamatan.pahandut/?_rdc=1&_rdr">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                                <a href="https://www.instagram.com/kecamatan_pahandut_pky/">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end info_section -->

        <!-- footer section -->
        <footer class="container-fluid footer_section">
            <p>
                &copy; <span id="currentYear"></span> Created By Najwa Putri</a>
            </p>
        </footer>
        <!-- footer section -->
        <script>
            // Diagram Batang Jumlah Penduduk Per Kelurahan
            const ctx1 = document.getElementById('populationChart').getContext('2d');
            const populationChart = new Chart(ctx1, {
                type: 'bar',
                data: {
                    labels: ['Pahandut', 'Panarung', 'Langkai', 'Tumbang Rungan', 'Tanjung Pinang',
                        'Pahandut Seberang'
                    ],
                    datasets: [{
                            label: 'Laki-laki',
                            data: [14112, 15350, 14926, 435, 2579, 2745],
                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        },
                        {
                            label: 'Perempuan',
                            data: [13362, 15053, 14722, 411, 2484, 2662],
                            backgroundColor: 'rgba(255, 99, 132, 0.6)',
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        title: {
                            display: true,
                            text: 'Diagram Jumlah Penduduk Per Kelurahan'
                        },
                        datalabels: {
                            color: 'black',
                            anchor: 'end',
                            align: 'top',
                            font: {
                                weight: 'bold'
                            },
                            formatter: (value) => value,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Penduduk'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Kelurahan'
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });


            // Diagram Pie Distribusi Usia Penduduk
            const ctx2 = document.getElementById('ageDistributionChart').getContext('2d');
            const ageDistributionChart = new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: ['Anak-anak (0-14)', 'Dewasa (15-64)', 'Lansia (65+)'],
                    datasets: [{
                        data: [27360, 69169, 3695],
                        backgroundColor: ['rgba(75, 192, 192, 0.6)', 'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top'
                        },
                        title: {
                            display: true,
                            text: 'Distribusi Usia Penduduk'
                        },
                        datalabels: {
                            color: 'white',
                            font: {
                                weight: 'bold'
                            },
                            formatter: (value, context) => {
                                const total = context.dataset.data.reduce((acc, val) => acc + val, 0);
                                const percentage = ((value / total) * 100).toFixed(1) + '%';
                                return percentage;
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });
        </script>
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/custom.js"></script>
    </body>

</php>