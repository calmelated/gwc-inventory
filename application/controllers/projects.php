<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('project_model');
    }

    public function index() {
        $this->load->view('header');
        $this->load->view('layout');
        $this->load->view('footer');
    }

    public function template_list() {
        $this->load->view('list');
    }

    /*
    private function get_autocomplete($type) {
        $comma = '';
        $first = true;
        $result = '[';
        foreach($this->project_model->get_autocomplete($type) as $row) {
            $result = $result . $comma . '"' . $row->name . '"';
            if($first) {
                $comma = ', ';
                $first = false;
            }
        }
        return $result . ']';
    }
    */

    public function template_detail() {
        /*
        $data['items']    = $this->get_autocomplete('items');
        $data['itemtype'] = $this->get_autocomplete('itemtype');
        $data['unit']     = $this->get_autocomplete('unit');
        $this->load->view('detail', $data);
        */
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
