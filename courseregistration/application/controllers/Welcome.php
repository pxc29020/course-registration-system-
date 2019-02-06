<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            if($this->session->userdata('sessionadmin') == 1){
     redirect('Admin/admindashboard');   
 }elseif($this->session->userdata('sessionstudent') == 3){
     redirect('Student/studentdashboard');   
 }elseif($this->session->userdata('sessionfaculty') == 2){
     redirect('faculty/facultydashboard');   
 }else{
		$this->load->view('welcome_message');
 }
	}
        public function about()
	{
            if($this->session->userdata('sessionadmin') == 1){
     redirect('Admin/admindashboard');   
 }elseif($this->session->userdata('sessionstudent') == 3){
     redirect('Student/studentdashboard');   
 }elseif($this->session->userdata('sessionfaculty') == 2){
     redirect('faculty/facultydashboard');   
 }else{
		$this->load->view('about');
 }
	}
         public function registration()
	{
            if($this->session->userdata('sessionadmin') == 1){
     redirect('Admin/admindashboard');   
 }elseif($this->session->userdata('sessionstudent') == 3){
     redirect('Student/studentdashboard');   
 }elseif($this->session->userdata('sessionfaculty') == 2){
     redirect('faculty/facultydashboard');   
 }else{
		$this->load->view('registration');
 }
	}
        public function register(){
      if($this->session->userdata('sessionadmin') == 1){
     redirect('Admin/admindashboard');   
 }elseif($this->session->userdata('sessionstudent') == 3){
     redirect('Student/studentdashboard');   
 }elseif($this->session->userdata('sessionfaculty') == 2){
     redirect('faculty/facultydashboard');   
 }else{
//student registration
 $this->load->library('form_validation');
$this->load->helper(array('form', 'url'));
    $this->form_validation->set_rules('firstname','firstname','trim|required|is_unique[student.firstname]');
    $this->form_validation->set_rules('lastname','lastname','trim|required|is_unique[student.lastname]');
       
   $this->form_validation->set_rules('username','username','trim|required|is_unique[student.username]');
 $this->form_validation->set_rules('email','email','required|is_unique[student.email]');
  $this->form_validation->set_rules('phone','phone','required|is_unique[student.phone]');
        if($this->form_validation->run()==true)   {  
           $password = md5($this->input->post('password'));
       $data = array(
        'firstname' => $this->input->post('firstname'),  
      'lastname' => $this->input->post('lastname'),  
     'passwordhash' => $password,  
    'username' => $this->input->post('username'),
    'email' => $this->input->post('email'),  
    'gender' => $this->input->post('gender'), 
    'phone' => $this->input->post('phone'),  
    'address' => $this->input->post('address'),  
  'flag'=> TRUE
         );
   
      if($this->Crs_model->register($data)){
            $this->session->set_flashdata('success', ' Student Added Successfully');
               
          //keep the sesion message later
          redirect('Welcome/registration');
      } else {
         $this->session->set_flashdata('error', ' not added ');
               
        }}else{
   $this->session->set_flashdata('error', 'Please check details you have entered.');
            redirect('Welcome/registration');
      }   
    // print_r($data);
     
 }      
        }
}
