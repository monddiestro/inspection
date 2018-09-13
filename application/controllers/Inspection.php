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
    $all = $this->inspection_model->pull_all_inspected();
    $data["list"] = $all;
    $this->load->view('inspection',$data);
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
      $path = $this->upload->data('raw_name').$this->upload->data('file_ext');
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
    $id = $this->inspection_model->push_inspected($data);
    redirect(base_url('inspection/config?id='.$id.'&listing_id='.$listing_id));
  }
  function config() {
    $id = $this->input->get('id');
    $listing_id = $this->input->get('listing_id');
    $data = $this->inspection_model->pull_inspected($id,$listing_id);
    $inspected = array(
      'id' => $id,
      'listing_id' => $listing_id,
      'listing_uri' => $data->listing_uri,
      'dealer_name' => $data->dealer_name,
      'unit' => $data->unit,
      'file_path' => $data->file_path,
      'date_created' => $data->date_created
    );
    $this->load->view('head');
    $this->load->view('nav');
    $this->load->view('config',$inspected);
    $this->load->view('script');
    $this->load->view('footer');
  }
  function download() {
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

    $inspected_id = $this->input->post('id');
    $name = $this->input->post('name');
    $contact = $this->input->post('contact');
    $email = $this->input->post('email');

    $file_path = $this->inspection_model->pull_report($inspected_id);
    $file_path = './uploads/'.$file_path;
    echo $file_path;
    if(file_exists($file_path)) {
      $fileName = basename($file_path);
      $fileSize = filesize($file_path);
      // Output headers.
      header("Cache-Control: private");
      header("Content-Type: application/stream");
      header("Content-Length: ".$fileSize);
      header("Content-Disposition: attachment; filename=".$fileName);
      // Output file.
      readfile ($file_path);
      echo "File successfully downloaded";
      exit();
    } else { echo "file not exist"; }
  }

}
