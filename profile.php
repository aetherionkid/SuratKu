<?php

// cek session
if(!isset($_SESSION["username"])) {
    header("Location:login.php");
}

// ambil data session
$id_user_session = $_SESSION['id_user'];
$username_session = $_SESSION['username'];
$nama_session = $_SESSION['nama'] ;
$level_session = $_SESSION['level'];


// ambil semua data user yang akan diupdate dari database
require_once "config/database.php";

$query = mysqli_query($db, "SELECT * FROM tbl_user WHERE id_user = '$id_user_session' ")or die('Ada kesalahan pada query :' . mysqli_error($db));
$data = mysqli_fetch_assoc($query);

// buat variabel untuk menampung data dari database
$id_user = $data['id_user'];
$username = $data['username'];
$nama = $data['nama'];
$level = $data['level'];




?>

<div class="container">

    <div class="row">
        <div class="col-md-12 py-4">

            <div class="alert alert-secondary" role="alert">
                <i class="fas fa-user" ></i>  My <strong>Profile </strong> 
            </div>

            <?php
            // fungsi untuk menampilkan pesan
            // jika alert = "" (kosong)
            // tampilkan pesan "" (kosong)
            if(empty($_GET['alert'])) {
                echo "";
            }
            // jika alert = 1
            // tampilkan pesan gagal "password lama anda salah"
            elseif($_GET['alert']==1) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-times-circle"></i> Failed!</h4>
                    Password lama anda salah
                </div>                         
            <?php
            }
            // jika alert =2
            // tampilkan pesan gagal "Password baru dan ulangi password baru tidak cocok
            elseif($_GET['alert']==2) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-times-circle"></i> Failed!</h4>
                    Password baru dan ulangi password baru tidak cocok
                </div>                 
            <?php
            }
            // jika alert = 3
            // tampilkan pesan sukses "Password berhasil diubah"
            elseif($_GET['alert']==3) { ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check-circle"></i> Success!</h4>
                    Password berhasil diubah
                </div>                 

            <?php
            }
            ?>



            <div class="card">
                <div class="card-body">
                   
                    <!-- Halaman detail -->
                    <table class="table table-sm">
                        <tr>
                            <td width="180px">ID User</td>
                            <td>: <?php echo $id_user; ?></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>: <?php echo $username; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>: <?php echo $nama; ?></td>
                        </tr>
                        <tr>
                            <td>Level</td>
                            <td>: <?php echo $level; ?></td>
                        </tr>
                        


                    </table>

                                   
                    <div class="my-md-4 pt-md-1 border-top"></div>

                        <div class="form-group col-md-12 right">

                            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#formPassword">
                                Ubah Password
                            </button>

                            <!-- FORM UBAH PASSWORD -->

                            <form role="form" action="ubah_password.php" method="post" id="formPassword" class="collapse pt-4 <?php if(!empty($_POST)) {echo "show";} ?> ">

                                <div class="form-group row">
                                    <label for="password_lama" class="col-sm-3 col-form-label">Password Lama</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password_lama" autocomplete="off" required>
                                    </div>                                    
                                </div>

                                <div class="form-group row">
                                    <label for="password_baru" class="col-sm-3 col-form-label">Password Baru</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password_baru" autocomplete="off" required>
                                    </div>                                    
                                </div>

                                <div class="form-group row">
                                    <label for="ulangi_password_baru" class="col-sm-3 col-form-label">Ulangi Password Baru</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="ulangi_password_baru" autocomplete="off" required>
                                    </div>                                    
                                </div>

                                <div class="my-md-4 pt-md-1 border-top"></div>
                                
                                <input type="submit" class="btn btn-info" name="update" value="Update">
                                

                            </form>


                        </div>
                    
                </div>
            </div>

        </div>
    </div>
</div>