<div class="container-fluid">
    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Edit Data Barang</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/C_barang"></i> Barang</a></li>
                    <li class="breadcrumb-item active">Edit Barang</li>
                </ul>
            </div>
            <div class="card-body">

                <?php foreach ($barang as $brg) { ?>

                    <form action="<?= base_url() . 'admin/C_barang/update'; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_barang" value="<?= $brg->id_barang ?>">

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input value="<?= $brg->nama_barang ?>" type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Masukkan Nama Barang . ." aria-describedby="namabarang" maxlength="100">
                                <small id="namabarang" class="text-muted">Masukkan Nama Barang tidak lebih dari 100 Karakter</small>
                            </div>
                            <div class="form-group w-50">
                                <label for="status">Status Barang</label>
                                <select class="form-control" name="status" id="status">
                                <option value="">Pilih Status Barang :</option>
                                <option value="Aktif" <?=$brg->status == "Aktif" ? "selected" : ""?>>Aktif</option>
                                <option value="Draft" <?=$brg->status == "Draft" ? "selected" : ""?>>Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary px-2 mr-1" type="submit">Simpan</button>
                            <button class="btn btn-secondary" onclick="window.history.back()"><i class="fas fa-arrow-left"></i></button>
                        </div>
                    </form>

            </div>
        </div>
    </div>


</div>
<script>
    CKEDITOR.replace('editor1');
</script>
<?php } ?>