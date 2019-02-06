<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php if($this->session->userdata('sessionadmin') == 1){ ?>

<html>
    <head>
        <title>Manage Inactive Student</title>
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
   width: 90%;
}
    .test {
 width: 90%;
  margin-left: 10%;
   
} 
 .list-group {
     
     margin:auto;
     float:left;
     padding-top:20px;
    }
    .box  
           {  
                width:1000px;  
                padding:20px;  
                background-color:#fff;  
                border:1px solid #ccc;  
                border-radius:5px;  
                margin-top:10px;  
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
 
     ?><br><br>
     
 <div class="list-group">
    <a href="listofcourses" class="list-group-item"><span>View List Of Courses</span></a>
  <a href="addcourses" class="list-group-item"><span>Add Course</span></a>
      <a href="assignfaculty" class="list-group-item"><span>Assign Faculty</span></a>

 <a href="addstudent" class="list-group-item"><span>Add Student</span></a>
    <a href="addfaculty" class="list-group-item"><span>Add Faculty</span></a>
  <a href="managestudentsjq" class="list-group-item"><span>Manage Students</span></a>
      <a href="manageinactivejq" class="list-group-item active"><span>Manage inactive Students</span></a>
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
                   <th width="10%">StudentId</th>  
                               <th width="10%">Firstname</th>  
                               <th width="10%">Lastname</th>  
                               <th width="10%">Username</th>  
                               <th width="5%">Gender</th>
                         <th width="5%">Email</th>
                                <th width="5%">PhoneNo</th>
                               <th width="5%">Address</th>
                               <th width="15%">UpdateStudent</th>
                               <th width="25%">ActiveStudent</th>
                               
                                 
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
     
       <input name="firstname" id="firstname"  type="text" class="form-control"  />
        <input name="lastname" id="lastname"  type="text" class="form-control"  />
        
        <input name="username" id="username"  type="text" class="form-control"  />
        
     <select name="gender"  id="gender" required="true">
         <option id="gender" value="">Select Gender</option>
            <option value="male" >Male</option>
            <option value="female" >Female</option>
        </select>
          <input name="email"  id="email" required=""  type="text" class="form-control" />
         
          <input name="phone"  id="phone" required=""  type="text" class="form-control" />
            <input name="address"  id="address" required=""  type="text" class="form-control" />
         
       
 </div>
 <div class="modal-footer">
     <input type="text" name="user_id" id="user_id"/>
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
                url:"<?php echo base_url() . 'Admin/find_students_inactive'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0,1,2,3,4,5,6,7,8,9],  
                     "orderable":false,  
                },  
           ],  
      });  
  
             
  //
   //  update
       //making user inactive
           $(document).on('click', '.active', function(){  
           var user_id = $(this).attr("id");  
           if(confirm("Are you sure you want to active student?"))  
           {  
                $.ajax({  
                     url:"<?php echo base_url() . 'Admin/active_studentjq'; ?>",  
                     method:"POST",  
                     data:{user_id:user_id},  
                     success:function(data)  
                     {  
                          alert('Successfully made active');  
                          dataTable.ajax.reload();  
                     }  
                });  
           }  
           else  
           {  
                return false;       
           }  
      });
       //making user inactive
           $(document).on('click', '.delete', function(){  
           var user_id = $(this).attr("id");  
           if(confirm("Are you sure you want to delete student?"))  
           {  
                $.ajax({  
                     url:"<?php echo base_url() . 'Admin/inactive_studentjqdelete'; ?>",  
                     method:"POST",  
                     data:{user_id:user_id},  
                     success:function(data)  
                     {  
                          alert('Successfully deleted student');  
                          dataTable.ajax.reload();  
                     }  
                });  
           }  
           else  
           {  
                return false;       
           }  
      });
 });  
 </script>  
<?php } else {
redirect('admin/adminloginpage');
}

