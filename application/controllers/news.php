<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
    }

    public function index() {
        $this->page(0);
    }

    public function page($start_from = '0') {
        $result = $this->news_model->get_news_list($start_from);
        $data['news_info'] = $result['news_info'];
        $data['news_link'] = $result['news_link'];
        $data['action']    = 'list';

        $this->load->view('header', $data);
        $this->load->view('news', $data);
        $this->load->view('footer', $data);
    }

    public function view($id, $action = 'article') {
        $data['action'] = $action;
        if ($id > -1) {
            $data['news_info'] = $this->news_model->get_news($id);
        }

        $this->load->view('header', $data);
        if ($action == 'article') {
            $this->load->view('news', $data);
        } else {
            $this->load->view('edit_news', $data);
        }
        $this->load->view('footer', $data);
    }

    public function create() {
        $data['action'] = 'create';
        if (!$this->is_login()) {
            return;
        }

        if (empty($_POST)) {
            return $this->view(0, $data['action']);
        }

        // Posted !!
        $this->form_validation->set_rules('title', 'Title', 'required|min_length[4]|max_length[64]|xss_clean');
        $this->form_validation->set_rules('content', 'Content', 'required|min_length[10]|max_length[2048]');
        if ($this->form_validation->run() == false) {
            return $this->view(0, $data['action']);
        }

        $id = $this->news_model->create_news();
        if ($id < 0) {
            print "<br><h2>Error to create a new record ! Please check Database setting !! </h2><br>";
        }
        return $this->view($id);
    }

    public function modify($id) {
        $data['id'] = $id;
        $data['action'] = 'modify';
        if (!$this->is_login()) {
            return;
        }

        if (empty($_POST)) {
            return $this->view($id, $data['action']);
        }

        $this->form_validation->set_rules('title', 'Title', 'required|min_length[4]|max_length[64]|xss_clean');
        $this->form_validation->set_rules('content', 'Content', 'required|min_length[10]|max_length[2048]');
        if ($this->form_validation->run() == false) {
            $this->load->view('edit_news');
        }

        $this->news_model->modify_news($id);
        $this->view($id);
    }

    public function delete($id) {
        if (!$this->is_login()) {
            return;
        }

        $this->news_model->delete_news($id);
        return $this->page(0);
    }

    public function is_login() {
        if ($this->session->userdata('logged_in')) {
            return true;
        } else { //If no session, redirect to login page
            $this->load->view('header');
            $this->load->view('login');
            $this->load->view('footer');
        }
        return false;
    }
}

/* End of file inventory.php */
/* Location: ./application/controllers/inventory.php */
