<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belajar extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('html','download','url');
		$this->load->library('form_validation');
		
	}

	public function index(){
		echo "ini method index pada controller belajar";
	}

	public function halo(){
		$data = array(
			'judul' => "Cara Membuat View Pada CodeIgniter",
			'tutorial' => "CodeIgniter"
			);
		$this->load->view('view_belajar',$data);
		
	}

	//fungsi membuat form validasi
	function indexx(){
		$this->load->view('v_form');
	}
 
	function aksi(){
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('konfir_email','Konfirmasi Email','required');
 
		if($this->form_validation->run() != false){
			echo "Form validation oke";
		}else{
			$this->load->view('v_form');
		}
	}

	//fungsu download
	public function indexxx(){		
		$this->load->view('v_download');
	}
 
	public function lakukan_download(){				
		force_download('gambar/wilweb.png',NULL);
	}	

	//fungsi membuat  library
	function indexxi(){
		$this->load->library('malasngoding');
		$this->malasngoding->nama_saya();
                echo "<br/>";
                $this->malasngoding->nama_kamu("Andi");
	}

	//fungsi uri segment
	public function warna(){
		echo "Segment 1 adalah = " . $this->uri->segment('1') . "<br/>";		
		echo "Segment 2 adalah = " . $this->uri->segment('2') . "<br/>";		
		echo "Segment 3 adalah = " . $this->uri->segment('3') . "<br/>";		
		echo "Segment 4 adalah = " . $this->uri->segment('4') . "<br/>";		
		echo "Segment 5 adalah = " . $this->uri->segment('5') . "<br/>";	
	}
		
}

