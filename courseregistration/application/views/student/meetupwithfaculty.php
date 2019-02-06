<!DOCTYPE html>
<!--
Created by Pradeep Chandra Chitti
student id : 700672902
email: pxc29020@ucmo.edu
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Meet Faculty</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url('style/css/custom.css'); ?>"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  
      <style>
             html,body {
 background-image: url("<?php echo base_url();?>images/university.jpg");
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
        </style>
    <body>
             <?php include_once 'studentheader.php';   ?>

      
        <div class="list-group">
   
 <a href="listofcourses" class="list-group-item"><span>List Of Courses</span></a>
    <a href="enrollcourses" class="list-group-item"><span>Enrollment</span></a>
    <a href="meetupwithfaculty" class="list-group-item active"><span>Meet Professor</span></a>
    <a href="feedetails" class="list-group-item"><span>Fee Details</span></a>
    <a href="testpage" class="list-group-item"><span>Notes to Faculty</span></a>
   <a href="viewnotes" class="list-group-item"><span>View Notes</span></a>
    <a href="viewmeetupwithfaculty" class="list-group-item"><span>View Meeting</span></a>
 
 <a href="grades" class="list-group-item"><span>Grades</span></a>


  </div>
      
        <div class="test">
        <center class="table-responsive">
                                  <?php  if($this->session->flashdata('error')){  ?>
<div class="alert alert-danger" style="width: 240px;"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; }elseif($this->session->flashdata('success')){ ?>
<div class="alert alert-success" style="width: 240px;"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } elseif($this->session->flashdata('warning')){ ?>
<div class="alert alert-warning" style="width: 240px;"><strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); echo '</div>'; } ?>       
        <?php
    /*
     * date selection
     * depends on date selected day will be produced 
     * 
     * student can select faculty from faculty list
     * on the selection or change of facultyid and day 
     * will get the time slots available from the database
     * 
     * 
     */
        
       // $t=$this->Crs_model->t();
        $id = $this->session->userdata('sid');
        $ye = $this->Crs_model->faculty();
    //  print_r($ye);
      // print_r($id);
       ?><br><p class="h3" style="color: white;">Meet With Faculty</p><br>
       <?php echo form_open('Student/meetinstructor'); ?>
       
              
  <br>
    
       <input type="date" class="form-control" style="width: 240px;" id="date" name="date" onchange="handler(event);" required="true"/>
       <br><br>
       
       <select name="fid" id="fid" class="form-control" style="width: 240px;" required="true">
                 <option value="">Select Faculty</option>
             <?php 
   
          foreach ($ye as $row){
              ?><option value="<?php echo $row['fid']; ?>"><?php echo $row['firstname'].$row['lastname']; ?></option>
             
             
          <?php } ?>     
     </select><br><br>
       <select name="time" class="form-control" style="width: 240px;" id="time" >
           <option>Select Timeslot</option>
       </select><br><br>
       <input name="day" id="day" type="hidden" />
      <p class="h5" style="color:whitesmoke;">Sample meet professor Dr Jovana Andrejevic</p>
      
 
<script>
 
     function handler(e){
		  var p = e.target.value;
		 //alert(p);
		 var gsDayNames = [
  
  'Monday',
  'Tuesday',
  'Wednesday',
  'Thursday',
  'Friday',
  'Saturday',
  'Sunday'
];

var d = new Date(p);
var dayName = gsDayNames[d.getDay()];
document.getElementById("day").value = dayName;
}
$(document).ready(function(){
 pastDaysdisable()
 //futuredatesdisable()
})
function pastDaysdisable() {
   
      var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var minDate= year + '-' + month + '-' + day;
    
    $('#date').attr('min', minDate);
        
     
     var nextWeekDate = new Date(new Date().getTime() + 6 * 24 * 60 * 60 * 1000).toISOString().split('T')[0]
    
      document.getElementsByName("date")[0].setAttribute('max', nextWeekDate)
	
 }

</script>
<input type="hidden" value="<?php echo $id ?>" id="sid" name="sid" />
     
         <button class="btn btn-primary" name="submit">Book</button>
         <?php echo form_close() ?>
         <script>
    $(document).ready(function(){
    $('#fid').change(function(){
     var fid = $('#fid').val();
     var day=$('#day').val();
     var sid=$('#sid').val();
     
     //alert(year);
     //alert(semester);
     if(fid !== '' & day!=='')
     {
         
         $.ajax({
                    url:"<?php echo site_url()?>/Student/fetch_timeslot",
                    method:"POST",
                    data:{fid:fid,day:day,sid:sid},
                    success:function(data){
                       //alert(data);
          $('#time').html('<option required="true" value="">select timeslot</option>'); 
                       var dataObj = jQuery.parseJSON(data);
                     //alert(dataObj);
                       if(dataObj){
                           $(dataObj).each(function(){
                               var option = $('<option />');
                               option.attr('value', this.time).text(this.time);           
                               $('#time').append(option);
                           });
                       }else{
                           alert('No appointments available to meet Professor!!');
                           $('#time').html('<option value="">Appointments not available</option>');
                       }
                    }
               });
     }
     else
     {
      alert("Please select the date");
     
     }
    });  
    
     });

         
         </script>
          </center>
        </div>
    </body>
</html>
