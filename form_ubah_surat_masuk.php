<?php
// jika tombol ubah diklik dari tabel
if(isset($_GET['id_surat'])) {
    // ambil data get dari form
    $id_surat = $_GET['id_surat'];
   
    // perintah query untuk menampilkan data dari tabel surat masuk berdasarkan id surat
    $query = mysqli_query($db,"SELECT * FROM tbl_surat_masuk WHERE id_surat = '$id_surat' ")or die('Query error : '.mysqli_error($db));
    $data = mysqli_fetch_assoc($query);
    
    // buat variabel untuk menampung data
    $no_surat = $data['no_surat'];
    $asal_surat = $data['asal_surat'];
    $perihal = $data['perihal'];
    $tgl_surat = date('d-m-Y', strtotime($data['tgl_surat'])) ;
    $tgl_diterima = date('d-m-Y',strtotime($data['tgl_diterima'])) ;
    $posisi = $data['posisi'];
    $status = $data['status'];
    $keterangan = $data['keterangan'];
    $file = $data['file'];

    // variabel untuk selected posisi
    $select_kabid = ""; $select_kasubid = ""; $select_awi = ""; $select_sri = ""; $select_atika = ""; $select_indar = "";
    switch($posisi){
        case "Kabid" : $select_kabid = "selected"; break;
        case "Kasubid" : $select_kasubid = "selected"; break;
        case "Awi" : $select_awi = "selected"; break;
        case "Sri" : $select_sri = "selected"; break;
        case "Atika" : $select_atika = "selected"; break;
        case "Indar" : $select_indar = "selected"; break; 

    }

    // variabel untuk selected status
    $select_proses = ""; $select_pending = ""; $select_ok = "";
    switch($status){
        case "Proses" : $select_proses = "selected"; break;
        case "Pending" : $select_pending = "selected"; break;
        case "OK" : $select_ok = "selected"; break;
    }

    // variabel untuk set readonly
    $set_readonly = "";
    if($_SESSION['level']!="admin" OR $_SESSION['level']!="super_admin") {
        $set_readonly = "readonly";
    }

    $set_disabled = "";
    if($_SESSION['level']=="staf"){
        $set_disabled = "disabled";
    }

    
    

    
}
// tutup koneksi
mysqli_close($db);

?>

<div class="container">

    <div class="row">
        <div class="col-md-12 py-4">

            <div class="alert alert-info" role="alert">
                <i class="fas fa-edit"></i> Ubah Surat Masuk
            </div>

            <div class="card">
                <div class="card-body">
                    <!-- form ubah surat masuk -->
                    <form action="proses_ubah_surat_masuk.php" method="post" enctype="multipart/form-data" >

                        <div class="row">
                            <div class="col">
                                
                                <div class="form-group">
                                        <label for="no_surat">Nomor Surat</label>
                                        <input type="text" class="form-control" name="no_surat" required autocomplete="off" value="<?php echo $no_surat; ?>" <?php echo $set_readonly; ?> >
                                        <div class="invalid-feedback">Nomor Surat tidak boleh kosong</div>
                                    </div>

                                <div class="form-group">
                                    <label for="asal_surat">Asal Surat</label>
                                    <input type="text" class="form-control" name="asal_surat" required value="<?php echo $asal_surat; ?>" <?php echo $set_readonly; ?>>
                                </div>

                                <div class="form-group">
                                    <label for="perihal">Perihal</label>
                                    <textarea name="perihal" class="form-control" rows="4" required <?php echo $set_readonly; ?> ><?php echo $perihal; ?></textarea>
                                </div>                                                           

                            </div>

                            <div class="col">

                                <div class="form-group">
                                    <label for="tgl_surat">Tanggal Surat</label>
                                    <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_surat" required value="<?php echo $tgl_surat; ?>" <?php echo $set_readonly; ?>>
                                </div>

                                <div class="form-group">
                                    <label for="tgl_diterima">Tanggal Diterima</label>
                                    <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_diterima" required value="<?php echo $tgl_diterima; ?>" <?php echo $set_readonly; ?>>
                                </div>

                                <!-- pemeriksaan user, tombol tambah hanya muncul pada admin, selain admin tombol tambah tidak muncul -->
                                <?php
                                    if($_SESSION['level']=="admin" OR $_SESSION['level']=="super_admin") { ?>
                                        <div class="form-group">
                                            <label for="file">File Surat</label>
                                            <input type="file" class="form-control-file" id="file" name="file" accept=".jpg, .pdf">
                                        </div>                                              
                                    <?php
                                    }
                                ?>   

                        

                            </div>

                            <div class="col">
                                
                                <!-- Pemeriksaan user, jika staf, posisi surat tidak muncul -->
                               
                                        <div class="form-group">
                                    <label for="posisi">Posisi Surat</label>
                                    <select name="posisi" class="form-control" required <?php echo $set_readonly; ?> >                                       
                                        <option value="Kabid" <?php echo $select_kabid; ?>>Kabid</option>
                                        <option value="Kasubid" <?php echo $select_kasubid; ?>>Kasubid</option>
                                        <option value="Sri" <?php echo $select_sri; ?>>Sri</option>
                                        <option value="Indar" <?php echo $select_indar; ?>>Indar</option>
                                        <option value="Atika" <?php echo $select_atika; ?>>Atika</option>
                                        <option value="Awi" <?php echo $select_awi; ?>>Awi</option>
                                    </select>
                                </div>
                              
                                 

                                <div class="form-group">
                                    <label for="status">Status Surat</label>
                                        <select name="status" class="form-control" required>                                            
                                            <option value="Proses" <?php echo $select_proses; ?>>Proses</option>
                                            <option value="Pending" <?php echo $select_pending; ?>>Pending</option>
                                            <option value="OK" <?php echo $select_ok; ?>>OK</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" rows="4"><?php echo $keterangan; ?></textarea>
                                </div>

                                <div class="form-group">                                    
                                    <input type="hidden" class="form-control" name="id_surat" value="<?php echo $id_surat; ?>">
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="nama_file" value="<?php echo $file; ?>">
                                </div>


                            </div>
                        </div>

                        <div class="my-md-4 pt-md-1 border-top"></div>

                        <div class="form-group col-md-12 right">
                            <input type="submit" class="btn btn-info btn-submit mr-2" name="simpan" value="Simpan">
                            <a href="?page=surat_masuk" class="btn btn-secondary btn-reset">Batal</a>
                        </div>

                        


                        


                    </form>
                </div>
            </div>

        </div>
    </div>
</div>