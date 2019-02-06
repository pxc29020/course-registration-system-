<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
 <meta charset="UTF-8">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
       
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
       <title>Add Faculty</title>
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
     padding-top:60px;
    }
    .lead {
     
     margin:auto;
     left:0;
     right:0;
     padding-top:10%;
    }
   .test {
 width: 80%;
  margin-left: 9%;
   
} 
</style>
    </head>
    <body>
      <?php 
        //
        include_once 'adminheader.php';
        ?>
    <div class="list-group">
    <a href="listofcourses" class="list-group-item"><span>View List Of Courses</span></a>
  <a href="addcourses" class="list-group-item"><span>Add Course</span></a>
      <a href="assignfaculty" class="list-group-item"><span>Assign Faculty</span></a>

 <a href="addstudent" class="list-group-item"><span>Add Student</span></a>
    <a href="addfaculty" class="list-group-item active"><span>Add Faculty</span></a>
  <a href="managestudentsjq" class="list-group-item"><span>Manage Students</span></a>
      <a href="manageinactivejq" class="list-group-item"><span>Manage inactive Students</span></a>
         <a href="managefacultyjq" class="list-group-item"><span>manage Faculty</span></a>
    <a href="manageinactivefacultyjq" class="list-group-item"><span>manage Faculty Inactive</span></a>
   <a href="viewregistrationjq" class="list-group-item"><span>View Registration</span></a>
 <a href="emailsending" class="list-group-item"><span>Emailing Students Registered</span></a>

  </div>  
          <div class="test">
        <center class="table-responsive">
                                           <?php  if($this->session->flashdata('error')){  ?>
<div class="alert alert-danger" style="width: 240px;"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; }elseif($this->session->flashdata('success')){ ?>
<div class="alert alert-success" style="width: 240px;"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } elseif($this->session->flashdata('warning')){ ?>
<div class="alert alert-warning" style="width: 240px;"><strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); echo '</div>'; } ?>       
            
            <?php echo form_open('Admin/Add_faculty');?>
    <br><p class="h3" style="color: white;">Add Faculty</p><br>
  <input type="text" class="form-control" style="width: 240px;" name="firstname" placeholder="Firstname" pattern="[A-Za-z]{1,}" required="true"/>
         <br><br>
            <input class="form-control" style="width: 240px;" type="text" name="lastname" placeholder="Lastname" pattern="[A-Za-z]{1,}" required="true"/>  
    <br><br>
  <input class="form-control" style="width: 240px;" type="text" name="username" placeholder="Username" pattern="[a-z]{1,15}"
        title="Username should only contain lowercase letters. e.g. john" required="true"/>
         <br><br>
        
           <input class="form-control" style="width: 240px;" type="text" name="password" placeholder="Password" required="true"/>
      <br><br>
      <p class="h5" class="form-control" style="color:white"> Gender:</p>
       <p style="color:white"><input style="color:white" class="custom-control-input"  type="radio" name="gender" required="true"
<?php if (isset($gender) && $gender=="Female") echo "checked";?>
value="Female">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="Male") echo "checked";?>
value="Male">Male
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="Other") echo "checked";?>
       value="Other" >Other</p> <br><br>
<input class="form-control" style="width: 240px;" type="email" name="email" placeholder="Email" pattern=".+ucmo.edu" size="30" required/>  <br><br>
 <input class="form-control" style="width: 240px;" type="tel" id="phone" name="phone"
       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
       placeholder="xxx-xxx-xxxx" required>
       <br><br>
   <textarea class="form-control" style="width: 240px;" name="address" rows="3" cols="22" placeholder="Address" required="true"></textarea>
      <br><br>
      <button type="submit" class="btn btn-primary" name="submit">Add Faculty</button>
        <?php echo form_close(); ?></centre></div>

    </body>
</html>
