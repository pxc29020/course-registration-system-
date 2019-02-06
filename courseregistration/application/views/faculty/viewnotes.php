<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>View Notes</title>
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
     include_once 'facultyheader.php';      
      ?>
     <?php
     $id= $this->session->userdata('fid');
    // print_r($id);
     $notes = $this->Crs_model->faculty_tostudent($id);
    // print_r($notes);
     
     ?>
     <div class="list-group">
   


    <a href="viewnotes" class="list-group-item active"><span>View Student Notes</span></a>
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
                  <?php  if($this->session->flashdata('success')){  ?>
<div class="alert alert-success"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } ?>
           
    
  
           <h3 align="center"><p style="color: white;" class="h4">Press Reply Button To Reply To Particular Note</p></h3><br />  
          
                  <table class="table table-bordered table-hover">
                
            <thead bgcolor="#a50000">
                          <tr>  
                               <th width="10%"><font color="#fff">Note Id</th>  
                               <th width="20%"><font color="#fff">Student Name</th>  
                               <th width="30%"><font color="#fff">Student Notes</th>  
                               <th width="30%"><font color="#fff">My Notes</th>  
                               <th width="10%"><font color="#fff">Add Note</th>  
                          </tr>  
                     </thead> 
         <tbody bgcolor="white">
                <?php foreach($notes as $rec){ ?>
                <tr>
                 <td><?php echo $rec['nid'] ?></td>
                  <td><?php echo $rec['firstname'].$rec['lastname']  ?></td>
                  <td><?php echo $rec['studentnotes']?></td>
                  <td><?php echo $rec['facultynotes']  ?></td>           
                  <td class=""><a  href="<?php echo base_url() . 'Faculty/testpage2/' . $rec['nid'] ?>"><span class="glyphicon glyphicon glyphicon-danger"></span><button type="button" style="padding: 5px;" class="btn btn-danger">Reply</button></a></td>
   
                </tr> 
                <?php } ?>
                
          
       
            </tbody>
                </table>  
          
     </div></center>  
 </body>  
 </html>  
  
