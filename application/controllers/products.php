<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('products_model');
    }

    public function view($page = 'idisc-notebook') {
        if ( ! file_exists('application/views/products.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = $page;
        $data['product_info'] = $this->products_model->get_product_info($page);

        $this->load->view('header', $data);
        $this->load->view('products_side', $data);
        $this->load->view('products', $data);
        $this->load->view('footer', $data);
    }
}

/* End of file inventory.php */
/* Location: ./application/controllers/inventory.php */
