<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
 <meta charset="UTF-8">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
       
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
       <title>Assign Faculty</title>
<style>
             body {
 background-image: url("<?php echo base_url();?>images/uni.jpg");
 background-size: cover;
        }
 .center {
  text-align: center;
    margin-top: -100px; 
   
}
 .list-group {
     
     margin:auto;
     float:left;
     padding-top:60px;
    }
    .lead {
     
     margin:auto;
     left:0;
     right:0;
     padding-top:10%;
    }
   .test {
 width: 80%;
  margin-left: 9%;
   
} 
</style>
    </head>
    <body>
      <?php 
        //
        include_once 'adminheader.php';
        ?>
 <div class="list-group">
    <a href="listofcourses" class="list-group-item"><span>View List Of Courses</span></a>
  <a href="addcourses" class="list-group-item"><span>Add Course</span></a>
    <a href="assignfaculty" class="list-group-item active"><span>Assign Faculty</span></a>
 <a href="addstudent" class="list-group-item"><span>Add Student</span></a>
    <a href="addfaculty" class="list-group-item"><span>Add Faculty</span></a>
  <a href="managestudentsjq" class="list-group-item"><span>Manage Students</span></a>
      <a href="manageinactivejq" class="list-group-item"><span>Manage inactive Students</span></a>
         <a href="managefacultyjq" class="list-group-item"><span>manage Faculty</span></a>
    <a href="manageinactivefacultyjq" class="list-group-item"><span>manage Faculty Inactive</span></a>
   <a href="viewregistrationjq" class="list-group-item"><span>View Registration</span></a>
 <a href="emailsending" class="list-group-item"><span>Emailing Students Registered</span></a>
 <a href="viewfacultyclassesavailablity" class="list-group-item"><span>View Faculty Availability</span></a>

  </div>   
          <div class="test">
        <center class="table-responsive">
                                           <?php  if($this->session->flashdata('error')){  ?>
<div class="alert alert-danger" style="width: 240px;"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; }elseif($this->session->flashdata('success')){ ?>
<div class="alert alert-success" style="width: 240px;"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } elseif($this->session->flashdata('warning')){ ?>
<div class="alert alert-warning" style="width: 240px;"><strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); echo '</div>'; } ?>       
            
        <?php
        $faculty = $this->Crs_model->faculty();
        /*
         logic 
         user will 
         select timing
         select section
        select course
         select faculty 
         * submit button 
        depending on the two values will get the courses
         * 
         */
        ?>
  <table>
      <tr>  <br><p class="h3" style="color: white;">Assign Faculty</p>   </tr>
        
                <?php echo form_open('Admin/course_assign');?>
      <tr><br><br></tr>
        
        <tr>
   <select class="form-control" style="width: 240px;" id="semester" name="semester" required="true"><option>Select Semester</option>
             <option value="Spring">Spring</option><option value="Fall">Fall</option><option value="Summer-I">Summer-I</option><option value="Summer-II">Summer-II</option></select>
   </tr>
     <tr><br><br></tr>
        <tr>
        <select class="form-control" style="width: 240px;" id="year" name="year" required="true"><option>Select Year</option>
             <option value="2019">2019</option><option value="2020">2020</option></select>
   </tr>
     <tr><br><br></tr> 
 <tr>
   <select class="form-control" style="width: 240px;" id="timings" name="timings" required="">
      <option value="">Select Timings</option>
           <option value="Morning">Morning</option>
    <option value="Afternoon">Afternoon</option>
    <option value="Evening">Evening</option>
</select>
   </tr>
     <tr><br><br></tr>
     <tr>
     <select class="form-control" style="width: 240px;" id="section" name="section" required="">
     <option value="">Select Section</option>
           <option value="I">I</option>
    <option value="II">II</option>
</select>
   </tr>
   <tr><br><br></tr>

     <tr>
     <select class="form-control" style="width: 240px;" id="coursename" name="coursename" required="">
     <option value="">Select Course</option>
       
</select>
   </tr>
     <tr><br><br></tr>
         <select class="form-control" style="width: 240px;" required="true" name="fid">
             <option value="">Select Faculty</option> 
           <?php
 foreach($faculty as $name){ ?>
    <option id="<?php echo $name['fid']; ?>" value="<?php echo $name['fid']; ?>"><?php  echo 'Dr'.' '.$name['firstname'].$name['lastname']; ?> </option> <?php  } ?>
         </select></tr>
        
  <tr><br><br><?php //print_r($section);   ?></tr>
     
         <tr><button class="btn btn-primary" type="submit" name="submit">Assign Faculty</button></tr>
     <?php echo form_close(); ?>   
</table></centre></div>
      <script>
   $(document).ready(function(){
   
    //coursename
    //end of section value on change
     $('#section').change(function(){
        //  alert(year);
          var time = $('#timings').val();
    
       var section = $('#section').val();
        var semester = $('#semester').val();
          var year = $('#year').val();
         
         
            if(section !== '' & time !== '' & semester != '' & year != '')
     {
         
         $.ajax({
                    url:"<?php echo site_url()?>/Admin/fetch_courses",
                    method:"POST",
                    data:{section:section,time:time,semester:semester,year:year},
                    success:function(data){
                     //  alert(data);
                       //<option value="">select Course</option>
             $('#coursename').html('<option value="">Select Course</option>'); 
          
         // $('#coursename').html(''); 
                       var dataObj = jQuery.parseJSON(data);
                     //alert(dataObj);
                       if(dataObj){
                           $(dataObj).each(function(){
                               var option = $('<option />');
                               //try to retrive the lastname also
                               option.attr('value', this.cid).text(this.coursename);           
                               $('#coursename').append(option);
                           });
                       }else{
                           alert('No Courses Available!!');
                           $('#coursename').html('<option value="">courses not available</option>');
                       }
                    }
               });
     }
     else
     {
      alert("Please Select all the details");
     
     }
       
           });
    //end of semister value on change
  //on change of section
       
    
   });

</script>
    </body>
</html>
