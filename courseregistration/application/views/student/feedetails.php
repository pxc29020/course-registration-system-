<!DOCTYPE html>
<!--
Created by Pradeep Chandra Chitti
student id : 700672902
email: pxc29020@ucmo.edu
-->
<html>
    <head>
        <meta charset="UTF-8">
 <title>Fee Details</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url('style/css/custom.css'); ?>"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <style>
             html,body {
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
    <a href="feedetails" class="list-group-item active"><span>Fee Details</span></a>
    <a href="testpage" class="list-group-item"><span>Notes to Faculty</span></a>
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
       <br>   
        <?php
       /*create the structure of the registration table
        * steps to complete this
        * in controller there should be on function which checks the count of sid if the count of the sid 
        *should be less than 4
        * input box hidden studentid
        * 
        * 2 select box of semester 
        * 3 select box of courses available
        * 4 select box of faculty
        * 5.submit---on click submit form will sent all the data to registration table insert
        * all these will be in the form and the values should be produced dynamic dependently
        */
        $t=$this->Crs_model->t();
        $id = $this->session->userdata('sid');
        $ye = $this->Crs_model->joincourses();
      //print_r($t);
     //  print_r($id);
       $id = $this->session->userdata('sid');
$reg = $this->Crs_model->registrationtable($id);
//print_r($reg);
?><br><p class="h3" style="color: white;">Fee Details</p><br>
       <?php echo form_open('Student/fee_details'); ?>
         <select name="year" class="form-control" style="width: 240px;" id="year" required="true">
             <option value="">Select Year</option>
             <?php 
          $year = $this->Crs_model->year();
          foreach ($year as $row){
              ?><option value="<?php echo $row->year; ?>"><?php echo $row->year; ?></option>
             
             
          <?php } ?>
         </select>     <br>  
         <select name="semester" class="form-control" style="width: 240px;" id="semester" required="true">
             <option value="">Select Term</option>
             <?php 
          $sem = $this->Crs_model->semester();
          foreach ($sem as $row){
              ?><option value="<?php echo $row['semester']; ?>"><?php echo $row['semester']; ?></option>
             
             
          <?php } ?>
         </select> <br> 
         <input type="hidden" value="<?php echo $id ?>" id="sid" name="sid" />
    
     
         <button class="btn btn-primary" name="submit">Get Fee Details</button>
         <?php echo form_close() ?>
   
    </body>
</html>
