<div class="container">

    <div class="row">
        <div class="col-md-12 py-4">

            <div class="alert alert-info" role="alert">
                <i class="fas fa-edit"></i> Input Surat Masuk
            </div>

            <div class="card">
                <div class="card-body">
                    <!-- form tambah surat masuk -->
                    <form action="simpan_surat_masuk.php" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col">
                                
                                <div class="form-group">
                                        <label for="no_surat">Nomor Surat</label>
                                        <input type="text" class="form-control" name="no_surat" required>
                                        <div class="invalid-feedback">Nomor Surat tidak boleh kosong</div>
                                    </div>

                                <div class="form-group">
                                    <label for="asal_surat">Asal Surat</label>
                                    <input type="text" class="form-control" name="asal_surat" required>
                                </div>

                                <div class="form-group">
                                    <label for="perihal">Perihal</label>
                                    <textarea name="perihal" class="form-control" rows="4" required></textarea>
                                </div>                                                           

                            </div>

                            <div class="col">

                                <div class="form-group">
                                    <label for="tgl_surat">Tanggal Surat</label>
                                    <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_surat" required>
                                </div>

                                <div class="form-group">
                                    <label for="tgl_diterima">Tanggal Diterima</label>
                                    <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_diterima" required>
                                </div>

                                 <div class="form-group">
                                    <label for="file">File Surat</label>
                                    <input type="file" class="form-control-file" id="file" name="file" accept=".jpg, .pdf" >
                                </div>                                

                            </div>

                            <div class="col">

                                 <div class="form-group">
                                    <label for="posisi">Posisi Surat</label>
                                    <select name="posisi" class="form-control" required>
                                        <option value=""></option>
                                        <option value="Kabid">Kabid</option>
                                        <option value="Kasubid">Kasubid</option>
                                        <option value="Sri">Sri</option>
                                        <option value="Indar">Indar</option>
                                        <option value="Atika">Atika</option>
                                        <option value="Awi">Awi</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status Surat</label>
                                        <select name="status" class="form-control" required>
                                            <option value=""></option>
                                            <option value="Proses">Proses</option>
                                            <option value="Pending">Pending</option>
                                            <option value="OK">OK</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" rows="4"></textarea>
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