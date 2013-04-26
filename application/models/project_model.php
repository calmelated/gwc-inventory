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
                    'desc'  => (!isset($data['desc'] )) ? '' : $data['desc'],
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

    public function get_autocomplete($type) {
        if($type == "items") {
            return $this->db->select('name')->distinct()->get(DEFAULT_TABLE)->result();
        } else if($type == "itemtype") {
            return $this->db->select('name')->get_where('completes', array('type' => $type))->result();
        } else if($type == "unit") {
            return $this->db->select('name')->get_where('completes', array('type' => $type))->result();
        } else if($type == "creator") {
            return array(array('name' => $this->session->userdata['user_name']));
        }
    }

    public function import_items($fp) {
        $handle = fopen($fp, "r");
        while (!feof($handle)) {
            $line = fgets($handle);
            $cols = explode("\t", $line);
            if(strlen($cols[0]) < 1 ||
               strlen($cols[1]) < 1 ||
               strlen($cols[2]) < 1 ||
               $cols[3] == 'YES'    ||
               $cols[3] == 'yes'    ||
               $cols[0] == 'Item'     ) {
                //print 'ignore -> <br>';
                //var_dump($cols);
                continue;
            }

            //splite RAW:123 -> type:RAW, item:123
            $cols_ = explode(':', $cols[0]);
            if(count($cols_) != 2) {
                //print 'ignore -> <br>';
                //var_dump($cols_);
                continue;
            }
            list($type, $item) = $cols_;

            // for number: "123.456" -> number:123.456
            if($cols[2][0] == '"') {
                $num = substr($cols[2], 1, strlen($cols[2])-2);
            } else {
                $num = $cols[2];
            }

            print 'Import Type: ' . $type . ', Itme: ' . $item . ', Desc: ' . $cols[1] . ', Number: ' . $num . '<br>';
            $this->db->insert(DEFAULT_TABLE, array(
                    "type" => $type,
                    "name" => $item,
                    "desc" => $cols[1],
                    "qty"  => $num)
                    );
        }
        fclose($handle);
    }

}

/* End of file project_model.php */
/* Location: ./application/models/project_model.php */
