<div class="container-fluid">
  <div class="row justify-content-center py-3">
    <div class="col-md-8 card p-0">
      <div class="card-header pb-0">
        <h2 class="font-weight-bolder mb-0">Edit Data Paket</h2>
        <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/C_paket"></i> Paket</a></li>
            <li class="breadcrumb-item active">Edit Paket</li>
        </ul>
      </div>
      <div class="card-body">

      <?php foreach ($paket as $pk) { ?>

    <form action="<?= base_url() . 'admin/C_paket/update'; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_paket" value="<?=$pk->id_paket?>">

      <div class="modal-header">
        <h5 class="modal-title font-weight-bolder text-ijo">Tambah Data Paket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="nama_paket">Nama Paket</label>
          <input value="<?=$pk->nama_paket?>" type="text" name="nama_paket" id="nama_paket" class="form-control" placeholder="Masukkan Nama Paket . ." aria-describedby="namapaket" maxlength="100">
          <small id="namapaket" class="text-muted">Masukkan Nama Paket tidak lebih dari 100 Karakter</small>
        </div>
        <div class="form-group">
          <label for="nama_jenis_paket">Jenis Paket</label>
            <select name="nama_jenis_paket" id="nama_jenis_paket" class="form-control mb-3" placeholder="Masukkan Jenis Paket . ." aria-describedby="jenispaket">
              <option value=""> Please select </option>
              <?php foreach ($jenis_paket as $jpaket ) { ?>
              <option value="<?=$jpaket->id_jenis_paket?>" <?php echo $pk->id_jenis_paket == $jpaket->id_jenis_paket? "selected" : "";?>><?=$jpaket->nama_jenis_paket?></option>
              <?php }?>
            </select>
          <small id="jenispaket" class="text-muted">Pilih Jenis Paket yang Anda Perlukan.</small>
        </div>
        <div class="form-group">
          <label for="nama_isi_paket">Isi Paket</label>
            <select name="nama_isi_paket" id="nama_isi_paket" class="form-control mb-3" placeholder="Masukkan Isi Paket . ." aria-describedby="isipaket">
              <option value="">Please select</option>
              <?php foreach ($isi_paket as $isi ) { ?>
              <option value="<?=$isi->id_isi_paket?>" <?php echo $pk->id_isi_paket == $isi->id_isi_paket? "selected" : "";?>><?=$isi->nama_isi_paket?></option>
              <?php }?>
            </select>
          <small id="isipaket" class="text-muted">Pilih isi Paket yang Anda Perlukan.</small>
        </div>
        <div class="form-group">
          <label for="harga">Harga Paket</label><br>
          <input  value="<?=$pk->harga?>" type="text" name="harga" id="harga" class="form-control d-inline w-25" placeholder="Harga . ." aria-describedby="jumlahharga">
          <small id="jumlahharga" class="text-muted">Jumlah Harga</small>
        </div>
        <div class="form-group">
          <label for="gambar">Gambar</label><br>                          
          <img src="<?=base_url()?>assets/files/gambar_paket/<?=$pk->gambar?>" alt="Gambar <?=$pk->nama_paket?>" class="w-50 img-fluid img-rounded img-responsive mb-3">
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
              <option value="<?=$durasi->id_durasi?>" <?php echo $pk->id_durasi == $durasi->id_durasi? "selected" : "";?>><?=$durasi->durasi_paket?></option>
              <?php }?>
            </select>
          <small id="durasipaket" class="text-muted">Pilih Durasi Paket.</small>
        </div>
        <div class="form-group">
          <label for="nama_barang">Barang</label>
            <select name="nama_barang" id="nama_barang" class="form-control mb-3" placeholder="Masukkan Barang . ." aria-describedby="barang">
              <option value="">Please select</option>
              <?php foreach ($barang as $barang ) { ?>
              <option value="<?=$barang->id_barang?>" <?php echo $pk->id_barang == $barang->id_barang? "selected" : "";?>><?=$barang->nama_barang?></option>
              <?php }?>
            </select>
          <small id="barang" class="text-muted">Barang.</small>
        </div>
        <div class="form-group w-50">
          <label for="status">Status Paket</label>
          <select class="form-control" name="status" id="status">
            <option value="">Pilih Status Paket :</option>
            <option value="Aktif" <?=$pk->status == "Aktif" ? "selected" : ""?>>Aktif</option>
            <option value="Draft" <?=$pk->status == "Draft" ? "selected" : ""?>>Draft</option>
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
<?php }?>
          