<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Data Paket</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Paket</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-6">
        <button class="btn btn-sm btn-ijo mb-2" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Paket</button>
      </div>
      <div class="col-6 text-right">
        <a class="btn btn-sm btn-warning mb-2" href="<?=base_url()?>admin/C_paket"><i class="fas fa-file-pdf fa-sm mr-2"></i>Cetak Pdf</a>
      </div>
    </div>
    
    <?php echo $this->session->flashdata('pesan');?>
    <div class="row card shadow">
      <div class="col card-body table-responsive">
        <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($paket as $pk ) { 
        //$jenis = $this->db->query("SELECT nama_jenis_paket FROM jenis_paket WHERE id_jenis_paket = '$pk->id_jenis_paket'")->row();?>
          <tr>
            <td><?=$no++?></td>
            <td><?=$pk->nama_paket?></td>
            <td><?=$pk->harga?></td>
            <td class="text-center">
                <?php if($pk->status == "Aktif"){?>
                <span class="badge badge-pill px-4 badge-warning"><?=$pk->status?></span>
                <?php }else{ ?>
                <span class="badge badge-pill px-4 badge-secondary"><?=$pk->status?></span>
                <?php }?>
            </td>
            <td class="text-center">
                <?php echo anchor('admin/C_paket/detail/' . $pk->id_paket, '
                <div class="btn btn-info btn-sm mr-2 pr-3 pl-3"><i class="fa fa-info"></i></div>')?>
                <?php echo anchor('admin/C_paket/edit/' . $pk->id_paket, '
                <div class="btn btn-primary btn-sm mr-2"><i class="fa fa-edit"></i></div>')?>
                <?php echo anchor('admin/C_paket/destroy/' . $pk->id_paket, '
                <div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>')?>
                
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
    <form action="<?= base_url() . 'admin/C_paket/tambah'; ?>" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bolder text-ijo">Tambah Data Paket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="nama_paket">Nama Paket</label>
          <input type="text" name="nama_paket" id="nama_paket" class="form-control" placeholder="Masukkan Nama Paket . ." aria-describedby="namapaket" maxlength="100">
          <small id="namapaket" class="text-muted">Masukkan Nama Paket tidak lebih dari 100 Karakter</small>
        </div>
        <div class="form-group">
          <label for="nama_jenis_paket">Jenis Paket</label>
            <select name="nama_jenis_paket" id="nama_jenis_paket" class="form-control mb-3" placeholder="Masukkan Jenis Paket . ." aria-describedby="jenispaket">
              <option value=""> Please select </option>
              <?php foreach ($jenis_paket as $jpaket ) { ?>
              <option value="<?=$jpaket->id_jenis_paket?>"><?=$jpaket->nama_jenis_paket?></option>
              <?php }?>
            </select>
          <small id="jenispaket" class="text-muted">Pilih Jenis Paket yang Anda Perlukan.</small>
        </div>
        <div class="form-group">
          <label for="nama_isi_paket">Isi Paket</label>
            <select name="nama_isi_paket" id="nama_isi_paket" class="form-control mb-3" placeholder="Masukkan Isi Paket . ." aria-describedby="isipaket">
              <option value="">Please select</option>
              <?php foreach ($isi_paket as $isi ) { ?>
              <option value="<?=$isi->id_isi_paket?>"><?=$isi->nama_isi_paket?></option>
              <?php }?>
            </select>
          <small id="isipaket" class="text-muted">Pilih isi Paket yang Anda Perlukan.</small>
        </div>
        <div class="form-group">
          <label for="harga">Harga Paket</label><br>
          <input type="text" name="harga" id="harga" class="form-control d-inline w-25" placeholder="Harga . ." aria-describedby="jumlahharga">
          <small id="jumlahharga" class="text-muted">Jumlah Harga</small>
        </div>
        <div class="form-group">
          <label for="gambar">Gambar</label>
          <div class="custom-file mb-2">
              <input type="file" class="custom-file-input" name="gambar" id="gambar">
              <label class="custom-file-label" for="gambar">Masukkan Gambar berukuran 753 x 258 . .</label>
          </div>
          <small id="gambar" class="form-text text-muted">Pilihlah File gambar berukuran 753 x 258. Max 3 MB. Format (JPG/PNG)</small>
        </div>
        <div class="form-group">
          <label for="durasi_paket">Durasi Paket</label>
            <select name="durasi_paket" id="durasi_paket" class="form-control mb-3" placeholder="Masukkan Durasi Paket . ." aria-describedby="durasipaket">
              <option value="">Please select</option>
              <?php foreach ($durasi_paket as $durasi ) { ?>
              <option value="<?=$durasi->id_durasi?>"><?=$durasi->durasi_paket?></option>
              <?php }?>
            </select>
          <small id="durasipaket" class="text-muted">Pilih Durasi Paket.</small>
        </div>
        <div class="form-group">
          <label for="nama_barang">Barang</label>
            <select name="nama_barang" id="nama_barang" class="form-control mb-3" placeholder="Masukkan Barang . ." aria-describedby="barang">
              <option value="">Please select</option>
              <?php foreach ($barang as $barang ) { ?>
              <option value="<?=$barang->id_barang?>"><?=$barang->nama_barang?></option>
              <?php }?>
            </select>
          <small id="barang" class="text-muted">Barang.</small>
        </div>
        <div class="form-group w-50">
          <label for="status">Status Paket</label>
          <select class="form-control" name="status" id="status">
            <option value="">Pilih Status Paket :</option>
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