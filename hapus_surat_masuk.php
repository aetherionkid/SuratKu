<?php
require_once "config/database.php";

// jika tombol hapus diklik
if(isset($_GET['id_surat'])) {
    // ambil data get dari form
    $id_surat = $_GET['id_surat'];
    // query untuk hapus data dari tabel
    $delete = mysqli_query($db, "DELETE FROM tbl_surat_masuk WHERE id_surat = '$id_surat'") or die('Ada kesehalan pada query delete : '.mysqli_error($db));
    if($delete){
        header("Location:index.php?page=surat_masuk");
    }
}
mysqli_close($db);


?>