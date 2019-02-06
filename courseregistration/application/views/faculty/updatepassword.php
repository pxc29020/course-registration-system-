<!DOCTYPE html>
<!--
Created by Pradeep Chandra Chitti
student id : 700672902
email: pxc29020@ucmo.edu
-->
<?php if($this->session->userdata('sessionfaculty') == 2){ ?> 
<html>
    <head>

      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Update Password</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
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
 width: 80%;
  margin-left: 11%;
   
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
  <a href="facultyclassesavail" class="list-group-item"><span>Add My Classes Availability</span></a>
      <a href="viewappointmentcancelreport" class="list-group-item"><span>View Appointment Cancel Reports</span></a>
  
           </div>
          <?php
          $id = $this->session->userdata('fid');
        $courses =  $this->Crs_model->my_faculty_courses($id);  
     //  print_r($courses);
        ?><br><br>
        <div class="test">
            <center class="table-responsive">
       <?php  if($this->session->flashdata('error')){  ?>
<div class="alert alert-danger" style="width: 240px;"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; }elseif($this->session->flashdata('success')){ ?>
<div class="alert alert-success" style="width: 240px;"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } elseif($this->session->flashdata('warning')){ ?>
<div class="alert alert-warning" style="width: 240px;"><strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); echo '</div>'; } ?>       
      <p class="h3" style="color: white;">Update Password</p>
             <?php echo form_open('Faculty/update_password');?><br><br>
    <input type="hidden" name="fid" value="<?php print_r($this->session->userdata('fid'));?>"/>
   <input placeholder="Old Password" class="form-control" style="width: 240px;" type="password" name="oldpassword" required="true"/>
   <br><input placeholder="New Password" class="form-control" style="width: 240px;" type="password" name="newpassword"  required="true"/>
   <br><button class="btn btn-primary" type="submit" name="submit">Update Password</button>
   
          <?php echo form_close()?>
            </center>
        </div>


    </body>
</html>
<?php } else {
     redirect('faculty/facultyloginpage');   
}