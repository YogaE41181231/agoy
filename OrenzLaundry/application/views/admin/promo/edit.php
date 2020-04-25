<div class="container-fluid">
  <div class="row justify-content-center py-3">
    <div class="col-md-8 card p-0">
      <div class="card-header pb-0">
        <h2 class="font-weight-bolder mb-0">Edit Data Promo</h2>
        <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/promo"></i> Promo</a></li>
            <li class="breadcrumb-item active">Edit Promo</li>
        </ul>
      </div>
      <div class="card-body">

        <?php foreach ($promo as $prm) { ?>
          
          <form action="<?=  base_url() . 'admin/promo/update'?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_promo" value="<?=$prm->id_promo?>">

            <div class="form-group">
              <label for="judul_promo">Judul Promo</label>
              <input value="<?=$prm->judul_promo?>" type="text" name="judul_promo" id="judul_promo" class="form-control" placeholder="Masukkan Judul Pomo . ." aria-describedby="JudulPromo" maxlength="100">
              <small id="JudulPromo" class="text-muted">Masukkan Judul Promo tidak lebih dari 100 Karakter</small>
            </div>
            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <textarea type="text" name="deskripsi" id="deskripsi" class="form-control" aria-describedby="descPromo"><?=$prm->deskripsi?></textarea>
              <small id="descPromo" class="text-muted">Tulislah deskripsi idealnya 1 Paragraph.</small>
            </div>
            <div class="form-group">
              <label for="">Syarat & Ketentuan</label>
              <textarea type="text" name="syarat_ketentuan" id="editor1" class="form-control" placeholder="Masukkan Syarat & Ketentuan" aria-describedby="helpId"><?php echo $prm->syarat_ketentuan; ?></textarea>
            </div>
            <div class="form-group">
              <label for="jumlah">Jumlah Diskon</label><br>
              <input value="<?=$prm->jumlah?>" type="number" name="jumlah" id="jumlah" class="form-control d-inline w-25" placeholder="Diskon . ." aria-describedby="jumlahDiskon" min="0" max="99"> / 100 <br>
              <small id="jumlahDiskon" class="text-muted">Tuliskan jumlah diskon dari 0 - 99</small>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-10">
                <div class="form-group">
                  <label for="awal">Pilih Awal Periode Promo</label>
                  <input value="<?=substr($prm->awal,0,10);?>" type="date" name="awal" id="awal" class="form-control">
                </div>
              </div>
              <div class="col-lg-6 col-md-10">
                <div class="form-group">
                  <label for="akhir">Pilih Akhir Periode Promo</label>
                  <input value="<?=substr($prm->akhir,0,10);?>" type="date" name="akhir" id="akhir" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="gambar_promo">Banner Promo</label> <br>
              <img src="<?=base_url()?>assets/files/gambar_promo/<?=$prm->gambar?>" alt="Gambar <?=$prm->judul_promo?>" class="w-50 img-fluid img-rounded img-responsive mb-3">
              <div class="custom-file">
                  <input type="file" class="custom-file-input" name="gambar_promo" id="gambar_promo">
                  <label class="custom-file-label" for="gambar_promo">Masukkan Gambar berukuran 753 x 258 . .</label>
              </div>
              <small id="gambarPromo" class="form-text text-muted">Pilihlah File gambar banner promo berukuran 753 x 258. Max 3 MB. Format (JPG/PNG)</small>
            </div>
            <div class="form-group w-50">
              <label for="status">Status Promo</label>
              <select class="form-control" name="status" id="status">
                <option>Pilih Status Promo :</option>
                <option value="Aktif" <?=$prm->status == "Aktif" ? "selected" : ""?>>Aktif</option>
                <option value="Draft" <?=$prm->status == "Draft" ? "selected" : ""?>>Draft</option>
              </select>
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