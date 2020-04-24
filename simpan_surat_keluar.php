<?php
require_once "config/database.php";

// jika tombol simpan diklik
if(isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
    $noSurat = mysqli_real_escape_string($db,trim($_POST['no_surat']));
    $tujuanSurat = mysqli_real_escape_string($db,trim($_POST['tujuan']));
    $perihal = mysqli_real_escape_string($db,trim($_POST['perihal']));
    $tglProses = mysqli_real_escape_string($db,trim(date('Y-m-d',strtotime($_POST['tgl_proses']))));
    $tglSurat = mysqli_real_escape_string($db,trim(date('Y-m-d',strtotime($_POST['tgl_surat']))));
    $keterangan = mysqli_real_escape_string($db,trim($_POST['keterangan']));
    $status = mysqli_real_escape_string($db,trim($_POST['status']));
    $nama_file = $_FILES['file']['name'];
    $tmp_file = $_FILES['file']['tmp_name'];
    $path = "file/surat_keluar/".$nama_file;

    // upload file
    move_uploaded_file($tmp_file,$path);

    // query insert
    $insert = mysqli_query($db, "INSERT INTO tbl_surat_keluar(no_surat, tujuan, perihal, tgl_proses, tgl_surat, keterangan, status, file)
            VALUES ('$noSurat','$tujuanSurat','$perihal', '$tglProses', '$tglSurat','$keterangan','$status','$nama_file')")or die('Ada kesalahan pada query insert : '.mysqli_error($db));
    // cek query
    if($insert){
        // jika berhasil tampilkan pesan berhasil simpan data
        header('Location:index.php?page=surat_keluar');
    }


}

// tutup koneksi
mysqli_close($db);

?>