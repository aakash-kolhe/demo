<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vacancy extends CI_Controller {
    function __construct() {
		parent::__construct();
        $this->load->model('Vacancy_model');
	}

    public function index(){
        // echo "hello";
        
    }
}
?>