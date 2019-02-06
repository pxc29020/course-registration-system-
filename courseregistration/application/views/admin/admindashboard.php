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
       <title>Admin Dashboard</title>
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
  margin-left: 15%;
   
} 
.h2{
   margin-left: 75%;  
      margin-top: -25px; 
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
 
     ?><br><br><!--
     <div class="hidden">
        <table><tr>
            <a href="admindashboard">home </a>
            </tr>
            <tr>     </tr>
            <tr>
                <a href="logout"> logout</a> 
            </tr>
            <tr>
            <a href="addstudent">   add student</a>   
            </tr>
            <tr>
            <a href="addfaculty">    add faculty</a>   
            </tr>
            <tr>
            <a href="managestudents">    Manage Students</a>   
            </tr> 
            <tr>
            <a href="managefaculty">   Manage Faculty</a>   
            </tr> 
          <tr>
            <a href="manageinactivestudents">    Manage inactive Students</a>   
            </tr> 
            <tr>
            <a href="manageinactivefaculty">   Manage inactive Faculty</a>   
            </tr>
               <tr>
               <a href="addcourses">   add courses</a>   
            </tr>
                        <tr>
               <a href="managecourses">   manage courses</a>   
            </tr>
        </table></div>-->
     
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

  <a href="viewfacultyclassesavailablity" class="list-group-item"><span>View Faculty Availability</span></a>

 <!-- -->
  </div>      
       <p class="h2" style="color: white;">Welcome Admin</p>
      
    </body>
</html>
<?php } else {
redirect('admin/adminloginpage');
}

