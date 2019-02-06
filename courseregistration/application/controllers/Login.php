<?php

/* 
    Created By Pradeep Chandra Chitti
    Student ID : 700672902
    Email: PXC29020@UCMO.EDU
    ADVANCE SYSTEM PROJECT
 */

class Login extends CI_Controller{
    public function checkauthenticationadmin(){
     //$data = $this->input->post();
    // $password = $this->input->post('password');
   //  $data=array( 
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
         // );
         // print_r($data);          die();
     $checks = $this->Crs_model->checkauthenticationadmin($username, $password);
  if (sizeof($checks)>0) {
          
               $session_data = array( 
             'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
                   'sessionadmin' => 1,
          );
               //unset($session_data['submit']);
              // print_r($session_data);
             $this->session->set_userdata($session_data);
             
            //view dashboard
             
              return redirect('admin/admindashboard', $session_data);  
            }
           
            else {
                $this->session->set_flashdata('error', 'Invalid Credentials');
                return redirect('Admin/adminloginPage');
            }
}
public function checkstudent(){
      $email = $this->input->post('email');
            $password = md5($this->input->post('passwordhash'));
         // );
         // print_r($data);          die();
     $checks = $this->Crs_model->checkstudent($email, $password);
  if (sizeof($checks)>0) {
          
               $session_data = array( 
                   'sid' => $checks[0]['sid'],
                   'firstname' => $checks[0]['firstname'],
                   'lastname' => $checks[0]['lastname'],
                   'address' => $checks[0]['address'],
             'email' => $this->input->post('email'),
            'passwordhash' => md5($this->input->post('password')),
                   'sessionstudent' => 3,
          );
               //unset($session_data['submit']);
              // print_r($session_data);
             $this->session->set_userdata($session_data);
             
            //view dashboard
             
              return redirect('student/studentdashboard', $session_data);  
            }
           
            else {
                $this->session->set_flashdata('error', 'Invalid Credentials');
                return redirect('student/studentloginpage');
            } 
}
public function checkfaculty(){
      $email = $this->input->post('email');
            $password = md5($this->input->post('passwordhash'));
         // );
         // print_r($data);          die();
     $checks = $this->Crs_model->checkfaculty($email, $password);
  if (sizeof($checks)>0) {
          
               $session_data = array( 
                   'fid' => $checks[0]['fid'],
                   'firstname' => $checks[0]['firstname'],
                   'lastname' => $checks[0]['lastname'],
                   'address' => $checks[0]['address'],
             'email' => $this->input->post('email'),
            'passwordhash' => md5($this->input->post('password')),
                   'sessionfaculty' => 2,
          );
               //unset($session_data['submit']);
              // print_r($session_data);
             $this->session->set_userdata($session_data);
             
            //view dashboard
             
              return redirect('faculty/facultydashboard', $session_data);  
            }
           
            else {
                $this->session->set_flashdata('error', 'Invalid Credentials');
                return redirect('faculty/facultyloginpage');
            } 
}
}
