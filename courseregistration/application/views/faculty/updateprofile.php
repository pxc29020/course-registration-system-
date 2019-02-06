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
  <title>Update Profile</title>
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
  margin-left: 10%;
   
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
       $profile =  $this->Crs_model->faculty_profile($id);  
     //  print_r($courses);
        ?><br><br>
        <div class="test">
            <center class="table-responsive">
       <?php  if($this->session->flashdata('error')){  ?>
<div class="alert alert-danger" style="width: 240px;"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; }elseif($this->session->flashdata('success')){ ?>
<div class="alert alert-success" style="width: 240px;"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } elseif($this->session->flashdata('warning')){ ?>
<div class="alert alert-warning" style="width: 240px;"><strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); echo '</div>'; } ?>       
    <br><br>   <p class="h3" style="color: white;">Update Profile</p> 
            <?php foreach($profile as $rec){ ?>
             <?php echo form_open('Faculty/update_profilejq');?><br><br>
    <input type="hidden" name="fid" value="<?php print_r($this->session->userdata('fid'));?>"/>
    <p  style="color:white;">First Name</p><br>
    <input class="form-control" style="width: 240px;" type="text" name="firstname" value="<?php echo $rec['firstname']; ?>" pattern="[A-Za-z]{1,}" title="Firstname should have starting letter as capital letter remaining should be in lowercase. e.g. John" required="true"/>
   <br><p style="color:white;">Last Name</p><br>
   <input class="form-control" style="width: 240px;" type="text" name="lastname" value="<?php echo $rec['lastname']; ?>" pattern="[A-Za-z]{1,}" title="Lastname should have starting letter as capital letter remaining should be in lowercase. e.g. John" required="true"/>
   <br><p style="color:white;">Username</p><br>
   <input class="form-control" style="width: 240px;" type="text" value="<?php echo $rec['username']; ?>" name="username" placeholder="username" pattern="[a-z]{1,15}"
        title="Username should only contain lowercase letters. e.g. john" required="true"/>
   <br><p style="color:white;">
  <input type="radio" name="gender" value="male" <?php 
    echo set_value('gender', $rec['gender']) == 'male' ? "checked" : ""; 
?> />Male

<input type="radio" name="gender" value="female" <?php 
    echo set_value('gender', $rec['gender']) == 'female' ? "checked" : ""; 
    ?> />Female
   <input type="radio" name="gender" value="other" <?php 
    echo set_value('gender', $rec['gender']) == 'other' ? "checked" : ""; 
    ?> />Other</p>
   
  <br><p style="color:white;">Email</p><br>
   <input class="form-control" style="width: 240px;" type="text" value="<?php echo $rec['email']; ?>" name="email" placeholder="email" pattern=".+ucmo.edu" size="30" required/>
   <br><p style="color:white;">Phone</p><br>
   <input class="form-control" style="width: 240px;" type="text" id="phone" name="phone" value="<?php echo $rec['phone']; ?>"
       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
       placeholder="xxx-xxx-xxxx" title="Phone no should be in the format of XXX-XXX-XXXX. e.g. 838-939-9399" required/>
   <br>
   <p style="color:white;">Address</p><br>
   <textarea class="form-control" style="width: 240px;" id="address" name="address" rows="3" cols="22" placeholder="address" required="true"><?php echo $rec['address']; ?></textarea>
   <br>
   <br><input class="btn btn-primary" type="submit" placeholder="" name="Update"/>
   
          <?php echo form_close()?>
     </center> 
    </div>
               <?php } ?>

    </body>
</html>
<?php } else {
     redirect('faculty/facultyloginpage');   
}