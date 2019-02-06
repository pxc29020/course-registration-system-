<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <title>View Students</title>
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
    .test {
 width: 70%;
  margin-left: 20%;
   
} 
  </style>
    </head>
    <body>
     
    <?php //include_once 'facultyheader.php'; ?>
 <div class="hidden" align="middle">
           <a href="<?php echo base_url();?>"><img src="/images/log.jpg" alt="test" height="100px" width="110px"></a><span class="h3"style="color:white;"><br><p class="h4">Course Registration System</p></span>
            </div>
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
                      <li><a href="<?php echo base_url().'Faculty/logout';?>"><span class="fa fa-power-off"></span>Logout</a></li>
                  </ul>
              </li>
    </ul>
      
  </div>
    
</nav>
 
                   <div class="list-group">
    <a href="<?php echo base_url().'faculty/viewnotes'?>" class="list-group-item"><span>View Student Notes</span></a>
   <a href="<?php echo base_url().'faculty/viewnotes'?>" class="list-group-item"><span>Reply notes</span></a>
    <a href="<?php echo base_url().'faculty/viewmeetupfaculty'?>" class="list-group-item"><span>View Meeting</span></a>
  <a href="<?php echo base_url().'faculty/testpage'?>" class="list-group-item"><span>Appointments of the day</span></a>
 <a href="<?php echo base_url().'faculty/gradestudents'?>" class="list-group-item"><span>Grade Student</span></a>
 <a href="<?php echo base_url().'faculty/addtimeslot'?>" class="list-group-item"><span>Add My Time Slot</span></a>
 <a href="<?php echo base_url().'faculty/viewtimeslot'?>" class="list-group-item"><span>View My Time Slots</span></a>
  <a href="<?php echo base_url().'faculty/viewtimeslotinactive'?>" class="list-group-item"><span>View My Inactive Time Slots</span></a>
  <a href="<?php echo base_url().'faculty/facultyclassesavail'?>" class="list-group-item"><span>Add My Classes Availability</span></a>
      <a href="viewappointmentcancelreport" class="list-group-item"><span>View Appointment Cancel Reports</span></a>
  
                   </div>
        <?php
       $c = $this->uri->segment(3); 
      $s = $this->uri->segment(4); 
      $y = $this->uri->segment(5); 
      $z = $this->uri->segment(6); 
      $id = $this->session->userdata('fid');
     // print_r($id);
      // print_r($v_o_c);
      // print_r($v_o);
      // print_r($v);
      $data = Array(
          'cid' => $z,
          'courseid' => $c,
          'semester' => $s,
          'year' => $y,
           'fid' =>   $id,
      );
      $get_listofstudents = $this->Crs_model->get_listofstudents($c,$s,$y,$id,$z);
     // print_r($get_listofstudents);
        ?>
  <div class="test">
            <center class="table-responsive">
       <?php  if($this->session->flashdata('error')){  ?>
<div class="alert alert-danger" style="width: 240px;"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; }elseif($this->session->flashdata('success')){ ?>
<div class="alert alert-success" style="width: 240px;"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } elseif($this->session->flashdata('warning')){ ?>
<div class="alert alert-warning" style="width: 240px;"><strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); echo '</div>'; } ?>       
    <br><br>  
                <?php  echo form_open('Faculty/sentemailtostudent'); 
                ?> <p class="h3" style="color:white;">Please Select the Students You have to Email and Enter details</p>
            <table class="table table-bordered table-hover">
                
            <thead bgcolor="#a50000">
                <tr>
                    <th class=""></th>
                   <th><font color="#fff">Course Id</th> 
                    <th class="hidden"><font color="#fff">Student Id</th>  
                 <th><font color="#fff">Student Id</th>
               <th><font color="#fff">semester</th>
                    <th><font color="#fff">Year</th> 
          
              <th><font color="#fff">student name</th> 
              <th class="hidden"><font color="#fff">Faculty</th> 
              
              <!--     <th>enroll</th>
                       <th>Modify details</th>
-->
 <th class="hidden"><font color="#fff">View Students</th>
 
 
                </tr>
            </thead>
            <tbody bgcolor="white">
                <?php foreach($get_listofstudents as $rec){ ?>
                <tr>
                    
                    
                    <td class=""><input type="checkbox" checked="true" name="emails[]" value="<?php echo $rec['email'] ?>" /></td>
                 <td><?php echo $rec['courseid'] ?></td>
               <td><?php echo $rec['sid'] ?></td>
                  <td><?php echo $rec['semester']  ?></td>
                   <td><?php echo $rec['year']?></td>
                  <td><?php echo $rec['firstname'].$rec['lastname']  ?></td>

                 <?php //$v = $rec->registrationid; $vv = $rec->semester; $vvv = $rec->year; ?>


                </tr> 
                <?php }
     
                ?>
                
           
       
            </tbody>
        </table> 
       <br><br>
    <br>
           
    <p class="h4"style="color:white;">Subject</p> <input type="text" name="subject" style="width: 300px;"   rows="5" cols="23" required="true" />

      <br><br> 
            <br>
      <p class="h4"style="color:white;">Message</p> 
           <textarea type="text" name="message" placeholder="Message" style="width: 300px;"  rows="5" cols="23" required="true" ></textarea>
    
      <br><br>  <button class="btn btn-primary" name="submit">Send Email</button> 
      
   
           <?php 
         echo form_close(); 
         ?>
            </center>
        </div>
    </body>
</html>
