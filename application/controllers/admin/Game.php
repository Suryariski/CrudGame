<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {

    public $M_game,$form_validation,$session,$input;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_game');
        $this->load->model('M_kategori');
    }

    public function index()
    {
        $data['game'] = $this->M_game->getGame();
		$this->load->view('layouts/header');
		$this->load->view('game/home',$data);
		$this->load->view('layouts/footer');
    }

    public function tambah()
    {
        $data['kategori'] = $this->M_kategori->getKategori();
        $this->load->view('layouts/header');
		$this->load->view('game/tambah',$data);
		$this->load->view('layouts/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('id_game', 'ID game','required|min_length[1]|max_length[10]|is_unique[game.id_game]');
        $this->form_validation->set_rules('nama_game', 'Nama game','required|min_length[1]|max_length[255]|is_unique[game.nama_game]');
        $this->form_validation->set_rules('id_kategori', 'ID Kategori','required|min_length[1]|max_length[10]');
        $this->form_validation->set_rules('tahunrilis', 'Tahun Rilis Game','required|min_length[1]|max_length[10]');
        $this->form_validation->set_rules('ukuran', 'Ukuran Game','required|min_length[1]|max_length[15]');
        
        if ($this->form_validation->run()==true){
            $this->M_game->insertGame();
            $this->session->set_flashdata('success','Berhasil menambah game !');
            redirect('admin/Game');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('admin/Game/tambah');
        }
    }

	public function edit($id)
	{
        $data['game'] = $this->M_game->getDetailGame($id);
        $data['kategori'] = $this->M_kategori->getKategori();
        $this->load->view('layouts/header');
        $this->load->view('game/edit',$data);
        $this->load->view('layouts/footer'); 
	}

	public function editProcess()
	{
		$data = $this->M_game->getDetailGame($this->input->post('id_game'));

        $this->form_validation->set_rules('id_game', 'ID game','required|min_length[1]|max_length[10]');
		$this->form_validation->set_rules('nama_game', 'Nama game','required|min_length[1]|max_length[255]');
		
		
		if ($this->form_validation->run()==true){
			$this->M_game->editgame();
            $this->session->set_flashdata('success','game berhasil diedit !');
			redirect('admin/Game');
        }
        else{
            $this->session->set_flashdata('error', validation_errors());
			redirect('admin/Game/edit/'.$this->input->post('id_game'));
        }
	}

    public function hapus($id)
	{
		$this->M_game->deleteGame($id);
        $this->session->set_flashdata('success','Berhasil menghapus game !');
		redirect('admin/Game');
	}
}

/* End of file Game.php and path \application\controllers\admin\Game.php */
