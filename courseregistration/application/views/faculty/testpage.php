<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Appointments of the day</title>
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
  </style>
    </head>
    <body>
      <?php
     //  $id = $this->session->userdata('fid');
     //  print_r($id);
        $id = $this->session->userdata('fid');
   
 date_default_timezone_set('America/New_York');
 $date= date('Y-m-d') ;
// print_r($date);
       // print_r($date);
        $courses =  $this->Crs_model->my_faculty_courses($id);
        //print_r($courses);
        $appointments = $this->Crs_model->appointmentsoftheday($id,$date);
      // print_r($appointments);
        ?>
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
               <div class="test">
            <center class="table-responsive">
                <h1 style="color: white">Appointmnets of the day</h1>
         <?php if ($appointments){  ?>
      <table class="table table-bordered table-hover">
                
            <thead bgcolor="#a50000">
                <tr style="color: white">
           
                   <th>Appointment Id</th> 
                    <th>Student Id</th>  
              <th>Student Name</th> 
              <th>time</th> 
              <th class="hidden">Action</th> 
              

                </tr>
            </thead>
            <tbody bgcolor="white">
                <?php foreach($appointments as $rec){ ?>
                <tr>
                 <td><?php echo $rec['id'] ?></td>
                  <td><?php echo $rec['sid']  ?></td>
                  <td><?php echo $rec['sfname'].$rec['slname']?></td>
                  <td><?php echo $rec['time']  ?></td>
 
                  <td class="hidden"></td>
        </tr> 
                <?php } ?>
            </tbody>
       </table>
       
     
         <?php } else{ ?>
         
                <p class="h3" style="color: white">No appointment's available</p>
         
         <?php } ?></center></div>
    </body>
</html>