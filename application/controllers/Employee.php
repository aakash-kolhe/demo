<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Employee_model');
	}

	public function index()
	{
		$getData = $this->Employee_model->getUsersData();
		$data = array(
			'getData' => $getData,
			'title' => 'Employee'
		);
		// print_r($data);exit();
		$this->load->view('employee/list',$data);
	}

	public function create()
	{
		$data = array(
			'title' => 'Employee',
			'btn_name' => 'Create',
			'action' => site_url('Employee/createAction/'),
			'name' => set_value('name'),
			'email' => set_value('email'),
			'mobile' => set_value('mobile'),
			'address' => set_value('address'),
			'emergency_contact' => set_value('emergency_contact')
		);
		// print_r($data);exit();
		$this->load->view('Employee/form',$data);
	}

	public function createAction()
	{
		$this->set_rules();
		if($this->form_validation->run()==false)
		{
			$this->create();
		}else{
			// print_r('hii');exit();
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'address' => $this->input->post('address'),
				'emergency_contact' => $this->input->post('emergency_contact'),
			);
			$data['created'] = date('Y-m-d H:i:s');
			// print_r($data);exit();
			$this->Employee_model->saveData($data);

			$this->session->set_flashdata('msg', 'Data Save Successfully');

			redirect('Employee');
		}
	}

	public function delete($id)
	{
		$deleteData = $this->Employee_model->deleteUser($id);

		$this->session->set_flashdata('msg', 'Data Deleted Successfully');

		redirect('Employee');
	}

	public function update($id)
	{
		$getData = $this->Employee_model->getData('name,email,mobile,address,emergency_contact',"id='".$id."'");
		// print_r($this->db->last_query());exit();
		$data = array(
			'title' => 'Employee',
			'btn_name' => 'Update',
			'action' => site_url('Employee/updateAction/'.$id),
			'name' => set_value('name',$getData->name),
			'email' => set_value('email',$getData->email),
			'mobile' => set_value('mobile',$getData->mobile),
			'address' => set_value('address',$getData->address),
			'emergency_contact' => set_value('emergency_contact',$getData->emergency_contact),
		);
		// print_r($data);exit();
		$this->load->view('employee/form',$data);
	}

	public function updateAction($id)
	{
		// print_r($_POST);exit();
		$this->set_rules($id);

		if($this->form_validation->run()==false){

			$this->update($id);
		}else{
			// print_r('hii');exit();
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'address' => $this->input->post('address'),
				'emergency_contact' => $this->input->post('emergency_contact'),
			);
			$data['modified'] = date('Y-m-d H:i:s');
			// print_r($data);exit();
			$this->Employee_model->UpdateUser($data, "id='".$id."'");

            $this->session->set_flashdata('msg','Data Updated Successfully');

            redirect('Employee');
		}
	}

	public function set_rules($id='')
	{
		$this->form_validation->set_rules('name','name','required',
		array(
				'required'=>'Please enter name',
			)	
		);
		$this->form_validation->set_rules('email','email','required',
		array(
				'required'=>'Please enter email',
			)	
		);
		$this->form_validation->set_rules('mobile','mobile','required',
		array(
				'required'=>'Please enter mobile',
			)	
		);
		$this->form_validation->set_rules('address','address','required',
		array(
				'required'=>'Please enter address',
			)	
		);
		$this->form_validation->set_rules('emergency_contact','Emergency Contact Number','required',
		array(
				'required'=>'Please enter Emergency Contact Number',
			)	
		);
	}
}