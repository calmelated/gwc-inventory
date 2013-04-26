<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Fileup extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['upload_status'] = "";
        $this->load->view('header');
        $this->load->view('fileup', $data);
        $this->load->view('footer');
    }

    function do_upload() {
        $config['upload_path']   = 'upload/';
        $config['allowed_types'] = 'gif|jpg|png|txt|csv|doc|xls|xlsx|docs|cvs';
        $config['max_size']      = strval(1024 * 512); // 512MB

        $this->load->library('upload', $config);
        $this->load->view('header');

        if (!$this->upload->do_upload()) { // failed
            $data['upload_status'] = $this->upload->display_errors();
            $this->load->view('fileup', $data);
        } else { // success
            // parse the itemlist, and write to the database
            $data['upload_status'] = $this->upload->data();
            $this->load->model('project_model');
            $this->project_model->import_items($data['upload_status']['full_path']);

            $this->load->view('fileup', $data);
        }

        $this->load->view('footer');
    }
}
?>
