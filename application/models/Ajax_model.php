<?php
class Ajax_model extends CI_Model 
{
	function students_list(){
        $hasil=$this->db->get('students');
        return $hasil->result();
    }
	function save_students()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'mobile' => $this->input->post('mobile'),
			'standard' => $this->input->post('standard'),
			'address' => $this->input->post('address')
		);

		$result = $this->db->insert('students', $data);
		return $result;
	}

	function update_students(){
		$id=$this->input->post('id');
		$name=$this->input->post('name');
        $email=$this->input->post('email');
        $mobile=$this->input->post('mobile');
        $standard=$this->input->post('standard');
        $address=$this->input->post('address');
 
        $this->db->set('name', $name);
        $this->db->set('email', $email);
        $this->db->set('mobile', $mobile);
        $this->db->set('standard', $standard);
        $this->db->set('address', $address);
        $this->db->where('id', $id);
        $result=$this->db->update('students');
        return $result;
	}

	function delete_students(){
        $id=$this->input->post('id');
        $this->db->where('id', $id);
        $result=$this->db->delete('students');
        return $result;
    }
}