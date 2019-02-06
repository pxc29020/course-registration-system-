<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>List Of Courses and Overview</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  
    </head>
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
.container-box{
     
 background-image: url("<?php echo base_url();?>images/university.jpg");
 background-size: cover;
    
}
        </style>
        
    <body>
  <?php
       $t = $this->session->userdata();
 $courses =  $this->Crs_model->joincourses();
        ?>
           
            <?php //include_once 'studentheader.php';   ?>
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
     <a class="navbar-brand" href="studentabout">About</a>
   
  </div>
  <div class="navbar-collapse collapse">

    <ul class="nav navbar-nav navbar-right">


   <li class="dropdown movable">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<span class="caret"></span><span class="fa fa-4x fa-child"></span></a>
                  <ul class="dropdown-menu" role="menu">
                      <li><a href="updateprofile"><span class="fa fa-user"></span>Update Profile</a></li>
                      <li><a href="updatepassword"><span class="fa fa-gear"></span>Update Password</a></li>
                      <li class="divider"></li>
                      <li><a href="logout"><span class="fa fa-power-off"></span>Logout</a></li>
                  </ul>
              </li>
    </ul>
      
  </div>
    
</nav>
         
      

     
           <div class="list-group">
   
 <a href="listofcourses" class="list-group-item active"><span>List Of Courses</span></a>
    <a href="enrollcourses" class="list-group-item"><span>Enrollment</span></a>
    <a href="meetupwithfaculty" class="list-group-item"><span>Meet Professor</span></a>
    <a href="feedetails" class="list-group-item"><span>Fee Details</span></a>
    <a href="testpage" class="list-group-item"><span>Notes to Faculty</span></a>
   <a href="viewnotes" class="list-group-item"><span>View Notes</span></a>
    <a href="viewmeetupwithfaculty" class="list-group-item"><span>View Meeting</span></a>

 <a href="grades" class="list-group-item"><span>Grades</span></a>


  </div>
        

              <?php /*    <div class="test">
        <center class="table-responsive">
           
           <table class="table table-bordered" style="color:#9d9d9d;">
            <thead>
                <tr>
           
                   <th>Course Id</th> 
                    <th>Course name</th>  
              <th>Year</th> 
              <th>semester</th> 
              <th>department</th> 
               <th>faculty Id</th> 
               <th>faculty Name</th> 
              <!--     <th>enroll</th>
                       <th>Modify details</th>

 <th>Delete Course</th>-->
     
                </tr>
            </thead>
            <tbody>
                <?php foreach($courses as $rec){ ?>
                <tr>
                 <td><?php echo $rec->courseid ?></td>
                  <td><?php echo $rec->coursename  ?></td>
                  <td><?php echo $rec->year?></td>
                  <td><?php echo $rec->semester  ?></td>
                  <td><?php echo $rec->department ;
                  ?></td>
                  <td><?php echo $rec->fid  ?></td>
 <td><?php echo $rec->firstname.$rec->lastname  ?></td>
 <!--<td class="hidden"><a  href="<?php echo base_url() . 'Admin/modifycoursedetails/' . $rec->courseid ?>" ><span class="glyphicon glyphicon glyphicon-refresh"></span>modify Information</a></td>
 
 <td class="hidden"><a  href="<?php echo base_url() . 'Student/enrollcourses/' . $rec->courseid ?>" onclick="return confirm('are you sure ?')"><span class="glyphicon glyphicon glyphicon-danger"></span>Enroll Course</a></td>
        -->               
                </tr> 
                <?php } ?>
                
          
       
            </tbody>
        </table> /
        *  ?>
        
           <div class="container box">  
           <h3 align="center"><?php //$title = 'test page';echo $title; ?></h3><br />  
           <div class="table-responsive">  
            
                <table id="user_data" class="table table-bordered table-striped">  
                     <thead>  
                          <tr>  
                               <th width="10%">Course Id</th>  
                               <th width="35%">Course Name</th>  
                               <th width="35%">Semester</th>  
                               <th width="10%">year</th>  
                               <th width="10%">firstname</th>
                               <th width="10%">fid</th>
                          </tr>  
                     </thead>  
                </table>  
           </div>  
      </div>       
        </center>  
                  </div>   */ ?>
        <br><br>
         <div class="test">
        <center class="table-responsive">
        <div class="container box" cellspacing="0" width="100%">  
           <h3 align="center"><?php //$title = 'test page';echo $title; ?></h3><br />  
           <div class="table-responsive">  
            
                <table id="user_data" class="table table-bordered table-striped table-hover">  
                    <thead bgcolor="#a50000">  
                          <tr style="color: white">  
                              <th  width="10%">CourseId</th>  
                               <th width="20%">CourseName</th>
                               <th width="5%">Time</th>
                               <th width="10%">Section</th>
                               <th width="15%">Semester</th>  
                               <th width="10%">Year</th>  
                             <!--  <th width="10%">Firstname</th>
                               <th width="20%">FacultyId</th> -->
                               <th width="10%">StartDate</th>
                                <th width="10%">Overview</th>
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
      <h4 class="modal-title" style="">Course Overview</h4>
      </div>
      <div class="modal-body">
         <input type="hidden" name="action" id="action" value="Add" />
                         <textarea name="test" id="test"class="form-control" rows="16" disabled="true"></textarea>
           
 </div>
      <div class="modal-footer">
          <input type="hidden" name="user_id" id="user_id"/>
      <input type="hidden" name="action" id="action" value="Add" />
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
   
      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
      //Server-side processing is enabled by setting the serverSide option to true and providing an Ajax data source through the ajax option.
             "lengthMenu": [[5, 10, 15, 25, 50, 100 , -1], [5, 10, 15, 25, 50, 100, "All"]],
                 "pageLength":5, 
                
           "order":[],  
           //"ajax" is used to fetch data from the controller in controller the data we get from model will be echo output
           "ajax":{  
                url:"<?php echo base_url() . 'Student/find_course'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0,1,2,3,4,5,6,7],  
                     "orderable":false,  
                },  
           ],  
      });  
  
             $(document).on('click', '.overview', function(){  
           var user_id = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url(); ?>Learn/fetch_single_user",  
                method:"POST",  
                data:{user_id:user_id},  
                dataType:"json",  
                success:function(data)  
                {  
                    //show the modal pop up 
                     $('#userModal').modal('show');  
                     //test attribute
                     $('#test').val(data.test);  
                    //title name is course overview
                     $('.modal-title').text("Course Overview");  
                     $('#user_id').val(user_id);  
        
                }  
           })  
      });   
  
 });  
 </script>  