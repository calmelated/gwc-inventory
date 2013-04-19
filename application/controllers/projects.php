<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {
    public function index() {
        $this->load->view('header');
        $this->load->view('layout');
        $this->load->view('footer');
    }

    public function template_list() {
        $this->load->view('list');
    }

    public function template_detail() {
        $this->load->view('detail');
    }
}

/* End of file projects.php */
/* Location: ./application/controllers/projects.php */
