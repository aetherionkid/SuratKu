<?php
// panggil file database.php untuk koneksi ke database
require_once "config/database.php";

// jika tombol simpan di klik
if(isset($_POST['simpan'])){
    if(isset($_POST['id_surat'])){
        // ambil data hasil submit dari form
        $id_surat = $_POST['id_surat']; 
        $noSurat = mysqli_real_escape_string($db,trim($_POST['no_surat']));
        $asalSurat = mysqli_real_escape_string($db,trim($_POST['asal_surat']));
        $perihal = mysqli_real_escape_string($db,trim($_POST['perihal']));
        $tglSurat = mysqli_real_escape_string($db,trim(date('Y-m-d',strtotime($_POST['tanggal_surat']))));
        $tglDiterima = mysqli_real_escape_string($db,trim(date('Y-m-d',strtotime($_POST['tanggal_diterima']))));
        $posisi = mysqli_real_escape_string($db,trim($_POST['posisi']));
        $status = mysqli_real_escape_string($db,trim($_POST['status']));
        $keterangan = mysqli_real_escape_string($db,trim($_POST['keterangan']));
        $file=$_POST['nama_file'];
        $nama_file = $_FILES['file']['name'];
        $tmp_file = $_FILES['file']['tmp_name'];
        $path = "file/surat_masuk/".$nama_file;

        if(!empty($nama_file)){
            // upload file
            move_uploaded_file($tmp_file,$path);
        }else{
            $nama_file = $file;
        }
       

        // query untuk update data 
        $update = mysqli_query($db, "UPDATE tbl_surat_masuk SET no_surat = '$noSurat',
                                                                asal_surat = '$asalSurat',
                                                                perihal = '$perihal',
                                                                tgl_surat = '$tglSurat',
                                                                tgl_diterima = '$tglDiterima',
                                                                posisi = '$posisi',
                                                                status = '$status',
                                                                keterangan = '$keterangan',
                                                                file = '$nama_file'
                                                            WHERE id_surat = '$id_surat' ")
                                                            or die('Ada kesalahan pada query update : '.mysqli_error($db));
        if($update) {
            // jika berhasil tampilkan pesan berhasil ubah data
            header("Location:index.php?page=surat_masuk");
        }

    }
    
}
mysqli_close($db);
?>