<!DOCTYPE html>
<!--
Created by Pradeep Chandra Chitti
student id : 700672902
email: pxc29020@ucmo.edu
-->
<?php if($this->session->userdata('sessionfaculty') == 2){ ?> 
<html>
    <head>
        <title>Faculty Dashboard</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title></title>
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
  <a href="facultyclassesavail" class="list-group-item"><span>Add My Classes Availability</span></a>
      <a href="viewappointmentcancelreport" class="list-group-item"><span>View Appointment Cancel Reports</span></a>
  
  </div>
          
          <?php
          $id = $this->session->userdata('fid');
        $courses =  $this->Crs_model->my_faculty_courses($id);  
     //  print_r($courses);
        ?> <p class="h2" style="color: white;">Welcome Dr <?php  print_r($this->session->userdata('lastname')); ?></p>
      
        <div class="test">
            <center class="table-responsive">
       <?php  if($this->session->flashdata('error')){  ?>
<div class="alert alert-danger" style="width: 240px;"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; }elseif($this->session->flashdata('success')){ ?>
<div class="alert alert-success" style="width: 240px;"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } elseif($this->session->flashdata('warning')){ ?>
<div class="alert alert-warning" style="width: 240px;"><strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); echo '</div>'; } ?>       
    <br><br>  
            <table class="table table-bordered table-hover">
                
            <thead bgcolor="#a50000">
                <tr>
                    <th class="hidden"></th>
                   <th><font color="#fff">CourseId</th> 
                    <th><font color="#fff">CourseName</th> 
                     <th><font color="#fff">Time</th>
                      <th><font color="#fff">Section</th>
                                <th><font color="#fff">day</th>
             
              <th><font color="#fff">Year</th> 
              <th><font color="#fff">Semester</th> 
               
              <th class="hidden"><font color="#fff">Faculty</th> 
              
              <!--     <th>enroll</th>
                       <th>Modify details</th>
-->
 <th class="col-sm-2"><font color="#fff">View Students</th>
 
 
                </tr>
            </thead>
            <tbody bgcolor="white">
                <?php foreach($courses as $rec){ ?>
                <tr>
                    <td class="hidden"></td>
                 <td><?php echo $rec->courseid ?></td>
                  <td><?php echo $rec->coursename  ?></td>
                  <td><?php echo $rec->time  ?></td>
                   <td><?php echo $rec->section  ?></td>
                    <td><?php echo $rec->day  ?></td>
                  <td><?php echo $rec->year?></td>
                  <td><?php echo $rec->semester  ?></td>
                
                  ?></td>
                 <?php $v = $rec->courseid; $vv = $rec->semester; $vvv = $rec->year; ?>
 <td class="hidden"><?php echo $rec->firstname.$rec->lastname  ?></td>
<td class=""><a  href="<?php echo base_url() . 'Faculty/view_students/' . $rec->courseid. '/'.$rec->semester.'/'.$rec->year.'/'.$rec->cid ?>"><button type="button" style="padding: 5px;" class="btn btn-danger">view</button></a></td>
 
                </tr> 
                <?php }
     /*
      * <a href="localhost/courseregistration/Faculty/view_students/?var1=<?php echo $v;?>&var2=<?php echo $vv;?>" 
    
      * <td class=""><a href="localhost/courseregistration/Faculty/view_students/?var1=<?php echo $v;?>&var2=<?php echo $vv;?>"><button type="button" style="padding: 5px;" class="btn btn-danger">view</button></a></td>
 
      *   */           
                
                
                ?>
                
           
       
            </tbody>
        </table>          
            </center>
        </div>


    </body>
</html>
<?php } else {
     redirect('faculty/facultyloginpage');   
}