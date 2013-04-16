<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_product_info($page) {
        $query = $this->db->get_where('products', array('type_' => $page));
        return $query->row_array();
    }
}
