<!DOCTYPE html>
<!--
Created by Pradeep Chandra Chitti
student id : 700672902
email: pxc29020@ucmo.edu
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Grades</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url('style/css/custom.css'); ?>"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
       <style>
             body {
 background-image: url("<?php echo base_url();?>images/university.jpg");
 background-size: cover;
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
  margin-left: 10%;
   
} 
table#table1 {
    width:70%; 
    margin-left:15%; 
    margin-right:15%;
  }
        </style>
    <body>
         <?php include_once 'studentheader.php';   ?>

      
        <div class="list-group">
   
 <a href="listofcourses" class="list-group-item"><span>List Of Courses</span></a>
    <a href="enrollcourses" class="list-group-item"><span>Enrollment</span></a>
    <a href="meetupwithfaculty" class="list-group-item"><span>Meet Professor</span></a>
    <a href="feedetails" class="list-group-item"><span>Fee Details</span></a>
    <a href="testpage" class="list-group-item"><span>Notes to Faculty</span></a>
   <a href="viewnotes" class="list-group-item"><span>View Notes</span></a>
    <a href="viewmeetupwithfaculty" class="list-group-item"><span>View Meeting</span></a>

 <a href="grades" class="list-group-item active"><span>Grades</span></a>


  </div>
     
     
                                           <?php  if($this->session->flashdata('error')){  ?>
<div class="alert alert-danger" style="width: 240px;"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; }elseif($this->session->flashdata('success')){ ?>
<div class="alert alert-success" style="width: 240px;"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } elseif($this->session->flashdata('warning')){ ?>
<div class="alert alert-warning" style="width: 240px;"><strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); echo '</div>'; } ?>       
       
      <?php
      $id = $this->session->userdata('sid');
      $faculty = $this->Crs_model->get_student_trancrips($id);
    // print_r($faculty);
         //echo $this->session->flashdata('email_sent'); 
         // print_r($faculty);
       //  echo form_open('Student/sentnotes'); 
         /*
          * logic to show the unoffcial transcrips
          * studentid
          * select the 
          * inthe registration table student will select the list of courses and semester year and dept
          * and grades
          */
      ?> 
    <br><br>
      <div class="container box">  
           <h3 align="center"><?php //echo $title; ?></h3><br />  
           <div class="table-responsive" align="center">  
           
                <table id="table1" class="table table-bordered table-hover">  
                     <thead bgcolor="#a50000">  
                          <tr>  
                               <th><font color="#fff">CourseId</th>  
                               <th><font color="#fff">Course Name</th>  
                               <th><font color="#fff">Term</th>  
                               <th><font color="#fff">Year</th>
                                <th><font color="#fff">Faculty Name</th> 
                               <th width="5%"><font color="#fff">Grade</th>  
                          </tr>  
                     </thead> 
         <tbody bgcolor="white">
          <?php   if($faculty) {  ?>
                <?php foreach($faculty as $rec){ ?>
                <tr>
                 <td><?php echo $rec['courseid'] ?></td>
                  <td><?php echo $rec['coursename']  ?></td>
                  <td><?php echo $rec['semester']?></td>
                  <td><?php echo $rec['year']  ?></td>
                 <td><?php echo $rec['firstname'].$rec['lastname']  ?></td>
<td><?php echo $rec['grade']  ?></td>
                </tr> 
                <?php } ?>
          <?php } ?>
          
       
            </tbody>
                </table>  
           </div>  
      </div>  
        
   </body>
	
</html>