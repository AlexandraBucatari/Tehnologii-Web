<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contact1_form extends CI_Controller {

 function index()
 {
  $this->load->view('contact_form');
 }

 function validation()
 {
  $this->load->library('contact_form');
  $this->contact_form->set_rules('name', 'Name', 'required');
  $this->contact_form->set_rules('email', 'Email', 'required|valid_email');
  $this->contact_form->set_rules('subject', 'Subject', 'required');
  $this->contact_form->set_rules('message', 'Message', 'required');
  if($this->contact_form->run())
  {
   $array = array(
    'success' => '<div class="alert alert-success">Thank you for Contact Us</div>'
   );
  }
  else
  {
   $array = array(
    'error'   => true,
    'name_error' => form_error('name'),
    'email_error' => form_error('email'),
    'subject_error' => form_error('subject'),
    'message_error' => form_error('message')
   );
  }

  echo json_encode($array);
 }

}

?>
