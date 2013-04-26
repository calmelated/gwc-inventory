<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
insert into users (username, password) values ('bob', MD5('supersecret'));
*/

session_start(); //we need to call PHP's session object to access it through CI

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model', '', true);
    }

    public function index($formval = 'true') {
        $this->load->view('header');
        if ($formval && $this->session->userdata('logged_in')) {
            $this->load->view('layout');
        } else {
            //If no session, redirect to login page
            $this->load->view('login');
        }
        $this->load->view('footer');
    }

    public function login() {
        //This method will have the credentials validation
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if ($this->form_validation->run() == false) {
            $this->index(false);
        } else {
            $this->index(true);
        }
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_auth');
        $this->session->unset_userdata('user_name');
        session_destroy();
        redirect(site_url('/'), 'refresh');
    }

    public function check_database($password) {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->user_model->login($username, $password);
        if ($result) {
            foreach ($result as $row) {
                $this->session->set_userdata('logged_in', true);
                $this->session->set_userdata('user_id', $row->id);
                $this->session->set_userdata('user_auth', $row->auth);
                $this->session->set_userdata('user_name', $row->username);
            }
            return true;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password !! ');
            return false;
        }
    }
}

/* End of file inventory.php */
/* Location: ./application/controllers/inventory.php */
