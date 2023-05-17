<?php 

	class Employee_model extends CI_Model
	{
		public function getUsersData()
		{
			return $this->db->get('employee')->result();
		}

		public function saveData($data)
		{
			return $this->db->insert('employee',$data);
		}

		public function deleteUser($id)
		{
			$this->db->delete('employee', array('id' => $id));
		}

		public function getData($field,$condition)
		{	
			$this->db->select($field);
			$this->db->where($condition);
			return $this->db->get('employee')->row();
		}

		public function UpdateUser($data,$condition)
		{
			$this->db->where($condition);
			return $this->db->update('employee',$data);
		}

	}
?>