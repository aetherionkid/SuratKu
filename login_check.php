<?php
// panggil file koneksi database
require_once "config/database.php";

// ambil data hasil submit dari form
$username = mysqli_real_escape_string($db, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
$password = sha1(mysqli_real_escape_string($db, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));


// pastikan username dan password adalah berupa huruf atau angka
if(!ctype_alnum($username) OR !ctype_alnum($password)) {
    header("Location:login.php?alert=1");
}
else {
    // ambil data dari tbl_user untuk pengecekan berdasarkan inputan username dan password
    $query = mysqli_query($db, "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'")
                                    or die('Ada kesalahan pada query user : ' . mysqli_error($db));
    $rows = mysqli_num_rows($query);
    
    // jika ada data, jalankan perintah untuk membuat session
    if($rows > 0) {
        $data = mysqli_fetch_assoc($query);

        session_start();
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['level'] = $data['level'];
        $_SESSION['role'] = $data['role'];

        // lalu alihkan ke halaman home
        header("location:index.php");
    }
    // jika tidak ada data, alihakn ke halaman login dan tampilkan pesan = 1
    else {
        header("Location:login.php?alert=1");
    }
}
?>