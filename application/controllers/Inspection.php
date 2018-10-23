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
    $menu = array( 'menu' => 'inspected' );
    $this->load->view('nav',$menu);
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

    $word = "";
    $word .= "<br/><br/><b>This vehicle has undergone a multi-point inspection by Carmudi's in-house mechanics.</b><br/><br/>";
    $word .= "To view our mechanics' report on this vehicle, kindly fill out the form below to start the download. For more information on the Carmudi Inspection Service, please go to <a target='_blank' href='https://www.carmudi.com.ph/inspection/'>www.carmudi.com.ph/inspection</a><br/>";

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
      'date_created' => $data->date_created,
      'code' => $word .= $this->generate_code($id)
    );
    $this->load->view('head');
    $menu = array( 'menu' => 'inspected' );
    $this->load->view('nav',$menu);
    $this->load->view('config',$inspected);
    $this->load->view('script');
    $this->load->view('footer');
  }
  function download() {

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    $listing_id = $inspected_id = "";
    $listing_id = $this->input->get('listing_id');
    $inspected_id = $this->input->get('id');
    $name = $this->input->get('name');
    $contact = $this->input->get('contact');
    $email = $this->input->get('email');

    if(empty($inspected_id)) {
      $inspected_id = $this->inspection_model->pull_inspected_id($listing_id);
    }

    $access_data = array(
      'name' => $name,
      'contact' => $contact,
      'email' => $email,
      'inspected_id' => $inspected_id,
      'date_access' => date('Y-m-d H:i:s')
    );
    $this->inspection_model->push_access($access_data);

    $file_path = $this->inspection_model->pull_report($inspected_id);
    $file_path = './uploads/'.$file_path;
    if(file_exists($file_path)) {
      $fileName = basename($file_path);
      $fileSize = filesize($file_path);
      // Output headers.
      header("Cache-Control: public");
      header("Content-Type: application/pdf");
      header("Content-Length: ".$fileSize);
      header("Content-Disposition: attachment; filename=".$fileName);
      // Output file.
      readfile ($file_path);
      echo "File successfully downloaded";
      exit();
    } else { echo "file not exist"; }
  }
  function generate_code($inspected_id) {
    $code = "";
    $code .= '<div class="col-lg-12">';
    $code .= '<input class="form-control required" type="hidden" name="id" id="inspection_id" value="'.$inspected_id.'" readonly="">';
    $code .= '<div class="form-group">';
    $code .= '<label for="name">Name<span class="required"></span></label>';
    $code .= '<input class="form-control required" type="text" name="name" id="inspection_name" placeholder="Please enter your name">';
    $code .= '</div>';
    $code .= '<div class="form-group">';
    $code .= '<label for="contact">Mobile Number<span class="required"></span></label>';
    $code .= '<input class="form-control required" type="text" name="contact" id="inspection_contact" placeholder="Example: 09271234567">';
    $code .= '</div>';
    $code .= '<div class="form-group">';
    $code .= '<label for="email">Email<span class="required"></span></label>';
    $code .= '<input class="form-control required" type="email" name="email" id="inspection_email" placeholder="Example: john.smith@example.com">';
    $code .= '</div>';
    $code .= '<div class="form-group">';
    $code .= '<button type="submit" id="btn_download" class="btn btn-warning">Download Free Report</button>';
    $code .= '</div>';
    $code .= '</div>';
    $code .= '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>';
    $code .= '<script type="text/javascript">';
    $code .= 'var required = true;';
    $code .= "$('#btn_download').on('click',function() {";
    $code .= 'required = true;';
    $code .= "if($('#inspection_name').val() == '') {";
    $code .= 'required = false;';
    $code .= "$('#inspection_name').addClass('is-invalid');";
    $code .= '} else {';
    $code .= "$('#inspection_name').removeClass('is-invalid');";
    $code .= '}';
    $code .= "if($('#inspection_contact').val() == '') {";
    $code .= 'required = false;';
    $code .= "$('#inspection_contact').addClass('is-invalid');";
    $code .= '} else {';
    $code .= "$('#inspection_contact').removeClass('is-invalid');";
    $code .= '}';
    $code .= "if($('#inspection_email').val() == '') {";
    $code .= 'required = false;';
    $code .= "$('#inspection_email').addClass('is-invalid');";
    $code .= '} else {';
    $code .= "$('#inspection_email').removeClass('is-invalid');";
    $code .= '}';
    $code .= 'if(required) {';
    $code .= "var id = $('#inspection_id').val();";
    $code .= "var name = $('#inspection_name').val();";
    $code .= "var email = $('#inspection_email').val();";
    $code .= "var contact = $('#inspection_contact').val();";
    $code .= "getFile('".base_url("inspection/download?id='+id+'&name='+name+'&contact='+contact+'&email='+email").");";
    $code .= 'reset();';
    $code .= '}';
    $code .= '});';
    $code .= 'function reset() {';
    $code .= "$('#inspection_name').val('');";
    $code .= "$('#inspection_contact').val('');";
    $code .= "$('#inspection_email').val('');";
    $code .= "$('#inspection_contact').removeClass('is-invalid');";
    $code .= "$('#inspection_name').removeClass('is-invalid');";
    $code .= "$('#inspection_email').removeClass('is-invalid');";
    $code .= '}';
    $code .= 'function getFile(url) {window.location = url;}';
    $code .= '</script>';

    return $code;
  }
  function access() {
    $this->load->view('head');
    $menu = array( 'menu' => 'access' );
    $this->load->view('nav',$menu);
    $all = $this->inspection_model->pull_access();
    $data["list"] = $all;
    $this->load->view('access',$data);
    $this->load->view('script');
    $this->load->view('footer');
  }
  function request() {
    $this->load->view('head');
    $menu = array( 'menu' => 'request' );
    $this->load->view('nav',$menu);
    $all = $this->inspection_model->pull_request();
    $data["list"] = $all;
    $this->load->view('request',$data);
    $this->load->view('script');
    $this->load->view('footer');
  }
  function push_request() {
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    $name = $this->input->post('name');
    $contact = $this->input->post('contact');
    $email = $this->input->post('email');
    $unit = $this->input->post('unit');
    $year = $this->input->post('year');
    $listing_id = $this->input->post('listing_id');

    $data = array(
      'name' => $name,
      'contact' => $contact,
      'email' => $email,
      'unit' => $unit,
      'year' => $year,
      'listing_id' => $listing_id,
      'date_request' => date('Y-m-d H:i:s')
    );

    $this->inspection_model->push_request($data);

    if(!empty($email)) {
      $this->load->library('aws');
      $subject = "Inspection Request";
      $sender = 'Web Admin<reymond.diestro@carmudi.com.ph>';
      $recipient = 'dee.rheberg@carmudi.com.ph';
      $htmlbody = 'Hi Dee!<br/>'.$name.' is resquesting for inspection service. Please see contact details below<br/>Email:'.$email.'<br/>Contact Number:'.$contact;
      $this->aws->sendMailUsingSES($subject,$htmlbody,$recipient,$sender);
    }

  }
  function modify() {
    $referer = $this->input->server('HTTP_REFERRER');
    $id = $this->input->post('id');
    $listing_id = $this->input->post('listing_id');
    $listing_uri = $this->input->post('listing_uri');
    $dealer_name = $this->input->post('dealer_name');
    $unit = $this->input->post('unit');

    $data = array(
      'listing_id' => $listing_id,
      'listing_uri' => $listing_uri,
      'dealer_name' => $dealer_name,
      'unit' => $unit
    );
    $this->inspection_model->push_update($data,$id);
    $this->session->set_flashdata('result','success');
    $this->session->set_flashdata('result_message', 'Success! Inspected details updated');
    redirect($referer);
  }
  function export() {

    $word = "";
    $word .= "<br/><br/><b>This vehicle has undergone a multi-point inspection by Carmudi's in-house mechanics.</b><br/><br/>";
    $word .= "To view our mechanics' report on this vehicle, kindly fill out the form below to start the download. For more information on the Carmudi Inspection Service, please go to <a target='_blank' href='https://www.carmudi.com.ph/inspection/'>www.carmudi.com.ph/inspection</a><br/>";

    $data = $this->inspection_model->pull_export_inspected();

    $filename = date('YmdHis').".csv";

    header('Content-type: text/csv');
    header('Content-Disposition: attachment; filename="'.$filename.'"');

    // do not cache the file
    header('Pragma: no-cache');
    header('Expires: 0');

    $file = fopen('php://output', 'w');
    fputcsv($file, array('listing_id', 'listing_url', 'dealer_name', 'unit', 'description_code'));
    foreach ($data as $d) {
      $row = array(
        $d->listing_id,
        $d->listing_uri,
        $d->dealer_name,
        $d->unit,
        $word . $this->generate_code($d->inspected_id)
      );
      fputcsv($file,$row);
    }
    exit();
  }
  function remove_inspected() {

    $referer = $this->input->server('HTTP_REFERRER');

    $inspected_id = $this->input->get('id');

    $file_name = $this->inspection_model->pull_file($inspected_id);

    $dir = "uploads/" . $file_name;

    $this->inspection_model->drop_inspected($inspected_id);

    unlink($dir);

    $this->session->set_flashdata('result','success');
    $this->session->set_flashdata('result_message', 'Success! Inspected record deleted');
    redirect($referer);

  }
}
