<?php

/* 
    Created By Pradeep Chandra Chitti
    Student ID : 700672902
    Email: PXC29020@UCMO.EDU
    ADVANCE SYSTEM PROJECT
 */

class Admin extends CI_Controller{
    public function adminloginpage(){

if($this->session->userdata('sessionadmin') == 1){
     redirect('Admin/admindashboard');   
 }elseif($this->session->userdata('sessionstudent') == 3){
     redirect('Student/studentdashboard');   
 }elseif($this->session->userdata('sessionfaculty') == 2){
     redirect('faculty/facultydashboard');   
 }elseif($this->session->userdata('sessionadmin') == ''){
   $this->load->view('admin/adminloginpage');  
 }
/*
 if($this->session->userdata('sessionadmin') == 1){
     redirect('Admin/admindashboard');   
 }else{
 if($this->session->userdata('sessionadmin') == ''){
   $this->load->view('admin/adminloginpage');  
 }} */
}
public function admindashboard(){
 if($this->session->userdata('sessionadmin')==1){
         $this->load->view('admin/admindashboard');
 } else {
     $this->load->view('admin/adminloginpage');
 }
   
}
public function emailsending(){
    if($this->session->userdata('sessionadmin')==1){
         $this->load->view('admin/emailsending');
 } else {
      $this->load->view('admin/adminloginpage');
 }
    
}
    public function fetch_courses() {
      if($this->session->userdata('sessionadmin')==1){
            //if($this->input->post('semester'))
            //{
            $time=$this->input->post('time');
           $section = $this->input->post('section');
            $year= $this->input->post('year');
            $semester= $this->input->post('semester');
            //echo $yr;;
            // $this->load->model('Crs_model');
            $faculty = $this->Crs_model->fetchcoursescjq($time,$section,$year,$semester);
            //}
            echo json_encode($faculty);
        } else {
              $this->load->view('admin/adminloginpage');
        }
    }
 public function fetch_coursesjq(){

$term = $this->input->post();
//$year = $id = join("','", $_POST["year"]);
 $courselist = $this->Crs_model->get_course_list($term);
 // $courselist = $this->Crs_model->get_course_list($term);
 if($courselist){
 $output = '';
 foreach($courselist as $row)
 {
  $output .= '<option value="'.$row["cid"].'">'.$row["coursename"].' '.'Sec-'.$row["section"].'</option>';
 }
 //echo $year;
 echo $output;
 //echo json_encode($courselist);
 }/*else{
  $output = 'No Courses Avaliable';   
echo $output; 
 }
  * 
  */
}  
public function fetch_studentsjq(){
 $cid = $this->input->post();
 $emaillist = $this->Crs_model->get_email_list($cid);
 if($emaillist){
 $output = '';
 foreach($emaillist as $row)
 {
  $output .= '<option value="'.$row["Mailid"].'">'.$row["Mailid"].'</option>';
 }
 echo $output; 
 
 }
 
}
public function fetch_semjq(){

        $sem = $this->Crs_model->semester();
        $output = '';
 foreach($sem as $row)
 {
  $output .= '<option value="'.$row["semester"].'">'.$row["semester"].'</option>';
 }
   echo $output;

 
    
}
public function sentgroupmail(){
       if($this->session->userdata('sessionadmin')== 1){
           //  $fmail = $this->session->userdata('email');
           //$name = $this->session->userdata('firstname');
           
      $data = $this->input->post();
        unset($data['submit']);
      //  print_r($data);
        $emails = $this->input->post('four[]');
        $notes = $this->input->post('facultynotes');
        //print_r($emails);
        //die();
         // foreach ($emails as $row){
          //   $email = $row['email'];
           //  print($email);
             //die();
             $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'donotreplycrsucmo@gmail.com', // change it to yours
  'smtp_pass' => 'Avschpc140!', // change it to yours
  'mailtype' => 'html',
      'priority' => 5,  
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);

          $message = 'you have recieved notes from Course Registration System';
      $this->load->library('email');
$this->email->initialize($config);
      $this->email->set_newline("\r\n");
      $this->email->from('crspxc199@gmail.com'); // change it to yours
      $this->email->to($emails);// change it to yours
      $this->email->subject($message);
      $this->email->message($notes);
      if($this->email->send())
     {
       $this->session->set_flashdata('success', 'Email Sent Successfully');
        redirect('Admin/emailsending');    
     }
             
       //  }
   
 } else {
     $this->load->view('Admin/adminloginpage');
 }
}
 public function adminabout(){
 if($this->session->userdata('sessionadmin')==1){
         $this->load->view('admin/aboutadmin');
 } else {
     $this->load->view('admin/adminloginpage');
 }}
