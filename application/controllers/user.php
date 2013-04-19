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

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            redirect(site_url('projects#/'), 'refresh');
        } else {
            $session_data = $this->session->userdata('logged_in');
            //If no session, redirect to login page
            $this->load->view('header');
            $this->load->view('login');
            $this->load->view('footer');
        }
    }

    public function login() {
        //This method will have the credentials validation
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

        if ($this->form_validation->run() == false) {
            //Field validation failed.  User redirected to login page
            $this->load->view('header');
            $this->load->view('login');
            $this->load->view('footer');
        } else {
            //Go to private area
            redirect(site_url('projects#/'), 'refresh');
        }
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect(site_url('projects#/'), 'refresh');
    }

    public function check_database($password) {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->user_model->login($username, $password);
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array (
                                'id' => $row->id,
                                'username' => $row->username
                              );
                $this->session->set_userdata('logged_in', $sess_array);
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
