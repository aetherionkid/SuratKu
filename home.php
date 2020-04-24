<!-- SLIDER -->
<header id="main-slide">

    <div id="mySlide" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#mySlide" data-slide-to="0" class="active"></li>
            <li data-target="#mySlide" data-slide-to="1"></li>
            <li data-target="#mySlide" data-slide-to="2"></li>
            <li data-target="#mySlide" data-slide-to="3"></li>
        </ol>

        <div class="carousel-inner text-white">
            <div class="carousel-item active" id="slide1">
                <div class="container">
                    <div class="d-none d-md-block">
                        <h1 class="display-4 bg-info px-4 pb-2 d-inline-block">
                            <strong>Izin Belajar dan Tugas Belajar</strong> 
                        </h1>
                        <br>
                        <p class="bg-dark px-4 pb-1 d-inline-block">
                            Pelaksanakan Pengelolaan Izin Belajar dan Tugas Belajar bagi PNS Pemerintah Provinsi Sulawesi Selatan
                        </p>
                    </div>
                </div>
            </div>

            <div class="carousel-item" id="slide2">
                <div class="container">
                    <div class="d-none d-md-block text-right">
                        <h1 class="display-4 bg-dark px-4 pb-2 d-inline-block">
                            <strong>UD-PI</strong> 
                        </h1>
                        <br>
                        <p class="bg-info px-4 pb-1 d-inline-block">
                            Penyelenggarakan Ujian Dinas dan Ujian Penyesuaian Ijazah
                        </p>
                    </div>
                </div>
            </div>

            <div class="carousel-item" id="slide3">
                <div class="container">
                    <div class="d-none d-md-block">
                        <h1 class="display-4 bg-info px-4 pb-2 d-inline-block">
                            <strong>Diklat ASN</strong> 
                        </h1>
                        <br>
                        <p class="bg-dark px-4 pb-1 d-inline-block">
                            Pelaksanakan Penyusunan Rencana Kebutuhan Diklat ASN
                        </p>
                    </div>
                </div>
            </div>

            <div class="carousel-item" id="slide4">
                <div class="container">
                    <div class="d-none d-md-block text-right">
                        <h1 class="display-4 bg-dark px-4 pb-2 d-inline-block">
                            <strong>Pendidikan Kedinasan</strong> 
                        </h1>
                        <br>
                        <p class="bg-info px-4 pb-1 d-inline-block">
                            Fasilitasi Seleksi Calon Peserta Pendidikan Kedinasan
                        </p>
                    </div>
                </div>
            </div>

           

        </div>

        

        <a class="carousel-control-prev" href="#mySlide" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a  class="carousel-control-next" href="#mySlide" data-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="sr-only">Next</span>
        </a>
    
    </div>
</header>

<!-- INFORMASI -->
<section id="informasi" class="py-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>Sub Bidang Pengembangan Pegawai</h2>
                <p>Badan Kepegawaian Daerah Provinsi Sulawesi Selatan</p>
                <hr class="w-25">
                
            </div>
        </div>
        
        <div class="row text-center justify-content-between mt-2">

            <div class="col-sm-6 col-md-4 p-3">
                <i class="fas fa-envelope fa-4x"></i>
                <h4 class="mt-3">Surat Masuk</h4>
                <p><?php 
                    require_once "config/database.php";
                    $hitung_surat_masuk = mysqli_num_rows(mysqli_query($db,"SELECT * FROM tbl_surat_masuk"));
                    echo $hitung_surat_masuk . " Surat Masuk";
                ?>
                </p> 
                
            </div>

            <div class="col-sm-6 col-md-4 p-3">
                <i class="fas fa-envelope-open fa-4x"></i>
                <h4 class="mt-3">Surat Keluar</h4>
                <p>
                <?php 
                    $hitung_surat_keluar = mysqli_num_rows(mysqli_query($db,"SELECT * FROM tbl_surat_keluar"));
                    echo $hitung_surat_keluar . " Surat Keluar";
                ?>
                </p>
            </div>

            <div class="col-sm-6 col-md-4 p-3">
                <i class="fas fa-user-friends fa-4x"></i>
                <h4 class="mt-3">Pengguna</h4>
                <p>
                <?php 
                    $hitung_pengguna = mysqli_num_rows(mysqli_query($db,"SELECT * FROM tbl_user"));
                    echo $hitung_pengguna . " Pengguna";
                    mysqli_close($db);
                ?>
                </p>
            </div>            
        </div>
    </div>

</section>
