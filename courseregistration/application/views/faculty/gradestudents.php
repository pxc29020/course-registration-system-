<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Grade Students</title>
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
    .lead {
     
     margin:auto;
     left:0;
     right:0;
     padding-top:10%;
    }
   .test {
 width: 80%;
  margin-left: 10%;
   
} 

       </style></head>
    <body>
          <?php include_once 'facultyheader.php'; ?>
                  <div class="list-group">
   
   <a href="viewnotes" class="list-group-item"><span>View Student Notes</span></a>
   <a href="viewnotes" class="list-group-item"><span>Reply notes</span></a>
    <a href="viewmeetupfaculty" class="list-group-item"><span>View Meeting</span></a>
  <a href="testpage" class="list-group-item"><span>Appointments of the day</span></a>
  <a href="gradestudents" class="list-group-item active"><span>Grade Student</span></a>
 <a href="addtimeslot" class="list-group-item"><span>Add My Time Slot</span></a>
 <a href="viewtimeslot" class="list-group-item"><span>View My Time Slots</span></a>
  <a href="viewtimeslotinactive" class="list-group-item"><span>View My Inactive Time Slots</span></a>
 <a href="facultyclassesavail" class="list-group-item"><span>Add My Classes Availability</span></a>
      <a href="viewappointmentcancelreport" class="list-group-item"><span>View Appointment Cancel Reports</span></a>
  
  </div>
    <div class="test">
        <center class="table-responsive">
                                           <?php  if($this->session->flashdata('error')){  ?>
<div class="alert alert-danger" style="width: 240px;"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; }elseif($this->session->flashdata('success')){ ?>
<div class="alert alert-success" style="width: 240px;"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } elseif($this->session->flashdata('warning')){ ?>
<div class="alert alert-warning" style="width: 240px;"><strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); echo '</div>'; } ?>       
            
        <?php
       /*logic to design grade
        * select classes he tech
        * select term
        * select year
        * select student name
        * select grade
        * feedback
        * 
        */
        $t=$this->Crs_model->t();
        $id = $this->session->userdata('fid');
        $ye = $this->Crs_model->joincourses();
     // print_r($t);
     //  print_r($id);
       ?><br><br>
       <?php echo form_open('Faculty/grade_student'); ?>
       <input type="hidden" value="<?php echo $id ?>" id="fid" name="fid" />
       
       <select name="year" id="year" class="form-control" style="width: 240px;" required="true">
             <option value="">Select Year</option>
             <?php 
          $year = $this->Crs_model->year();
          foreach ($year as $row){
              ?><option value="<?php echo $row->year; ?>"><?php echo $row->year; ?></option>
             
             
          <?php } ?>
                     </select><br><br>
       <select name="courseid" id="courseid" class="form-control" style="width: 240px;" required="true">
             <option value="">Select Course</option>
             <?php 
          $year = $this->Crs_model->course($id);
          foreach ($year as $row){
              ?><option value="<?php echo $row['courseid']; ?>"><?php echo $row['coursename']; ?></option>
             
             
          <?php } ?>
       </select><br><br>       
         <select name="semester" id="semester" class="form-control" style="width: 240px;" required="true">
             <option value="">Select Term</option>
             <?php 
          $sem = $this->Crs_model->semester();
          foreach ($sem as $row){
              ?><option value="<?php echo $row['semester']; ?>"><?php echo $row['semester']; ?></option>
             
             
          <?php } ?>
         </select><br><br>
    
    
    
       
  <select id="sid" class="form-control" style="width: 240px;" name="sid" required="true" title="Select student">
             <option value="">Select Student</option>
  </select><br><br>
    <select id="grade" class="form-control" style="width: 240px;" name="grade" required="true" title="Select grade">
             <option value="">Select Grade</option>
             <option value="A">A</option>
             <option value="B">B</option>
             <option value="C">C</option>
             <option value="D">D</option>
             <option value="U">U</option>
             
  </select><br><br>
  
  <textarea type="text" name="remarks" class="form-control" placeholder="Write Remarks Here" style="width: 240px;" rows="5" cols="17" required="true"></textarea>
       <br><br>
  
         <button class="btn btn-primary" name="submit">Grade</button>
         <?php echo form_close() ?>
        </center>
        </div>
    
    </body>
</html>
 <script>
   $(document).ready(function(){
    $('#semester').change(function(){
         var year=$('#year').val();
          var fid=$('#fid').val();
     var semester = $('#semester').val();
    
    
      var courseid=$('#courseid').val();
     
     //alert(year);
     //alert(semester);
     if(semester !== '' & year!=='' & courseid!=='')
     {
         
         $.ajax({
                    url:"<?php echo site_url()?>/Faculty/fetch_students",
                    method:"POST",
                    data:{year:year,semester:semester,fid:fid,courseid:courseid},
                    success:function(data){
                       //alert(data);
          $('#sid').html('<option value="">select student</option>'); 
                       var dataObj = jQuery.parseJSON(data);
                     //alert(dataObj);
                       if(dataObj){
                           $(dataObj).each(function(){
                               var option = $('<option />');
                               option.attr('value', this.sid).text(this.lastname);           
                               $('#sid').append(option);
                           });
                       }else{
                           alert('No students available to grade!!');
                           $('#sid').html('<option value="">students not available</option>');
                       }
                    }
               });
     }
     else
     {
      alert("hi");
     
     }
    });
    //end of semister value on change

    
   });

</script>