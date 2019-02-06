<?php

/*
  Created By Pradeep Chandra Chitti
  Student ID : 700672902
  Email: PXC29020@UCMO.EDU
  ADVANCE SYSTEM PROJECT
 */

class Student extends CI_Controller {

    public function studentloginpage() {
        if($this->session->userdata('sessionadmin') == 1){
     redirect('Admin/admindashboard');   
 }elseif($this->session->userdata('sessionstudent') == 3){
     redirect('Student/studentdashboard');   
 }elseif($this->session->userdata('sessionfaculty') == 2){
     redirect('faculty/facultydashboard');   
 }elseif ($this->session->userdata('sessionstudent') == '') {
                $this->load->view('student/studentloginpage');
            }
/*
        if ($this->session->userdata('sessionstudent') == 3) {
            redirect('Student/studentdashboard');
        } else {
            if ($this->session->userdata('sessionstudent') == '') {
                $this->load->view('student/studentloginpage');
            }
        }
 * 
 */
    }
public function update_password(){
   if($this->session->userdata('sessionstudent')==3){
         //start from here need to take the value from segment and 
        $id = $this->input->post('sid');
        $oldpass = md5($this->input->post('oldpassword'));
        $newpass = md5($this->input->post('newpassword'));
       // print_r($newpass);
       // die();
        $checkpass = $this->Crs_model->checkstudentpasswordjq($id,$oldpass);
       // print_r($checkpass);
       // die();
        if($checkpass){
           if($this->Crs_model->updatestudent_password($id,$newpass)){
               //here success message keep it later
           //try to write if condition here
                 $this->session->set_flashdata('success', ' Password Changed Successfully ');
                        
               redirect('student/updatepassword');
           } 
           
        } else {
           $this->session->set_flashdata('error', ' invalid password  ');
                           
            redirect('student/updatepassword');
        }
 } else {
     $this->load->view('student/studentloginpage');
} }
    public function studentdashboard() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->view('student/studentdashboard');
        } else {
            $this->load->view('student/studentloginpage');
        }
    }
       public function studentabout() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->view('student/studentabout');
        } else {
            $this->load->view('student/studentloginpage');
        }
    }
     public function updateprofile() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->view('student/updateprofile');
        } else {
            $this->load->view('student/studentloginpage');
        }
    }
    //
    //sending email test

    public function update_profilejq(){
      if ($this->session->userdata('sessionstudent') == 3) {
         //start from here need to take the value from segment and 
       $id = $this->input->post('sid');
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
   
      if($this->Crs_model->update_studentjq($id,$data)){
         $this->session->set_flashdata('success', ' Updated Successfully');
                    //keep the sesion message later
          redirect('Student/updateprofile');
      } else {
      $this->session->set_flashdata('error', ' invalid details');
                    
      }
       
 } else {
     $this->load->view('student/studentloginpage');
 } 
}
    public function updatepassword() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->view('student/updatepassword');
        } else {
            $this->load->view('student/studentloginpage');
        }
    }
    public function listofcourses() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->view('student/listofcourses');
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function pagination() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->view('student/pagination');
        } else {
            $this->load->view('student/studentloginpage');
        }
    }
     public function sentnotes1() {


        if ($this->session->userdata('sessionstudent') == 3) {
            $fid = $this->input->post('fid');
            $smail = $this->session->userdata('email');
           // print_r($fid);
            //die();
            $getemail = $this->Crs_model->e_mail($fid);
            $data = $this->input->post();
            $notes = $this->input->post('studentnotes');
         foreach ($getemail as $row){
             $email = $row['email'];
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

          $message = 'you have recieved notes from student'.' '.$smail;
      $this->load->library('email');
$this->email->initialize($config);
      $this->email->set_newline("\r\n");
      $this->email->from($smail); // change it to yours
      $this->email->to($email);// change it to yours
      $this->email->subject($message);
      $this->email->message($notes);
      if($this->email->send())
     {
      //echo 'Email sent.';
             unset($data['submit']);
            if ($this->Crs_model->studenttofaculty($data)) {
                $this->session->set_flashdata('success', 'Notes Sent Successfully');
                redirect('Student/testpage');
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
            $this->load->view('student/studentloginpage');
        }
    }

           function send_mail()
{
               
    $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'crspxc1994@gmail.com', // change it to yours
  'smtp_pass' => 'Avschpc140!', // change it to yours
  'mailtype' => 'html',
      'priority' => 5,  
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);

        $message = '';
      $this->load->library('email');
$this->email->initialize($config);
      $this->email->set_newline("\r\n");
      $this->email->from('crspxc199@gmail.com'); // change it to yours
      $this->email->to('chittideepu@gmail.com');// change it to yours
      $this->email->subject('test');
      $this->email->message($message);
      if($this->email->send())
     {
      echo 'Email sent.';
     }
     else
    {
     show_error($this->email->print_debugger());
    }

}
      public function grades() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->view('student/grades');
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function enrollcourses() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->view('student/enrollcourses');
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function meetupwithfaculty() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->view('student/meetupwithfaculty');
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function fetch_sem() {
        if ($this->session->userdata('sessionstudent') == 3) {
            //if($this->input->post('semester'))
            //{
            $yr = $this->input->post('year');
            $semValue = $this->input->post('semester');
            $uid = $this->input->post('sid');
            //echo $yr;;
            // $this->load->model('Crs_model');
            $courses = $this->Crs_model->fetch_semi($yr, $semValue, $uid);
            //}
            echo json_encode($courses);
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

//
  

    public function fetch_timeslot() {
        if ($this->session->userdata('sessionstudent') == 3) {
            //if($this->input->post('semester'))
            //{
            $day = $this->input->post('day');
            $fid = $this->input->post('fid');
            $sid = $this->input->post('sid');
            //echo $yr;;
            // $this->load->model('Crs_model');
            $time = $this->Crs_model->fetch_timeslot($day, $fid, $sid);
            //}
            echo json_encode($time);
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function fetch_faculty() {
        if ($this->session->userdata('sessionstudent') == 3) {
            //if($this->input->post('semester'))
            //{
            $semester=$this->input->post('semester');
             $section=$this->input->post('section');
            $course = $this->input->post('coursename');
            $year= $this->input->post('year');
            //echo $yr;;
            // $this->load->model('Crs_model');
            $faculty = $this->Crs_model->fetch_faculty($course,$semester,$year,$section);
            //}
            echo json_encode($faculty);
        } else {
            $this->load->view('student/studentloginpage');
        }
    }
    public function fetch_courses() {
        if ($this->session->userdata('sessionstudent') == 3) {
            //if($this->input->post('semester'))
            //{
            $semester=$this->input->post('semester');
           $section = $this->input->post('section');
            $year= $this->input->post('year');
            $time= $this->input->post('time');
            //echo $yr;;
            // $this->load->model('Crs_model');
            $faculty = $this->Crs_model->fetchcoursesc($year,$semester,$section,$time);
            //}
            echo json_encode($faculty);
        } else {
            $this->load->view('student/studentloginpage');
        }
    }
    public function testpage() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->view('student/testpage');
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function viewnotes() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->view('student/viewnotes');
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function see_notes() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $output = '';
            $query = '';
            $this->load->model('Crs_model');
            if ($this->input->post('query')) {
                $query = $this->input->post('query');
                //print_r($query);
            }
            $id = $this->session->userdata('sid');
            // print_r($id);
            $data = $this->Crs_model->fetch_notes_student($query, $id);

            $output .= '
  <div  class="table-responsive width: 90%;margin-left: 11%;">
     <table style="color:#9d9d9d;" class="table table-bordered">
      <tr>
       <th width= "10px">Note Id</th>
       <th>Student Note</th>
       <th>Faculty Name</th>
       <th>Faculty Notes</th>


      </tr>
  ';
            if ($data->num_rows() > 0) {
                foreach ($data->result() as $row) {
                    $output .= '
      <tr style="color:whitesmoke;">
       <td>' . $row->nid . '</td>
       <td>' . $row->studentnotes . '</td>
       <td>' . $row->firstname . $row->lastname . '</td>      
       <td>' . $row->facultynotes . '</td>

</tr>
    ';
                }
            } else {
                $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
            }
            $output .= '</table>';
            echo $output;
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function sentnotes() {


        if ($this->session->userdata('sessionstudent') == 3) {
            $data = $this->input->post();
            unset($data['submit']);
            if ($this->Crs_model->studenttofaculty($data)) {
                $this->session->set_flashdata('success', 'Notes Sent Successfully');
                redirect('Student/testpage');
            } else {
                echo 'fail';
            }
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function student_enroll() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $cid = $this->input->post('coursename');
            $email = $this->session->userdata('email');
            $time = $this->input->post('timings');
            $dataa = $this->input->post();
                    $getcountval = $this->Crs_model->get_coursecount($cid);
             // print_r($getcountval);
             // die();
             foreach($getcountval as $row){
                 $count = $row['count'];
                 $courseid = $row['courseid'];
                 $classsize = $row['classsize'];
                 $fid = $row['fid'];
             }
             
             date_default_timezone_set('America/New_York');
                $data = array(
                'year' => $this->input->post('year'),
                'semester' => $this->input->post('semester'),
                'cid' => $this->input->post('coursename'),
                'sid' => $this->input->post('sid'),
               'date' => date('y-m-d'),
                    'courseid'=>$courseid,
                    'fid' => $fid,
                      //  'Mailid' => $email
                        
            );
                 $sid = $this->input->post('sid');
             $year = $this->input->post('year');
                $semester = $this->input->post('semester');
                $checkcourse = $this->Crs_model->get_course_q($sid,$courseid,$year,$semester);
             //print_r($count);
            // die();
    /*   $classsize =   print_r($classsize);
          $count =  print_r($count);
     * 
     */
            $checkenrollvalidation= $this->Crs_model->check_no_registeredjq($year,$semester,$courseid);
                               if( count($checkenrollvalidation) >=1){ 
         
//class size - count  remaining in the courses
        if ($classsize > $count) { 
            //flag become 0 in courses
                  $check = $this->Crs_model->checkenroll($data);
                 $checkmultienroll = $this->Crs_model->checkmultipleenroll($data);
                   // print_r($checkenrollvalidation);
                    //die();
        
     
 
             if ((count($checkmultienroll) >= 3)) {
                 $this->session->set_flashdata('error', ' You are only allowed to enroll three courses ');
                        redirect('Student/studentdashboard');
             }else{
                if($checkcourse){  
                      $this->session->set_flashdata('error', ' already registered for the course in other section');
                    redirect('Student/enrollcourses');
                    }else {
                  if ($check) {//
                    $this->session->set_flashdata('error', ' already registered the course');
                    redirect('Student/enrollcourses');
                } else {
                    
                 if ($this->Crs_model->student_register($data,$cid,$count)) {
                     $this->Crs_model->update_count($cid);
                            $this->session->set_flashdata('success', ' Enrolled' .' '. 'successfully');
                            redirect('Student/enrollcourses');
                        } else {
                            echo 'fail';
                } 
                
             }  }
                        
        }
                
        }   }        else {    $this->session->set_flashdata('error', ' Please Re-check the information selected ');
                        redirect('Student/enrollcourses');
          
        } 
           /* elseif ($classsize > $count) {  
            //registration condition
                        $check = $this->Crs_model->checkenroll($data);
               if ($check) {
                    $this->session->set_flashdata('error', ' already registered the course');
                    redirect('Student/enrollcourses');
                } else {
                 if ($this->Crs_model->student_register($data,$cid,$count)) {
                            $this->session->set_flashdata('success', ' Enrolled' .' '. 'successfully');
                            redirect('Student/enrollcourses');
                        } else {
                            echo 'fail';
                } }
             }*/
          
          
           
                //first validation check enrollment

            //print_r($dataa); old requirement code change it to new requirement
         //   die();
         //  
            //get the courseid depends on coursename
            /*
        from input we are getting cid sid section
             * we just need cid and sid sem and year for registration
          also the current date try to get current date stamp using php
           
             */
          /*  $getcrsname = $this->Crs_model->get_crs_fid();
            $email = $this->session->userdata('email');
            $courseid = $this->input->post('coursename');
            $data = array(
                'year' => $this->input->post('year'),
                'semester' => $this->input->post('semester'),
                'cid' => $this->input->post('coursename'),
                'sid' => $this->input->post('sid'),
                'fid' => $this->input->post('fid'),
            );
            //$dataa = array(
              $year = $this->input->post('year');
                $semester = $this->input->post('semester');
                $courseid = $this->input->post('coursename');  
                
           // );
            //check the enroll validation like check the enrollment depends on the data selected
            //like if student wants to register for 2020 and spring with paticular courseid which is not available should show error
            //
            $checkenrollvalidation= $this->Crs_model->check_no_registeredjq($year,$semester,$courseid);
         
            //print_r($data);
            //miss conception course id is written as coursename remember to change it later
            //check wheather studentid semester year repeatation or select count > 4 it should through error
            //try to check in userinterface level it self in jquery in select
            // $year = $this->input->post('year'); 
            // $semester = $this->input->post('semester'); 
            // $sid = $this->input->post('sid');//checkmultipleenroll
            //check the limit of the total no of students
            $checkcount = $this->Crs_model->check_no_registered($courseid);


            $check = $this->Crs_model->checkenroll($data);  //check wheather he has registered the same course or not
            $checkmultienroll = $this->Crs_model->checkmultipleenroll($data);
           //   if ((count($checkmultienroll) >= 3)) {
             //print_r($check);
            // die();
            //print(count($checkmultienroll));
            //die();
            if (sizeof($checkcount) < 20 & count($checkenrollvalidation) >=1) {//this is condition for the limiting the registration for the class
                if ($check) {
                    $this->session->set_flashdata('error', ' already registered the course');
                    redirect('Student/enrollcourses');
                } else {
                    if ((count($checkmultienroll) >= 3)) {
                        //echo 'fail';    
                        $this->session->set_flashdata('error', ' You are only allowed to enroll three courses ');
                        redirect('Student/studentdashboard');
                    } else {
                    
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
$message=  'The Email is Regarding Registration Notification From Course Registration System';
        $notes = 'you have registered for the course'.' '.$courseid;
      $this->load->library('email');
$this->email->initialize($config);
      $this->email->set_newline("\r\n");
      $this->email->from($email); // change it to yours
      $this->email->to($email);// change it to yours
      $this->email->subject($message);
      $this->email->message($notes);
      if($this->email->send())
     { 
                         
                     
                        //if($this->Crs_model->student_register($data)){   }
                        if ($this->Crs_model->student_register($data)) {
                            $this->session->set_flashdata('success', ' Enrolled' .' '. $courseid .' '. 'successfully');
                            redirect('Student/enrollcourses');
                        } else {
                            echo 'fail';
                        }
     } else{
                        
                        echo 'fail';
                      }
                    }
                }
            } else {
                $this->session->set_flashdata('error', ' Course not available ');
                redirect('Student/enrollcourses');
            }//else end for the over limit of course reg
           * 
           */
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function Drop_courses() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $id = $this->uri->segment(3);
            $email = $this->session->userdata('email');
          $date =   date("Y-m-d");
            $getcourse = $this->Crs_model->get_coursejq($id);
            foreach ($getcourse as $row) {
                $cid = $row['cid'];
                $courseid = $row['courseid'];
              //  $date = $row['date'];
            }
            $getstartdate = $this->Crs_model->get_startdatejq($cid);
            // $getcourse = $this->Crs_model->get_coursename($id);
            foreach ($getstartdate as $row) {
                $startdate = $row['startdate'];
                //$courseid = $row['courseid'];
                
            }
           // $resultdate = 
              
           // $diff = $date - $startdate;
         // $diff = $date->diff($startdate);
          
          
            //abs is absolute value
                   $date1 = date_create($startdate);
$date2 = date_create($date);

            if($date1>$date2){ 
                //if start date is > today date
                //student can drop the course
             $diff=date_diff($date1,$date2);   
                 //print_r($diff->days);
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
$message=  'The Email is Regarding Registration Notification From Course Registration System';
        $notes = 'You have dropped the course'.' '.$courseid;
      $this->load->library('email');
$this->email->initialize($config);
      $this->email->set_newline("\r\n");
      $this->email->from($email); // change it to yours
      $this->email->to($email);// change it to yours
      $this->email->subject($message);
      $this->email->message($notes);
      if($this->email->send())
     { 
           
            if ($this->Crs_model->Drop_courses($id)) {
                  $this->Crs_model->update_countjq($cid);
                    
                $this->session->set_flashdata('success', ' You have successfully Dropped the Course ');

                redirect('Student/studentdashboard');
            } else {
                echo 'fail';
            }   
     }else{ echo 'fail';   } 
            
//print_r($months);
              
            } else {
                //if start date is < today date 
                //how many days less
                //if it is greater than 7 days he cannot drop
                 $diff=date_diff($date1,$date2); 
                 $days = $diff->days;
                 // print_r();
                      if($days > 7){
   $this->session->set_flashdata('error', ' You cannot Drop One week after the start date of Course'); 
     redirect('Student/studentdashboard');
                } else {
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
$message=  'The Email is Regarding Registration Notification From Course Registration System';
        $notes = 'You have dropped the course'.' '.$courseid;
      $this->load->library('email');
$this->email->initialize($config);
      $this->email->set_newline("\r\n");
      $this->email->from($email); // change it to yours
      $this->email->to($email);// change it to yours
      $this->email->subject($message);
      $this->email->message($notes);
      if($this->email->send())
     { 
           
            if ($this->Crs_model->Drop_courses($id)) {
                  $this->Crs_model->update_countjq($cid);
                    
                $this->session->set_flashdata('success', ' You have successfully Dropped the Course ');

                redirect('Student/studentdashboard');
            } else {
                echo 'fail';
            }   
     }else{ echo 'fail';   } 
                    
                } 
                     
             

   


  }
  


           
 
      } else {
            $this->load->view('student/studentloginpage');
        }
    }

//

    public function feedetails() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->view('student/feedetails');
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function feedetailsval() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->view('student/feedetailsvalue');
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function nocoursesavi() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->view('student/nocoursesavi');
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function fee_deyails2() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->view('student/fee_details2');
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function fee_deyails1() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->view('student/fee_details1');
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function fee_details() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $data = $this->input->post();
            $year = $this->input->post('year');
            $semester = $this->input->post('semester');
            $id = $this->input->post('sid');
            // print_r($data);
            // die();
            //$
            $check = $this->Crs_model->details_count($year, $semester, $id);
            $t = count($check);
            //  print_r($check);
            //die();
            if ((count($check) == 2)) {
                redirect('student/feedetailsval', $t);
            } elseif ((count($check) == 3)) {
                redirect('student/fee_deyails2', $t);
            } elseif ((count($check) == 1)) {
                redirect('student/fee_deyails1', $t);
            } elseif ((count($check) == 0)) {
                redirect('student/nocoursesavi', $t);
            }
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function Drop_meet() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $id = $this->uri->segment(3);
            $smail = $this->session->userdata('email');
            $name = $this->session->userdata('firstname');
                    $meetinstructor = $this->Crs_model->get_date_time($id);
       $getfacultyemail = $this->Crs_model->get_faculty_email($id);
            foreach($meetinstructor as $row){
                 $fid = $row->fid;
                 $date = $row->date;
                  $time = $row->time;
             }
             $getfacultyemail = $this->Crs_model->get_faculty_email($fid);
              foreach($getfacultyemail as $row){
                 $email = $row->email;
                 
             }
        $day =    date('l', strtotime($date));
       // print_r($day);
           //  die();
        $this->Crs_model->update_slot_flag($fid,$day,$time);
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

          $message = 'Student'.' '.$name.' '.'Email:'.$smail.' '.'has Cancelled the Appointment'.' ';
      $this->load->library('email');
$this->email->initialize($config);
      $this->email->set_newline("\r\n");
      $this->email->from($smail); // change it to yours
      $this->email->to($email);// change it to yours
      $this->email->subject($message);
      $this->email->message($notes);
      if($this->email->send())
     {
       if ($this->Crs_model->Drop_meet($id)) {
     $this->session->set_flashdata('success', 'Appointment Successfully Cancelled');
                   
               redirect('Student/studentdashboard');
            } else {
                echo 'fail';
            }    
          
          
     }
           
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function meetinstructor() {
        if ($this->session->userdata('sessionstudent') == 3) {
            // = $this->input->post();
            // print_r($data);
            
            $fid = $this->input->post('fid');
            $sid = $this->input->post('sid');
            $date = $this->input->post('date');
            $time = $this->input->post('time');
            $day = $this->input->post('day');
            //unset($data['submit']);
            if ($time) {
                $data = array(
                    'fid' => $fid,
                    'sid' => $sid,
                    'date' => $date,
                    'time' => $time,
                );
                //
                $checkslotvalidation = $this->Crs_model->checkslotavl($fid,$day,$time);
                $check = $this->Crs_model->checkmeetup($data);
                  if(count($checkslotvalidation) >=1){
               
                //print_r($check); 
              if ($check) {
                    $this->session->set_flashdata('error', 'appointment already booked');
                    redirect('Student/meetupwithfaculty');
                } else {
                   
                    if ($this->Crs_model->meeting($data)) {
                        //update_slot($cid)
                        $this->Crs_model->update_slot($fid,$day,$time);
                        $this->session->set_flashdata('success', ' appointment successfully booked ');
                        redirect('Student/meetupwithfaculty');
                    } else {
                        echo 'fail';
                    }
                    
                       
           
                }
                }else{   $this->session->set_flashdata('warning', 'Please check information selected once no slots at this date' .' '. $date.' '.' you have selected'); redirect('Student/meetupwithfaculty'); }
            } else {
                $this->session->set_flashdata('error', ' No Slots availble at this time ');
                redirect('Student/meetupwithfaculty');
            }
        } else {
            $this->load->view('student/studentloginpage');
        }
    }

    public function viewmeetupwithfaculty() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->view('Student/viewmeetupwithfaculty');
        } else {
            $this->load->view('student/studentloginpage');
        }
    }
public function student_view_notes(){
         if ($this->session->userdata('sessionstudent') == 3) {
             $id= $this->session->userdata('sid');
     $this->load->model("Crs_model");
        $findcourse = $this->Crs_model->getnotes_table($id);
        $data = array();
        foreach ($findcourse as $row) {
            $sub_array = array();
            $sub_array[] = $row->nid;
            $sub_array[] = $row->studentnotes;
            $sub_array[] = $row->facultynotes;
            $sub_array[] = 'Dr' . $row->firstname . '<br>' . $row->lastname;
            $sub_array[] = $row->datetime;
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->Crs_model->get_notes_student($id),
            "recordsFiltered" => $this->Crs_model->get_filtered_notes($id),
            "data" => $data
        );
        echo json_encode($output);        
         } else {
           redirect('student/studentloginpage');    
         }
}
    public function find_course() {
        if ($this->session->userdata('sessionstudent') == 3) {
            $this->load->model("Crs_model");
        $findcourse = $this->Crs_model->get_table();
        $data = array();
        foreach ($findcourse as $row) {
            $sub_array = array();
            $sub_array[] = $row->courseid;
            $sub_array[] = $row->coursename;
             $sub_array[] = $row->time;
            $sub_array[] = $row->section;
            $sub_array[] = $row->semester;
            $sub_array[] = $row->year;
          //  $sub_array[] = 'Dr'.' ' . $row->firstname . '<br>' . $row->lastname;
          //  $sub_array[] = $row->fid;
            $sub_array[] = $row->startdate;
        $sub_array[] = '<a href="#" class="btn btn-primary btn-xs overview" name="overview" id="'.$row->courseid.'">Overview</a>';  
          
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
            redirect('student/studentloginpage');  
        }
    }
//get_table() get_data_courses() get_filtered_data()
    public function courseoverview(){
   if ($this->session->userdata('sessionstudent') == 3) {
      $this->load->view('student/courseoverview'); 
   } else {
       redirect('Student/studentloginpage'); 
   }   
    }
    public  function fetch_single_user()  
      {  
  $output = array();  
           $this->load->model("Crs_model");  
           $data = $this->Crs_model->fetch_single_user($_POST["user_id"]);  
           foreach($data as $row)  
           {  
         
                   $output['test'] = $row->aboutcourse;
                 
           }  
           echo json_encode($output);  
      }  
    public function logout() {
        $this->session->sess_destroy();
        redirect('student/studentloginpage');
    }

}
