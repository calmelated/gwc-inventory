<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userlist_model extends CI_Model {
    var $name = "";
    var $password = "";
    var $auth = "";

    public function get_list() {
        $query = $this->db->query("SELECT * FROM User");
        return $query->result();
    }

    public function add_user() {
        echo $_POST['name'], '\n';
        echo $_POST['password'], '\n';
        echo $_POST['auth'], '\n';
        $this->name     = $_POST['name'];
        $this->password = $_POST['password'];
        $this->auth     = $_POST['auth'];
        //$this->db->insert('User', $this);
    }

}
