<!DOCTYPE html>
<!--
Created by Pradeep Chandra Chitti
student id : 700672902
email: pxc29020@ucmo.edu
-->
<?php if($this->session->userdata('sessionfaculty') == 2){ ?> 
<html>
    <head>
        <title>About Faculty</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <style>
       body {
 background-image: url("<?php echo base_url();?>images/uni.jpg");
 background-size: cover;
        }
    .list-group {
     
     margin:auto;
     float:left;
     padding-top:20px;
    }
    .test {
 width: 70%;
  margin-left: 20%;
   
} 
  </style>
    </head>
    <body>
   
      <?php 
     include_once 'facultyheader.php';      
      ?>
 
           <div class="list-group">
    <a href="viewnotes" class="list-group-item"><span>View Student Notes</span></a>
   <a href="viewnotes" class="list-group-item"><span>Reply notes</span></a>
    <a href="viewmeetupfaculty" class="list-group-item"><span>View Meeting</span></a>
  <a href="testpage" class="list-group-item"><span>Appointments of the day</span></a>
 <a href="gradestudents" class="list-group-item"><span>Grade Student</span></a>
   <a href="addtimeslot" class="list-group-item"><span>Add My Time Slot</span></a>
 <a href="viewtimeslot" class="list-group-item"><span>View My Time Slots</span></a>
  <a href="viewtimeslotinactive" class="list-group-item"><span>View My Inactive Time Slots</span></a>
  <a href="facultyclassesavail" class="list-group-item"><span>Add My Classes Availability</span></a>
      <a href="viewappointmentcancelreport" class="list-group-item"><span>View Appointment Cancel Reports</span></a>
  
           </div>
          <?php
          $id = $this->session->userdata('fid');
        $courses =  $this->Crs_model->my_faculty_courses($id);  
     //  print_r($courses);
        ?><br><br>
        <centre>
        <div class="test">    
   
            <p class="h2" style="color:white;">Welcome to Course Registration System</p>
            <p style="color:white;">
Dear Friends and Colleagues,
            </p><p style="color:white;">
                Welcome to Course Registration System and thank you for visiting our Web site.<br>
                We hope that it provides the information that you are seeking and want to hear from you<br>
                if you have suggestions about how we can make it even more useful to you.</p>

            <p style="color:white;">
                Our Motive<br>
   To develop a user friendly application which helps the Instructor, Student and Administrator.<br>
   It helps Students : <br>
   • list of courses and what he can able to learn from that course. <br>
   • enroll the classes.<br>
   • sent notes to faculty both to faculty profile and email. <br>
   • meet the faculty depends on the availability.<br>
   • view their grades.<br>
   • see the fee details depends on the courses registered in the semester.
   • Update Profile and Password.<br><br>
   It helps Faculty:<br>
   • View the students.<br>
   • See Appointments of the day.<br>
   • Reply notes to student it will be sent to both student profile and his email.<br>
   • Grade Student.<br>
   • Update Profile and Password.<br>
   <br> 
            </p><p style="color:white;">
   Founder :<br>
   This was developed by: Pradeep Chandra Chitti<br>
   email: pxc29020@ucmo.edu<br>
   University of Central Missouri<br>
   student id : 700672902<br>
   phone number : +1-571-419-9244<br>
   Contact Us<br>
   You can contact me at<br>
   <a href="mailto:pxc29020@ucmo.edu">Pradeep Chandra Chitti</a><br>
   1101 NW Innovation Parkway,<br>
   Lee's Summit,<br>
   MO 64086.<br>

    </p>
            
</div></centre>


    </body>
</html>
<?php } else {
     redirect('faculty/facultyloginpage');   
}