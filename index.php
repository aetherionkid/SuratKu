<?php
session_start();
// cek session
if(!isset($_SESSION["username"])) {
    header("Location:login.php");
}

require_once "config/database.php";

include "template/header.php";
?>


    
    <div class="row mt-5"></div>
    <div class="row mt-2"></div>
        <?php
            // fungsi untuk pemanggilan halaman
            // jika page=kosong atau saat aplikasi pertama dijalankan, tampilkan halaman home.php 
            if(empty($_GET["page"])){
                include "home.php";
            }
            
            elseif($_GET["page"]=="surat_masuk"){
                include "tampil_surat_masuk.php";
            }
            elseif($_GET["page"]=="tambah_surat_masuk"){
                include "form_surat_masuk.php";
            }
            elseif($_GET["page"]=="surat_keluar"){
                include "tampil_surat_keluar.php";
            }
            elseif($_GET["page"]=="tambah_surat_keluar"){
                include "form_surat_keluar.php";
            }
            elseif($_GET["page"]=="profile"){
                include "profile.php";
            }
            elseif($_GET["page"]=="form_ubah_surat_masuk"){
                include "form_ubah_surat_masuk.php";
            }
            elseif($_GET["page"]=="hapus_surat_masuk"){
                include "hapus_surat_masuk.php";
            }
            elseif($_GET["page"]=="detail_surat_masuk"){
                include "detail_surat_masuk.php";
            }
            elseif($_GET["page"]=="hapus_surat_keluar"){
                include "hapus_surat_keluar.php";
            }
            elseif($_GET["page"]=="form_ubah_surat_keluar"){
                include "form_ubah_surat_keluar.php";
            }
            elseif($_GET["page"]=="detail_surat_keluar"){
                include "detail_surat_keluar.php";
            }
            elseif($_GET["page"]=="register"){
                include "register.php";
            }
            
            
                        
        ?>    
   

<?php
    include "template/footer.php"
?>
    