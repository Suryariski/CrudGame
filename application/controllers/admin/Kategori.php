<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public $M_kategori,$form_validation,$session,$input;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategori');
    }

    public function index()
    {
        $data['kategori'] = $this->M_kategori->getKategori();
		$this->load->view('layouts/header');
		$this->load->view('kategori/home',$data);
		$this->load->view('layouts/footer');
    }

    public function tambah()
    {
        $this->load->view('layouts/header');
		$this->load->view('kategori/tambah');
		$this->load->view('layouts/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('id_kategori', 'ID Kategori','required|min_length[1]|max_length[10]');
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori','required|min_length[1]|max_length[255]');
        if ($this->form_validation->run()==true){
            $this->M_kategori->insertKategori();
            $this->session->set_flashdata('success','Berhasil menambah kategori !');
            redirect('admin/Kategori');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('admin/Kategori/tambah');
        }
    }
   
	public function edit($id)
	{
        $data['kategori'] = $this->M_kategori->getDetailKategori($id);
        $this->load->view('layouts/header');
        $this->load->view('kategori/edit',$data);
        $this->load->view('layouts/footer'); 
	}

	public function editProcess()
	{
		$data = $this->M_kategori->getDetailKategori($this->input->post('id_kategori'));

        $this->form_validation->set_rules('id_kategori', 'ID Kategori','required|min_length[1]|max_length[10]');
		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori','required|min_length[1]|max_length[255]');
		
		
		if ($this->form_validation->run()==true){
			$this->M_kategori->editKategori();
            $this->session->set_flashdata('success','Kategori berhasil diedit !');
			redirect('admin/Kategori');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('admin/Kategori/edit/'.$this->input->post('id_kategori'));
        }
	}

    public function hapus($id)
	{
		$this->M_kategori->deleteKategori($id);
        $this->session->set_flashdata('success','Berhasil menghapus kategori !');
		redirect('KategoriController');
	}

}

/* End of file Kategori.php and path \application\controllers\admin\Kategori.php */
