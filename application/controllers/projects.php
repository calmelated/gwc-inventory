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

    public function template_inout_list() {
        $this->load->view('inout_list');
    }

    public function template_inout_detail() {
        $this->load->view('inout_detail');
    }

}

/* End of file projects.php */
/* Location: ./application/controllers/projects.php */
