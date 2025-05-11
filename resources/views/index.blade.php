<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{asset('assets/img/educator-fabicon-300x300.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap/css/bootstrap.min.css')}}" media="all">
    <!-- Fonts Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/fontawesome/css/all.min.css')}}">
    <!-- Elmentkit Icon CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/elementskit-icon-pack/assets/css/ekiticons.css')}}">
    <!-- progress bar CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/progressbar-fill-visible/css/progressBar.css')}}">
    <!-- jquery-ui css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/jquery-ui/jquery-ui.min.css')}}">
    <!-- modal video css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/modal-video/modal-video.min.css')}}">
    <!-- light box css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/fancybox/dist/jquery.fancybox.min.css')}}">
    <!-- slick slider css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/slick/slick-theme.css')}}">
    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{asset('style.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Study Tracer - BKK SMENDA</title>
</head>

<body class="home">
    <div id="siteLoader" class="site-loader ">
        <div class="preloader-content">
            <img src="{{asset('assets/img/loader1.gif')}}" alt="">
        </div>
    </div>
    <div id="page" class="full-page">
        <header class="site-header site-header-transparent">
            <!-- header html start -->
            <div class="top-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 d-none d-lg-block">
                            <div class="header-contact-info">
                                <ul>
                                    <li>
                                        <a href="tel:+62318964034"><i class="fas fa-phone-alt"></i> (031) 8964034</a>
                                    </li>
                                    <li>
                                        <a href="mailto:info@smkn2buduran.sch.id"><i class="fas fa-envelope"></i> <span
                                                class="__cf_email__">info@smkn2buduran.sch.id</span></a>
                                    </li>
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i> Jl. Jenggolo No.2A Siwalanpanji Kec.
                                        Buduran
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-lg-end justify-content-between">
                            <div class="header-social social-links">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/groups/1339789936528467/?locale=en_GB"
                                            target="_blank">
                                            <i class="fab fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.youtube.com/@bkksmkn2buduran195" target="_blank">
                                            <i class="fab fa-youtube" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/bkksmenda/" target="_blank">
                                            <i class="fab fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-header" id="masthead">
                <div class="container">
                    <div class="hb-group d-flex align-items-center justify-content-between">
                        <div class="site-identity col-lg-3">
                            <p class="">
                                <a href="index-2.html">
                                    <img width="50" src="{{asset('assets/img/logo.png')}}" alt="logo">
                                </a>
                            </p>
                        </div>
                        <div class="header-btn d-inline-block">
                            <a href="{{route('login')}}" class="button-round-secondary">MASUK</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-container"></div>
        </header>
        <main id="content" class="site-main">
            <!-- home banner section html start -->
            <section class="home-banner d-flex align-items-end">
                <div class="container">
                    <div class="row align-items-end">
                        <div class=" banner-left col-md-6">
                            <div class="image-overlay pattern-overlay"></div>
                            <div class="banner-content">
                                <div class="title-divider"></div>
                                <div class="banner-title">
                                    <h1>
                                        <!-- <span>Selamat Datang</span> -->
                                        <span>BKK SMK Negeri 2 Buduran Sidoarjo</span>
                                    </h1>
                                </div>
                                <div class="banner-text">
                                    <p>Tracer Study bertujuan untuk mengetahui hasil pendidikan dalam bentuk transisi
                                        dari dunia pendidikan tinggi ke dunia usaha dan industri, keluaran pendidikan
                                        berupa penilaian diri terhadap penguasaan dan pemerolehan kompetensi, proses
                                        pendidikan berupa evaluasi proses pembelajaran dan kontribusi pendidikan tinggi.
                                    </p>
                                </div>
                                <div class="banner-button">
                                    <a href="#detail" class="button-round-secondary">LEBIH LANJUT</a>
                                </div>
                            </div>
                        </div>
                        <div class=" banner-right col-md-6">
                            <figure class="banner-img">
                                <div class="image-overlay-oval pattern-overlay"></div>
                                <img src="{{asset('assets/img/educator-img33.png')}}" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="overlay-image pattern-overlay"></div>
            </section>
            <!-- home about section html start -->
            <section id="detail" class="home-about-us mb-5">
                <div class="container">
                    <div class="about-right-content">
                        <div class="title-divider"></div>
                        <h2 class="about-title text-center mb-3">Apa itu Tracer Study?</h2>
                        <figure class="figure-round-border mb-3">
                            <img style="height: 400px; object-fit: cover;" src="{{asset('assets/img/detail-banner.webp')}}"
                                alt="Detail Banner">
                        </figure>

                        <div class="about-desc">
                            <p style="text-align: justify;">Tracer Study bertujuan untuk mengetahui hasil pendidikan
                                dalam bentuk transisi dari
                                dunia
                                pendidikan tinggi ke dunia usaha dan industri, keluaran pendidikan berupa penilaian diri
                                terhadap penguasaan dan pemerolehan kompetensi, proses pendidikan berupa evaluasi proses
                                pembelajaran dan kontribusi pendidikan tinggi.
                            </p>
                            <p style="text-align: justify;">Tracer study juga mengungkap persepsi dunia kerja sebagai
                                mitra pendidikan vokasi yang
                                memberikan umpan balik untuk perbaikan pendidikan vokasi. Melalui tracer study, SMK
                                dapat
                                mengukur kebekerjaan lulusannya, baik bekerja, berwirausaha maupun melanjutkan studi

                                Ada 3 (tiga) pihak yang menjadi sasaran tracer study tahun 2023:
                            </p>
                            <ol>
                                <li>Lulusan Sekolah Menengah Kejuruan tahun ajaran 2021/2022</li>
                                <li>Satuan pendidikan SMK</li>
                                <li>Dunia kerja (dunia usaha dunia industri), selanjutnya disebut DUDI.</li>
                            </ol>
                            <p style="text-align: justify;">Dengan mengisi tracer study, kamu sudah berperan besar
                                memberikan masukan untuk peningkatan kualitas pendidikan vokasi di Indonesia. Masukan
                                dari kamu sangat berharga dan akan menjadi bahan evaluasi pemerintah dalam
                                mengoptimalisasi perencanaan pelayanan pendidikan vokasi ke depannya.</p>
                            <p style="text-align: justify;">Data isian ini akan digunakan untuk mengukur kemajuan
                                sekolah dan menentukan Raport Pendidikan SMKN 2 Buduran, oleh karena itu. Dimohon untuk
                                mengisi dengan data yang sebenarnya. Disampaikan terima kasih atas partisipasi dan
                                kerjasamanya.</p>
                        </div>

                    </div>
                    <div class="pattern-overlay"></div>
                </div>
            </section>
            <section class="my-5 container ">
                <div class="row">
                    <div class="col-md-6">
                        <canvas id="universitas-chart"></canvas>
                    </div>
                    <div class="col-md-6">
                        <canvas id="perusahaan-chart"></canvas>
                    </div>
                </div>
            </section>
            <section class="home-goal-section mt-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="inner-goal-image">
                                <figure class="video-play-image">
                                    <img style="width: 100%; height: 300px; object-fit: cover;"
                                        src="{{asset('assets/img/bg_youtube.webp')}}" alt="Background Youtube">
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="goal-content">
                                <div class="pattern-overlay"></div>
                                <div class="title-divider"></div>
                                <h2 class="goal-title">Motto BKK SMK Negeri 2 Buduran</h2>
                                <p class="goal-info">
                                    Produktif, Kreatif, dan Berkarakter!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- home progress section html start -->
            <div class="home-progress-section">
                <div class="overlay"></div>
                <div class="container">
                    <div class="counter-inner">
                        <div class="counter-item-wrap row">
                            <div class="col-lg-3 col-sm-6 counter-item">
                                <div class="counter-no">
                                    <span class="counter">{{$alumni}}</span>
                                </div>
                                <div class="Completed">
                                    Alumni
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 counter-item">
                                <div class="counter-no">
                                    <span class="counter">{{$berkuliah}}</span>
                                </div>
                                <div class="Completed">
                                    Berkuliah
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 counter-item">
                                <div class="counter-no">
                                    <span class="counter">{{$bekerja}}</span>
                                </div>
                                <div class="Completed">
                                    Bekerja
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 counter-item">
                                <div class="counter-no">
                                    <span class="counter">{{$wirausaha}}</span>
                                </div>
                                <span class="Completed">
                                    Wirausaha
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- home testimonial section html start -->
            <section class="home-testimonial-section">
                <div class="container">
                    <div class="title-divider-center"></div>
                    <h2 class="testimonial-section-title text-center">Telusuri Alumni</h2>
                    <p class="testimonial-section-info text-center mb-3">Cari berdasarkan Nama, NISN, Universitas, atau
                        Perusahaan</p>

                    <div class="vacancy-form mt-0 mb-5">
                        <input class="w-100" id="cari" type="text" name="cari" placeholder="Masukkan pencarian.....">
                    </div>
                </div>

                <div class="container">
                    <div id="loading-section" class="mx-auto text-center d-none">
                        <div class="loader mx-auto"></div>
                        <p>Mencari data...</p>
                    </div>
                    <div id="alumni-section" class="row justify-content-center">
                    </div>
                </div>

            </section>
        </main>
        <!-- footer part -->
        <footer id="colophon" class="site-footer">
            <div class="footer-overlay"></div>
            <div class="container">
                <div class="bottom-footer">
                    <p class="text-center text-light m-0">Copyright &copy; 2025 BKK SMKN 2 Buduran Surabaya. All rights
                        reserved.</p>
                </div>
            </div>
        </footer>
        <!-- back to top -->
        <a id="backTotop" href="#" class="to-top-icon">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- JavaScript -->
    <script src="{{asset('assets/vendors/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/vendors/waypoint/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/vendors/progressbar-fill-visible/js/progressBar.min.js')}}"></script>
    <script src="{{asset('assets/vendors/countdown-date-loop-counter/loopcounter.js')}}"></script>
    <script src="{{asset('assets/vendors/counterup/jquery.counterup.js')}}"></script>
    <script src="{{asset('assets/vendors/modal-video/jquery-modal-video.min.js')}}"></script>
    <script src="{{asset('assets/vendors/masonry/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendors/fancybox/dist/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('assets/vendors/slick/slick.min.js')}}"></script>
    <script src="{{asset('assets/vendors/slick-nav/jquery.slicknav.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let timeoutId;
            const alumniSection = document.querySelector('#alumni-section');
            const loadingSection = document.querySelector('#loading-section');
            let universitasSection = '';
            let perusahaanSection = '';
            let menungguSection = '';
            let linear = @json($linear);
            let tidakLinear = @json($tidakLinear);

            const labels = ['Linear', 'Tidak Linear'];

            const data = {
                labels: labels,
                datasets: [{
                    label: 'Linearitas Pilihan Prodi dengan Jurusan SMK 2023/2024',
                    data: [linear.universitas, tidakLinear.universitas],
                    backgroundColor: [
                        'rgba(9,212,104, 0.2)',
                        'rgba(107, 02, 158, 0.2)',
                    ],
                    borderColor: [
                        'rgb(9,212,104)',
                        'rgb(107, 02, 158)',
                    ],
                    borderWidth: 1
                }]
            };

            const data2 = {
                labels: labels,
                datasets: [{
                    label: 'Linearitas Bidang Pekerjaan dengan Jurusan SMK 2023/2024',
                    data: [linear.perusahaan, tidakLinear.perusahaan],
                    backgroundColor: [
                        'rgba(9,212,104, 0.2)',
                        'rgba(107, 02, 158, 0.2)',
                    ],
                    borderColor: [
                        'rgb(9,212,104)',
                        'rgb(107, 02, 158)',
                    ],
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };

            const config2 = {
                type: 'bar',
                data: data2,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            };

            const ctx = document.getElementById('universitas-chart');
            const ctx2 = document.getElementById('perusahaan-chart');

            new Chart(ctx, config);
            new Chart(ctx2, config2);

            document.querySelector('#cari').addEventListener('keyup', function () {
                clearTimeout(timeoutId);

                timeoutId = setTimeout(async () => {
                    alumniSection.innerHTML = '';
                    loadingSection.classList.remove('d-none');

                    let response = await fetch(`api/alumni?cari=${this.value}`);
                    let data = await response.json();

                    loadingSection.classList.add('d-none');

                    data.forEach(item => {
                        universitasSection = '';
                        perusahaanSection = '';
                        menungguSection = '';

                        item.universitas.forEach(item2 => {
                            universitasSection += ` <div class="d-flex align-items-center">
                                        <i class='bx bxs-graduation me-2'></i>
                                        <p class="m-0">${item2.nama}</p>
                                    </div>`;
                        });

                        item.perusahaan.forEach(item2 => {
                            perusahaanSection += ` <div class="d-flex align-items-center">
                                        <i class='bx bxs-briefcase-alt-2 me-2'></i>
                                        <p class="m-0">${item2.nama}</p>
                                    </div>`;
                        });

                        if (universitasSection == '' && perusahaanSection == '') {
                            menungguSection = `<div class="d-flex align-items-center">
                                        <i class='bx bxs-error-circle me-2' ></i>
                                        <p class="m-0">Menunggu</p>
                                    </div>`;
                        }

                        alumniSection.innerHTML += `<div class="col-md-4">
                            <div class="client-content left-content mb-5">
                                <div class="author-content">
                                    <div>
                                        <figure class="author-img">
                                            <img src="{{asset('assets/img/profil_${item.jenis_kelamin}.svg')}}" alt="">
                                        </figure>
                                    </div>
                                    <div class="author-info">
                                        <h5 class="author-name">${item.nama}</h5>
                                        <span class="author-title">${item.pengguna.username}</span>
                                    </div>
                                </div>
                                <div class="pattern-overlay circle-patten"></div>
                                <div class="client-review mt-3">
                                    ${universitasSection}
                                    ${perusahaanSection}
                                    ${menungguSection}
                                </div>

                            </div>
                        </div>`
                    });
                    console.log(data);
                }, 500);
            });
        });

    </script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"936332056938ce02","version":"2025.4.0-1-g37f21b1","r":1,"serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"2aaac9563824454ba89abdea91540009","b":1}'
        crossorigin="anonymous"></script>
</body>

</html>
