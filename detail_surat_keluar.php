<?php
// jika tombol detail diklik dari tabel
if(isset($_GET['id_surat'])) {
    // ambil data get dari form
    $id_surat = $_GET['id_surat'];

    // perintah query untuk menampilkan data dari tabel surat keluar berdasarkan id_surat
    $query = mysqli_query($db, "SELECT * FROM tbl_surat_keluar WHERE id_surat = '$id_surat' ")or die('Query Error : '. mysqli_error($db));
    $data = mysqli_fetch_assoc($query);

    // buat variabel untuk menampung data
    $no_surat = $data['no_surat'];
    $tujuan = $data['tujuan'];
    $perihal = $data['perihal'];
    $tgl_proses = date('d-m-Y', strtotime($data['tgl_proses'])) ;
    $tgl_surat = date('d-m-Y', strtotime($data['tgl_surat'])) ;
    $keterangan = $data['keterangan'];
    $status = $data['status'];
    $file = $data['file'];

}
mysqli_close($db);

?>

<div class="container">

    <div class="row">
        <div class="col-md-12 py-4">

            <div class="alert alert-success" role="alert">
                <i class="fas fa-edit"></i> <strong> Detail</strong> Surat Keluar
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
                            <td>Tujuan Surat</td>
                            <td>: <?php echo $tujuan; ?></td>
                        </tr>
                        <tr>
                            <td>Perihal</td>
                            <td>: <?php echo $perihal; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Proses</td>
                            <td>: <?php echo $tgl_proses; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Surat</td>
                            <td>: <?php echo $tgl_surat; ?></td>
                        </tr>                        
                        <tr>
                            <td>Keterangan</td>
                            <td>: <?php echo $keterangan; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>: <?php echo $status; ?></td>
                        </tr>
                        
                        <tr>
                            <td valign="top">File</td>
                            <td>: <img src="file/surat_keluar/<?php echo $file; ?>" class="img-thumbnail"> </td>
                        </tr>


                    </table>
                                   
                    <div class="my-md-4 pt-md-1 border-top"></div>

                        <div class="form-group col-md-12 right">
                            <a href="?page=surat_keluar" class="btn btn-secondary btn-reset">Kembali</a>
                        </div>
                    
                </div>
            </div>

        </div>
    </div>
</div>