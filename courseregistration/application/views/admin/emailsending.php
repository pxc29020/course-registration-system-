<!DOCTYPE html>
<!--
Created by Pradeep Chandra Chitti
student id : 700672902
email: pxc29020@ucmo.edu
-->
<html>
    <head>
        <title>Email Sending</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<style>
       body {
 background-image: url("<?php echo base_url();?>images/uni.jpg");
 background-size: cover;
        }
    .list-group {
     
     margin:auto;
     float:left;
     padding-top:20px;
    }
    .test {
 width: 70%;
  margin-left: 20%;
   
}
.h2{
   margin-left: 75%;  
  
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
 <a href="emailsending" class="list-group-item active"><span>Emailing Students Registered</span></a>
 <a href="viewfacultyclassesavailablity" class="list-group-item"><span>View Faculty Availability</span></a>

  </div>  
               <?php  echo form_open('Admin/sentgroupmail'); 
      ?> 
   <div class="container">
      
    
   <div style="width: 500px; margin:0 auto;margin-left: 35%; padding-top:4%;"><br>
                                            <?php  if($this->session->flashdata('error')){  ?>
<div class="alert alert-danger" style="width: 300px;"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; }elseif($this->session->flashdata('success')){ ?>
<div class="alert alert-success" style="width: 300px;"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } elseif($this->session->flashdata('warning')){ ?>
<div class="alert alert-warning" style="width: 300px;"><strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); echo '</div>'; } ?>       
        
       
       <div class="form-group">
       
     <select id="semesters" name="semesters[]" multiple class="form-control" style="width: 240px;" >
   
                <?php 
          $year = $this->Crs_model->year();
          foreach ($year as $row){
              ?><option value="<?php echo $row->year; ?>"><?php echo $row->year; ?></option>
             
             
          <?php } ?>

     </select>
    </div><br>
    <div class="form-group">
     
     <select id="second_level" name="second_level[]" multiple class="form-control" style="width: 240px;" >

     </select>
    </div><br>
    <div class="form-group">
     
     <select id="third_level" name="third_level[]" multiple class="form-control" style="width: 240px;" >

     </select>
    </div><br>
       <div class="form-group">
         
     <select id="four" name="four[]" multiple class="form-control" style="width: 240px;" >

     </select>
    </div>
           <br>
           <p class="h4" style="color: white;">Email Notes</p>
       <textarea type="text" name="facultynotes" style="width: 340px;"  rows="5" cols="23" required="true" ></textarea>
    
      <br><br>  <button class="btn btn-primary" name="submit">Send Email</button> 
      
   </div>
           <?php 
         echo form_close(); 
         ?>
  </div>
 </body>
</html>
<script>
$(document).ready(function(){

 $('#semesters').multiselect({
  nonSelectedText:'Select Year',
  buttonWidth:'400px',
 onChange:function(option, checked){
   $('#second_level').html('');
   $('#second_level').multiselect('rebuild');
   $('#third_level').html('');
   $('#third_level').multiselect('rebuild');
     $('#four').html('');
   $('#four').multiselect('rebuild');
   var selected = this.$select.val();
   if(selected.length > 0)
   {
      // alert(selected);
    $.ajax({
     url:"<?php echo site_url()?>/admin/fetch_semjq",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {
     // alert(data);
      $('#second_level').html(data);
      $('#second_level').multiselect('rebuild');
      }
    })
   }
  }
  
 });

$('#second_level').multiselect({
  nonSelectedText: 'Select Term',
  buttonWidth:'400px',
  onChange:function(option, checked)
  {
   $('#third_level').html('');
   $('#third_level').multiselect('rebuild');
     $('#four').html('');
   $('#four').multiselect('rebuild');
   var selected = this.$select.val();
   var year = $('#semesters').val();
          //$(this).attr("semesters") ;
 // alert(year);
        if(selected.length > 0)
   {
    $.ajax({
     url:"<?php echo site_url()?>/admin/fetch_coursesjq",
     method:"POST",
     data:{selected:selected,year:year},
     success:function(data)
     {
        // alert(data);
        if(data){
      $('#third_level').html(data);
      $('#third_level').multiselect('rebuild');
        $('#four').html('');
   $('#four').multiselect('rebuild');
     }else{
     alert('No Courses Avaliable');
        }
     }
    });
   }
  }
 });

 $('#third_level').multiselect({
  nonSelectedText: 'Select Courses',
  buttonWidth:'400px',
  onChange:function(option, checked)
  {
   $('#four').html('');
   $('#four').multiselect('rebuild');
   var selected = this.$select.val();
   if(selected.length > 0)
   {
       //alert(selected);
    $.ajax({
     url:"<?php echo site_url()?>/admin/fetch_studentsjq",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {
        // alert(data);
        if(data){
      $('#four').html(data);
      $('#four').multiselect('rebuild');
      }else{
     alert('No Students Registered');
        }
    }
    });
   }
  }
 });


 $('#four').multiselect({
  nonSelectedText: 'Select Students',
  buttonWidth:'400px'
 });


});
</script>


    </body>
</html>
