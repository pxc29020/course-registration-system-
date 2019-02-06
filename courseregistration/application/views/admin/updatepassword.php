<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php if($this->session->userdata('sessionadmin') == 1){ ?>

<html>
    <head>
        
        <meta charset="UTF-8">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
       
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
       <title></title>
<style>
             body {
 background-image: url("<?php echo base_url();?>images/uni.jpg");
 background-size: cover;
        }
 .center {
  text-align: center;
    margin-top: -100px; 
   
}
 .list-group {
     
     margin:auto;
     float:left;
     padding-top:10px;
    }
    .lead {
     
     margin:auto;
     left:0;
     right:0;
     padding-top:10%;
    }
   .test {
 width: 80%;
  margin-left: 42%;
   
} 

        </style>
    </head>
    <body>
        <?php 
        //
        include_once 'adminheader.php';
        ?>
 
        <?php
     $t = $this->session->userdata();
 
     ?><br><br>

 <div class="list-group">
    <a href="listofcourses" class="list-group-item"><span>View List Of Courses</span></a>
  <a href="addcourses" class="list-group-item"><span>Add Course</span></a>
 <a href="addstudent" class="list-group-item"><span>Add Student</span></a>
    <a href="addfaculty" class="list-group-item"><span>Add Faculty</span></a>
  <a href="managestudentsjq" class="list-group-item"><span>Manage Students</span></a>
      <a href="manageinactivejq" class="list-group-item"><span>Manage inactive Students</span></a>
         <a href="managefacultyjq" class="list-group-item"><span>manage Faculty</span></a>
    <a href="manageinactivefacultyjq" class="list-group-item"><span>manage Faculty Inactive</span></a>
   <a href="viewregistrationjq" class="list-group-item"><span>View Registration</span></a>
 <a href="emailsending" class="list-group-item active"><span>Emailing Students Registered</span></a>
 <a href="viewfacultyclassesavailablity" class="list-group-item"><span>View Faculty Availability</span></a>

  </div>      
    <centre><div class="test">
       <?php  if($this->session->flashdata('success')){  ?>
<div style="width: 240px;" class="alert alert-success"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } elseif($this->session->flashdata('error')){  ?>
<div style="width: 240px;" class="alert alert-danger"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; } ?>
      
         <?php echo form_open('Admin/updatepassword_admin');?><br>
          <p class="h3" style="color: white;">Update Password</p><br>
    <input type="hidden" name="username" value="<?php print_r($this->session->userdata('username'));?>"/>
   <input placeholder="Old Password" class="form-control" style="width: 240px;" type="password" name="oldpassword" required="true"/>
   <br><input placeholder="New Password" class="form-control" style="width: 240px;" type="password" name="newpassword"  required="true"/>
   <br><button class="btn btn-primary" type="submit" name="submit">Update Password</button>
   
          <?php echo form_close()?>
        </div></centre>
    </body>
</html>
<?php } else {
redirect('admin/adminloginpage');
}

