<?php
/**
 *
 */
class Inspection extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('inspection_model');
  }

  function index() {
    $this->load->view('head');
    $this->load->view('nav');
    $this->load->view('inspection');
    $this->load->view('script');
    $this->load->view('footer');
  }

  function create() {
    $listing_id = $this->input->post('listing_id');
    $listing_uri = $this->input->post('listing_uri');
    $dealer_name= $this->input->post('dealer_name');
    $unit = $this->input->post('unit');
    $path = "";
    $config["upload_path"] = './uploads/';
    $config['allowed_types'] = 'pdf';
    // load library
    $this->load->library('upload', $config);
    if($this->upload->do_upload('inspection_report')) {
      // if success set the file directory
      $path = base_url('uploads/') . $this->upload->data('raw_name').$this->upload->data('file_ext');
    }
    $path;
    $data = array(
      'listing_id' => $listing_id,
      'listing_uri' => $listing_uri,
      'dealer_name' => $dealer_name,
      'unit' => $unit,
      'file_path' => $path,
      'date_created' => date('Y-m-d H:i:s')
    );
    $this->inspection_model->push_inspected($data);
    

  }
}