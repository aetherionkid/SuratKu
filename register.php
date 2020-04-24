<div class="container">

    <div class="row">
        <div class="col-md-12 py-4">

            <div class="alert alert-info" role="alert">
                <i class="fas fa-edit"></i> Register
            </div>

            <?php
            // fungsi untuk menampilkan pesan
            // jika alert = "" (kosong)
            // tampilkan pesan "" (kosong)
            if(empty($_GET['alert'])) {
                echo "";
            }
            // jika alert = 1
            // tampilkan pesan suksek "User berhasil ditambah"
            elseif($_GET['alert']==1) { ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check-circle"></i> Success!</h4>
                    User berhasil ditambah
                </div>                         
            <?php
            }
            ?>

            <div class="card">
                <div class="card-body">
                    <!-- form register user -->
                    <form action="proses_register.php" method="post">

                        <div class="row">
                            <div class="col">
                                
                                <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" required>
                                        <div class="invalid-feedback">Username tidak boleh kosong</div>
                                    </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" required>                                        
                                </div>                                                           

                                 <div class="form-group">
                                    <label for="level">Role</label>
                                    <select name="level" class="form-control" required>
                                        <option value=""></option>
                                        <option value="super_admin">Super Admin</option>
                                        <option value="admin">Admin</option>
                                        <option value="staf">Staf</option>
                                        <option value="eselon">Eselon</option>                                        
                                    </select>
                                </div>                                                  

                            </div>
                        </div>

                        <div class="my-md-4 pt-md-1 border-top"></div>

                        <div class="form-group col-md-12 right">
                            <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                            <a href="index.php" class="btn btn-secondary btn-reset">Batal</a>
                        </div>

                        


                        


                    </form>
                </div>
            </div>

        </div>
    </div>
</div>