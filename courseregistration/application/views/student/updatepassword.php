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
        <title>Update Password</title>
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
  margin-left: 11%;
   
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
        <p>  </p>
        <div class="test">
        <center class="table-responsive">
                                         <?php  if($this->session->flashdata('error')){  ?>
<div class="alert alert-danger" style="width: 240px;"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; }elseif($this->session->flashdata('success')){ ?>
<div class="alert alert-success" style="width: 240px;"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } elseif($this->session->flashdata('warning')){ ?>
<div class="alert alert-warning" style="width: 240px;"><strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); echo '</div>'; } ?>       
            
               <br><br>  <p class="h3" style="color: white;">Update Password</p>
             <?php echo form_open('Student/update_password');?><br><br>
    <input type="hidden" name="sid" value="<?php print_r($this->session->userdata('sid'));?>"/>
   <input placeholder="Old Password" class="form-control" style="width: 240px;" type="password" name="oldpassword" required="true"/>
   <br><input placeholder="New Password" class="form-control" style="width: 240px;" type="password" name="newpassword"  required="true"/>
   <br><button class="btn btn-primary" type="submit" name="submit">Update Password</button>
   
          <?php echo form_close()?>
     </center> 
    </div>
          <script>
  
         </script>
    </body>
</html>
<?php } else {
     redirect('student/studentloginpage');   
}