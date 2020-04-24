<?php
require_once "config/database.php";

// jika tombol simpan diklik
if(isset($_POST['simpan'])) {
    if(isset($_POST['id_surat'])) {
        // ambil data hasil submit dari form
        $id_surat = $_POST['id_surat'];
        $noSurat = mysqli_real_escape_string($db,trim($_POST['no_surat']));
        $tujuanSurat = mysqli_real_escape_string($db,trim($_POST['tujuan']));
        $perihal = mysqli_real_escape_string($db,trim($_POST['perihal']));
        $tglProses = mysqli_real_escape_string($db,trim(date('Y-m-d',strtotime($_POST['tgl_proses']))));
        $tglSurat = mysqli_real_escape_string($db,trim(date('Y-m-d',strtotime($_POST['tgl_surat']))));
        $keterangan = mysqli_real_escape_string($db,trim($_POST['keterangan']));
        $status = mysqli_real_escape_string($db,trim($_POST['status']));
        $file = $_POST['nama_file'];
        $nama_file = $_FILES['file']['name'];
        $tmp_file = $_FILES['file']['tmp_name'];
        $path = "file/surat_keluar/".$nama_file;

        if(!empty($nama_file)) {
            // upload file
            move_uploaded_file($tmp_file,$path);
        }else {
            $nama_file = $file;
        }      

        // query untuk update data
        $update = mysqli_query($db, "UPDATE tbl_surat_keluar SET no_surat = '$noSurat',
                                                                 tujuan = '$tujuanSurat',
                                                                 perihal = '$perihal',
                                                                 tgl_proses = '$tglProses',
                                                                 tgl_surat = '$tglSurat',
                                                                 keterangan = '$keterangan',
                                                                 status = '$status',
                                                                 file = '$nama_file'
                                                            WHERE id_surat = '$id_surat' ")
                                                            or die('Ada kesalahan pada query insert : '.mysqli_error($db));
        // cek query
        if($update){
            // jika berhasil tampilkan pesan berhasil simpan data
            header('Location:index.php?page=surat_keluar');
        }      
    }
 


}

// tutup koneksi
mysqli_close($db);

?>