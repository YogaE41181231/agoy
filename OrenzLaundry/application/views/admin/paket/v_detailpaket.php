<div class="container-fluid">

<!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Detail Data Paket</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Detail Paket</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-12 text-right">
        <a class="btn btn-sm btn-warning mb-2" href="<?=base_url()?>admin/C_paket"><i class="fas fa-file-pdf fa-sm mr-2"></i>Cetak Pdf</a>
      </div>
    </div>
    
    <?php echo $this->session->flashdata('pesan');?>
    <div class="row card shadow">
      <div class="col card-body table-responsive">
        <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
          <thead>
          <tr>
            <th>Id Paket</th>
            <th>Nama Paket</th>
            <th>Nama Barang</th>
            <th>Jenis Paket</th>
            <th>Isi Paket</th>
            <th>Durasi</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Gambar</th>
            <th>Created by</th>
            <th>Created at</th>
            <th>Updated by</th>
            <th>Updated at</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        foreach ($detail as $dt ) { 
          $br = $this->db->query("SELECT nama_barang FROM barang WHERE id_barang = '$dt->id_barang'")->row();
          $jp = $this->db->query("SELECT nama_jenis_paket FROM jenis_paket WHERE id_jenis_paket = '$dt->id_jenis_paket'")->row();
          $ip = $this->db->query("SELECT nama_isi_paket FROM isi_paket WHERE id_isi_paket = '$dt->id_isi_paket'")->row();
           $dr = $this->db->query("SELECT durasi_paket FROM durasi_paket WHERE id_durasi = '$dt->id_durasi'")->row();?>
          <tr>
            <td><?=$dt->id_paket?></td>
            <td><?=$dt->nama_paket?></td>
            <td><?=$br->nama_barang?></td>
            <td><?=$jp->nama_jenis_paket?></td>
            <td><?=$ip->nama_isi_paket?></td>
            <td><?=$dr->durasi_paket?></td>
            <td><?=$dt->harga?></td>
            <td class="text-center">
                <?php if($dt->status == "Aktif"){?>
                <span class="badge badge-pill px-4 badge-warning"><?=$dt->status?></span>
                <?php }else{ ?>
                <span class="badge badge-pill px-4 badge-secondary"><?=$dt->status?></span>
                <?php }?>
            </td>
            <td><img src="<?=base_url()?>assets/files/gambar_paket/<?=$dt->gambar?>" alt="Gambar <?=$dt->nama_paket?>" class="w-50 img-fluid img-rounded img-responsive mb-3"></td>
            <td><?=$dt->created_by?></td>
            <td><?=$dt->created_at?></td>
            <td><?=$dt->updated_by?></td>
            <td><?=$dt->updated_at?></td>
          </tr>
          <button class="btn btn-secondary" onclick="window.history.back()"><i class="fas fa-arrow-left"></i></button>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</footer>
      <!-- End of Footer -->

    </div>