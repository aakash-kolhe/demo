<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {
    function __construct() {
		parent::__construct();
        $this->load->model('Students_model');
        $this->load->library('email');
	}

    public function index(){
        $getData['data'] = $this->Students_model->getStudentsData();
        // print_r($getData);exit;

        $this->load->view('Students/students',$getData);
    }

    public function create(){
        $this->load->view('students/add_student');
    }
    
    public function store()
    {
        // echo "hello";exit;
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('mobile', 'mobile', 'required');
        $this->form_validation->set_rules('standard', 'standard', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        if($this->form_validation->run() == false){
            $this->load->view('Students/add_student');
            // echo "fail";exit;
        }else{
            
            if(!empty($_FILES['student_image']['name'])){
                $config['upload_path'] = './assets/upload/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['student_image']['name'];
                
                // echo "fail";exit;
                // echo $config['file_name'];exit;
                //Load upload library and initialize here configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('student_image')){
                    $uploadData = $this->upload->data();
                    $student_image = $uploadData['student_image'];
                    // print_r($student_image);exit;
                }else{
                    $student_image = '';
                }
            }else{
                $student_image = '';
            }
            $skillsStr = $this->input->post('skills');
            $skills = ''; 
            if(!empty($skillsStr)){
                $skills = implode(",",$skillsStr);
            }

            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'standard' => $this->input->post('standard'),
                'address' => $this->input->post('address'),
                'skills' => $skills,
                // 'student_image' => $config['file_name']
                'student_image' => str_replace(' ', '_', $config['file_name'])
            );


            // print_r($skills);exit();
            $this->Students_model->saveData($data);
            $this->session->set_flashdata('msg', 'Student Added Successfully');

			redirect('Students');
        }
    }

    public function getdetails($id){
        $result=$this->Students_model->getData($id);
        // print_r($this->db->last_query());exit;
        $this->load->view('students/edit_student',array('item'=>$result, 'id' => $id));
    }

    public function updatedetails($id){
        // echo "hello";exit;
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('mobile', 'mobile', 'required');
        $this->form_validation->set_rules('standard', 'standard', 'required');
        $this->form_validation->set_rules('address', 'address', 'required');
        if($this->form_validation->run() == false){
            $this->getdetails($id);
        }else{
            $old_img = $this->input->post('student_image_old');
            $new_img = $_FILES['student_image']['name'];

            if($new_img == TRUE){
                // echo "yes";exit;
                $update_file = $_FILES['student_image']['name'];
                $config = [
                    'upload_path' => './assets/upload/',
                    'allowed_types' => 'jpg|jpeg|png|gif',
                    'file_name' => $update_file
                ];
                // print_r($config);exit;
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('student_image')){
                    // echo "yes";exit;
                    if(file_exists('./assets/upload/'.$old_img)){
                        unlink('./assets/upload/'.$old_img);
                    }
                }
            }else{
                // echo "no";exit;
                $update_file = $old_img;
            }
            $skillsStr = $this->input->post('skills');
            $skills = ''; 
            if(!empty($skillsStr)){
                $skills = implode(",",$skillsStr);
            }
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'standard' => $this->input->post('standard'),
                'address' => $this->input->post('address'),
                // 'student_image' => $update_file,
                'student_image' => str_replace(' ', '_', $update_file),
                'skills' => $skills,
            );
            $this->Students_model->UpdateStudents($data, "id='".$id."'");
            // print_r($this->db->last_query());exit;
            $this->session->set_flashdata('msg','Data Updated Successfully');

            redirect('Students');
            // return $this->getdetails($id);
        }
    }

    public function delete($id){
        // echo "hello";
        $deleteData = $this->Students_model->deleteUser($id);
        $this->session->set_flashdata('msg', 'Data Deleted Successfully');

		redirect('Students');
    }

}