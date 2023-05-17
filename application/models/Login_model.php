<?php 

	class Login_model extends CI_Model
	{
		public function login($email,$password)
		{
			$this->db->where( array(
				'email'=> $email, 
				'password' => $password, 
				'status' => 1
				)
			);
			
			return $this->db->get('register')->row();

			// print_r($this->db->last_query()); exit;
		}
	}
?>