<!DOCTYPE html>
<!--
Created by Pradeep Chandra Chitti
student id : 700672902
email: pxc29020@ucmo.edu
-->
<?php if($this->session->userdata('sessionstudent') == 3){ ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Student dashboard</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
       
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
.h2{
   margin-left: 80%;  
  
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
    <a class="hidden"href="pagination">email sending test</a>
 <a href="grades" class="list-group-item"><span>Grades</span></a>


  </div>
        <p class="h2" style="color: white;">Welcome <?php  print_r($this->session->userdata('lastname')); ?></p>
       <div class="test">
            <center class="table-responsive">
                                         <?php  if($this->session->flashdata('error')){  ?>
<div class="alert alert-danger" style="width: 240px;"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; }elseif($this->session->flashdata('success')){ ?>
<div class="alert alert-success" style="width: 240px;"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } elseif($this->session->flashdata('warning')){ ?>
<div class="alert alert-warning" style="width: 240px;"><strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); echo '</div>'; } ?>       
 <table class="table table-bordered table-hover">
                <br><br><br>
            <thead bgcolor="#a50000">
                <tr>
                    <th class="hidden"></th>
                   <th><font color="#fff">CourseId</th> 
                    <th class=""><font color="#fff">Course Name</th>  
              <th><font color="#fff">Year</th> 
              <th><font color="#fff">Semester</th> 
              <th><font color="#fff">Department</th> 
               <th><font color="#fff">Student</th> 
             <!--      <th><font color="#fff">Faculty Name</th> 
               <th>enroll</th>
                       <th>Modify details</th>
-->
 <th class="col-sm-2"><font color="#fff">Drop Course</th>
     
                </tr>
            </thead>
            <tbody bgcolor="white">
                <?php foreach($courses as $rec){ ?>
                <tr>
                    <td class="hidden"></td>
                 <td><?php echo $rec->courseid ?></td>
                  <td class=""><?php echo $rec->coursename  ?></td>
                  <td><?php echo $rec->year?></td>
                  <td><?php echo $rec->semester  ?></td>
                  <td><?php echo $rec->department ;
                  ?></td>
                  <td><?php echo $rec->sfname.$rec->sflname  ?></td>
<!-- <td><?php echo 'Dr'.' '.$rec->firstname.' '.$rec->lastname  ?></td>
 <!--<td class="hidden"><a  href="<?php echo base_url() . 'Admin/modifycoursedetails/' . $rec->courseid ?>" ><span class="glyphicon glyphicon glyphicon-refresh"></span>modify Information</a></td>
 
 <td class="hidden"><a  href="<?php echo base_url() . 'Student/enrollcourses/' . $rec->cid ?>" onclick="return confirm('are you sure ?')"><span class="glyphicon glyphicon glyphicon-danger"></span>Enroll Course</a></td>
        -->  
        <td class=""><a  href="<?php echo base_url() . 'Student/Drop_courses/' . $rec->registrationid ?>" onclick="return confirm('Are you sure to drop the course?')"><span class="glyphicon glyphicon glyphicon-danger"></span><button type="button" style="padding: 5px;" class="btn btn-danger">Drop</button></a></td>
   
                </tr> 
                <?php } ?>
                
          
       
            </tbody>
        </table>
        
     </center> 
    </div>
          <script>
  
         </script>
    </body>
</html>
<?php } else {
     redirect('student/studentloginpage');   
}