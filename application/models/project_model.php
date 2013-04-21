<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define("DEFAULT_TABLE", "projects");

class Project_model extends CI_Model {

    public function get_all($dbtable = DEFAULT_TABLE) {
        return $this->db->get($dbtable)->result();
    }

    public function get($id, $dbtable = DEFAULT_TABLE) {
        return $this->db->where('id', $id)->get($dbtable)->row();
    }

    public function add($data, $dbtable = DEFAULT_TABLE) {
        // store to its specific table
        $this->db->insert($dbtable, $data);
        $newid = $this->db->insert_id();

        // update the default table
        if($dbtable != DEFAULT_TABLE) {
            $orig_data = $this->db->where('name', $data['name'])->get(DEFAULT_TABLE)->row();
            if($orig_data == null) {
                $data_ = array(
                    'name'  => (!isset($data['name'] )) ? '' : $data['name'] ,
                    'qty'   => (!isset($data['qty']  )) ? 0  : $data['qty']  ,
                    'unit'  => (!isset($data['unit'] )) ? '' : $data['unit'] ,
                    'qty1'  => (!isset($data['qty1'] )) ? 0  : $data['qty1'] ,
                    'unit1' => (!isset($data['unit1'])) ? '' : $data['unit1'],
                    'notes' => (!isset($data['notes'])) ? '' : $data['notes'],
                );
                $this->db->insert(DEFAULT_TABLE, $data_);
            } else {
                $orig_data->qty  += (!isset($data['qty' ])) ? 0 : $data['qty' ];
                $orig_data->qty1 += (!isset($data['qty1'])) ? 0 : $data['qty1'];
                $this->db->where('id', $orig_data->id)->update(DEFAULT_TABLE, $orig_data);
            }
        }
        return $newid;
    }

    public function update($id, $data, $dbtable = DEFAULT_TABLE) {
        // update the default table
        if($dbtable != DEFAULT_TABLE) {
            $orig_data = $this->get($id, $dbtable);
            $sum_data  = $this->db->where('name', $orig_data->name)->get(DEFAULT_TABLE)->row();
            if($sum_data != null) {
                $sum_data->qty  -= $orig_data->qty;
                $sum_data->qty1 -= $orig_data->qty1;
                $sum_data->qty  += (!isset($data['qty' ])) ? 0 : $data['qty' ];
                $sum_data->qty1 += (!isset($data['qty1'])) ? 0 : $data['qty1'];
                $this->db->where('name', $orig_data->name)->update(DEFAULT_TABLE, $sum_data);
            }
        }

        return $this->db->where('id', $id)->update($dbtable, $data);
    }

    public function delete($id, $dbtable = DEFAULT_TABLE) {
        // update the default table
        if($dbtable != DEFAULT_TABLE) {
            $aff_data = $this->get($id, $dbtable);
            $data     = $this->db->where('name', $aff_data->name)->get(DEFAULT_TABLE)->row();
            if($data != null) {
                $data->qty  -= $aff_data->qty;
                $data->qty1 -= $aff_data->qty1;
                $this->db->where('name', $aff_data->name)->update(DEFAULT_TABLE, $data);
            }
        }

        // remove the record
        $this->db->where('id', $id)->delete($dbtable);
        return $this->db->affected_rows();
    }

}

/* End of file project_model.php */
/* Location: ./application/models/project_model.php */
