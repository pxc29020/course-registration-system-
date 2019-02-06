<?php

class Faculty extends CI_Controller{
      public function facultyloginpage(){
if($this->session->userdata('sessionadmin') == 1){
     redirect('Admin/admindashboard');   
 }elseif($this->session->userdata('sessionstudent') == 3){
     redirect('Student/studentdashboard');   
 }elseif($this->session->userdata('sessionfaculty') == 2){
     redirect('faculty/facultydashboard');   
 }elseif($this->session->userdata('sessionfaculty') == ''){
  $this->load->view('Faculty/facultyloginpage');  
 }
          
          /*
 if($this->session->userdata('sessionfaculty') == 2){
     redirect('Faculty/facultydashboard');   
 }else{
 if($this->session->userdata('sessionfaculty') == ''){
  $this->load->view('Faculty/facultyloginpage');  
 }}
 * 
 */
}
public function facultydashboard(){
    if($this->session->userdata('sessionfaculty')== 2){
         $this->load->view('Faculty/facultydashboard');
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
    
}
public function updateprofile(){
    if($this->session->userdata('sessionfaculty')== 2){
         $this->load->view('Faculty/updateprofile');
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
    
}
//
public function facultyclassesavail(){
    if($this->session->userdata('sessionfaculty')== 2){
         $this->load->view('Faculty/facultyclassesavail');
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
    
}
public function emailsending(){
    if($this->session->userdata('sessionfaculty')== 2){
         $this->load->view('Faculty/emailsending');
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
    
}
public function samplepage(){
       if($this->session->userdata('sessionfaculty')== 2){
         $this->load->view('faculty/samplepage');
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
}
public function addtimeslot(){
    if($this->session->userdata('sessionfaculty')== 2){
         $this->load->view('Faculty/addtimeslot');
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
    
}
public function viewtimeslot(){
        if($this->session->userdata('sessionfaculty')== 2){
         $this->load->view('Faculty/viewtimeslot');
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }   
}
//
public function viewtimeslotinactive(){
        if($this->session->userdata('sessionfaculty')== 2){
         $this->load->view('Faculty/viewtimeslotinactive');
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }   
}
public function add_timeslot_faculty(){
      if($this->session->userdata('sessionfaculty')== 2){
       $data = $this->input->post();
       $fid= $this->input->post('fid');
       $day= $this->input->post('day');
       $time= $this->input->post('time');
      // $day = $this->input->
      unset($data['submit']);
       $check= $this->Crs_model->Check_slot_available($data);
      if($check){
             $this->session->set_flashdata('error', ' You Already have Time Slot at this time ');
                 redirect('Faculty/addtimeslot');
      
      } else {
       if($this->Crs_model->add_time_slotjq($data)) {
              $this->session->set_flashdata('success', ' Successfully Added Timeslot on'.' '.$day.' '.$time );
                 redirect('Faculty/addtimeslot');
       
       }else{
                  $this->session->set_flashdata('error', ' Error in adding timeslot ');
                 redirect('Faculty/addtimeslot');
      
       }  
      }
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }  
}
public function add_avail_faculty(){
  if($this->session->userdata('sessionfaculty')== 2){
       $data = $this->input->post();
       $fid= $this->input->post('fid');
       $day= $this->input->post('day');
       $time= $this->input->post('time');
       $semester = $this->input->post('semester');
       $year = $this->input->post('year');
      // $day = $this->input->
      unset($data['submit']);
       $check= $this->Crs_model->Check_class_available($data);
      if($check){
             $this->session->set_flashdata('error', ' You Already have Time Slot at this time ');
                 redirect('Faculty/facultyclassesavail');
      
      } else {
       if($this->Crs_model->add_class_slotjq($data)) {
              $this->session->set_flashdata('success', ' Successfully Added Timeslot on'.' '.$day.' '.$time );
                 redirect('Faculty/facultyclassesavail');
       
       }else{
                  $this->session->set_flashdata('error', ' Error in adding timeslot ');
                 redirect('Faculty/addtimeslot');
      
       }  
      }
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }     
}

public function update_profilejq(){
      if($this->session->userdata('sessionfaculty')== 2){
         //start from here need to take the value from segment and 
       $id = $this->input->post('fid');
         $password = md5($this->input->post('password'));
       $data = array(
        'firstname' => $this->input->post('firstname'),  
      'lastname' => $this->input->post('lastname'),  
      
    'username' => $this->input->post('username'),
    'email' => $this->input->post('email'),  
    'gender' => $this->input->post('gender'), 
    'phone' => $this->input->post('phone'),  
    'address' => $this->input->post('address'),  
  
         );
   
      if($this->Crs_model->update_facultyjq($id,$data)){
         $this->session->set_flashdata('success', ' Updated Successfully');
                    //keep the sesion message later
          redirect('Faculty/updateprofile');
      } else {
      $this->session->set_flashdata('error', ' invalid details');
                    
      }
       
 } else {
      $this->load->view('Faculty/facultyloginpage');
 } 
}
public function facultyabout(){
    if($this->session->userdata('sessionfaculty')== 2){
         $this->load->view('Faculty/facultyabout');
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
    
}
public function updatepassword(){
    if($this->session->userdata('sessionfaculty')== 2){
         $this->load->view('Faculty/updatepassword');
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
    
}
//
public function fetch_sem(){

        $sem = $this->Crs_model->semester();
        $output = '';
 foreach($sem as $row)
 {
  $output .= '<option value="'.$row["semester"].'">'.$row["semester"].'</option>';
 }
   echo json_encode($output);

 
    
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
public function fetch_courses(){

$term = $this->input->post();
 $courselist = $this->Crs_model->get_course_list($term);
 $output = '';
 foreach($courselist as $row)
 {
  $output .= '<option value="'.$row["cid"].'">'.$row["coursename"].' '.'Sec-'.$row["section"].'</option>';
 }
 echo $output;
 //echo json_encode($courselist);
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

public function update_password(){
   if($this->session->userdata('sessionfaculty')==2){
         //start from here need to take the value from segment and 
        $id = $this->input->post('fid');
        $oldpass = md5($this->input->post('oldpassword'));
        $newpass = md5($this->input->post('newpassword'));
       // print_r($newpass);
       // die();
        $checkpass = $this->Crs_model->checkfacultypasswordjq($id,$oldpass);
       // print_r($checkpass);
       // die();
        if($checkpass){
           if($this->Crs_model->updatefaculty_password($id,$newpass)){
               //here success message keep it later
           //try to write if condition here
                 $this->session->set_flashdata('success', ' Password Changed Successfully ');
                        
               redirect('faculty/updatepassword');
           } 
           
        } else {
           $this->session->set_flashdata('error', ' invalid password  ');
                           
            redirect('faculty/updatepassword');
        }
 } else {
     $this->load->view('faculty/facultyloginpage');
 } 
}
public function gradestudents(){
    if($this->session->userdata('sessionfaculty')== 2){
         $this->load->view('Faculty/gradestudents');
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
    
}
public function fetch_students(){
 if($this->session->userdata('sessionfaculty')== 2){
        $yr = $this->input->post('year');
        $courseid = $this->input->post('courseid');
            $semValue = $this->input->post('semester');
            $fid = $this->input->post('fid');
       $students = $this->Crs_model->fetch_students($yr, $courseid, $semValue, $fid);
       echo json_encode($students);
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
      
}
public function grade_student(){
    
  if($this->session->userdata('sessionfaculty')== 2){
   $c= $this->input->post('courseid');
   $s = $this->input->post('sid');
   $getstudentemail = $this->Crs_model->getstudent_emaijq($s);
   $f= $this->input->post('fid');
   $g= $this->input->post('grade');
   $r= $this->input->post('remarks');
  // $email = $this->session->userdata('email');
   // print_r($data);
  // unset($data['submit']);
   /*
     $getcourse = $this->Crs_model->get_coursejq($id);  */
            foreach ($getstudentemail as $row) {
                $smail = $row['email'];
            }
            // $getcourse = $this->Crs_model->get_coursename($id);
        
                                 $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'donotreplycrsucmo@gmail.com', 
  'smtp_pass' => 'Avschpc140!', 
  'mailtype' => 'html',
      'priority' => 5,  
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);
$message=  'The Email is Regarding Grade Notification From Course Registration System';
        $notes = 'You have been Graded'.' '.$g.' '.'for the course'.' '.$c;
      $this->load->library('email');
$this->email->initialize($config);
      $this->email->set_newline("\r\n");
      $this->email->from($smail); // change it to yours
      $this->email->to($smail);// change it to yours
      $this->email->subject($message);
      $this->email->message($notes);
      if($this->email->send())
     { 
  
   if($this->Crs_model->grade_student($c,$s,$f,$g,$r)){
      $this->session->set_flashdata('success', 'Successfully Graded'); 
      redirect('faculty/gradestudents');
   } else {
       
   }
   }else{ echo 'fail'; }
 } else {
     $this->load->view('Faculty/facultyloginpage');
 } 
}

public function testpage(){
       if($this->session->userdata('sessionfaculty')== 2){
         $this->load->view('Faculty/testpage');
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
}

public function sentnotes1(){
       if($this->session->userdata('sessionfaculty')== 2){
      $data = $this->input->post();
        unset($data['submit']);
        if($this->Crs_model->facultytostudent($data)){
        $this->session->set_flashdata('success', 'Notes Sent Successfully');
        redirect('faculty/viewnotes');
        } else {
            echo 'fail';   
        }  
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
}
public function sentgroupmail(){
       if($this->session->userdata('sessionfaculty')== 2){
             $fmail = $this->session->userdata('email');
           $name = $this->session->userdata('firstname');
           
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

          $message = 'you have recieved notes from faculty'.' '.'Dr'.' '.$name.' '.$fmail;
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
        redirect('faculty/emailsending');    
     }
             
       //  }
   
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
}
public function sentemailtostudent(){
    if($this->session->userdata('sessionfaculty')== 2){
$fmail = $this->session->userdata('email');
           $name = $this->session->userdata('firstname');
           
     // $data = $this->input->post();
       // unset($data['submit']);
      //  print_r($data);
        $emails = $this->input->post('emails[]');
       // print_r($emails);
        //die();
        $notes = $this->input->post('subject');
         $note = $this->input->post('message').' '.'<br>'.'<br>'.'<br>'.'Regards,'.'<br>'.' '.'Dr'.' '.$name.','.'<br>'.$fmail;
       
        //print_r($emails);
        //message
        //subject
        //die();
         // foreach ($emails as $row){
          //   $email = $row['email'];
           //  print($email);
             //die();
         if($emails){
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

          $message = $notes;
      $this->load->library('email');
$this->email->initialize($config);
      $this->email->set_newline("\r\n");
      $this->email->from('crspxc199@gmail.com'); // change it to yours
      $this->email->to($emails);// change it to yours
      $this->email->subject($message);
      $this->email->message($note);
      if($this->email->send())
     {
       $this->session->set_flashdata('success', 'Email Sent Successfully');
        redirect('faculty/facultydashboard');    
     }
         } else{      $this->session->set_flashdata('error', 'Please Select the Students');
         redirect('faculty/facultydashboard');  }  
        
 } else {
     $this->load->view('Faculty/facultyloginpage');
    }   
 }
  public function sentnotes() {


   if($this->session->userdata('sessionfaculty')== 2){
            $nid = $this->input->post('nid');
            $fmail = $this->session->userdata('email');
           // print_r($fid);
            //die();
            $name = $this->session->userdata('firstname');
           
            $getemail = $this->Crs_model->studente_mail($nid);
            $data = $this->input->post();
            $notes = $this->input->post('facultynotes');
         foreach ($getemail as $row){
             $email = $row->email;
             //die();
         }
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

          $message = 'you have recieved notes from faculty'.'Dr'.' '.$name.$fmail;
      $this->load->library('email');
$this->email->initialize($config);
      $this->email->set_newline("\r\n");
      $this->email->from('crspxc199@gmail.com'); // change it to yours
      $this->email->to($email);// change it to yours
      $this->email->subject($message);
      $this->email->message($notes);
      if($this->email->send())
     {
      //echo 'Email sent.';
             unset($data['submit']);
           if($this->Crs_model->facultytostudent($data)){
        $this->session->set_flashdata('success', 'Notes Sent Successfully');
        redirect('faculty/viewnotes');
        } else {
            echo 'fail';   
        }
     }
     else
    {
     show_error($this->email->print_debugger());
    }
         ///////
         
        } else {
            $this->load->view('Faculty/facultyloginpage');
 }
    }
public function testpage2(){
       if($this->session->userdata('sessionfaculty')== 2){
         $this->load->view('Faculty/testpage2');
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
}
//
public function viewmeetupfaculty(){
       if($this->session->userdata('sessionfaculty')== 2){
         $this->load->view('Faculty/viewmeetupfaculty');
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
}
public function view_timeslotinactivejq(){
       if($this->session->userdata('sessionfaculty')== 2){
          $id = $this->session->userdata('fid');
                  
             $this->load->model("Crs_model");        
      $fetch_data = $this->Crs_model->get_data_timeslotinactive($id);   
       $data = array();  
           foreach($fetch_data as $row)  
           {  
              $sub_array = array();  
             // $sub_array[]=$row->timeid;
              $sub_array[]=$row->time;
               $sub_array[]=$row->day;
    $sub_array[] = '<a href="#" class="btn btn-primary btn-xs update" name="update" id="'.$row->timeid.'">Active</a>';
    
      $sub_array[] = '<a href="#" class="btn btn-danger btn-xs delete" name="delete" id="'.$row->timeid.'">Delete</a>';  
            
  
               
                // $subdata[]=$row->sid;
            //$subdata[]=$row->usertype;
            //$subdata[]=$row->passwordhash;
            
           
           //   $sub_array[] = '<button type="button" name="update" id="'.$row->courseid.'"  class="btn btn-warning btn-xs update">Update</button>';  
               
            $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Crs_model->get_data_timeslotinactive_jq($id),  
                "recordsFiltered"     =>     $this->Crs_model->get_filtered_meetinactivejq($id),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);
 
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
}

public function view_timeslotjq(){
       if($this->session->userdata('sessionfaculty')== 2){
          $id = $this->session->userdata('fid');
                  
             $this->load->model("Crs_model");        
      $fetch_data = $this->Crs_model->get_table_timeslot($id);   
       $data = array();  
           foreach($fetch_data as $row)  
           {  
              $sub_array = array();  
             // $sub_array[]=$row->timeid;
              $sub_array[]=$row->time;
               $sub_array[]=$row->day;
 
      $sub_array[] = '<a href="#" class="btn btn-danger btn-xs delete" name="delete" id="'.$row->timeid.'">Inactive</a>';  
            
  
               
                // $subdata[]=$row->sid;
            //$subdata[]=$row->usertype;
            //$subdata[]=$row->passwordhash;
            
           
           //   $sub_array[] = '<button type="button" name="update" id="'.$row->courseid.'"  class="btn btn-warning btn-xs update">Update</button>';  
               
            $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Crs_model->get_data_timeslotjq($id),  
                "recordsFiltered"     =>     $this->Crs_model->get_filtered_meetjq($id),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);
 
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
}
public function meetup_student(){
       if($this->session->userdata('sessionfaculty')== 2){
          $id = $this->session->userdata('fid');
                  
             $this->load->model("Crs_model");        
      $fetch_data = $this->Crs_model->get_table_meet();   
       $data = array();  
           foreach($fetch_data as $row)  
           {  
              $sub_array = array();  
              $sub_array[]=$row->Id;
               $sub_array[]=$row->sid;
                $sub_array[]=$row->firstname.$row->lastname;
               $sub_array[]=$row->date;
                $sub_array[]=$row->time;
$sub_array[] = '<a href="#" class="btn btn-danger btn-xs delete" name="delete" id="'.$row->Id.'">Delete</a>';  
               
        
  
               
                // $subdata[]=$row->sid;
            //$subdata[]=$row->usertype;
            //$subdata[]=$row->passwordhash;
            
           
           //   $sub_array[] = '<button type="button" name="update" id="'.$row->courseid.'"  class="btn btn-warning btn-xs update">Update</button>';  
               
            $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Crs_model->get_data_meet(),  
                "recordsFiltered"     =>     $this->Crs_model->get_filtered_meet(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);
 
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
}
public function viewnotes(){
       if($this->session->userdata('sessionfaculty')== 2){
         $this->load->view('Faculty/viewnotes');
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
}
public function viewappointmentcancelreport(){
       if($this->session->userdata('sessionfaculty')== 2){
         $this->load->view('Faculty/viewappointmentcancelreport');
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
}
    public function delete_appointment(){
       
        if($this->session->userdata('sessionfaculty')== 2){
            $name = $this->session->userdata('firstname');
             $fmail = $this->session->userdata('email');
            $id = $_POST["user_id"];
                        $meetinstructor = $this->Crs_model->get_date_time($id);
      foreach($meetinstructor as $row){
                $sid = $row->sid;
                 $fid = $row->fid;
                 $date = $row->date;
                  $time = $row->time;
             }
              $getatudentemail = $this->Crs_model->get_student_email($sid);
              foreach($getatudentemail as $row){
                 $email = $row->email;
                 
             }
         /*   * 
       */
             $day =    date('l', strtotime($date));
          //   $this->Crs_model->insert_slot_flag($fid,$day,$date,$time,$sid);
             if( $this->Crs_model->insert_slot_flag($fid,$day,$date,$time,$sid)){
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

          $message = 'Faculty'.' '.'Dr'.' '.$name.' '.'Email:'.$fmail.' '.'has Cancelled the Appointment'.' ';
      $this->load->library('email');
$this->email->initialize($config);
      $this->email->set_newline("\r\n");
      $this->email->from($fmail); // change it to yours
      $this->email->to($email);// change it to yours
      $this->email->subject($message);
      $this->email->send();
      //$this->email->message();
     // if($this->email->send())
     //{ 
      
     $output= 'success';
                     $day =    date('l', strtotime($date));
        $this->Crs_model->update_slot_flag($fid,$day,$time);
         $this->load->model('Crs_model');   
               // if(){;
         $this->load->model('Crs_model');    
        $this->Crs_model->delete_single_user($_POST["user_id"]);
       // echo $output;
                redirect('faculty/viewmeetupfaculty');  
                //}
          
    // }
        }
       
 } else {
     $this->load->view('Faculty/facultyloginpage');
    }
    
 }
 //inactive_timeslot
     public function inactive_timeslot(){
       
        if($this->session->userdata('sessionfaculty')== 2){
         $this->load->model('Crs_model');
        $this->Crs_model->inactive_single_timeslot($_POST["user_id"]);
        redirect('faculty/viewtimeslot');
 } else {
     $this->load->view('Faculty/facultyloginpage');
    }
    
 }
 

 public function active_timeslot(){
       
        if($this->session->userdata('sessionfaculty')== 2){
         $this->load->model('Crs_model');
        $this->Crs_model->active_single_timeslot($_POST["user_id"]);
        redirect('faculty/viewtimeslot');
 } else {
     $this->load->view('Faculty/facultyloginpage');
    }
    
 }
   public function delete_timeslot(){
       
        if($this->session->userdata('sessionfaculty')== 2){
         $this->load->model('Crs_model');
        $this->Crs_model->delete_single_timeslot($_POST["user_id"]);
        redirect('faculty/viewtimeslotinactive');
 } else {
     $this->load->view('Faculty/facultyloginpage');
    }
    
 }
 //viewtimeslotinactive
public function ajaxsearch()
    {
     if($this->session->userdata('sessionfaculty')== 2){
     if(is_null($this->input->get('id')))
    {
        $this->load->view('input');    
    }
    else
    {
         $id = $this->session->userdata('fid');
        $this->load->model('Crs_model');      
        $id_val = $this->input->get('id');        
        $datas['booktable'] = $this->Crs_model->search($id_val,$id);           
        $this->load->view('Faculty/testpage',$datas);
    }
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }
      
   
        
       
    }
    function fetch(){
  if($this->session->userdata('sessionfaculty')== 2){
 
  $output = '';
  $query = '';
  $this->load->model('Crs_model');
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
   //print_r($query);
  }
  $id = $this->session->userdata('fid');
 // print_r($id);
  $data = $this->Crs_model->fetch_data($query,$id);
  $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-sm">
      <tr>
       <th>Course Id</th>
       <th>Course Name</th>
       <th>Semester</th>
       <th>Year</th>


      </tr>
  ';
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
    $output .= '
      <tr style="color: white">
       <td>'.$row->courseid.'</td>
       <td>'.$row->coursename.'</td>
       <td>'.$row->semester.'</td>
       <td>'.$row->year.'</td>
    
         
 </tr>
    ';
   }
  }
  else
  {
   $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
  }
  $output .= '</table>';
  echo $output;
 
   
 } else {
     $this->load->view('Faculty/facultyloginpage');
 }     
    }
    
public function logout(){
    $this->session->sess_destroy();
      redirect('faculty/facultyloginpage');
}
/////////////////////////////////////
public function view_students(){
       if($this->session->userdata('sessionfaculty')== 2){
         $this->load->view('Faculty/view_students');
 } else {
     redirect('Faculty/facultyloginpage');
 }
}
 
}
/*
 * 
 */