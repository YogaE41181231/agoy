<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_jenispaket extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    // ini adalah function untuk memuat model bernama m_data
    $this->load->model('m_data_jenispaket');
    $this->load->library('primslib');
  }

  function index()
  {
    // ini adalah variabel array $data yang memiliki index user, berguna untuk menyimpan data 
    $data['jenis_paket'] = $this->m_data_jenispaket->tampil_data()->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/jenispaket/v_jenispaket', $data);
    $this->load->view('templates/footer');
  }

  public function edit($id)
  {
    $where = array('id_jenis_paket' => $id);
    $data['jenis_paket'] = $this->m_data_jenispaket->edit($where, 'jenis_paket')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('admin/jenispaket/v_edit_jp', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    // memeriksa apakah ada id pada database
    $row_id = $this->m_data_jenispaket->getId()->num_rows();
    // mengambil 1 baris data terakhir
    $old_id = $this->m_data_jenispaket->getId()->row();

    if ($row_id > 0) {
      // melakukan auto number dari id terakhir
      $id = $this->primslib->autonumber($old_id->id_jenis_paket, 3, 12);
    } else {
      // generate id pertama kali jika tidak ada data sama sekali di dalam database
      $id = 'JPK000000000001';
    }

    $created_by = "admin";
    $created_at = date('Y-m-d H:i:s');


    // merekam data yang dikirim melalui form
    $data = array(
      'id_jenis_paket' => $id,
      'nama_jenis_paket' => $this->input->post('nama_jenis_paket'),
      'created_by' => $created_by,
      'created_at' => $created_at
    );

    // menjalankan fungsi insert pada m_data_jenispaket untuk menambah data ke database
    $this->m_data_jenispaket->insert($data, 'jenis_paket');
    // mengirim pesan berhasil dihapus
    $this->session->set_flashdata('pesan', '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Anda berhasil menambahkan data.
            <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          ');
    // mengarahkan ke halaman tabel jenis paket
    redirect('admin/C_jenispaket');
  }

  public function update()
  {
    // merekam id sebagai parameter where saat update
    $where = array('id_jenis_paket' => $this->input->post('id_jenis_paket'));
    // menentukan siapa dan kapan baris data ini diperbarui
    $updated_by = "admin";
    $updated_at = date('Y-m-d H:i:s');

    //masukkan data yg akan di update ke dalam variabel data
    $data = array(
      'nama_jenis_paket' => $this->input->post('nama_jenis_paket'),
      'updated_by' => $updated_by,
      'updated_at' => $updated_at

    );

    // menjalankan method update pada m_data_jenis_paket
    $this->m_data_jenispaket->update($where, $data, 'jenis_paket');

    // mengirim pesan berhasil update data
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> mengubah data.
      <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    // mengarahkan ke halaman tabel jenis paket
    redirect('admin/C_jenispaket');
  }

  // method yang berfungsi menghapus data
  public function destroy($id)
  {
    // deklarasi $where by id
    $where = array('id_jenis_paket' => $id);
    // menjalankan fungsi delete pada m_data_jenis_paket
    $this->m_data_jenispaket->delete($where, 'jenis_paket');
    // mengirim pesan berhasil dihapus
    $this->session->set_flashdata('pesan', '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Anda <strong>berhasil</strong> menghapus data.
      <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ');
    // mengarahkan ke halaman tabel C_jenispaket
    redirect('admin/C_jenispaket');
  }
}
