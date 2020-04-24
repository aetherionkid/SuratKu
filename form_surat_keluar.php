<div class="container">
    <div class="row">
        <div class="col-md-12 py-4">

            <div class="alert alert-success" role="alert">
                <i class="fas fa-edit"></i> Input Surat Keluar
            </div>

            <div class="card">
                <div class="card-body">
                    <!-- form tambah surat keluar -->
                    <form action="simpan_surat_keluar.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                
                                <div class="form-group">
                                        <label for="no_surat">Nomor Surat</label>
                                        <input type="text" class="form-control" name="no_surat" required>
                                        <div class="invalid-feedback">Nomor Surat tidak boleh kosong</div>
                                    </div>

                                <div class="form-group">
                                    <label for="tujuan">Tujuan Surat</label>
                                    <input type="text" class="form-control" name="tujuan" required>
                                </div>

                                <div class="form-group">
                                    <label for="perihal">Perihal</label>
                                    <textarea name="perihal" class="form-control" rows="2" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="tgl_proses">Tanggal Proses</label>
                                    <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_proses" required>
                                </div>



                                

                            </div>

                            <div class="col">

                                <div class="form-group">
                                    <label for="tgl_surat">Tanggal Surat</label>
                                    <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_surat" required>
                                </div>

                                <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" rows="4" required></textarea>
                                </div>

                                <div class="form-group">
                                        <label for="status">Status Surat</label>
                                        <input type="text" class="form-control" name="status" required>
                                </div>

                                <div class="form-group">
                                        <label for="file">File Surat</label>
                                        <input type="file" class="form-control-file" id="file" name="file" accept=".jpg, .pdf" >
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