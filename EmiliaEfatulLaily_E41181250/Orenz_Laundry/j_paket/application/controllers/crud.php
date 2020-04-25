<?php

class Crud extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		//oprasional database	
		$this->load->model('m_data');
		$this->load->helper('url');
	}

	function index()
	{
		//mengambil data dari data base dan menampilkan data dari data base
		$data['jenis_paket'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_tampil', $data);
	}

	function tambah()
	{
		//view yg dijadikan form untuk inputan data
		$this->load->view('v_input');
	}


	//pada function ini, pertama yg ditangkap adalah input judul,nama penulis,tgl terbit
	function tambah_aksi()
	{
		$id_jenis_paket = $this->input->post('id_jenis_paket');
		$nama_jenis_paket = $this->input->post('nama_jenis_paket');


		$data = array(
			'id_jenis_paket' => $id_jenis_paket,
			'nama_jenis_paket' => $nama_jenis_paket,
		);
		//menginput data ke database dengan menggunakan model m_data
		$this->m_data->input_data($data, 'jenis_paket');

		//pada parameter kedua, beri nama dari tabelnya. kemudian mengalihkannya ke metod index
		redirect('crud/index');
	}


	//link hapus pada view v_tampil tertuju pada function hapus ini
	//($id) digunakan untuk menangkap data yg dikirim melalui url dari link v_tampil
	function hapus($id_jenis_paket)
	{
		$where = array('id_jenis_paket' => $id_jenis_paket);
		//variabel $where berisi data id, pada parameter kedua masukkan nama tabel
		$this->m_data->hapus_data($where, 'jenis_paket');
		redirect('crud/index');
	}

	function edit($id_jenis_paket)
	{
		//merubah id menjadi array yg kemudian digunakan untuk mengambil data menurut id dgn menggunakan function edit_data pada model m_data
		$where = array('id_jenis_paket' => $id_jenis_paket);
		$data['jenis_paket'] = $this->m_data->edit_data($where, 'jenis_paket')->result();
		$this->load->view('v_edit', $data);
	}

	//menangkap data dari form edit
	function update()
	{
		$id_jenis_paket = $this->input->post('id_jenis_paket');
		$nama_jenis_paket = $this->input->post('nama_jenis_paket');


		//masukkan data yg akan di update ke dalam variabel data
		$data = array(
			'id_jenis_paket' => $id_jenis_paket,
			'nama_jenis_paket' => $nama_jenis_paket,

		);

		//variabel where menjadi penentu data yg di update/id yg mana  
		$where = array(
			'id_jenis_paket' => $id_jenis_paket
		);

		//menangkap update_data pada m_data untuk di jalankan	
		$this->m_data->update_data($where, $data, 'jenis_paket');
		redirect('crud/index');
	}
}
