<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading"></div>
            <a class="nav-link" href="{{ url ('superadmin/dashboard')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link" href="{{ url ('superadmin/dashboard')}}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Kategori
            </a>
            <div class="sb-sidenav-menu-heading"></div>
            
            <!-- Admin UMKM Dropdown -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAdmins" aria-expanded="false" aria-controls="collapseAdmins">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Admin UMKM
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseAdmins" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ url ('superadmin/crudsuperadmin')}}">Tambah Admin UMKM</a>
                    <a class="nav-link" href="{{ url ('superadmin/lihatsuperadmin')}}">Lihat Admin UMKM</a>
                </nav>
            </div>

            <!-- Produk UMKM Dropdown -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Produk UMKM
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseProducts" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ url ('produk/crudproduk')}}">Tambah Produk UMKM</a>
                    <a class="nav-link" href="{{ url ('produk/lihatproduk')}}">Lihat Produk UMKM</a>
                </nav>
            </div>
        </div>
    </div>
</nav>
