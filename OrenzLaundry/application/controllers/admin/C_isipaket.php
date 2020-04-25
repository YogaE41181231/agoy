<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_isipaket extends CI_Controller {

    function __construct(){
        parent::__construct();	
            // ini adalah function untuk memuat model 
        $this->load->model('m_isipaket');
        $this->load->library('primslib');
        }

        function index(){
            // ini adalah variabel array $data yang memiliki index user, berguna untuk menyimpan data 
            $data['isi_paket'] = $this->m_isipaket->tampil_data()->result();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('admin/isipaket/v_isipaket', $data);
            $this->load->view('templates/footer');
        }

        public function edit($id)
        {
        $data['isi_paket'] = $this->m_isipaket->edit()->result();
          $this->load->view('templates/header');
          $this->load->view('templates/sidebar');
          $this->load->view('admin/isipaket/v_edit_ip', $data);
          $this->load->view('templates/footer');
        }
      
        public function tambah()
        {
          // memeriksa apakah ada id pada database
          $row_id = $this->m_isipaket->getId()->num_rows();
          // mengambil 1 baris data terakhir
          $old_id = $this->m_isipaket->getId()->row();
      
          if($row_id>0){
            // melakukan auto number dari id terakhir
          $id = $this->primslib->autonumber($old_id->id_isi_paket, 3, 12);
          }else{
            // generate id pertama kali jika tidak ada data sama sekali di dalam database
          $id = 'IPT000000000001';
          }
      
          $created_by = "admin";
          $created_at = date('Y-m-d H:i:s');
      
          // merekam data yang dikirim melalui form
          $data = array(
            'id_isi_paket' => $id,
            'nama_isi_paket' => $this->input->post('nama_isi_paket'),
            'keterangan' => $this->input->post('keterangan'),
            'status' => $this->input->post('status'),
            'created_by' => $created_by,
            'created_at' => $created_at
          );
      
          // menjalankan fungsi insert pada model_promo untuk menambah data ke database
          $this->m_isipaket->insert($data, 'isi_paket');
          // mengirim pesan berhasil dihapus
          $this->session->set_flashdata('pesan', '
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Selamat!</strong> Anda berhasil menambahkan data.
            <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          ');
          // mengarahkan ke halaman tabel paket
          redirect('admin/C_isipaket');
        }

        public function update()
        {
          // merekam id sebagai parameter where saat update
          $where = array('id_isi_paket' => $this->input->post('id_isi_paket'));
          // menentukan siapa dan kapan baris data ini diperbarui
          $updated_by = "admin";
          $updated_at = date('Y-m-d H:i:s');
        // masukkan data yang akan di update
        $data = array(
        'nama_isi_paket' => $this->input->post('nama_isi_paket'),
        'updated_by' => $updated_by,
        'updated_at' => $updated_at
        );
          
          
      
          // menjalankan method update pada model 
          $this->m_isipaket->update($where, $data, 'isi_paket');
      
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
          redirect('admin/C_isipaket');
        }
      
        // method yang berfungsi menghapus data
        public function destroy($id)
        {
          // deklarasi $where by id
          $where = array('id_isi_paket' => $id);
          // menjalankan fungsi delete pada model_promo
          $this->m_isipaket->delete($where, 'isi_paket');
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
          redirect('admin/C_isipaket');
        }

        

    }