<?php
/**
 *
 */
class Inspection_model extends CI_Model
{
  function push_inspected($data) {
    $this->db->insert('inspected_tbl',$data);
  }
}
