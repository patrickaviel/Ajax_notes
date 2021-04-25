<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Model {

    public function all() {
        return $this->db->query("SELECT * FROM notes")->result_array();
    }

    public function create() {
        $query = "INSERT INTO notes (title,description, created_at, updated_at) VALUES (?, ?, ?, ?)";
        $values = array(
            $this->security->xss_clean($this->input->post('title')), 
            $this->security->xss_clean($this->input->post('note')), 
            date("Y-m-d h:i:s"),
            date("Y-m-d h:i:s")
        );
        return $this->db->query($query, $values);
    }

    public function delete() {
        $query = "DELETE FROM notes WHERE id = ?";
        $values = array(
            $this->security->xss_clean($this->input->post('post_id'))
        );
        return $this->db->query($query, $values);
    }

    public function update() {
        $query = "UPDATE notes SET title = ? , description = ? , updated_at = ? WHERE id = ?";
        $values = array(
            $this->security->xss_clean($this->input->post('title')), 
            $this->security->xss_clean($this->input->post('description')), 
            date("Y-m-d h:i:s"),
            $this->security->xss_clean($this->input->post('post_id'))
        );
        return $this->db->query($query, $values);
    }

    public function validate_post() {
        $this->form_validation->set_rules('note', 'Note', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        if(!$this->form_validation->run()) {
            return validation_errors();
        } 
        else {
            return "success";
        }
    }
    
}