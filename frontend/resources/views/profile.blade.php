<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fruitables - Vegetable Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-primary d-none d-lg-block">
            <div class="d-flex justify-content-between">
                <div class="top-info ps-2">
                    <small class="me-3"><i class=""></i> <a href="#" class="text-white"></a></small>
                    <small class="me-3"><i class=""></i><a href="#" class="text-white"></a></small>
                </div>
                <div class="top-link pe-2">
                    <a href="#" class="text-white"><small class="text-white mx-2"></small></a>
                    <a href="#" class="text-white"><small class="text-white mx-2"></small></a>
                    <a href="#" class="text-white"><small class="text-white ms-2"></small></a>
                </div>
            </div>
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">

                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="{{url('/')}}" class="nav-item nav-link">Beranda</a>
                        <a href="{{url('/profile')}}" class="nav-item nav-link active">Profile</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">UMKM</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <a href="{{url('/cart')}}" class="dropdown-item">Cart</a>
                                <a href="{{url('/chackout')}}" class="dropdown-item">Chackout</a>
                                <a href="{{url('/testimonial')}}" class="dropdown-item">Testimonial</a>
                                <a href="{{url('/404')}}" class="dropdown-item">404 Page</a>
                            </div>
                        </div>
                        <a href="{{url('/hubungi-kami')}}" class="nav-item nav-link">Hubungi Kami</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Single Page Header Start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">PANDHAWA SAKTI</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Profile</li>
        </ol>
    </div>
    <!-- Single Page Header End -->
   <!-- Profile Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <!-- Logo -->
                <div class="col-lg-12 text-center">
                    <img src="frontend\fruitables-1.0.0\img\pandhawa sakti.png" alt="Logo Pandhawa Sakti"
                        class="img-fluid rounded-circle shadow mb-4"
                        style="width: 300px; height: 300px; object-fit: cover;">
                </div>
                <!-- Deskripsi -->
                <div class="col-lg-12">
                    <div class="text-start">
                        <h1 class="text-primary">Tentang Pandhawa Sakti</h1>
                        <p>
                            <strong>Pandhawa Sakti</strong> adalah paguyuban UMKM yang berpusat di Kecamatan Kawedanan, Kabupaten Magetan, Jawa Timur. Sebagai wadah kolaborasi bagi para pelaku Usaha Mikro, Kecil, dan Menengah (UMKM), Pandhawa Sakti hadir untuk menciptakan ekosistem yang mendukung pengembangan usaha, peningkatan daya saing, dan promosi produk lokal unggulan. Dengan fokus pada kolaborasi, inovasi, dan pemberdayaan, kami berkomitmen untuk mewujudkan kesejahteraan pelaku UMKM serta memberikan kontribusi positif bagi pembangunan ekonomi lokal. Mikro, Kecil, dan Menengah (UMKM) dalam mengembangkan usaha, meningkatkan daya saing, dan mempromosikan produk lokal unggulan melalui kolaborasi dan inovasi.
                        </p>
                        <h3 class="text-primary mt-4">Visi Pandhawa Sakti</h3>
                        <p>Meningkatkan kesejahteraan dan daya saing pelaku UMKM melalui kolaborasi, inovasi, dan pengembangan produk lokal unggulan.</p>

                        <h3 class="text-primary mt-4">Misi Pandhawa Sakti</h3>
                        <ul>
                            <li><strong>Ekosistem Kolaboratif:</strong> Menciptakan lingkungan yang mendukung pertumbuhan UMKM.</li>
                            <li><strong>Pelatihan dan Pendampingan:</strong> Memberikan edukasi untuk meningkatkan kapasitas pelaku usaha.</li>
                            <li><strong>Akses Pasar:</strong> Memperluas promosi produk lokal baik offline maupun online.</li>
                            <li><strong>Kemitraan Strategis:</strong> Menggalang kerja sama dengan pemerintah, swasta, dan komunitas.</li>
                            <li><strong>Inovasi:</strong> Mendorong pengembangan produk berbasis kearifan lokal.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <!-- Informasi Kontak -->
                <div class="col-lg-4">
                    <div class="d-flex align-items-center p-4 rounded bg-white shadow-sm">
                        <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4 class="text-primary mb-2">Alamat</h4>
                            <p class="mb-0">Jln Raya Gorang Gareng - Lembeyan, Desa Tladan, Kawedanan, Magetan</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center p-4 rounded bg-white shadow-sm">
                        <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                        <div>
                            <h4 class="text-primary mb-2">Email</h4>
                            <p class="mb-4">info@pandhawasakti.id</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center p-4 rounded bg-white shadow-sm">
                        <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4 class="text-primary mb-2">Telepon</h4>
                            <p class="mb-4">(+62) 857 3565 2666</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Profile End -->





    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#">
                            <h1 class="text-primary mb-0">Pandhawa Sakti</h1>
                            <p class="text-secondary mb-0">UMKM Kawedanan</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Tentang Kami</h4>
                        <p class="mb-4">Pandhawa Sakti adalah komunitas UMKM di Kabupaten Magetan yang bertujuan mendukung pertumbuhan usaha lokal dengan teknologi dan inovasi.</p>
                        <a href="{{url('/profile')}}" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Selengkapnya</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Hubungi Kami</h4>
                        <p>Alamat: Kawedanan, Magetan, Jawa Timur</p>
                        <p>Email: info@pandhawasakti.id</p>
                        <p>Telepon: +62 857 3565 2666</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Peta Lokasi</h4>
                        <iframe class="w-100" height="150" frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.123456789012!2d111.306987654321!3d-7.737654321098765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79c01234567890%3A0x1abcde1234567890!2sKawedanan%2C%20Magetan%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1691234567890"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{('js/main.js')}}"></script>
</body>

</html>