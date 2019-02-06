<!DOCTYPE html>
<!--
Created by Pradeep Chandra Chitti
student id : 700672902
email: pxc29020@ucmo.edu
-->
<html>
    <head>
        <title>Faculty Dashboard</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Email Sending</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
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
  <a href="emailsending" class="list-group-item active"><span>Email Sending</span></a>
     <a href="viewappointmentcancelreport" class="list-group-item"><span>View Appointment Cancel Reports</span></a>
  
  </div>
               <?php  echo form_open('Faculty/sentgroupmail'); 
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
     url:"<?php echo site_url()?>/Faculty/fetch_semjq",
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
     url:"<?php echo site_url()?>/Faculty/fetch_coursesjq",
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
     url:"<?php echo site_url()?>/Faculty/fetch_studentsjq",
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
