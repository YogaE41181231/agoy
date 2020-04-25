<?php

class Promo extends CI_Controller 
{
  // method yang akan otomatis dijalankan ketika class dibuat
  function __construct()
  {
    parent::__construct();
    $this->load->model('model_promo');
    $this->load->library('primslib');
    // if ($this->session->userdata('role_id') == '') {
    //   redirect('admin/auth/login/');
    // }
  }

  // Menampilkan tabel Promo
  public function index()
  {
    $data['promo'] = $this->model_promo->getAll('promo')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/promo/index', $data);
    $this->load->view('templates/footer');
  }

  // menampilkan form edit data promo
  public function edit($id)
  {
    $where = array('id_promo' => $id);
    $data['promo'] = $this->model_promo->getEdit($where, 'promo')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/promo/edit', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    // memeriksa apakah ada id pada database
    $row_id = $this->model_promo->getId()->num_rows();
    // mengambil 1 baris data terakhir
    $old_id = $this->model_promo->getId()->row();

    if($row_id>0){
      // melakukan auto number dari id terakhir
    $id = $this->primslib->autonumber($old_id->id_promo, 3, 12);
    }else{
      // generate id pertama kali jika tidak ada data sama sekali di dalam database
    $id = 'PRM000000000001';
    }

    $created_by = "admin";
    $created_at = date('Y-m-d H:i:s');
    $gambar_promo = null;
    // menjalankan perintah untuk mengupload gambar
    if ($_FILES['gambar_promo']['name'] != null) {
      $gambar_promo = $_FILES['gambar_promo']['name'];
      $gambar_promo = $this->primslib->upload_file('gambar_promo', $gambar_promo, 'jpg|jpeg|png', '3024');
    }

    // merekam data yang dikirim melalui form
    $data = array(
      'id_promo' => $id,
      'judul_promo' => $this->input->post('judul_promo'),
      'deskripsi' => $this->input->post('deskripsi', true),
      'syarat_ketentuan' => $this->input->post('syarat_ketentuan', true),
      'jumlah' => $this->input->post('jumlah'),
      'awal' => $this->input->post('awal'),
      'akhir' => $this->input->post('akhir'),
      'gambar' => $gambar_promo,
      'status' => $this->input->post('status'),
      'created_by' => $created_by,
      'created_at' => $created_at
    );

    // menjalankan fungsi insert pada model_promo untuk menambah data ke database
    $this->model_promo->insert($data, 'promo');
    // mengirim pesan berhasil dihapus
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Selamat!</strong> Anda berhasil menambahkan data.
      <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    // mengarahkan ke halaman tabel promo
    redirect('admin/promo');
  }

  public function update()
  {
    // merekam id sebagai parameter where saat update
    $where = array('id_promo' => $this->input->post('id_promo'));
    // menentukan siapa dan kapan baris data ini diperbarui
    $updated_by = "admin";
    $updated_at = date('Y-m-d H:i:s');
    $gambar_promo = null;
    // memeriksa apakah admin mengganti gambar atau tidak
    if ($_FILES['gambar_promo']['name'] != null) {
      // jika memilih gambar
      $gambar_promo = $_FILES['gambar_promo']['name'];
      $gambar_promo = $this->primslib->upload_file('gambar_promo', $gambar_promo, 'jpg|jpeg|png', '3024');

      $data = array(
        'judul_promo' => $this->input->post('judul_promo'),
        'deskripsi' => $this->input->post('deskripsi', true),
        'syarat_ketentuan' => $this->input->post('syarat_ketentuan', true),
        'jumlah' => $this->input->post('jumlah'),
        'awal' => $this->input->post('awal'),
        'akhir' => $this->input->post('akhir'),
        'gambar' => $gambar_promo,
        'status' => $this->input->post('status'),
        'updated_by' => $updated_by,
        'updated_at' => $updated_at
      );
    }else{
      // jika tidak memilih gambar
      $data = array(
        'judul_promo' => $this->input->post('judul_promo'),
        'deskripsi' => $this->input->post('deskripsi', true),
        'syarat_ketentuan' => $this->input->post('syarat_ketentuan', true),
        'jumlah' => $this->input->post('jumlah'),
        'awal' => $this->input->post('awal'),
        'akhir' => $this->input->post('akhir'),
        'status' => $this->input->post('status'),
        'updated_by' => $updated_by,
        'updated_at' => $updated_at
      );
    }

    // menjalankan method update pada model promo
    $this->model_promo->update($where, $data, 'promo');

    // mengirim pesan berhasil update data
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> mengubah data.
      <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    // mengarahkan ke halaman tabel promo
    redirect('admin/promo');
  }

  // method yang berfungsi menghapus data
  public function destroy($id)
  {
    // deklarasi $where by id
    $where = array('id_promo' => $id);
    // menjalankan fungsi delete pada model_promo
    $this->model_promo->delete($where, 'promo');
    // mengirim pesan berhasil dihapus
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> menghapus data.
      <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    // mengarahkan ke halaman tabel promo
    redirect('admin/promo');
  }
}
