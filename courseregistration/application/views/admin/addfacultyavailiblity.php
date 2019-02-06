<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
 <meta charset="UTF-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <title>Add Course</title>
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
              <style>
                         
navbar-brand {
  position: absolute;
  width: auto;
  left: 15px;
  text-align: center;
  margin:0 auto;
  
}

.navbar-toggle {
  z-index:3;
}

/* On Tabs & Desktops */
@media screen and (min-width: 768px) {
  .navbar-left {
      
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
  }
}

   
        </style>
        <div class="logo" align="middle">    
           <a href="<?php echo base_url();?>"><img src="../images/log.jpg" alt="test" height="100px" width="110px"></a><span class="h3"style="color:white;"><br><p class="h4">Course Registration System</p></span>
            </div>
   <nav class="navbar navbar-inverse" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>    
    <a class="navbar-brand" href="<?php echo base_url();?>">Home</a>
     <a class="navbar-brand" href="<?php echo base_url().'Admin/adminabout';?>">About</a>
     
  </div>
  <div class="navbar-collapse collapse">

    <ul class="nav navbar-nav navbar-right">


   <li class="dropdown movable">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<span class="caret"></span><span class="fa fa-4x fa-child"></span></a>
                  <ul class="dropdown-menu" role="menu">
                     
                      <li><a href="updatepassword"><span class="fa fa-gear"></span>Update Password</a></li>
                      <li class="divider"></li>
                      <li><a href="logout"><span class="fa fa-power-off"></span>Logout</a></li>
                  </ul>
              </li>
    </ul>
      
  </div>
    
</nav>
      <?php 
        //
     //   include_once 'adminheader.php';
        ?>
    <div class="list-group">
    <a href="listofcourses" class="list-group-item"><span>View List Of Courses</span></a>
  <a href="addcourses" class="list-group-item"><span>Add Course</span></a>
      <a href="assignfaculty" class="list-group-item"><span>Assign Faculty</span></a>

 <a href="addstudent" class="list-group-item"><span>Add Student</span></a>
    <a href="addfaculty" class="list-group-item"><span>Add Faculty</span></a>
  <a href="managestudentsjq" class="list-group-item"><span>Manage Students</span></a>
      <a href="manageinactivejq" class="list-group-item"><span>Manage inactive Students</span></a>
         <a href="managefacultyjq" class="list-group-item"><span>manage Faculty</span></a>
    <a href="manageinactivefacultyjq" class="list-group-item"><span>manage Faculty Inactive</span></a>
   <a href="viewregistrationjq" class="list-group-item"><span>View Registration</span></a>
 <a href="emailsending" class="list-group-item"><span>Emailing Students Registered</span></a>
<a href="addfacultyavailiblity" class="list-group-item active"><span>Add Faculty Availability</span></a>
 <a href="viewfacultyclassesavailablity" class="list-group-item"><span>View Faculty Availability</span></a>

  </div>  
          <div class="test">
        <center class="table-responsive">
                                           <?php  if($this->session->flashdata('error')){  ?>
<div class="alert alert-danger" style="width: 240px;"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; }elseif($this->session->flashdata('success')){ ?>
<div class="alert alert-success" style="width: 240px;"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } elseif($this->session->flashdata('warning')){ ?>
<div class="alert alert-warning" style="width: 240px;"><strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); echo '</div>'; } ?>       
            
        <?php
        $faculty = $this->Crs_model->faculty();
        ?>
  <table>
      <tr>  <br><p class="h3" style="color: white;">Add Course</p>   </tr>
        
                <?php echo form_open('Admin/course_addjq');?>
            <tr><br></tr>
            <tr><input class="form-control" style="width: 240px;" type="text" name="courseid" placeholder="Course Id" required="true"/></tr>  
         <tr><br><br></tr>
        
            <tr><input class="form-control" style="width: 240px;" type="text" name="coursename" placeholder="Course Name" required="true"/></tr>  
         <tr><br><br></tr>
        
            <tr><input class="form-control" style="width: 240px;" type="text" name="year" placeholder="Year" 
        required="true"/></tr> 
         <tr><br><br></tr>
        
         <tr><select class="form-control" style="width: 240px;" name="semester" required="true"><option>Select Semester</option>
             <option value="Spring">Spring</option><option value="Fall">Fall</option><option value="Summer-I">Summer-I</option><option value="Summer-II">Summer-II</option></select></tr> 
         <tr><br><br></tr>
         <tr>
         <input class="form-control" style="width: 240px;" type="text" name="department" pattern="[A-Za-z]{1,}" placeholder="Department"required="true"/>
  </tr>   <tr><br><br></tr> 
  <tr>

  </tr>  
<!-- Checkbox type it will have the timings sections  --> 
<select multiple="multiple" id="timings" name="timings[]">
    <option value="Morning">Morning</option>
    <option value="Afternoon">Afternoon</option>
    <option value="Evening">Evening</option>
</select>


         <tr>
             <tr><br><br><br><?php //print_r($section);   ?></tr>
    </tr>  
<!-- Checkbox type it will have the timings sections  --> 
<select multiple="multiple" id="section" name="section[]">
    <option value="I">I</option>
    <option value="II">II</option>
  
</select>


         <tr>
             <tr><br><br><br><?php //print_r($section);   ?></tr>
   <tr>
            <select class="form-control" style="width: 240px;" name="day" required="true"><option>Week Day</option>
             <option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option><option value="Sunday">Sunday</option></select></tr> 
  <tr><br><br><?php //print_r($section);   ?></tr>
         <tr>  <input class="form-control" style="width: 240px;"  type="number" id="classsize" name="classsize" placeholder="Class Size"
       min="10" max="30"required="true"/>
  </tr>   <tr><br><br></tr>
      <tr>  <input class="form-control" style="width: 240px;"  type="date" id="startdate" name="startdate" onchange="handler(event);" required="true"/>
  </tr>   <tr><br><br></tr>

         <tr><button class="btn btn-primary" type="submit" name="submit">Add Course</button></tr>
     <?php echo form_close(); ?>   
</table></centre></div>
    </body>
</html>
<script>
$(document).ready(function() {
  $('#timings').multiselect({
       nonSelectedText:'Select Timings',
  buttonWidth:'240px',
  });
    $('#section').multiselect({
       nonSelectedText:'Select Section',
  buttonWidth:'240px',
  });
}); 
</script>