<!DOCTYPE html>
<!--
Created by Pradeep Chandra Chitti
student id : 700672902
email: pxc29020@ucmo.edu
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Notes To Faculty</title>
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
        </style>
    <body>
         <?php include_once 'studentheader.php';   ?>

      
        <div class="list-group">
   
 <a href="listofcourses" class="list-group-item"><span>List Of Courses</span></a>
    <a href="enrollcourses" class="list-group-item"><span>Enrollment</span></a>
    <a href="meetupwithfaculty" class="list-group-item"><span>Meet Professor</span></a>
    <a href="feedetails" class="list-group-item"><span>Fee Details</span></a>
    <a href="testpage" class="list-group-item active"><span>Notes to Faculty</span></a>
   <a href="viewnotes" class="list-group-item"><span>View Notes</span></a>
    <a href="viewmeetupwithfaculty" class="list-group-item"><span>View Meeting</span></a>
 
 <a href="grades" class="list-group-item"><span>Grades</span></a>


  </div>
     
        <div class="test">
        <center class="table-responsive">
                                           <?php  if($this->session->flashdata('error')){  ?>
<div class="alert alert-danger" style="width: 240px;"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; }elseif($this->session->flashdata('success')){ ?>
<div class="alert alert-success" style="width: 240px;"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } elseif($this->session->flashdata('warning')){ ?>
<div class="alert alert-warning" style="width: 240px;"><strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); echo '</div>'; } ?>       
       
      <?php
      $id = $this->session->userdata('sid');
      $faculty = $this->Crs_model->get_message_faculty($id);
     // print_r($id);
         echo $this->session->flashdata('email_sent'); 
         // print_r($faculty);
         echo form_open('Student/sentnotes1'); 
      ?> 
        
       <input type="hidden" name="sid" value="<?php echo $id;?>"/>
       <p class="h3" style="color:white;">Select faculty who you have Courses Enrolled</p><br><br>		
       <select name="fid" class="form-control"  style="width: 240px;" required="true">
           <option value="">Select Faculty</option>
             <?php 
   
          foreach ($faculty as $row){
              ?><option  value="<?php echo $row->fid; ?>"><?php echo 'Dr'.$row->firstname.$row->lastname.'  '.$row->courseid; ?></option>
             
             
          <?php } ?> 
       </select>
       <br><br>
   
       <textarea type="text" name="studentnotes" class="form-control" style="width: 240px;" rows="5" cols="17" ></textarea>
      <br> <button name="submit" class="btn btn-primary">Sent Notes</button> 
      <?php 
         echo form_close(); 
      ?> 
       </centre></div>
   </body>
	<script>
            var r = document.getElementById();
            </script>
</html>