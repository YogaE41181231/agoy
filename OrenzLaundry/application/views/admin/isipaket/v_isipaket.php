<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Data Isi Paket</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Isi Paket</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <button class="btn btn-sm btn-ijo mb-2" data-toggle="modal" data-target="#tambah_isipaket"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Isi Paket</button>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-sm btn-warning mb-2" href="<?= base_url() ?>admin/v_isipaket"><i class="fas fa-file-pdf fa-sm mr-2"></i>Cetak Pdf</a>
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan'); ?>
    <div class="row card shadow">
        <div class="col card-body table-responsive">
            <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ISI PAKET</th>
                        <th>KETERANGAN</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($isi_paket as $ip) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $ip->nama_isi_paket ?></td>
                            <td><?= $ip->keterangan ?></td>
                            <td><?= $ip->status ?></td>
                            <td class="text-center">
                                <?php if ($ip->status == "Aktif") { ?>
                                    <span class="badge badge-pill px-4 badge-warning"><?= $ip->status ?></span>
                                <?php } else { ?>
                                    <span class="badge badge-pill px-4 badge-secondary"><?= $ip->status ?></span>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                            <?php echo anchor('admin/C_isipaket/edit/' . $ip->id_isi_paket, '
                <div class="btn btn-primary btn-sm mr-2"><i class="fa fa-edit"></i></div>') ?>
                                <?php echo anchor('admin/C_isipaket/destroy/' . $ip->id_isi_paket, '
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
            <form action="<?= base_url() . 'admin/C_isipaket/tambah'; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bolder text-ijo">Tambah Data Isi Paket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_isi_paket">Nama Isi Paket</label>
                        <input type="text" name="nama_isi_paket" id="nama_isi_paket" class="form-control" placeholder="Masukkan Isi Paket . ." aria-describedby="nama_isi_paket" maxlength="100">
                        <small id="nama_isi_paket" class="text-muted">Masukkan Isi Paket tidak lebih dari 100 Karakter</small>
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