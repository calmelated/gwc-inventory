<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once('./application/libraries/REST_Controller.php');

/**
 * Projects API controller
 *
 * Validation is missign
 */
class Projects extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('project_model');
    }

    public function index_get($dbtable = 'projects') {
        $this->response($this->project_model->get_all($dbtable));
    }

    public function edit_get($dbtable = 'projects', $id = NULL) {
        if (!$id) {
            $this->response(
                array('status'        => false,
                      'error_message' => 'No ID was provided.'),
                      400);
        }
        $this->response($this->project_model->get($id, $dbtable));
    }

    public function save_post($dbtable = 'projects', $id = NULL) {
        if (!$id) {
            $new_id = $this->project_model->add($this->post(), $dbtable);
            $this->response(
                array('status'  => true,
                      'id'      => $new_id,
                      'message' => sprintf('%s #%d has been created.', $dbtable, $new_id)),
                      200);
        } else {
            $this->project_model->update($id, $this->post(), $dbtable);
            $this->response(
                array('status'  => true,
                      'message' => sprintf('%s #%d has been updated.', $dbtable, $id)),
                       200);
        }
    }

    public function remove_delete($dbtable = 'projects', $id = NULL) {
        if ($this->project_model->delete($id, $dbtable)) {
            $this->response(
                array('status'  => true,
                      'message' => sprintf('%s #%d has been deleted.', $dbtable, $id)),
                      200);
        } else {
            $this->response(
                array('status'        => false,
                      'error_message' => 'This %s does not exist!', $dbtable),
                      404);
        }
    }
}

/* End of file projects.php */
/* Location: ./application/controllers/api/projects.php */