public function addstudent(){
    if($this->session->userdata('sessionadmin')==1){
         $this->load->view('admin/addstudent');
 } else {
     $this->load->view('admin/adminloginpage');
 }
   
}
public function addfaculty(){
    if($this->session->userdata('sessionadmin')==1){
         $this->load->view('admin/addfaculty');
 } else {
     $this->load->view('admin/adminloginpage');
 }
   
}
public function managefaculty(){
    if($this->session->userdata('sessionadmin')==1){
         $this->load->view('admin/managefaculty');
 } else {
     $this->load->view('admin/adminloginpage');
 }
   
}
public function managestudents(){
    if($this->session->userdata('sessionadmin')==1){
         $this->load->view('admin/managestudents');
 } else {
     $this->load->view('admin/adminloginpage');
 }
   
}
public function manageinactivefaculty(){
    if($this->session->userdata('sessionadmin')==1){
         $this->load->view('admin/manageinactivefaculty');
 } else {
     $this->load->view('admin/adminloginpage');
 }
 
}
public function inactivestudent(){
   
   if($this->session->userdata('sessionadmin')==1){
         $id = $this->uri->segment(3);
         if($this->Crs_model->inactivestudent($id)){
             redirect('Admin/managestudents');  
         } else {
             echo 'fail';  
         }
 } else {
     $this->load->view('admin/adminloginpage');
 }
}
public function inactivefaculty(){
   
   if($this->session->userdata('sessionadmin')==1){
         $id = $this->uri->segment(3);
         if($this->Crs_model->inactivefaculty($id)){
             redirect('Admin/managefaculty');  
         } else {
             echo 'fail';  
         }
 } else {
     $this->load->view('admin/adminloginpage');
 }
}
public function activefaculty(){
   
   if($this->session->userdata('sessionadmin')==1){
         $id = $this->uri->segment(3);
         if($this->Crs_model->activefaculty($id)){
             redirect('Admin/manageinactivefaculty');  
         } else {
             echo 'fail';  
         }
 } else {
     $this->load->view('admin/adminloginpage');
 }
}
public function activestudent(){
   
   if($this->session->userdata('sessionadmin')==1){
         $id = $this->uri->segment(3);
         if($this->Crs_model->activestudent($id)){
             redirect('Admin/manageinactivestudents');  
         } else {
             echo 'fail';  
         }
 } else {
     $this->load->view('admin/adminloginpage');
 }
}
public function deletestudent(){
   
   if($this->session->userdata('sessionadmin')==1){
         $id = $this->uri->segment(3);
         if($this->Crs_model->deletestudent($id)){
             redirect('Admin/manageinactivestudents');  
         } else {
             echo 'fail';  
         }
 } else {
     $this->load->view('admin/adminloginpage');
 }
}
public function deletefaculty(){
   
   if($this->session->userdata('sessionadmin')==1){
         $id = $this->uri->segment(3);
         if($this->Crs_model->deletefaculty($id)){
             redirect('Admin/manageinactivefaculty');  
         } else {
             echo 'fail';  
         }
 } else {
     $this->load->view('admin/adminloginpage');
 }
}
public function manageinactivestudents(){
    if($this->session->userdata('sessionadmin')==1){
         $this->load->view('admin/manageinactivestudents');
 } else {
     $this->load->view('admin/adminloginpage');
 }
   
}
public function updatestudentinformation(){
   if($this->session->userdata('sessionadmin')==1){
         //start from here need to take the value from segment and 
        $this->load->view('admin/studentdataupdate');
 } else {
     $this->load->view('admin/adminloginpage');
 } 
}
public function studentpasswordchange(){
   if($this->session->userdata('sessionadmin')==1){
         //start from here need to take the value from segment and 
        $this->load->view('admin/studentpasswordchange');
 } else {
     $this->load->view('admin/adminloginpage');
 } 
}
public function updatepassword_student(){
   if($this->session->userdata('sessionadmin')==1){
         //start from here need to take the value from segment and 
        $id = $this->input->post('sid');
        $oldpass = md5($this->input->post('oldpassword'));
        $newpass = md5($this->input->post('newpassword'));
       // print_r($newpass);
       // die();
        $checkpass = $this->Crs_model->checkstudentpassword($id,$oldpass);
       // print_r($checkpass);
       // die();
        if($checkpass){
           $this->Crs_model->update_student_password($id,$newpass);
               //here success message keep it later
           //try to write if condition here
               redirect('admin/studentpasswordchange');
          // } 
           
        } else {
            
            redirect('admin/studentpasswordchange');
        }
 } else {
     $this->load->view('admin/adminloginpage');
 } 
}
public function updatepassword_faculty(){
   if($this->session->userdata('sessionadmin')==1){
         //start from here need to take the value from segment and 
        $id = $this->input->post('sid');
        $oldpass = md5($this->input->post('oldpassword'));
        $newpass = md5($this->input->post('newpassword'));
       // print_r($newpass);
       // die();
        $checkpass = $this->Crs_model->checkfacultypassword($id,$oldpass);
       // print_r($checkpass);
       // die();
        if($checkpass){
           if($this->Crs_model->update_faculty_password($id,$newpass)){
               //here success message keep it later
           //try to write if condition here
               redirect('admin/managefaculty');
           } 
           
        } else {
            
            redirect('admin/managefaculty');
        }
 } else {
     $this->load->view('admin/adminloginpage');
 } 
}
public function updatepassword_admin(){
   if($this->session->userdata('sessionadmin')==1){
         //start from here need to take the value from segment and 
        $id = $this->input->post('username');
        $oldpass = md5($this->input->post('oldpassword'));
        $newpass = md5($this->input->post('newpassword'));
       // print_r($newpass);
       // die();
        $checkpass = $this->Crs_model->checkadminpassword($id,$oldpass);
       // print_r($checkpass);
       // die();
        if($checkpass){
           if($this->Crs_model->update_admin_password($id,$newpass)){
               //here success message keep it later
           //try to write if condition here
                 $this->session->set_flashdata('success', ' Password Changed Successfully ');
                        
               redirect('admin/updatepassword');
           } 
           
        } else {
           $this->session->set_flashdata('error', ' invalid password  ');
                           
            redirect('admin/updatepassword');
        }
 } else {
     $this->load->view('admin/adminloginpage');
 } 
}
public function facultypasswordchange(){
   if($this->session->userdata('sessionadmin')==1){
         //start from here need to take the value from segment and 
        $this->load->view('admin/facultypasswordchange');
 } else {
     $this->load->view('admin/adminloginpage');
 } 
}
public function update_student(){
    if($this->session->userdata('sessionadmin')==1){
         //start from here need to take the value from segment and 
       $id = $this->input->post('id');
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
  
         );
   
      if($this->Crs_model->update_student($id,$data)){
          echo 'pass';
          //keep the sesion message later
          redirect('Admin/managestudents');
      } else {
          echo 'fail';
      }
       
 } else {
     $this->load->view('admin/adminloginpage');
 } 
}
public function update_faculty(){
    if($this->session->userdata('sessionadmin')==1){
         //start from here need to take the value from segment and 
       $id = $this->input->post('id');
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
  
         );
   
      if($this->Crs_model->update_faculty($id,$data)){
          echo 'pass';
          //keep the sesion message later
          redirect('Admin/managefaculty');
      } else {
          echo 'fail';
      }
       
 } else {
     $this->load->view('admin/adminloginpage');
 } 
}

