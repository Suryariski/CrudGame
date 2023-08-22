<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class M_game extends CI_Model 
{
    public function getGame()
    {
        $this->db->join('kategori', 'game.id_kategori = kategori.id_kategori');
		$this->db->order_by('id_game','desc');
		$result = $this->db->get('game');
		return $result;
    }
    
    public function insertGame()
    {
          $insert = array(
              'id_game' => $this->input->post('id_game'),
              'nama_game' => $this->input->post('nama_game'),
              'id_kategori' => $this->input->post('id_kategori'),
              'tahunrilis' => $this->input->post('tahunrilis'),
              'ukuran' => $this->input->post('ukuran')
          );
          $result = $this->db->insert('game', $insert);
  
      return $result;
    }     
    public function deleteGame($id)
	{
		$this->db->where('id_game', $id);
		$result = $this->db->delete('game');
		return $result;
	}

	public function getDetailGame($id)
	{
		$this->db->where('id_game',$id);
		$result = $this->db->get('game')->result_array();
		return $result[0];
	}

    public function editGame()
	{
		$edit = array(
			'id_game' => $this->input->post('id_game'),
			'nama_game' => $this->input->post('nama_game'),
		);
        $this->db->where('id_game', $this->input->post('id_game'));
		$result = $this->db->update('game', $edit);

		return $result;
	}
                        
}                



/* End of file M_game_model.php and path \application\models\M_game_model.php */
