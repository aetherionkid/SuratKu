<?php
session_start();

require_once "config/database.php";

// cek session
if(!isset($_SESSION["username"])) {
    header("Location:login.php");
}

// jika session ada, jalankan perintah untuk ubah password
if(isset($_POST['update'])) {
    if(isset($_SESSION['id_user'])) {
        // ambil data hasil submit dari form
        $password_lama = sha1(mysqli_real_escape_string($db, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password_lama']))))));
        $password_baru = sha1(mysqli_real_escape_string($db, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password_baru']))))));
        $ulangi_password_baru = sha1(mysqli_real_escape_string($db, stripslashes(strip_tags(htmlspecialchars(trim($_POST['ulangi_password_baru']))))));

        // ambil data hasil session user
        $id_user = $_SESSION['id_user'];

        // seleksi password dari tabel user untuk dicek
        $query = mysqli_query($db, "SELECT password FROM tbl_user WHERE id_user = '$id_user' ")
                                    or die('Ada kesalahan pada query seleksi password : '. mysqli_error($db));
        $data = mysqli_fetch_assoc($query);

        // fungsi pengecekan password sebelum diubah
        // jika input password lama tidak sama dengan password di database
        // alihkan ke halaman profile dan tampilkan pesan = 1
        if($password_lama != $data['password']) {
            header("Location:index.php?page=profile&alert=1");
        }
        // jika input password lama sama dengan password database, jalankan pengecekan selanjutnya
        else {
            if($password_baru != $ulangi_password_baru) {
                header("Location:index.php?page=profile&alert=2");
            }
            // selain itu, jalankan perintah update password
            else {
                // perintah query untuk mengubah data pada tabel user
                $update = mysqli_query($db, "UPDATE tbl_user SET password = '$password_baru'
                                                            WHERE id_user = '$id_user'")
                                                    or die('Ada kesalahan pada query update password : '. mysqli_error($db));
                // cek query
                if($update) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("Location:index.php?page=profile&alert=3");
                }
            }
        }
    }
}

?>