public function updatefacultyinformation(){
   if($this->session->userdata('sessionadmin')==1){
         //start from here need to take the value from segment and 
        $this->load->view('admin/facultydataupdate');
 } else {
     $this->load->view('admin/adminloginpage');
 } 
}
public function Add_faculty(){
 if($this->session->userdata('sessionadmin')==1){
     
      $this->load->library('form_validation');
$this->load->helper(array('form', 'url'));
       
   $this->form_validation->set_rules('username','username','trim|required|is_unique[faculty.username]');
 $this->form_validation->set_rules('email','email','required|is_unique[faculty.email]');
  $this->form_validation->set_rules('phoneno','phoneno','required|is_unique[faculty.phoneno]');
        if($this->form_validation->run()==FALSE)   {  
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
  
         );
   
      if($this->Crs_model->Add_faculty($data)){
            $this->session->set_flashdata('success', ' Faculty Added ');
               
          //keep the sesion message later
          redirect('Admin/addfaculty');
      } else {
         $this->session->set_flashdata('error', ' not added ');
               
        }}else{
             $this->session->set_flashdata('error', ' Please enter correct information');
               
      }
      
 } else {
     $this->load->view('admin/adminloginpage');
 }   
}
public function Add_student(){
  if($this->session->userdata('sessionadmin')==1){
       $this->load->library('form_validation');
$this->load->helper(array('form', 'url'));
       
   $this->form_validation->set_rules('username','username','trim|required|is_unique[student.username]');
 $this->form_validation->set_rules('email','email','required|is_unique[student.email]');
  $this->form_validation->set_rules('phoneno','phoneno','required|is_unique[student.phoneno]');
        if($this->form_validation->run()==FALSE)   {  
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
  
         );
   
   
      if($this->Crs_model->Add_student($data)){
          echo 'pass';
          //keep the sesion message later
          redirect('Admin/addstudent');
      } else {
          echo 'fail';
      }  
            
  } else {
    echo 'aljknsa';
  }
 } else {
     $this->load->view('admin/adminloginpage');
 }  
}
//------------------about courses-------------------------------//

