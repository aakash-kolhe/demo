<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Students_model extends CI_Model{
        public function getStudentsData(){
            return $this->db->get('students')->result();
        }

        public function saveData($data){
            $add = $this->db->insert('students', $data);
            // print_r($this->db->last_query());exit;
            return $add;
        }
        public function getData($id){
            return $this->db->get_where('students', array('id' => $id))->row();
            // print_r($this->db->last_query());exit;
        }

        public function UpdateStudents($data,$id){
            $this->db->where($id);
            // print_r($this->db->last_query());exit;
            return $this->db->update('students', $data);
        }

        public function deleteUser($id){
            $this->db->delete('students', array('id' => $id));
        }
    }
?>