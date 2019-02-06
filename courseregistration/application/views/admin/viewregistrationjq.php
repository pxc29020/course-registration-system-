<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php if($this->session->userdata('sessionadmin') == 1){ ?>

<html>
    <head>
        <title>View Registration</title>
        <meta charset="UTF-8">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <title></title>
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
     padding-top:20px;
    }
    .box  
           {  
                width:900px;  
                padding:20px;  
                background-color:#fff;  
                border:1px solid #ccc;  
                border-radius:5px;  
                margin-top:10px;  
           } 
    .test {
 width: 80%;
  margin-left: 15%;
   
} 

        </style>
    </head>
    <body>
 <?php  if($this->session->flashdata('success')){  ?>
<div style="width: 240px;" class="alert alert-success"><strong>Error!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } ?>
        <div class="logo" align="middle">    
           <a href="<?php echo base_url();?>"><img src="../images/log.jpg" alt="test" height="100px" width="110px"></a><span class="h3"style="color:white;"><br><p class="h4">Course Registration System</p></span>
            </div>
   <nav class="navbar navbar-inverse" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>    
    <a class="navbar-brand" href="<?php echo base_url();?>">Home</a>
     <a class="navbar-brand" href="adminabout">About</a>
  </div>
  <div class="navbar-collapse collapse">

    <ul class="nav navbar-nav navbar-right">


   <li class="dropdown movable">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<span class="caret"></span><span class="fa fa-4x fa-child"></span></a>
                  <ul class="dropdown-menu" role="menu">
                     
                      <li><a href="updatepassword"><span class="fa fa-gear"></span>Update Password</a></li>
                      <li class="divider"></li>
                      <li><a href="logout"><span class="fa fa-power-off"></span>Logout</a></li>
                  </ul>
              </li>
    </ul>
      
  </div>
    
</nav>
        <?php
     $t = $this->session->userdata();
 $dt= $this->Crs_model->sample_dta();
     //$ii= $this->Crs_model->fetch_single_registration();
                // print_r($ii);
// print_r($dt);
     ?><br><br>
     
 <div class="list-group">
    <a href="listofcourses" class="list-group-item"><span>View List Of Courses</span></a>
  <a href="addcourses" class="list-group-item"><span>Add Course</span></a>
      <a href="assignfaculty" class="list-group-item"><span>Assign Faculty</span></a>

 <a href="addstudent" class="list-group-item"><span>Add Student</span></a>
    <a href="addfaculty" class="list-group-item"><span>Add Faculty</span></a>
  <a href="managestudentsjq" class="list-group-item"><span>Manage Students</span></a>
      <a href="manageinactivejq" class="list-group-item"><span>Manage inactive Students</span></a>
         <a href="managefacultyjq" class="list-group-item"><span>manage Faculty</span></a>
    <a href="manageinactivefacultyjq" class="list-group-item"><span>manage Faculty Inactive</span></a>
   <a href="viewregistrationjq" class="list-group-item active"><span>View Registration</span></a>
 <a href="emailsending" class="list-group-item"><span>Emailing Students Registered</span></a>
 <a href="viewfacultyclassesavailablity" class="list-group-item"><span>View Faculty Availability</span></a>

  </div>      
 <div class="test">
        <center class="table-responsive">
        <div class="container box">  
           <h3 align="center"><?php //$title = 'test page';echo $title; ?></h3><br />  
           <div class="table-responsive">  
            
            <table id="user_data" class="table table-bordered table-striped table-hover">  
                    <thead bgcolor="#a50000">  
                          <tr style="color: white"> 
                              <th width="10%">RegistrationId</th>  
                               <th width="10%">CourseId</th>  
                               <th width="15%">CourseName</th>
                                 <th width="10%">StudentId</th>
                                <th width="15%">StudentName</th>  
                               <th width="10%">FacultyId</th>
                                <th width="15%">FacultyName</th>
                               <th width="10%">Semester</th>  
                               <th width="5%">year</th>  
                      <!--leave update as of now but do it later with best logic
                      <th  width="10%">Update</th> -->
                                 
                          </tr>  
                     </thead>  
                </table>  
           </div>  
      </div>
        
