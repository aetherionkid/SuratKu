<?php
// jika tombol detail diklik dari tabel
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

    
}
// tutup koneksi
mysqli_close($db);

?>

<div class="container">

    <div class="row">
        <div class="col-md-12 py-4">

            <div class="alert alert-info" role="alert">
                <i class="fas fa-edit"></i> <strong> Detail</strong> Surat Masuk
            </div>

            <div class="card">
                <div class="card-body">
                   
                    <!-- Halaman detail -->
                    <table class="table table-sm">
                        <tr>
                            <td width="180px">ID Surat</td>
                            <td>: <?php echo $id_surat; ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Surat</td>
                            <td>: <?php echo $no_surat; ?></td>
                        </tr>
                        <tr>
                            <td>Asal Surat</td>
                            <td>: <?php echo $asal_surat; ?></td>
                        </tr>
                        <tr>
                            <td>Perihal</td>
                            <td>: <?php echo $perihal; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Surat</td>
                            <td>: <?php echo $tgl_surat; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Diterima</td>
                            <td>: <?php echo $tgl_diterima; ?></td>
                        </tr>
                        <tr>
                            <td>Posisi</td>
                            <td>: <?php echo $posisi; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td style="font-size: 15px">: <?php
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
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>: <?php echo $keterangan; ?></td>
                        </tr>
                        <tr>
                            <td valign="top">File</td>
                            <td>: <img src="file/surat_masuk/<?php echo $file; ?>" class="img-thumbnail"> </td>
                        </tr>


                    </table>
                                   
                    <div class="my-md-4 pt-md-1 border-top"></div>

                        <div class="form-group col-md-12 right">
                            <a href="?page=surat_masuk" class="btn btn-secondary btn-reset">Kembali</a>
                        </div>
                    
                </div>
            </div>

        </div>
    </div>
</div>