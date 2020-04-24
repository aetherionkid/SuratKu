<?php
require_once "config/database.php";

// jika tombol simpan diklik
if(isset($_POST['simpan'])) {
    // ambil data hasil submit dari form
    $username = mysqli_real_escape_string($db,trim($_POST['username']));
    $password = sha1(mysqli_real_escape_string($db,trim($_POST['password'])));
    $nama = mysqli_real_escape_string($db,trim($_POST['nama']));
    $level = mysqli_real_escape_string($db,trim($_POST['level']));

    // query insert
    $insert = mysqli_query($db, "INSERT INTO tbl_user(username, password, nama, level)
            VALUES ('$username','$password','$nama','$level')")or die('Ada kesalahan pada query insert : '.mysqli_error($db));
    // cek query
    if($insert){
        // jika berhasil tampilkan pesan berhasil simpan data
        header('Location:index.php?page=register&alert=1');
    }
}
// tutup koneksi
mysqli_close($db);

?>