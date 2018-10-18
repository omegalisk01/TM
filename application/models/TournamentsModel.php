<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TournamentsModel extends CI_Model
{
    public function create_tournament($data)
    {
        return $this->db->insert('users',$data);
    }

    public function show_all_tournament()
    {
        return $this->db->get('tournaments');
    }

    public function show_tournament($username)
    {
        $this->db->from('tournaments'); 
        $this->db->join('users', 'tournaments.user_id = users.user_id');
        $this->db->where('username', $username);
        return $this->db->get()->result();
    }

    public function edit_tournament($data)
    {

    }

    public function delete_tournament()
    {
        
    }

    public function signup_tournament()
    {
        
    }
}
?>
