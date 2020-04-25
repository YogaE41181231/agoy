<div class="container-fluid">
    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Edit Data Jenis Paket</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/C_jenispaket"></i> Jenis Paket</a></li>
                    <li class="breadcrumb-item active">Edit Jenis Paket</li>
                </ul>
            </div>
            <div class="card-body">

                <?php foreach ($jenis_paket as $jp) { ?>

                    <form action="<?= base_url() . 'admin/C_jenispaket/update'; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_jenis_paket" value="<?= $jp->id_jenis_paket ?>">

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_paket">Nama Jenis Paket</label>
                                <input value="<?= $jp->nama_jenis_paket ?>" type="text" name="nama_jenis_paket" id="nama_jenis_paket" class="form-control" placeholder="Masukkan Nama Jenis Paket . ." aria-describedby="namajenispaket" maxlength="100">
                                <small id="namajenispaket" class="text-muted">Masukkan Nama Jenis Paket tidak lebih dari 100 Karakter</small>
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