public function addcourses(){
   if($this->session->userdata('sessionadmin')==1){
         //start from here need to take the value from segment and 
        $this->load->view('admin/addcourses');
 } else {
     $this->load->view('admin/adminloginpage');
 } 
}
//
public function addfacultyavailiblity(){
   if($this->session->userdata('sessionadmin')==1){
         //start from here need to take the value from segment and 
        $this->load->view('admin/addfacultyavailiblity');
 } else {
     $this->load->view('admin/adminloginpage');
 } 
}
public function viewfacultyclassesavailablity(){
   if($this->session->userdata('sessionadmin')==1){
         //start from here need to take the value from segment and 
        $this->load->view('admin/viewfacultyclassesavailablity');
 } else {
     $this->load->view('admin/adminloginpage');
 } 
}
public function assignfaculty(){
   if($this->session->userdata('sessionadmin')==1){
         //start from here need to take the value from segment and 
        $this->load->view('admin/assignfaculty');
 } else {
     $this->load->view('admin/adminloginpage');
 } 
}
public function course_addjq(){
   if($this->session->userdata('sessionadmin')==1){
         //start from here need to take the value from segment and 
       $this->load->library('form_validation');
      //$this->form_validation->set_rules('courseid','courseid','required|is_unique[courses.courseid]');
      //   $this->form_validation->set_rules('coursename','coursename','required|is_unique[courses.coursename]');
      //   $this->form_validation->set_rules('year','year','required');
                // department fid
       $timings = $this->input->post('timings[]');
      // $section = join("','", $_POST["section"]);
       $section = $this->input->post('section[]');
    //print_r($section);
    //die();
       //print($section[0]);
       //die();
       if($section[0]){
             $data = array(
           'courseid'=> $this->input->post('courseid'),
           'coursename'=> $this->input->post('coursename'),
           'year'=> $this->input->post('year'),
           'semester'=> $this->input->post('semester'),
           'department'=> $this->input->post('department'),
            'day'=>$this->input->post('day'),
           'credithours' => 3,
          'section'=>'I',
            'startdate' => $this->input->post('startdate'),
            'classsize' => $this->input->post('classsize'),
            'flag' => 0,
            'assignflag' =>0,
            
               ); 
            $this->Crs_model->course_add($data,$timings);    
           
           
       }
       if($section[1]){
             $data = array(
           'courseid'=> $this->input->post('courseid'),
           'coursename'=> $this->input->post('coursename'),
           'year'=> $this->input->post('year'),
           'semester'=> $this->input->post('semester'),
           'department'=> $this->input->post('department'),
            'day'=>$this->input->post('day'),
           'credithours' => 3,
          'section'=>'II',
            'startdate' => $this->input->post('startdate'),
            'classsize' => $this->input->post('classsize'),
            'flag' => 0,
            'assignflag' =>0,
            
               ); 
            $this->Crs_model->course_add($data,$timings);    
           
           
       }
     /*
     foreach ($section as $key => $value) {
         $section = "splittedstring[".$key."] = ".$value."<br>";
         $sec = $value;
      $data = array(
           'courseid'=> $this->input->post('courseid'),
           'coursename'=> $this->input->post('coursename'),
           'year'=> $this->input->post('year'),
           'semester'=> $this->input->post('semester'),
           'department'=> $this->input->post('department'),
            'day'=>$this->input->post('day'),
           'credithours' => 3,
          'section'=>$sec,
            'startdate' => $this->input->post('startdate'),
            'classsize' => $this->input->post('classsize'),
            'flag' => 0,
            'assignflag' =>0,
            //'time'=>$time
               ); 
            $this->Crs_model->course_add($data,$timings);
      
     }
      * 
      */
//$section = "splittedstring[".$key."] = ".$value."<br>";
//$timings = join("','", $_POST["timings"]);
      // print_r($timings);
       /*foreach ($timings as $time){
           $a = 0;
       print_r($time[$a]);
       $a = $a + 1;
       }
        * 
       
    //   foreach ($timings as $key => $value) {
//"splittedstring[".$key."] = ".$value."<br>";
//$time= $value;
 $data = array(
           'courseid'=> $this->input->post('courseid'),
           'coursename'=> $this->input->post('coursename'),
           'year'=> $this->input->post('year'),
           'semester'=> $this->input->post('semester'),
           'department'=> $this->input->post('department'),
            'day'=>$this->input->post('day'),
           'credithours' => 3,
          
            'startdate' => $this->input->post('startdate'),
            'classsize' => $this->input->post('classsize'),
            'flag' => 0,
            'assignflag' =>0,
            //'time'=>$time
               );
        * 
        */
     // $test = $this->input->post();
     // print_r($test);
     // die();
 // $section=$this->input->post('section[]');
 //$section = $_POST["section"];
   //$this->Crs_model->course_add($data);
      
//$day = $value;
//print_r($day);

       //die();/*
/*
if($this->form_validation->run()==FALSE){
        $data = array(
           'courseid'=> $this->input->post('courseid'),
           'coursename'=> $this->input->post('coursename'),
           'year'=> $this->input->post('year'),
           'semester'=> $this->input->post('semester'),
           'department'=> $this->input->post('department'),
            'day'=>$this->input->post('day'),
           'credithours' => 3,
           
            'startdate' => $this->input->post('startdate'),
            'classsize' => $this->input->post('classsize'),
            'flag' => 0,
            'assignflag' =>0,
            'time'=>$day
               );
        $this->Crs_model->course_add($data);
      
       // redirect('Admin/assignfaculty');
       
       unset($data['submit']);
       if($this->Crs_model->course_add($data)){
       redirect('admin/addcourses');}
 else {
    echo 'fail';
}  
        
} else {
 $this->session->set_flashdata('error', ' failed to add course ');
  
   } 
 */ 
   
//}
   $this->session->set_flashdata('success', ' You have successfully added the Course. Please Assign Faculty');

redirect('Admin/assignfaculty');
 } else {
     $this->load->view('admin/adminloginpage');
 } 
}
public function course_add(){
   if($this->session->userdata('sessionadmin')==1){
         //start from here need to take the value from segment and 
       $this->load->library('form_validation');
      //$this->form_validation->set_rules('courseid','courseid','required|is_unique[courses.courseid]');
      //   $this->form_validation->set_rules('coursename','coursename','required|is_unique[courses.coursename]');
      //   $this->form_validation->set_rules('year','year','required');
                // department fid
if($this->form_validation->run()==FALSE){
        $data = array(
           'courseid'=> $this->input->post('courseid'),
           'coursename'=> $this->input->post('coursename'),
           'year'=> $this->input->post('year'),
           'semester'=> $this->input->post('semester'),
           'department'=> $this->input->post('department'),
            'day'=>$this->input->post('day'),
           'credithours' => 3,
            'section' => $this->input->post('section'),
            'startdate' => $this->input->post('startdate'),
            'classsize' => $this->input->post('classsize'),
            'flag' => 0,
            'assignflag' =>0
               );
        $this->Crs_model->course_add($data);
         $this->session->set_flashdata('success', ' You have successfully added the Course. Please Assign Faculty');

        redirect('Admin/assignfaculty');
      /* unset($data['submit']);
       if($this->Crs_model->course_add($data)){
       redirect('admin/addcourses');}
 else {
    echo 'fail';
}  */ 
} else {
 $this->session->set_flashdata('error', ' failed to add course ');
  
}
 } else {
     $this->load->view('admin/adminloginpage');
 } 
}
public function course_assign(){
if($this->session->userdata('sessionadmin')==1){
    $id = $this->input->post('coursename');
    $fid = $this->input->post('fid');
    $time = $this->input->post('timings');
    $section = $this->input->post('section');
    $data = $this->input->post();
  
     $getcourse=$this->Crs_model->get_courses_foradmin($id);
  foreach($getcourse as $row)  
           {  
     $section= $row['section'];
     $day = $row['day'];
     $semester = $row['semester'];
     $year = $row['year'];
  }

    /*
     needed information
     fid
    semester
     year
     day
     time
     */
    //
    $checkavailablity = $this->Crs_model->check_avail_faculty($fid,$semester,$year,$day,$time);
       // print_r($checkavailablity);
    //print_r($day);
       // print($checkavailablity[flag]);
        //  print($checkavailablity[0]);
    if($checkavailablity){
                foreach($checkavailablity as $row)  
           { 
               $flag = $row->flag;
                }
             //   print_r($flag[0]);
                
   // die();
                if($flag[0]== 1){
                    
          $this->session->set_flashdata('error', 'Faculty Not Avaliable at this time');
   redirect('Admin/assignfaculty');              
                }
                else {
                    
       $checkdata = $this->Crs_model->check_data_usergiven($id,$section,$time);
 // print_r($year);
 // print_r($semester);
  
  $check= $this->Crs_model->check_faculty_teaching($fid,$day,$semester,$year,$time);
 // print_r($check);
  //die();
  if($checkdata){
      
      if($check){
   $this->session->set_flashdata('error', ' Faculty is already teaching different class On'.' '.$day.' '.$time);
   redirect('Admin/assignfaculty');   
 } else {
   //  print_r($id);
   //  print_r($fid);
   // die();
     /*
      fid semester year day time
      */
   //  $getaid=$this->Crs_model->get_avail_faculty($fid,$semester,$year,$day,$time);
   //  print_r($getaid);
   //  die();
     $this->Crs_model->update_avail_faculty($fid,$semester,$year,$day,$time);
               
     
     $this->Crs_model->faculty_assign($fid,$id);
    $this->session->set_flashdata('success', ' Faculty Assigned Successfully ');
   redirect('Admin/assignfaculty');  
 } 
      
  } else {
      $this->session->set_flashdata('error', 'Please give the details correctly ');
   redirect('Admin/assignfaculty');   
 }
 }
    } else {
      $this->session->set_flashdata('error', 'Faculty is not availible in this Semester ');
   redirect('Admin/assignfaculty');
 }



 } else {
     $this->load->view('admin/adminloginpage');
 }    
}

