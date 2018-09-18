<?php
/**
 *
 */
class Inspection_model extends CI_Model
{
  function push_inspected($data) {
    $this->db->insert('inspected_tbl',$data);
    $this->db->select_max('inspected_id', 'inspected_id');
    $query = $this->db->get('inspected_tbl');
    $row = $query->row();
    return $row->inspected_id;
  }
  function pull_inspected($id,$listing_id) {
    $this->db->where('inspected_id',$id);
    $this->db->where('listing_id',$listing_id);
    $query = $this->db->get('inspected_tbl');
    $row = $query->row();
    return $row;
  }
  function pull_all_inspected() {
    $this->db->order_by('date_created', 'DESC');
    $query = $this->db->get('inspected_tbl');
    return $query->result();
  }
  function pull_report($inspected_id) {
    $this->db->where('inspected_id',$inspected_id);
    $query = $this->db->get('inspected_tbl');
    $row = $query->row();
    return $row->file_path;
  }
  function push_access($data) {
    $this->db->insert('access_tbl',$data);
  }
  function pull_access() {
    $this->db->order_by('date_access','DESC');
    $this->db->join('inspected_tbl','access_tbl.inspected_id = inspected_tbl.inspected_id','left');
    $query = $this->db->get('access_tbl');
    return $query->result();
  }
  function pull_request() {
    $this->db->order_by('date_request','DESC');
    $query = $this->db->get('request_tbl');
    return $query->result();
  }
  function pull_inspected_id($listing_id) {
    $this->db->where('listing_id', $listing_id);
    $query = $this->db->get('inspected_tbl');
    $row = $query->row();
    return $row->inspected_id;
  }
}
