<!DOCTYPE html>
<!--
Created by Pradeep Chandra Chitti
student id : 700672902
email: pxc29020@ucmo.edu
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Enroll Classes</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url('style/css/custom.css'); ?>"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
       <style>
             body {
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
       </style></head>
    <body>
         <?php include_once 'studentheader.php';   ?>

      
        <div class="list-group">
   
 <a href="listofcourses" class="list-group-item"><span>List Of Courses</span></a>
    <a href="enrollcourses" class="list-group-item active"><span>Enrollment</span></a>
    <a href="meetupwithfaculty" class="list-group-item"><span>Meet Professor</span></a>
    <a href="feedetails" class="list-group-item"><span>Fee Details</span></a>
    <a href="testpage" class="list-group-item"><span>Notes to Faculty</span></a>
   <a href="viewnotes" class="list-group-item"><span>View Notes</span></a>
    <a href="viewmeetupwithfaculty" class="list-group-item"><span>View Meeting</span></a>
 
 <a href="grades" class="list-group-item"><span>Grades</span></a>


  </div>
     
        <div class="test">
        <center class="table-responsive">
                                           <?php  if($this->session->flashdata('error')){  ?>
<div class="alert alert-danger" style="width: 300px;"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; }elseif($this->session->flashdata('success')){ ?>
<div class="alert alert-success" style="width: 300px;"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } elseif($this->session->flashdata('warning')){ ?>
<div class="alert alert-warning" style="width: 300px;"><strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); echo '</div>'; } ?>       
            
        <?php
       /*create the structure of the registration table
        * steps to complete this
        * in controller there should be on function which checks the count of sid if the count of the sid 
        *should be less than 4
        * input box hidden studentid
        * 
        * 2 select box of semester 
        * 3 select box of courses available
        * 4 select box of faculty
        * 5.submit---on click submit form will sent all the data to registration table insert
        * all these will be in the form and the values should be produced dynamic dependently
        */
        /*
         * New Changes given by Professor
         * for example:
         * if the checkcount > 20 courses flag become 0
         * if course id dropped checkcount < 20 flag of courseid 1 
         */
        $t=$this->Crs_model->t();
        $id = $this->session->userdata('sid');
        $ye = $this->Crs_model->joincourses();
     // print_r($t);
     //  print_r($id);
       ?><br><br><p class="h3" style="color: white;">Student Enrollment</p><br>
       <?php echo form_open('Student/student_enroll'); ?>
       <!--   -->
       <select name="year" id="year" class="form-control" style="width: 240px;" required="true">
             <option value="">Select Year</option>
             <?php 
          $year = $this->Crs_model->year();
          foreach ($year as $row){
              ?><option value="<?php echo $row->year; ?>"><?php echo $row->year; ?></option>
             
             
          <?php } ?>
       </select><br><br>
 <!--   -->       
         <select name="semester" id="semester" class="form-control" style="width: 240px;" required="true">
             <option value="">Select Term</option>
            
 <?php 
          $sem = $this->Crs_model->semester();
          foreach ($sem as $row){
              ?><option value="<?php echo $row['semester']; ?>"><?php echo $row['semester']; ?></option>
             
             
          <?php } ?>
         </select><br><br>
          <!--   -->
         <input type="hidden" value="<?php echo $id ?>" id="sid" name="sid" />
          <!--   -->       <select class="form-control" style="width: 240px;" id="timings" name="timings" required="">
      <option value="">Select Timings</option>
           <option value="Morning">Morning</option>
    <option value="Afternoon">Afternoon</option>
    <option value="Evening">Evening</option>
</select>   <br><br>
         <select id="section" class="form-control" style="width: 240px;" name="section" required="true" title="Select Section">
             <option value="">Select Section</option>
        <?php
                // $this->load->model("Crs_model_two");
                 
            $section = $this->Crs_model->getsection(); 
            foreach($section as $sec){ 
                ?>
                    <option value="<?php echo $sec['section']; ?>"><?php echo $sec['section']; ?></option>
            <?php }  ?>  
           
         </select>
          <br><br>
      
           <!--   -->  <select style="width: 240px;" id="coursename" class="form-control" style="width: 240px;" name="coursename" required="true" title="Select Section">
             <option value="">Select Course</option>
           </select><br><br>
        
         <button class="btn btn-primary" name="submit">Register</button>
          <p class="h5" style="color:white;">Sample enroll Advance app development using C# in spring 2019</p>
      
         <?php echo form_close() ?>
        </center>
        </div>
    <!--
     $('#semester').change(function(){
     var semester = $('#semester').val();
     var year=$('#year').val();
     var sid=$('#sid').val();
     
     //alert(year);
     //alert(semester);
     if(semester !== '' & year!=='')
     {
         
         $.ajax({
                    url:"<?php echo site_url()?>/Student/fetch_sem",
                    method:"POST",
                    data:{year:year,semester:semester,sid:sid},
                    success:function(data){
                       //alert(data);
          $('#section').html('<option value="">Select Section</option>'); 
                       var dataObj = jQuery.parseJSON(data);
                     //alert(dataObj);
                       if(dataObj){
                           $(dataObj).each(function(){
                               var option = $('<option />');
                               option.attr('value', this.section).text(this.section); 
                      
                              $('#section').append(option);
                           });
                       }else{
                           alert('No courses available to register!!');
                           $('#coursename').html('<option value="">Courses not available</option>');
                       }
                    }
               });
     }
     else
     {
      alert("Semester and the year is blank");
     
     }
    });
    
    -->
         <script>
   $(document).ready(function(){
   
    //coursename
    //end of section value on change
     $('#section').change(function(){
          var semester = $('#semester').val();
     var year=$('#year').val();
       var section = $('#section').val();
       var time = $('#timings').val();
          //alert(coursename);
            if(section !== '' & semester !== '' & year !== ''& time !== '')
     {
         
         $.ajax({
                    url:"<?php echo site_url()?>/Student/fetch_courses",
                    method:"POST",
                    data:{section:section,semester:semester,year:year,time:time},
                    success:function(data){
                      // alert(data);
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