public function managecourses(){
    if($this->session->userdata('sessionadmin')==1){
         $this->load->view('admin/managecourses');
 } else {
     $this->load->view('admin/adminloginpage');
 }
   
}
public function updatepassword(){
    if($this->session->userdata('sessionadmin')==1){
         $this->load->view('admin/updatepassword');
 } else {
     $this->load->view('admin/adminloginpage');
 }
   
}
public function modifycoursedetails(){
   if($this->session->userdata('sessionadmin')==1){
         $this->load->view('admin/modifycoursedetails');
 } else {
     $this->load->view('admin/adminloginpage');
 }  
}
public function changecoursefaculty(){
   if($this->session->userdata('sessionadmin')==1){
         $this->load->view('admin/changecoursefaculty');
 } else {
     $this->load->view('admin/adminloginpage');
 }  
}
public function update_coursedetails(){
   if($this->session->userdata('sessionadmin')==1){
         //start from here need to take the value from segment and 
       $this->load->library('form_validation');
      //$this->form_validation->set_rules('courseid','courseid','required|is_unique[courses.courseid]');
      //   $this->form_validation->set_rules('coursename','coursename','required|is_unique[courses.coursename]');
      //   $this->form_validation->set_rules('year','year','required');
                // department fid
if($this->form_validation->run()==FALSE){
        $id= $this->input->post('courseid');
    $data = array(
           
           'coursename'=> $this->input->post('coursename'),
           'year'=> $this->input->post('year'),
           'semester'=> $this->input->post('semester'),
           'department'=> $this->input->post('department'),
           'fid'=> $this->input->post('fid'),
            'credithours' => 3,
               );
          //print_r($id);
        // die();
        $this->Crs_model->update_coursedetails($id,$data);
        redirect('Admin/managecourses');
      /* unset($data['submit']);
       if($this->Crs_model->course_add($data)){
       redirect('admin/addcourses');}
 else {
    echo 'fail';
}  */ 
} else {
    echo 'fail';  
}
 } else {
     $this->load->view('admin/adminloginpage');
 } 
}
public function deletecourse(){
   $id = $this->uri->segment(3);
   if($this->session->userdata('sessionadmin')==1){
        
         if($this->Crs_model->deletecourse($id)){
             redirect('Admin/managecourses');  
         } else {
             echo 'fail';  
         }
 } else {
     $this->load->view('admin/adminloginpage');
 }
}
public function listofcourses(){
  
   if($this->session->userdata('sessionadmin')==1){
        
      
             $this->load->view('Admin/listofcourses');  
        
         }
 else {
     $this->load->view('admin/adminloginpage');
 }
}

