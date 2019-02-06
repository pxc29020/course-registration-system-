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
       <title>Add My Classes Availability</title>
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
    <?php 
     include_once 'facultyheader.php';      
      ?>
            <div class="list-group">
    <a href="viewnotes" class="list-group-item"><span>View Student Notes</span></a>
   <a href="viewnotes" class="list-group-item"><span>Reply notes</span></a>
    <a href="viewmeetupfaculty" class="list-group-item"><span>View Meeting</span></a>
  <a href="testpage" class="list-group-item"><span>Appointments of the day</span></a>
 <a href="gradestudents" class="list-group-item"><span>Grade Student</span></a>
 <a href="addtimeslot" class="list-group-item"><span>Add My Time Slot</span></a>
 <a href="viewtimeslot" class="list-group-item"><span>View My Time Slots</span></a>
  <a href="viewtimeslotinactive" class="list-group-item"><span>View My Inactive Time Slots</span></a>
  <a href="facultyclassesavail" class="list-group-item active"><span>Add My Classes Availability</span></a>
   

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
      <tr>  <br><p class="h3" style="color: white;">Add Time Slot</p>   </tr>
        
                <?php echo form_open('Faculty/add_avail_faculty');?>
   

     <tr><input type="text" placeholder="Year" name="year" id="year" class="form-control" style="width: 240px;" required=""/></tr> 
    
  <tr></tr>
     
  <tr><br><br></tr>
       <tr><select class="form-control" style="width: 240px;" name="semester" required="true"><option>Select Term</option>
             <option value="Spring">Spring</option><option value="Summer-I">Summer-I</option><option value="Summer-II">Summer-II</option><option value="Fall">Fall</option></select></tr> 
         <tr><br><br></tr>       
         <tr><select class="form-control" style="width: 240px;" name="day" required="true"><option>Select Day</option>
             <option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option><option value="Sunday">Sunday</option></select></tr> 
         <tr><br><br></tr>
            <tr><select class="form-control" style="width: 240px;" name="time" required="true"><option>Select Timing</option>
             <option value="Morning">Morning</option><option value="Evening">Evening</option><option value="Afternoon">Afternoon</option></select></tr> 
         <tr><br><br></tr>
     

        
  <input type="hidden" name="fid" id="fid" value="<?php print_r($this->session->userdata('fid')) ?>" /> 
    
   
    <tr><br><br></tr>

         <tr><button class="btn btn-primary" type="submit" name="submit">Add Class Time</button></tr>
     <?php echo form_close(); ?>   
</table></centre></div>
    </body>
</html>
