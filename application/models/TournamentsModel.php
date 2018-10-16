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

    public function show_tournament($data)
    {
        return $this->db->get_where('tournaments',$data);
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