//---------------end courses code  
    public function managestudentsjq(){
    if($this->session->userdata('sessionadmin')==1){
        
      
             $this->load->view('Admin/managestudentsjq');  
        
         }
 else {
     $this->load->view('admin/adminloginpage');
 }    
    }
     public function viewregistrationjq(){
    if($this->session->userdata('sessionadmin')==1){
        
      
             $this->load->view('Admin/viewregistrationjq');  
        
         }
 else {
     $this->load->view('admin/adminloginpage');
 }    
    }
        public function managefacultyjq(){
    if($this->session->userdata('sessionadmin')==1){
        
      
             $this->load->view('Admin/managefacultyjq');  
        
         }
 else {
     $this->load->view('admin/adminloginpage');
 }    
    }
    public function manageinactivejq(){
  if($this->session->userdata('sessionadmin')==1){
        
      
             $this->load->view('Admin/manageinactivejq');  
        
         }
 else {
     $this->load->view('admin/adminloginpage');
 }          
    }
   public function manageinactivefacultyjq(){
  if($this->session->userdata('sessionadmin')==1){
        
      
             $this->load->view('Admin/manageinactivefacultyjq');  
        
         }
 else {
     $this->load->view('admin/adminloginpage');
 }          
    }

    public function find_course() {
        if ($this->session->userdata('sessionadmin') == 1) {
            $this->load->model("Crs_model");
        $findcourse = $this->Crs_model->get_table();
        $data = array();
        foreach ($findcourse as $row) {
            $sub_array = array();
            $sub_array[] = $row->cid;
            $sub_array[] = $row->courseid;
            $sub_array[] = $row->coursename;
            $sub_array[] = $row->time;
            $sub_array[] = $row->section;
            $sub_array[] = $row->semester;
            $sub_array[] = $row->year;
           // $sub_array[] = 'Dr' . $row->firstname . '<br>' . $row->lastname;
           // $sub_array[] = $row->fid;
            $sub_array[] = $row->startdate;
            $sub_array[] = $row->day;
        $sub_array[] = '<a href="#" class="btn btn-primary btn-xs update" name="update" id="'.$row->cid.'">Update</a>';
        // $sub_array[] = '<a href="#" class="btn btn-primary btn-xs danger" name="delete" id="'.$row->courseid.'">Delete</a>';  
          
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Crs_model->get_data_courses(),
            "recordsFiltered" => $this->Crs_model->get_filtered_data(),
            "data" => $data
        );
        echo json_encode($output);
        } else {
            redirect('admin/adminloginpage');  
        }
    }
    public function get_registrationjq(){
         if ($this->session->userdata('sessionadmin') == 1) {
              $this->load->model("Crs_model");
        $findcourse = $this->Crs_model->get_tablejq();
        $data = array();
        foreach ($findcourse as $row) {
            $sub_array = array();
            $sub_array[] = $row->registrationid;
            $sub_array[] = $row->courseid;
            $sub_array[] = $row->coursename;
            $sub_array[] = $row->sid;
            $sub_array[] = $row->firstname.$row->lastname;
          $sub_array[] = $row->fid;
            $sub_array[] = 'Dr' .$row->ffirstname.$row->flastname;
            $sub_array[] = $row->semester;
            $sub_array[] = $row->year;
      //  $sub_array[] = '<a href="#" class="btn btn-primary btn-xs update" name="update" id="'.$row->registrationid.'">Update</a>';
        // $sub_array[] = '<a href="#" class="btn btn-primary btn-xs danger" name="delete" id="'.$row->courseid.'">Delete</a>';  
          
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Crs_model->get_data_registration(),
            "recordsFiltered" => $this->Crs_model->get_filtered_datajq(),
            "data" => $data
        );
        echo json_encode($output);
        } else {
            redirect('admin/adminloginpage');  
        }      
    }
      public function fetch_sem_admin() {
       if ($this->session->userdata('sessionadmin') == 1) {
            //if($this->input->post('semester'))
            //{
            $yr = $this->input->post('yea');
            $semValue = $this->input->post('sem');
           // $uid = $this->input->post('sid');
            //echo $yr;;
            // $this->load->model('Crs_model');
            $courses = $this->Crs_model->fetch_sem_admin($yr, $semValue);
            //}
            echo json_encode($courses);
        } else {
            redirect('admin/adminloginpage');  
        }   
    }
    public function find_students(){
   if ($this->session->userdata('sessionadmin') == 1) {
            $this->load->model("Crs_model");
        $findstudent = $this->Crs_model->get_table_studentjs();
        $data = array();
        foreach ($findstudent as $row) {
            $sub_array = array();
            $sub_array[] = $row->sid;
            $sub_array[] = $row->firstname;
            $sub_array[] = $row->lastname;
            $sub_array[] = $row->username;
            $sub_array[] = $row->gender;
            $sub_array[] = $row->email;
            $sub_array[] = $row->phone;
            $sub_array[] = $row->address;
       
        $sub_array[] = '<a href="#" class="btn btn-primary btn-xs update" name="update" id="'.$row->sid.'">Update</a>';
         $sub_array[] = '<a href="#" class="btn btn-danger btn-xs delete" name="delete" id="'.$row->sid.'">Inactive</a>';  
 //       $sub_array[] = '<a href="#" class="btn btn-primary btn-xs updatepassword" name="updatepassword" id="'.$row->sid.'">Update Password</a>';
             
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Crs_model->get_data_studentjs(),
            "recordsFiltered" => $this->Crs_model->get_filtered_studentjs(),
            "data" => $data
        );
        echo json_encode($output);
        } else {
            redirect('admin/adminloginpage');  
        }     
    }
    //find the faculty and get facultyv table
     public function find_faculty(){
   if ($this->session->userdata('sessionadmin') == 1) {
            $this->load->model("Crs_model");
        $findstudent = $this->Crs_model->get_table_facultyjs();
        $data = array();
        foreach ($findstudent as $row) {
            $sub_array = array();
            $sub_array[] = $row->fid;
            $sub_array[] = $row->firstname;
            $sub_array[] = $row->lastname;
            $sub_array[] = $row->username;
            $sub_array[] = $row->gender;
            $sub_array[] = $row->phone;
            $sub_array[] = $row->email;
            $sub_array[] = $row->address;
       
        $sub_array[] = '<a href="#" class="btn btn-primary btn-xs update" name="update" id="'.$row->fid.'">Update</a>';
         $sub_array[] = '<a href="#" class="btn btn-danger btn-xs delete" name="delete" id="'.$row->fid.'">Inactive</a>';  
          
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Crs_model->get_data_facultyjs(),
            "recordsFiltered" => $this->Crs_model->get_filtered_facultyjs(),
            "data" => $data
        );
        echo json_encode($output);
        } else {
            redirect('admin/adminloginpage');  
        }     
    }
    //find 
      public function find_facultyavail(){
   if ($this->session->userdata('sessionadmin') == 1) {
            $this->load->model("Crs_model");
        $findstudent = $this->Crs_model->get_table_facultyavailjs();
        
        $data = array();
        foreach ($findstudent as $row) {
            
            $sub_array = array();
            $sub_array[] = $row->fid;
            $sub_array[] = 'Dr'.' '.$row->firstname.' '.$row->lastname;
            $sub_array[] = $row->semester;
            $sub_array[] = $row->year;
            $sub_array[] = $row->day;
            $sub_array[] = $row->time;
            $val = $row->flag;
            if($val[0]==0){
      $sub_array[] = '<a href="#" class="btn btn-success btn-xs update" name="update" id="#">Avaliable</a>';
            } else {
$sub_array[] = '<a href="#" class="btn btn-danger btn-xs delete" name="delete" id="#">Not Avaliable</a>';
            }
      //  $sub_array[] = '<a href="#" class="btn btn-primary btn-xs update" name="update" id="'.$row->fid.'">Update</a>';
       //  $sub_array[] = '<a href="#" class="btn btn-danger btn-xs delete" name="delete" id="'.$row->fid.'">Inactive</a>';  
          
            $data[] = $sub_array;
        
            
            
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Crs_model->get_data_facultyavailjs(),
            "recordsFiltered" => $this->Crs_model->get_filtered_facultyavailjs(),
            "data" => $data
        );
        echo json_encode($output);
    
        } else {
            redirect('admin/adminloginpage');  
        }     
    }
    
    public function find_students_inactive(){
     if ($this->session->userdata('sessionadmin') == 1) {
            $this->load->model("Crs_model");
        $findstudent = $this->Crs_model->get_table_inactivestudentjs();
        $data = array();
        foreach ($findstudent as $row) {
            $sub_array = array();
            $sub_array[] = $row->sid;
            $sub_array[] = $row->firstname;
            $sub_array[] = $row->lastname;
            $sub_array[] = $row->username;
            $sub_array[] = $row->gender;
            $sub_array[] = $row->email;
            $sub_array[] = $row->phone;
            $sub_array[] = $row->address;
       
        $sub_array[] = '<a href="#" class="btn btn-primary btn-xs active" name="active" id="'.$row->sid.'">active</a>';
         $sub_array[] = '<a href="#" class="btn btn-danger btn-xs delete" name="delete" id="'.$row->sid.'">Delete</a>';  
          
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Crs_model->get_data_inactivestudentjs(),
            "recordsFiltered" => $this->Crs_model->get_filtered_inactivestudentjs(),
            "data" => $data
        );
        echo json_encode($output);
        } else {
        redirect('admin/adminloginpage'); 
        
        }   
    }
