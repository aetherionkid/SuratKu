<?php
// pengecekan pencarian data
// jika dilakukan pencarian data, maka tampilkan data sesuai kata kunci pencarian
if(isset($_POST['cari'])){
    $cari = $_POST['cari'];
}
// jika tidak, maka kosong
else{
    $cari = "";
}

$role = $_SESSION['role'];
$level = $_SESSION['level'];

?>

<div class="row">
    <div class="col-md-12">
        <?php
            // tempat untuk menampilkan pesan
        ?>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-12">
            
            <!-- form pencarian -->
            <div class="py-4 d-flex justify-content-end align-items-center">
                <h2 class="h2 mr-auto">
                    <a href="?page=surat_masuk" class="text-info">Surat Masuk</a>
                </h2>

                <!-- pemeriksaan user, tombol tambah hanya muncul pada admin, selain admin tombol tambah tidak muncul -->
                <?php
                    if($_SESSION['level']=="admin" OR $_SESSION['level']=="super_admin") { ?>
                        <a href="?page=tambah_surat_masuk" class="btn btn-info"><i class="fas fa-plus-circle"></i> Tambah</a>
                    <?php
                    }
                ?>             

                <form action="?page=surat_masuk" class="w-25 ml-4" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="search" name="cari">
                        <div class="input-group-append">
                            <input type="submit" class="btn btn-outline-secondary" value="Cari">
                        </div>
                    </div>
                </form>                
            </div>
            
            <!-- tabel surat masuk -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No. Surat</th>
                        <th>Asal Surat</th>
                        <th>Perihal</th>
                        <th>Tgl Surat</th>
                        <th>Tgl Diterima</th>
                        <th>Posisi</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                <?php
                // PAGINATION ----------------------------------------------------------------------------------
                // jumlah data yang ditampilkan setiap halaman
                $batas = 10;
                
                // jika yang login selain admin dan eselon, tampilkan data tabel sesuai role nya masing-masing
                if($_SESSION['level'] !== "admin" OR $_SESSION['level'] !== "super_admin" OR $_SESSION['level'] !== "eselon") {
                    
                    // jika dilakukan pencarian data
                    if(!empty($cari)) {
                        // perintah query untuk mengambil jumlah data dari database berdasarkan kata kunci pencarian
                        $query_jumlah = mysqli_query($db, "SELECT count(id_surat) as jumlah FROM tbl_surat_masuk WHERE posisi='$role' AND asal_surat LIKE '%$cari%' OR perihal LIKE '%$cari%'")or die('Ada kesalahan pada query jumlah : ' . mysqli_error($db));
                    }
                    
                    // jika tidak dilakukan pencarian data
                    else {
                        // perintah query untuk mengambil jumlah data dari database
                        $query_jumlah = mysqli_query($db, "SELECT count(id_surat) as jumlah FROM tbl_surat_masuk WHERE posisi='$role' ") or die('Ada kesalahan pada query jumlah : ' . mysqli_error($db));
                    }
                }
                // jika yg login adalah admin dan eselon, tampilkan semua data tabel
                if($_SESSION['level'] == "admin" OR $_SESSION['level'] == "super_admin" OR $_SESSION['level'] == "eselon") {
                    // jika dilakukan pencarian data
                    if(!empty($cari)) {
                        // perintah query untuk mengambil jumlah data dari database berdasarkan kata kunci pencarian
                        $query_jumlah = mysqli_query($db, "SELECT count(id_surat) as jumlah FROM tbl_surat_masuk WHERE asal_surat LIKE '%$cari%' OR perihal LIKE '%$cari%'")or die('Ada kesalahan pada query jumlah : ' . mysqli_error($db));
                    }
                    
                    // jika tidak dilakukan pencarian data
                    else {
                        // perintah query untuk mengambil jumlah data dari database
                        $query_jumlah = mysqli_query($db, "SELECT count(id_surat) as jumlah FROM tbl_surat_masuk") or die('Ada kesalahan pada query jumlah : ' . mysqli_error($db));
                    }
                }

                // tampilkan jumlah data
                $data_jumlah = mysqli_fetch_assoc($query_jumlah);
                $jumlah = $data_jumlah['jumlah'];
                $halaman = ceil($jumlah / $batas);
                $page = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
                $mulai = ($page - 1) * $batas;
                // ----------------------------------------------------------------------------------------------------------

                // no urut tabel
                $no = $mulai + 1;

                // jika yang login selain admin dan eselon, tampilkan data tabel sesuai role nya masing-masing
                if($_SESSION['level'] !== "admin" OR $_SESSION['level'] !== "super_admin" OR $_SESSION['level'] !== "eselon") {
                    // jika dilakukan pencarian data
                    if(!empty($cari)){
                        // perintah query untuk menampilkan data dari database berdasarkan kata kunci pencarian
                        $query = mysqli_query($db, "SELECT * FROM tbl_surat_masuk WHERE posisi='$role' AND asal_surat LIKE '%$cari%' OR perihal LIKE '%$cari%' ORDER BY id_surat DESC LIMIT $mulai, $batas")or die('Ada kesalahan pada query : ' . mysqli_error($db));
                    }
                    // jika tidak dilakukan pencarian data
                    else {
                        $query = mysqli_query($db, "SELECT * FROM tbl_surat_masuk WHERE posisi='$role' ORDER BY id_surat DESC LIMIT $mulai, $batas")or die('Ada kesalahan pada query : ' . mysqli_error($db));
                    }
                }
                //  jika yang login adalah admin dan eselon, tampilkan semua data tabel
                if($_SESSION['level'] == "admin" OR $_SESSION['level'] == "super_admin" OR $_SESSION['level'] == "eselon") {
                    // jika dilakukan pencarian data
                    if(!empty($cari)){
                        // perintah query untuk menampilkan data dari database berdasarkan kata kunci pencarian
                        $query = mysqli_query($db, "SELECT * FROM tbl_surat_masuk WHERE asal_surat LIKE '%$cari%' OR perihal LIKE '%$cari%' ORDER BY id_surat DESC LIMIT $mulai, $batas")or die('Ada kesalahan pada query : ' . mysqli_error($db));
                    }
                    // jika tidak dilakukan pencarian data
                    else {
                        $query = mysqli_query($db, "SELECT * FROM tbl_surat_masuk ORDER BY id_surat DESC LIMIT $mulai, $batas")or die('Ada kesalahan pada query : ' . mysqli_error($db));
                    }
                }    
                
                // tampilkan data
                while($data = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td ><?php echo $data['no_surat']; ?></td>
                                <td><?php echo $data['asal_surat']; ?></td>
                                <td><?php echo $data['perihal']; ?></td>
                                <td width="110"><?php echo date('d-m-Y', strtotime($data['tgl_surat'])); ?></td>
                                <td width="120"><?php echo date('d-m-Y', strtotime($data['tgl_diterima'])); ?></td>
                                <td width="40"><?php echo $data['posisi']; ?></td>                             
                                <td width="40" style="font-size: 15px">

                                    <?php
                                        if($data['status'] === "Proses"){ ?>
                                            <span class="badge badge-pill badge-warning"><?php echo $data['status']; ?></span>
                                        <?php
                                        }elseif($data['status'] === "Pending"){ ?>
                                            <span class="badge badge-pill badge-danger"><?php echo $data['status']; ?></span>
                                        <?php    
                                        }elseif($data['status'] === "OK"){ ?>
                                            <span class="badge badge-pill badge-success"><?php echo $data['status']; ?></span>
                                        <?php    
                                        }
                                    ?>                                    
                                </td>

                                <!-- membuat tombol ubah dan hapus -->
                                <td class="center" width="130">
                                    <a title="Ubah" href="?page=form_ubah_surat_masuk&id_surat=<?php echo $data['id_surat'];?>" class="btn btn-sm btn-outline-info"><i class="fas fa-edit"></i></a>
                  
                                <!-- pemeriksaan user, tombol delete hanya muncul pada admin, selain admin tombol delete tidak muncul -->
                                <?php
                                    if($_SESSION['level']=="admin" OR $_SESSION['level']=="super_admin") { ?>
                                        <a title="Hapus" href="?page=hapus_surat_masuk&id_surat=<?php echo $data['id_surat']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Anda yakin ingin menghapus ?')" ><i class="fas fa-trash ml-"></i></a>
                                    <?php
                                    }
                                ?>
                                    
                                    <a title="Detail" href="?page=detail_surat_masuk&id_surat=<?php echo $data['id_surat']; ?>" class="btn btn-sm btn-outline-success"><i class="fas fa-search-plus"></i></a>
                                </td>                        

                            </tr>
                        <?php
                        $no++;
                        }
                    ?>
                </tbody>
            </table>

            <!-- Tampilkan Pagination -->
            <?php
            // fungsi untuk pengecekan halaman aktif
            // jika halaman kosong atau tidak ada yang dipilih
            if(empty($_GET['hal'])) {
                // halaman aktif = 1
                $halaman_aktif = '1';
            }
            // selain itu
            else {
                // halaman aktif = sesuai yang dipilih
                $halaman_aktif = $_GET['hal'];
            }
            ?>

            <div class="row">
                <div class="col">
                    <!-- tampilkan informasi jumlah halaman dan jumlah data -->
                    <a>
                        Halaman <?php echo $halaman_aktif; ?> dari <?php echo $halaman; ?> - Total <?php echo $jumlah; ?> data
                    </a>
                </div>

                <div class="col">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                        
                        <!-- button untuk halaman sebelumnya LINK FIRST AND PREV-->
                        <?php 
                            // jika halaman aktif = 0 atau = 1, maka button sebelumnya = disable
                            if($halaman_aktif<='1') { ?>
                                <li class="page-item disabled"><a href="#" class="page-link">First</a></li>
                                <li class="page-item disabled"><a href="#" class="page-link">&laquo</a></li>
                            <?php
                            }
                            // jika halaman aktif > 1, maka buton sebelumnya aktif
                            else { 
                                $link_prev = ($halaman_aktif > 1) ? $halaman_aktif - 1 : 1;
                            ?>
                                <li class="page-item"><a class="page-link" href="?page=surat_masuk&hal=1">First</a></li>
                                <li class="page-item"><a class="page-link" href="?page=surat_masuk&hal=<?php echo $link_prev; ?>">&laquo</a></li>
                            <?php
                            }
                        ?>

                        <!-- Button untuk link halaman 1 2 3  / LINK NUMBER -->
                        <?php
                        
                        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah halaman yg aktif
                        $start_number = ($halaman_aktif > $jumlah_number) ? $halaman_aktif - $jumlah_number : 1; // untuk awal link number
                        $end_number = ($halaman_aktif < ($halaman - $jumlah_number)) ? $halaman_aktif + $jumlah_number : $halaman; // untuk akhir link number 

                        for($i=$start_number; $i<=$end_number; $i++) { 
                            $link_active = ($halaman_aktif == $i) ? 'active' : '';
                        ?>
                            <li class="page-item <?php echo $link_active; ?>" ><a class="page-link" href="?page=surat_masuk&hal=<?php echo $i; ?>"><?php echo $i; ?></a> </li>

                        <?php
                        }
                        ?>

                        <!-- Button untuk halaman selanjutnya / LINK NEXT AND LAST -->
                        <?php                        
                        // jika halaman aktif >= jumlah halaman, maka button selanjutnya disable
                        // artinya page tersebut adalah page terakhir
                        if($halaman_aktif == $halaman) { ?>
                            <li class="page-item disabled"><a href="#" class="page-link">&raquo</a></li>
                            <li class="page-item disabled"><a href="#" class="page-link">Last</a></li>
                        <?php
                        }
                        // jika halaman aktif < jumlah halaman, maka button selanjutnya aktif
                        // artinya bukan page terakhir
                        else { 
                            $link_next = ($halaman_aktif < $halaman) ? $halaman_aktif + 1 : $halaman;
                        ?>
                            <li class="page-item"><a class="page-link" href="?page=surat_masuk&hal=<?php echo $link_next; ?>">&raquo</a> </li>
                            <li class="page-item"><a class="page-link" href="?page=surat_masuk&hal=<?php echo $halaman; ?>">Last</a> </li>
                        <?php
                        }

                        ?>

                        
                        </ul>                    
                    </nav>
                </div>
            </div>

        </div>
    </div>
</div>


