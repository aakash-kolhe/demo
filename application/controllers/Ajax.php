<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Ajax_model');
	}
	public function index()
	{
        $this->load->view('ajax/view');
	}

    public function save()
    {
        $data = $this->Ajax_model->save_students();
        echo json_encode($data);
    }

    public function students_data(){
        $data=$this->Ajax_model->students_list();
        echo json_encode($data);
    }

    public function update(){
        $data=$this->Ajax_model->update_students();
        // echo $data;
        echo json_encode($data);
    }

    public function delete(){
        $data=$this->Ajax_model->delete_students();
        echo json_encode($data);
    }

}