public function find_faculty_inactive(){
     if ($this->session->userdata('sessionadmin') == 1) {
            $this->load->model("Crs_model");
        $findstudent = $this->Crs_model->get_table_inactivefacultyjs();
        $data = array();
        foreach ($findstudent as $row) {
            $sub_array = array();
            $sub_array[] = $row->fid;
            $sub_array[] = $row->firstname;
            $sub_array[] = $row->lastname;
            $sub_array[] = $row->username;
            $sub_array[] = $row->gender;
            $sub_array[] = $row->phone;
            $sub_array[] = $row->email; 
            $sub_array[] = $row->address;
       
        $sub_array[] = '<a href="#" class="btn btn-primary btn-xs active" name="active" id="'.$row->fid.'">active</a>';
         $sub_array[] = '<a href="#" class="btn btn-danger btn-xs delete" name="delete" id="'.$row->fid.'">Delete</a>';  
          
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Crs_model->get_data_inactivefacultyjs(),
            "recordsFiltered" => $this->Crs_model->get_filtered_inactivefacultyjs(),
            "data" => $data
        );
        echo json_encode($output);
        } else {
        redirect('admin/adminloginpage'); 
        
        }   
    }
    public function fetch_single_registration(){
     $output = array();  
           $this->load->model("Crs_model");  
           $data = $this->Crs_model->fetch_single_registration($_POST["user_id"]);  
           foreach($data as $row)  
           {  
                    $output['courseid'] = $row->courseid;
                   $output['sid'] = $row->sid;
                   $output['sname'] = $row->firstname.$row->lastname;
                   $output['fid'] = $row->fid;
                   $output['name'] = $row->ffirstname.$row->flastname;
                   $output['coursename'] = $row->coursename;
                   $output['sem'] = $row->semester;
                   $output['year'] = $row->year;
                  
                  
                 
           }  
           echo json_encode($output);    
    }

    public  function fetch_single_user()  
      {  
  $output = array();  
           $this->load->model("Crs_model");  
           $data = $this->Crs_model->fetch_single_user($_POST["user_id"]);  
           foreach($data as $row)  
           {  
                   $output['coursename'] = $row->coursename;
                   $output['section'] = $row->section;
                  
                   $output['semester'] = $row->semester;
                   $output['year'] = $row->year;
                   $output['startdate'] = $row->startdate;
                  
                   $output['aboutcourse'] = $row->aboutcourse;
                   
                 
           }  
           echo json_encode($output);  
      } 
   public  function fetch_single_faculty()  
      {  
  $output = array();  
           $this->load->model("Crs_model");  
           $data = $this->Crs_model->fetch_single_faculty($_POST["user_id"]);  
           foreach($data as $row)  
           {  
                   $output['firstname'] = $row->firstname;
                   $output['lastname'] = $row->lastname;
                  $output['username'] = $row->username;
                  $output['gender'] = $row->gender;
                  $output['email'] = $row->email;
                  $output['phone'] = $row->phone;
                  $output['address'] = $row->address;
                 
           }  
           echo json_encode($output);  
      } 
     public function inactive_studentjq(){
       
        if($this->session->userdata('sessionadmin')== 1){
         $this->load->model('Crs_model');
        $this->Crs_model->inactive_studentjq($_POST["user_id"]);
        echo'Student is inacctive';
 } else {
     $this->load->view('Admin/adminloginpage');
    }
    
 } 
    public function inactive_facultyjq(){
       
        if($this->session->userdata('sessionadmin')== 1){
         $this->load->model('Crs_model');
        $this->Crs_model->inactive_facultyjq($_POST["user_id"]);
        echo'faculty is inactive';
 } else {
     $this->load->view('Admin/adminloginpage');
    }
    
 }  
      public function active_studentjq(){
       //making the student profile active
        if($this->session->userdata('sessionadmin')== 1){
         $this->load->model('Crs_model');
        $this->Crs_model->active_studentjq($_POST["user_id"]);
        echo'Student is acctive';
 } else {
     $this->load->view('Admin/adminloginpage');
    }
    
 }
 public function active_facultyjq(){
       //making the student profile active
        if($this->session->userdata('sessionadmin')== 1){
         $this->load->model('Crs_model');
        $this->Crs_model->active_facultyjq($_POST["user_id"]);
        echo'faculty is acctive';
 } else {
     $this->load->view('Admin/adminloginpage');
    }
    
 }
 public function inactive_studentjqdelete(){
       //making the student profile active
        if($this->session->userdata('sessionadmin')== 1){
         $this->load->model('Crs_model');
        $this->Crs_model->inactive_studentjqdelete($_POST["user_id"]);
        echo'Student is acctive';
 } else {
     $this->load->view('Admin/adminloginpage');
    }
    
 }
  public function inactive_facultyjqdelete(){
       //making the student profile active
        if($this->session->userdata('sessionadmin')== 1){
         $this->load->model('Crs_model');
        $this->Crs_model->inactive_facultyjqdelete($_POST["user_id"]);
        echo'faculty is acctive';
 } else {
     $this->load->view('Admin/adminloginpage');
    }
    
 }
    public  function fetch_single_student()  
      {  
  $output = array();  
           $this->load->model("Crs_model");  
           $data = $this->Crs_model->fetch_single_student($_POST["user_id"]);  
           foreach($data as $row)  
           {  
                   $output['firstname'] = $row->firstname;
                   $output['lastname'] = $row->lastname;
                  $output['username'] = $row->username;
                  $output['gender'] = $row->gender;
                  $output['email'] = $row->email;
                  $output['phone'] = $row->phone;
                  $output['address'] = $row->address;
                  
                 
           }  
           echo json_encode($output);  
      } 
    
      public function user_action(){  
         if($_POST['user_id'])  
           { 
             //echo "hi";//firstname is the column name and first_name is field name
             $updated_data = array(  
                     'coursename' =>     $this->input->post('coursename'),  
                     'semester'  =>     $this->input->post('semester') ,
                 'year'  => $this->input->post('year'),
                 'startdate'  => $this->input->post('startdate'),
                     'aboutcourse'  => $this->input->post('aboutcourse')
         
                );  
                $this->load->model('Crs_model');  
                $this->Crs_model->update_crud($this->input->post("user_id"), $updated_data);  
                echo 'Course Updated'; 
               // redirect('Admin/listofcourses');
           
    } }
 public function user_action_student(){
     if($_POST['user_id'])  
           { 
             //echo "hi";//firstname is the column name and first_name is field name
             $updated_data = array(  
                     'firstname' =>     $this->input->post('firstname'),  
                     'lastname'  =>     $this->input->post('lastname') ,
                  'username'  =>     $this->input->post('username') ,
                  'gender'  =>     $this->input->post('gender') ,
                  'email'  =>     $this->input->post('email') ,
                  'phone'  =>     $this->input->post('phone') ,
                  'address'  =>     $this->input->post('address') 
                 
                
         
                );  
                $this->load->model('Crs_model');  
                $this->Crs_model->update_crud_student($this->input->post("user_id"), $updated_data);  
                echo 'Student Details Updated'; 
               // redirect('Admin/listofcourses');
           
    } 
 }
 public function user_action_faculty(){
     if($_POST['user_id'])  
           { 
             //echo "hi";//firstname is the column name and first_name is field name
             $updated_data = array(  
                     'firstname' =>     $this->input->post('firstname'),  
                     'lastname'  =>     $this->input->post('lastname') ,
                  'username'  =>     $this->input->post('username') ,
                  'gender'  =>     $this->input->post('gender') ,
                  'email'  =>     $this->input->post('email') ,
                  'phone'  =>     $this->input->post('phone') ,
                  'address'  =>     $this->input->post('address') 
                 
                
         
                );  
                $this->load->model('Crs_model');  
                $this->Crs_model->update_crud_faculty($this->input->post("user_id"), $updated_data);  
                echo 'Faculty Details Updated'; 
               // redirect('Admin/listofcourses');
           
    } 
 }
 public function logout(){
    $this->session->sess_destroy();
    redirect('admin/adminloginpage');
}
}
