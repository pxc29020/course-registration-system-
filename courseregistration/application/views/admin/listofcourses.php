<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php if($this->session->userdata('sessionadmin') == 1){ ?>

<html>
    <head>
        
        <meta charset="UTF-8">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <title>List of Courses</title>
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
     <a class="navbar-brand" href="<?php echo base_url().'Admin/adminabout';?>">About</a>
    
  </div>
  <div class="navbar-collapse collapse">

    <ul class="nav navbar-nav navbar-right">


   <li class="dropdown movable">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<span class="caret"></span><span class="fa fa-4x fa-child"></span></a>
                  <ul class="dropdown-menu" role="menu">
                     
                      <li><a href="#"><span class="fa fa-gear"></span>Update Password</a></li>
                      <li class="divider"></li>
                      <li><a href="logout"><span class="fa fa-power-off"></span>Logout</a></li>
                  </ul>
              </li>
    </ul>
      
  </div>
    
</nav>
        <?php
     $t = $this->session->userdata();
 
     ?><br><br>
     
 <div class="list-group">
    <a href="listofcourses" class="list-group-item active"><span>View List Of Courses</span></a>
   <a href="addcourses" class="list-group-item"><span>Add Course</span></a>
       <a href="assignfaculty" class="list-group-item"><span>Assign Faculty</span></a>

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
        <div class="container box">  
           <h3 align="center"><?php //$title = 'test page';echo $title; ?></h3><br />  
           <div class="table-responsive">  
            
        <table id="user_data" class="table table-bordered table-striped table-hover">  
                    <thead bgcolor="#a50000">  
                          <tr style="color: white"> 
                               <th width="5%">CId</th>
                               <th width="10%">CourseId</th>  
                               <th width="12%">CourseName</th> 
                               <th width="8%">Time</th>
                                <th width="10%">Section</th>
                                
                                <th width="15%">Semester</th>  
                               <th width="10%">year</th>  
                             <!--  <th width="10%">facultyname</th>
                               <th width="17%">facultyId</th> -->
                               
                               <th width="5%">StartDate</th>
                               <th width="3%">Day</th>
                                <th width="10%">update</th>
                                 
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
      <h4 class="modal-title">Course Update</h4>
      </div>
      <div class="modal-body">
          <input type="hidden" name="action" id="action" value="Add" />
        <p class="h5">course name</p>
         <input style="width: 270px;"  name="coursename" id="coursename"  type="text" class="form-control"  />
         <br> 
           <p class="h5">Section</p>
           <input style="width: 270px;"  name="section" id="section"  type="text" class="form-control" disabled="" />
         <br> 
         <p class="h5">Update Term</p>
   <select name="semester" style="width: 270px;" id="semester" required="" class="form-control">
             <option value="">select term</option>
              <?php 
          $sem = $this->Crs_model->semester();
          foreach ($sem as $row){
              ?><option value="<?php echo $row['semester']; ?>"><?php echo $row['semester']; ?></option>
             
             
          <?php } ?>
         </select><br>  <p class="h5">Update Year</p>
       <select style="width: 270px;" name="year" id="year" class="form-control" style="width: 240px;" required="true">
             <option value="">select year</option>
             <?php 
          $year = $this->Crs_model->year();
          foreach ($year as $row){
              ?><option value="<?php echo $row->year; ?>"><?php echo $row->year; ?></option>
             
             
          <?php } ?>
       </select> <br>
         <input type="date" class="form-control" style="width: 240px;" id="startdate" name="startdate"  required="true"/>
       <br><br>
       
       <p>About The Course</p>
         <textarea name="aboutcourse" id="aboutcourse"class="form-control" rows="16" ></textarea>
           
 </div>
 <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id"/>
      <input type="submit" class="btn btn-primary" name="action" id="action" value="update" />
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </div>
      </form>
      </div>
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
                url:"<?php echo base_url() . 'Admin/find_course'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0,1,2,3,4,5,6,7,8,9],  
                     "orderable":false,  
                },  
           ],  
      });  
  
             $(document).on('click', '.update', function(){  
           var user_id = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url(); ?>Admin/fetch_single_user",  
                method:"POST",  
                data:{user_id:user_id},  
                dataType:"json",  
                success:function(data)  
                {  
                        $('#userModal').modal('show'); 
                     $('#coursename').val(data.coursename);
                 $('#section').val(data.section);
                       $('#year').val(data.year);
                     $('#aboutcourse').val(data.aboutcourse);  
                     $('#semester').val(data.semester);
                     $('#startdate').val(data.startdate);
                     $('.modal-title').text("Course Update");  
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
                     alert("Please fill all the details to update");  
                }  
           });  
 });  
 </script>  
<?php } else {
redirect('admin/adminloginpage');
}

