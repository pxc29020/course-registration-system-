<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php if($this->session->userdata('sessionstudent') == 3){ ?>

<html>
    <head>
        
        <meta charset="UTF-8">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <title>About Student</title>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
            <style>
             body {
 background-image: url("<?php echo base_url();?>images/university.jpg");
 background-size: cover;
        }
  .center {
  text-align: center;
    margin-top: -100px; 
   
}
 .list-group {
     
     margin:auto;
     float:left;
     padding-top:20px;
    }
    .lead {
     
     margin:auto;
     left:0;
     right:0;
     padding-top:10%;
    }
   .test {
 width: 80%;
  margin-left: 15%;
   
} 
        </style>
    </head>
    <body>
     <?php include_once 'studentheader.php';   ?>

          <?php
          $id = $this->session->userdata('sid');
        $courses =  $this->Crs_model->viewcourse_enrolled($id);  
       // print_r();
          ?>
           <div class="list-group">
   
 <a href="listofcourses" class="list-group-item"><span>List Of Courses</span></a>
    <a href="enrollcourses" class="list-group-item"><span>Enrollment</span></a>
    <a href="meetupwithfaculty" class="list-group-item"><span>Meet Professor</span></a>
    <a href="feedetails" class="list-group-item"><span>Fee Details</span></a>
    <a href="testpage" class="list-group-item"><span>Notes to Faculty</span></a>
   <a href="viewnotes" class="list-group-item"><span>View Notes</span></a>
    <a href="viewmeetupwithfaculty" class="list-group-item"><span>View Meeting</span></a>

 <a href="grades" class="list-group-item"><span>Grades</span></a>


  </div>    
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
redirect('student/studentloginpage');
}

