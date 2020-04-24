<?php
require_once "config/database.php";

// jika tombol simpan diklik
if(isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
    $noSurat = mysqli_real_escape_string($db,trim($_POST['no_surat']));
    $asalSurat = mysqli_real_escape_string($db,trim($_POST['asal_surat']));
    $perihal = mysqli_real_escape_string($db,trim($_POST['perihal']));
    $tglSurat = mysqli_real_escape_string($db,trim(date('Y-m-d',strtotime($_POST['tanggal_surat']))));
    $tglDiterima = mysqli_real_escape_string($db,trim(date('Y-m-d',strtotime($_POST['tanggal_diterima']))));
    $posisi = mysqli_real_escape_string($db,trim($_POST['posisi']));
    $status = mysqli_real_escape_string($db,trim($_POST['status']));
    $keterangan = mysqli_real_escape_string($db,trim($_POST['keterangan']));
    $nama_file = $_FILES['file']['name'];
    $tmp_file = $_FILES['file']['tmp_name'];
    $path = "file/surat_masuk/".$nama_file;

    // upload file
    move_uploaded_file($tmp_file,$path);

    // query insert
    $insert = mysqli_query($db, "INSERT INTO tbl_surat_masuk(no_surat, asal_surat, perihal, tgl_surat, tgl_diterima, posisi, status, keterangan, file)
            VALUES ('$noSurat','$asalSurat','$perihal','$tglSurat','$tglDiterima','$posisi','$status','$keterangan','$nama_file')")or die('Ada kesalahan pada query insert : '.mysqli_error($db));
    // cek query
    if($insert){
        // jika berhasil tampilkan pesan berhasil simpan data
        header('Location:index.php?page=surat_masuk');
    }


}

// tutup koneksi
mysqli_close($db);

?>