<div id="userModal" class="modal fade">
      <div class="modal-dialog">
      <form method="POST" id="user_form">
          <input type="hidden" name="txtId" value="0"/>
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Course Overview</h4>
      </div>
      <div class="modal-body">
          <input type="hidden" name="action" id="action" value="Add" />
          <p class="h3" >Current Information</p>
        <p class="h5">course Id</p>
        <select name="courseid" id="courseid" required="" class="form-control" disabled="">
             <option value="">select Instructor</option>
              <?php 
          $sem = $this->Crs_model->coursesjq();
          foreach ($sem as $row){
              ?><option value="<?php echo $row->courseid; ?>"><?php echo $row->coursename; ?></option>
             
             
          <?php } ?>
         </select>  <p class="h5">course Name</p>
         
         <p class="h5">Student name</p>
         <input name="sname" id="sname" disabled="" type="text" class="form-control"  disabled=""/>
              <p class="h5">Faculty Id</p>
             <select name="fid" id="fid" required="" class="form-control" disabled="">
             <option value="">select Instructor</option>
              <?php 
          $sem = $this->Crs_model->facultyjq();
          foreach ($sem as $row){
              ?><option value="<?php echo $row->fid; ?>"><?php echo 'Dr'.$row->firstname.$row->lastname; ?></option>
             
             
          <?php } ?>
         </select> <p class="h5">Current Faculty name</p>
         <input name="name" id="name" disabled="" type="text" class="form-control"  />
         <?php//option.attr('value', this.fid).text(this.firstname); ?>
      <p class="h5">term</p>
         <select name="sem" id="sem" required="" class="form-control" disabled="">
             <option value="">select term</option>
              <?php 
          $sem = $this->Crs_model->semester();
          foreach ($sem as $row){
              ?><option value="<?php echo $row->semester; ?>"><?php echo $row->semester; ?></option>
             
             
          <?php } ?>
         </select>
      <p class="h5">Year</p>
       <select name="year" id="year" class="form-control" style="width: 240px;" required="true" disabled="">
             <option value="">select year</option>
             <?php 
          $year = $this->Crs_model->year();
          foreach ($year as $row){
              ?><option value="<?php echo $row->year; ?>"><?php echo $row->year; ?></option>
             
             
          <?php } ?>
       </select>  
      <p class="h2">Move Student To</p>
      <select name="yea" id="yea" class="form-control" style="width: 240px;" required="true">
             <option value="">select year</option>
             <?php 
          $year = $this->Crs_model->year();
          foreach ($year as $row){
              ?><option value="<?php echo $row->year; ?>"><?php echo $row->year; ?></option>
             
             
          <?php } ?>
       </select><br><br>
 <!--   -->       
         <select name="sem" id="sem" class="form-control" style="width: 240px;" required="true">
             <option value="">select term</option>
            
 <?php 
          $sem = $this->Crs_model->semester();
          foreach ($sem as $row){
              ?><option value="<?php echo $row->semester; ?>"><?php echo $row->semester; ?></option>
             
             
          <?php } ?>
         </select><br><br>
          <!--   -->
         <!--   -->
         <select id="course" class="form-control" style="width: 240px;" name="course" required="true" title="Select Course">
             <option value="">select course</option>
         </select>
           <!--   -->
         <select class="hidden" id="fid" name="fid" required="true" title="Select faculy">
             
         </select>
 </div>
 <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id"/>
      <input type="submit" class="btn btn-primary" name="action" id="action" value="update" />
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </div>
      </form>
      </div>
    <script>
   $(document).ready(function(){
    $('#sem').change(function(){
     var sem = $('#sem').val();
     var yea=$('#yea').val();
    // var sid=$('#sem').val();
     
     //alert(year);
     //alert(semester);
     if(sem !== '' & yea!=='')
     {
         
         $.ajax({
                    url:"<?php echo site_url()?>/Admin/fetch_sem_admin",
                    method:"POST",
                    data:{yea:yea,sem:sem},
                    success:function(data){
                       //alert(data);
          $('#course').html('<option value="">select course</option>'); 
                       var dataObj = jQuery.parseJSON(data);
                     //alert(dataObj);
                       if(dataObj){
                           $(dataObj).each(function(){
                               var option = $('<option />');
                               option.attr('value', this.courseid).text(this.coursename);           
                               $('#course').append(option);
                           });
                       }else{
                           alert('No courses available to register!!');
                           $('#course').html('<option value="">courses not available</option>');
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
     $('#coursename').change(function(){
          var semester = $('#semester').val();
     var year=$('#year').val();
       var coursename = $('#coursename').val();
          //alert(coursename);
            if(coursename !== '' & semester !== '' & year !== '')
     {
         
         $.ajax({
                    url:"<?php echo site_url()?>/Student/fetch_faculty",
                    method:"POST",
                    data:{coursename:coursename,semester:semester,year:year},
                    success:function(data){
                       //alert(data);
                       //<option value="">select faculty</option>
          $('#fid').html(''); 
                       var dataObj = jQuery.parseJSON(data);
                     //alert(dataObj);
                       if(dataObj){
                           $(dataObj).each(function(){
                               var option = $('<option />');
                               //try to retrive the lastname also
                               option.attr('value', this.fid).text(this.firstname);           
                               $('#fid').append(option);
                           });
                       }else{
                           alert('Faculty not yet decided!!');
                           $('#fid').html('<option value="">courses not available</option>');
                       }
                    }
               });
     }
     else
     {
      alert("hi");
     
     }
       
           });
    
   });

</script>
      </div> </center></div> 
    </body>
</html>

<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
      $('#add_button').click(function(){  
           $('#user_form')[0].reset();  
          // $('.modal-title').text("Add User");  
           //$('#action').val("Add");  
           //$('#user_uploaded_image').html('');  
      })  
      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Admin/get_registrationjq'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0,1,2,3,4,5,6,7,8],  
                     "orderable":false,  
                },  
           ],  
      });  
  
             $(document).on('click', '.update', function(){  
           var user_id = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url(); ?>Admin/fetch_single_registration",  
                method:"POST",  
                data:{user_id:user_id},  
                dataType:"json",  
                success:function(data)  
                {  
                        $('#userModal').modal('show'); 
                     $('#courseid').val(data.courseid);
                    $('#coursename').val(data.coursename);
                   $('#sname').val(data.sname);
                    $('#fid').val(data.fid);
                    $('#name').val(data.name);
                      $('#sem').val(data.sem);
                       $('#year').val(data.year);
                     $('#semester').val(data.semester);
                     $('.modal-title').text("view registration");  
                     $('#user_id').val(user_id);
                      $('#action').val('Update');
        
                }  
           })  
      });   
  //
   //  update
         $(document).on('submit', '#user_form', function(event){  
                event.preventDefault();  
                var coursename = $('#coursename').val();  
               var semester = $('#semester').val();  
                var year=$('#year').val();
                 var aboutcourse=$('#aboutcourse').val();
                      
                if(coursename !== '' && semester !== '' && year !=='' && aboutcourse !== '')  
                {  
                     $.ajax({  
                          url:"<?php echo site_url()?>/Admin/user_action",  
                          method:'POST',  
                          data:new FormData(this),  
                          contentType:false,  
                          processData:false,  
                          success:function(data)  
                          {  
                               alert(data);  
                               $('#user_form')[0].reset();  
                               $('#userModal').modal('hide');  
                               $('#user_data').DataTable().ajax.reload(); 
                          }  
                     });  
                }  
                else  
                {  
                     alert("First Name and Email Fields are Required");  
                }  
           });  
 });  
 </script>  
<?php } else {
redirect('admin/adminloginpage');
}

