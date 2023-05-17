<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Register_model extends CI_Model{
        public function registerUser($data){
            $query = $this->db->insert('register', $data);
            // $data->$email;
            // $data['email'] = $email;
            // print_r($this->db->last_query());
            // print_r($data);exit;
            if($query){
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'kolheaakash29@gmail.com', // change it to yours
                    'smtp_pass' => 'wdkjopsogbswkwic', // change it to yours
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE
                );
        
                    $message = 'check your mail to activate your account';
                    $this->load->library('email', $config);
                    $this->email->set_newline("\r\n");
                    $this->email->from('kolheaakash29@gmail.com'); // change it to yours
                    $this->email->to($data['email']);// change it to yours
                    $this->email->subject('Resume from JobsBuddy for your Job posting');
                    $this->email->message($message);
                if($this->email->send())
                {
                echo 'Email sent.';
                }
                else
                {
                show_error($this->email->print_debugger());
                }
            }
        }

        public function getUser($id){
            $query = $this->db->get_where('register',array('id'=>$id));
            return $query->row_array();
        }

        public function insert($user){
            $this->db->insert('register', $user);
            return $this->db->insert_id();
        }

        public function activate($data, $id){
            $this->db->where('register.id', $id);
            return $this->db->update('register', $data);
        }

        public function is_temp_pass_valid($token){
            
            $this->db->where('reset_pass', $token);
            $query = $this->db->get('register');
            // print_r($this->db->last_query());exit;
            if($query->num_rows() == 1){
                return TRUE;
            }
            else return FALSE;
        }

        public function temp_reset_password($token){
            $data =array(
                'email' =>$this->input->post('email'),
                'reset_pass'=>$token);
                $email = $data['email'];
            if($data){
                $this->db->where('email', $email);
                $this->db->update('register', $data);  
                return TRUE;
            }else{
                return FALSE;
            }
        }

        
    }
?>