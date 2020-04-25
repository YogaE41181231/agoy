<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Data Jenis Paket</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Jenis Paket</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <button class="btn btn-sm btn-ijo mb-2" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Jenis Paket</button>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-sm btn-warning mb-2" href="<?= base_url() ?>admin/v_jenispaket"><i class="fas fa-file-pdf fa-sm mr-2"></i>Cetak Pdf</a>
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan'); ?>
    <div class="row card shadow">
        <div class="col card-body table-responsive">
            <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Paket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($jenis_paket as $jp) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $jp->nama_jenis_paket ?></td>

                            <td class="text-center">

                                <?php echo anchor('admin/C_jenispaket/edit/' . $jp->id_jenis_paket, '
                <div class="btn btn-primary btn-sm mr-2"><i class="fa fa-edit"></i></div>') ?>
                                <?php echo anchor('admin/C_jenispaket/destroy/' . $jp->id_jenis_paket, '
                <div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?= base_url() . 'admin/C_jenispaket/tambah'; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bolder text-ijo">Tambah Data Jenis Paket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_jenis_paket">Jenis Paket</label>
                        <input type="text" name="nama_jenis_paket" id="nama_jenis_paket" class="form-control" placeholder="Masukkan Nama Jenis Paket . ." aria-describedby="namajenispaket" maxlength="100">
                        <small id="namajenispaket" class="text-muted">Masukkan Nama jenis Paket tidak lebih dari 100 Karakter</small>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-ijo">Tambah</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->


<!-- End of Page Wrapper -->