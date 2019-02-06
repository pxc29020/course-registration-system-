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
       <title>Add Student</title>
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
 <a href="addstudent" class="list-group-item active"><span>Add Student</span></a>
    <a href="addfaculty" class="list-group-item"><span>Add Faculty</span></a>
  <a href="managestudentsjq" class="list-group-item"><span>Manage Students</span></a>
      <a href="manageinactivejq" class="list-group-item"><span>Manage inactive Students</span></a>
         <a href="managefacultyjq" class="list-group-item"><span>manage Faculty</span></a>
    <a href="manageinactivefacultyjq" class="list-group-item"><span>manage Faculty Inactive</span></a>
   <a href="viewregistrationjq" class="list-group-item"><span>View Registration</span></a>
 <a href="emailsending" class="list-group-item"><span>Emailing Students Registered</span></a>
 <a href="viewfacultyclassesavailablity" class="list-group-item"><span>View Faculty Availability</span></a>

  </div>  
         <div class="test">
        <center class="table-responsive">
        <table><tr>
      
        
                <?php echo form_open('Admin/Add_student');?>
            <tr><br><p class="h3" style="color: white;">Add Student</p><br></tr>
            <tr><input class="form-control" style="width: 240px;" type="text" name="Firstname" placeholder="firstname" pattern="[A-Za-z]{1,}" required="true"/></tr>  
         <tr><br><br></tr>
        
            <tr><input class="form-control" style="width: 240px;" type="text" name="Lastname" placeholder="lastname" pattern="[A-Za-z]{1,}" required="true"/></tr>  
         <tr><br><br></tr>
        
            <tr><input class="form-control" style="width: 240px;" type="text" name="username" placeholder="Username" pattern="[a-z]{1,15}"
        title="Username should only contain lowercase letters. e.g. john" required="true"/></tr> 
         <tr><br><br></tr>
        
            <tr><input class="form-control" style="width: 240px;" type="text" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="true"/></tr> 
         <tr><br><<br></tr>
        
           <tr>   <p style="color:white"> <input class="custom-control-input"  type="radio" name="gender" required="true"
<?php if (isset($gender) && $gender=="Female") echo "checked";?>
value="Female">Female
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="Male") echo "checked";?>
value="Male">Male
<input type="radio" name="gender"
<?php if (isset($gender) && $gender=="Other") echo "checked";?>
       value="Other" >Other </p></tr>       
 <tr><br><br></tr>

            <tr><input class="form-control" style="width: 240px;" type="email" name="email" placeholder="Email" pattern=".+ucmo.edu" size="30" required/></tr>
      <tr><br><br></tr>   
    <tr><input class="form-control" style="width: 240px;" type="tel" id="phone" name="phone"
       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
       placeholder="xxx-xxx-xxxx" required></tr>
    <tr><br><br></tr> 
      <tr><textarea class="form-control" style="width: 240px;"  name="address" rows="3" cols="22" placeholder="Address" required="true"></textarea></tr>
     <tr><br><br></tr>
     
     <tr><button type="submit" class="btn btn-primary" name="submit">Add Student</button></tr>
     <?php echo form_close(); ?>   
        </table></center></div>
    </body>
</html>
