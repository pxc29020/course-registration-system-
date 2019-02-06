<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reply Notes</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>

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
</head>
 <body>
            <?php 
    // include_once 'facultyheader.php';      
      ?>

<nav class="navbar navbar-inverse" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>    
    <a class="navbar-brand" href="<?php echo base_url(); ?>">Home</a>
     <a class="navbar-brand" href="#">About</a>
  
  </div>
  <div class="navbar-collapse collapse">

    <ul class="nav navbar-nav navbar-right">
    
   
   <li class="dropdown movable">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<span class="caret"></span><span class="fa fa-4x fa-child"></span></a>
                  <ul class="dropdown-menu" role="menu">
                      <li><a href="<?php echo base_url().'faculty/updateprofile'?>"><span class="fa fa-user"></span>Update Profile</a></li>
                      <li><a href="<?php echo base_url().'faculty/updatepassword'?>"><span class="fa fa-gear"></span>Update Password</a></li>
                      <li class="divider"></li>
                      <li><a href="<?php echo base_url().'faculty/logout'?>"><span class="fa fa-power-off"></span>Logout</a></li>
                  </ul>
              </li>
    </ul>
      
  </div></nav>   
       <?php
      $id = $this->session->userdata('fid');
       $nid = $this->uri->segment(3);
      $student = $this->Crs_model->get_message_student($nid);
     
     // print_r($nid);
        // echo $this->session->flashdata('email_sent'); 
         // print_r($student);
       ?>
                <div class="list-group">
    <a href="<?php echo base_url().'faculty/viewnotes'?>" class="list-group-item"><span>View Student Notes</span></a>
   <a href="<?php echo base_url().'faculty/viewnotes'?>" class="list-group-item active"><span>Reply notes</span></a>
    <a href="<?php echo base_url().'faculty/viewmeetupfaculty'?>" class="list-group-item"><span>View Meeting</span></a>
  <a href="<?php echo base_url().'faculty/testpage'?>" class="list-group-item"><span>Appointments of the day</span></a>
 <a href="<?php echo base_url().'faculty/gradestudents'?>" class="list-group-item"><span>Grade Student</span></a>
  <a href="<?php echo base_url().'faculty/addtimeslot'?>" class="list-group-item"><span>Add My Time Slot</span></a>
 <a href="<?php echo base_url().'faculty/viewtimeslot'?>" class="list-group-item"><span>View My Time Slots</span></a>
  <a href="<?php echo base_url().'faculty/viewtimeslotinactive'?>" class="list-group-item"><span>View My Inactive Time Slots</span></a>
  <a href="facultyclassesavail" class="list-group-item"><span>Add My Classes Availability</span></a>
      <a href="viewappointmentcancelreport" class="list-group-item"><span>View Appointment Cancel Reports</span></a>
  
                </div>
       <div class="test">
        <center class="table-responsive">    
           <?php  echo form_open('Faculty/sentnotes'); 
      ?> 
                   <?php  if($this->session->flashdata('success')){  ?>
<div class="alert alert-success"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } ?>
           
    <br><br>
    <p style="color: white;" class="h4">Reply The Student Notes</p> <br>		
       <select name="nid" class="form-control" style="width: 240px;" required="true">
           <?php 
   
          foreach ($student as $row){
              ?><option value="<?php echo $row->nid; ?>"><?php echo $row->firstname.$row->lastname; ?></option>
             
             
          <?php } ?> 
       </select>
       <br><br>
       <textarea type="text" name="facultynotes" style="width: 240px;" rows="5" cols="17" required="true" ></textarea>
     <br><br>  <button class="btn btn-primary" name="submit">Send Reply</button> 
      <?php 
         echo form_close(); 
         ?> </div></center></div>
 </body>
</html>


