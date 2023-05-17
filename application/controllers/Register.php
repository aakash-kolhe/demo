<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('Register_model');
	}

	public function index()
	{
		$this->load->view('register/register');
        // echo "hello";
	}

	public function doRegister()
	{
        // echo "hello";
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[register.email]');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

        if($this->form_validation->run() == false){
            $this->load->view('register/register');
        }else{
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $passwordOriginal = $this->input->post('password');
            $set = bin2hex(random_bytes(15));
			$code = substr(str_shuffle($set), 0, 12);

            $user['name'] = $name;
            $user['reset_pass'] = "";
            $user['email'] = $email;
			$user['password'] = $password;
            $getPass = $passwordOriginal;
			$user['token'] = $code;
			$user['status'] = false;
            $id = $this->Register_model->insert($user);

            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'kolheaakash29@gmail.com', // change it to yours
                'smtp_pass' => 'kutdbcoinyxxcack', // change it to yours
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

            $message = "
                <html>
                <head>
                    <title>Verification Code</title>
                </head>
                <body>
                    <h2>Thank you for Registering.</h2>
                    <p>Your Account:</p>
                    <p>Email: ".$email."</p>
                    <p>Password: ".$getPass."</p>
                    <p>Please click the link below to activate your account.</p>
                    <h4><a href='".site_url()."/Register/activate/".$id."/".$code."'>Activate My Account</a></h4>
                </body>
                </html>
            ";
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($config['smtp_user']); // change it to yours
            $this->email->to($email);// change it to yours
            $this->email->subject('Signup Verification Email');
            $this->email->message($message);

            if($this->email->send()){
		    	$this->session->set_flashdata('msg', 'Activation code sent to email');
		    }
		    else{
		    	$this->session->set_flashdata('msg', $this->email->print_debugger());
		    }

			redirect('Register');
        }
	}

    public function activate(){
		$id =  $this->uri->segment(3);
		$code = $this->uri->segment(4);
 
		//fetch user details
		$user = $this->Register_model->getUser($id);
 
		//if code matches
		if($user['token'] == $code){
			//update user active status
			$data['status'] = true;
			$query = $this->Register_model->activate($data, $id);

			if($query){
				$this->session->set_flashdata('message', 'User activated successfully');
			}
			else{
				$this->session->set_flashdata('message', 'Something went wrong in activating account');
			}
		}
		else{
			$this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
		}
 
		redirect('Register');
 
	}

    public function forgotPassword(){
        $data['success']='';
        $data['error']='';
        // echo "hello";
        // $this->load->view('register/forgetPassword');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        if($this->form_validation->run() == false){
            $this->load->view('register/forgotPassword', $data);
        }else{
            $eMail = $this->input->post('email');
            $this->db->where("email = '$eMail'");
            $this->db->from("register");
            $countResult = $this->db->count_all_results();

            if($countResult >=1){
                // echo "yes";
                $this->db->where("email = '$eMail'");
                $getUserData =$this->db->get("register")->result();
                foreach($getUserData as $userD){

                $data['name'] = $userD->name;
                // $data['lastName'] = $userD->lastname;
                }
                $sender_email = 'kolheaakash29@gmail.com';
                $user_password = 'kutdbcoinyxxcack';
                $set = bin2hex(random_bytes(15));
                $token = substr(str_shuffle($set), 0, 12);
                $subject = 'Password Reset';
                $message = '';
                $message = 'Click this link to reset your password : <a href="' . base_url() . 'Register/resetpassword/'.$token.'">Reset Password</a>';
            

                    $config['protocol'] = 'smtp';
                    $config['smtp_host'] = 'ssl://smtp.googlemail.com';
                    $config['smtp_port'] = 465;
                    $config['smtp_user'] = $sender_email;
                    $config['smtp_pass'] = $user_password;
                    $config['mailtype'] = 'html';
                   
                    // Load email library and passing configured values to email library
                    $this->load->library('email', $config);
                    //$this->email->set_newline("rn");
                    $this->email->set_mailtype("html");
                   
                    // Sender email address
                    $this->email->from($sender_email);
                    // Receiver email address
                    $this->email->to($eMail);
                   // Subject of email
                   $this->email->subject($subject);
                   // Message in email
                   $this->email->message($message);

                   if($this->email->send()){
                        if($this->Register_model->temp_reset_password($token)){
                            echo "check your email for instructions, thank you";
                        }
                    }
                    else{
                        echo "email was not sent, please contact your administrator";
                    }
            }else{
                $this->session->set_flashdata('msg', 'This email is not exist');
                redirect('Register/forgotPassword');
            }
        }
    }

    public function resetpassword($token){

        if($this->Register_model->is_temp_pass_valid($token)){
            $this->load->view('register/reset_password',$token);
    
        }else{
            echo "the key is not valid";    
        }
    }

    public function update_password($data){
            // echo "helo";exit;
            
            $this->$this->form_validation->set_rules('password', 'Password', 'required|trim');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');

            if ($this->form_validation->run()==false){
                $this->load->view('register/reset_password', $data);
            } else {
                $password = md5($this->input->post('password'), PASSWORD_DEFAULT);
                $email = $this->session->userdata('reset_email');
                
                $this->db->set('password', $password);
                $this->db->where('email', $email);
                $this->db->update('register');
                
                $this->session->unset_userdata('reset_email');
                
            // $this->db->delete('user_token', ['email' => $email]);
            
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password has been changed! Please login</div>');
                redirect('Login');
            }
                
    }
}
