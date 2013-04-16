<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_news_list($page = 0) {
        $this->load->helper('url');
        $config['base_url']       = base_url().'/news/page/';
        $config['total_rows']     = $this->db->count_all_results('news');
        $config['per_page']       = '5';
        $config['full_tag_open']  = '';
        $config['full_tag_close'] = '';
        $config['first_link']     = '<<';
        $config['last_link']      = '>>';
        $config['next_link']      = '>';
        $config['prev_link']      = '<';

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $news_link = $this->pagination->create_links();

        $this->db->limit($config['per_page'], $page);
        $query = $this->db->get('news');
        $news_info = $query->result_array();

        return array('news_info' => $news_info,
                     'news_link' => $news_link);
    }

    public function get_news($id) {
        $query = $this->db->get_where('news', array('id' => $id));
        return $query->result_array();

    }

    public function get_latest_id() {
        $this->db->from('news');
        $this->db->order_by("date", "desc");
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            /*print "<pre>";
            var_dump($query->result_array());
            print "</pre>"; */
            foreach ($query->result_array() as $row) {
                return (int)($row['id']);
            }
        }
        return -1;
    }

    public function create_news() {
        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content')
        );
        $this->db->insert('news', $data);
        return $this->get_latest_id();
    }

    public function modify_news($id) {
        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content')
        );
        $this->db->where('id', $id);
        $this->db->update('news', $data);
    }

    public function delete_news($id) {
        $this->db->delete('news', array('id' => $id));
    }
}
