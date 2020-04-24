<?php
// jika tombol ubah diklik dari tabel
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
                <i class="fas fa-edit"></i> Ubah Surat Keluar
            </div>

            <div class="card">
                <div class="card-body">
                    <!-- form tambah surat keluar -->
                    <form action="proses_ubah_surat_keluar.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                
                                <div class="form-group">
                                        <label for="no_surat">Nomor Surat</label>
                                        <input type="text" class="form-control" name="no_surat" required value="<?php echo $no_surat; ?>">
                                        <div class="invalid-feedback">Nomor Surat tidak boleh kosong</div>
                                    </div>

                                <div class="form-group">
                                    <label for="tujuan">Tujuan Surat</label>
                                    <input type="text" class="form-control" name="tujuan" required value="<?php echo $tujuan; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="perihal">Perihal</label>
                                    <textarea name="perihal" class="form-control" rows="2" required><?php echo $perihal; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="tgl_proses">Tanggal Proses</label>
                                    <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_proses" required value="<?php echo $tgl_proses; ?>">
                                </div>                                

                            </div>

                            <div class="col">

                                <div class="form-group">
                                    <label for="tgl_surat">Tanggal Surat</label>
                                    <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_surat" required value="<?php echo $tgl_surat; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" rows="4"><?php echo $keterangan; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status Surat</label>
                                    <input type="text" class="form-control" name="status" required value="<?php echo $status; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="file">File Surat</label>
                                    <input type="file" class="form-control-file" id="file" name="file" accept=".jpg, .pdf" >
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id_surat" value="<?php echo $id_surat; ?>">
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="nama_file" value="<?php echo $file; ?>">
                                </div>
                                

                            </div>
                        </div>

                        <div class="my-md-4 pt-md-1 border-top"></div>

                        <div class="form-group col-md-12 right">
                            <input type="submit" class="btn btn-success btn-submit mr-2" name="simpan" value="Simpan">
                            <a href="?page=surat_keluar" class="btn btn-secondary btn-reset">Batal</a>
                        </div>

                        


                        


                    </form>
                </div>
            </div>

        </div>
    </div>
</div>