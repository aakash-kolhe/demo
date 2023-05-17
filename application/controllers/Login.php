<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
	{
		parent:: __construct();
		$this->load->model('Login_model');
	}
	public function index()
	{
		$this->load->view('login/login');
        // echo "hiii";
	}
    public function doLogin()
    {
        // echo "hello";exit;
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');

        if($this->form_validation->run() == false){
            $this->load->view('login/login');
        }else{
            // echo "success";
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $getData = $this->Login_model->login($email,$password);

            if($getData){

                $data = array(
                    'email' => $getData->email,
                    'name' => $getData->name,
                    'status' => 1
                );

                if(!empty($getData)){
                    $this->session->set_userdata($data);
                    // print_r($_SESSION);exit();
                    redirect('Dashboard');
                }
            }else{
                $this->session->set_flashdata('msg', 'User id or Password is incorrect');
                redirect('Login');
            }

            
        }
    }

    public function logout(){
        // echo "logout";
        $this->session->sess_destroy();
        redirect('Login');
    }
}
