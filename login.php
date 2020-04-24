<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuratKu</title>
    <link rel="icon" href="assets/img/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/plugins/datepicker/css/datepicker.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css"> 


</head>
<body>
    <div class="container pt-5">

        <?php
            // fungsi untuk menampilkan pesan
            // jika alert = "" (kosong)
            // tampilkan pesan "" (kosong)

            if(empty($_GET['alert'])) {
                echo "";
            }

            // jika alert = 1
            // tampilkan pesan Gagal "username atau password salah, cek kembali username dan password anda"
            elseif($_GET['alert'] == 1) { ?>
                
                <div class="row">
                    <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto ">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4><i class="icon fa fa-times-circle"></i> Login Failed!</h4>
                            Wrong username or password, check again your username or password!

                        </div>                    
                    </div> 

                </div>
            <?php                
            }
            elseif($_GET['alert']==2) { ?>
               <div class="row">
                    <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto ">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4><i class="icon fa fa-check-circle"></i> Success!</h4>
                            You have successfully logout.

                        </div>                    
                    </div> 

                </div>                

            <?php

            }
        ?>

        <div class="row">
            <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-4 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>Account Login</h4>
                    </div>

                    <div class="card-body">
                        <form action="login_check.php" method="post" autocomplete="off">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>

                            <input type="submit" class="btn btn-info btn-block " name="login" value="Login">

                        </form>                    
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="assets/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="assets/js/popper.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>

    
</body>
</html>