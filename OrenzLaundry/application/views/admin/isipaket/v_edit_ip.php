<div class="container-fluid">
    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Edit Data Isi Paket</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/C_isipaket"></i> Isi Paket</a></li>
                    <li class="breadcrumb-item active">Edit Isi Paket</li>
                </ul>
            </div>
            <div class="card-body">

                <?php foreach ($isi_paket as $ip) { ?>

                    <form action="<?= base_url() . 'admin/C_isipaket/update'; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_isi_paket" value="<?= $ip->id_isi_paket ?>">

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_paket">Nama Isi Paket</label>
                                <input value="<?= $jp->nama_isi_paket ?>" type="text" name="nama_isi_paket" id="nama_isi_paket" class="form-control" placeholder="Masukkan Nama Isi Paket . ." aria-describedby="nama_isi_paket" maxlength="100">
                                <small id="nama_isi_paket" class="text-muted">Masukkan Nama Isi Paket tidak lebih dari 100 Karakter</small>
                            </div>
                            <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_isi_paket">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Tambahkan Keterangan . ." aria-describedby="nama_isi_paket" maxlength="100">
                        <small id="nama_isi_paket" class="text-muted">Tambahkan Keterangan Isi Paket</small>
                    </div>
                    <div class="form-group w-50">
                        <label for="status">Status</label>
                         <select class="form-control" name="status" id="status">
                            <option>Pilih Status Isi Paket :</option>
                            <option value="Aktif">Aktif</option>
                             <option value="Draft">Draft</option>
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