<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php if($this->session->userdata('sessionadmin') == 1){ ?>

<html>
    <head>
        <title>Manage Student</title>
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
  <a href="managestudentsjq" class="list-group-item active"><span>Manage Students</span></a>
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
                               <th width="10%">StudentId</th>  
                               <th width="10%">Firstname</th>  
                               <th width="10%">Lastname</th>  
                               <th width="10%">Username</th>  
                               <th width="5%">Gender</th>
                               <th width="5%">Email</th>
                                <th width="5%">PhoneNo</th>
                               <th width="5%">Address</th>
                               <th width="15%">UpdateStudent</th>
                               <th width="25%">InactiveStudent</th>
                              <!-- <th width="25%">ChangeStudentpassword</th> -->
                                
                                 
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
          <p class="h5">Firstname</p>
       <input style="width: 240px;" name="firstname" id="firstname"  type="text" class="form-control"  value="" pattern="[A-Za-z]{1,}" title="Firstname should have starting letter as capital letter remaining should be in lowercase. e.g. John" required="true"/>
        <p class="h5">Lastname</p>
       <input style="width: 240px;" name="lastname" id="lastname"  type="text" class="form-control" value="" pattern="[A-Za-z]{1,}" title="Lastname should have starting letter as capital letter remaining should be in lowercase. e.g. John" required="true" />
        <p class="h5">Username</p>
        <input style="width: 240px;" name="username" id="username"  type="text" class="form-control"  pattern="[a-z]{1,15}"
        title="Username should only contain lowercase letters. e.g. john" required="true"/>
        <p class="h5">Gender</p>
        <select style="width: 240px;" name="gender" class="form-control" id="gender" required="true">
         <option id="gender" value="">Select Gender</option>
            <option value="male" >Male</option>
            <option value="female" >Female</option>
        </select><p class="h5">Email</p>
          <input style="width: 240px;" name="email"  id="email" required=""  type="text" class="form-control" pattern=".+ucmo.edu" size="30" title="email should be in the format of school email. e.g. johnjs@ucmo.edu" required/>
         <p class="h5">Phone No</p>
          <input style="width: 240px;" name="phone"  id="phone" required=""  type="text" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
       placeholder="xxx-xxx-xxxx" title="Phone no should be in the format of XXX-XXX-XXXX. e.g. 838-939-9399" required/>
         <p class="h5">Address</p>
          <textarea style="width: 240px;" name="address" rows="3" cols="22" id="address" required=""  type="text" class="form-control" required=""></textarea>
         
       
 </div>
 <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id"/>
      <input type="submit" class="btn btn-primary" name="action" id="action" value="update" />
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </div>
      </form>
      </div>
      </div>
      <div id="userModal2" class="modal fade">
      <div class="modal-dialog">
      <form method="POST" id="user_form2">
          <input type="hidden" name="txtId" value="0"/>
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Update Password</h4>
      </div>
      <div class="modal-body">
          <input type="hidden" name="action" id="action" value="Add" />
          <p class="h5">Old Password</p>
       <input style="width: 240px;" name="password" id="password"  type="text" class="form-control"  value=""   required="true"/>
        <p class="h5">New Password</p>
       <input style="width: 240px;" name="passwordhash" id="passwordhash"  type="text" class="form-control" value=""   required="true" />
        
       
 </div>
 <div class="modal-footer">
     <input type="text" name="user_id1" id="user_id1"/>
      <input type="submit" class="btn btn-primary" name="action" id="action" value="updatepassword" />
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </div>
      </form>
      </div>
      </div>  
        
        </center></div> 
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
                url:"<?php echo base_url() . 'Admin/find_students'; ?>",  
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
                url:"<?php echo base_url(); ?>Admin/fetch_single_student",  
                method:"POST",  
                data:{user_id:user_id},  
                dataType:"json",  
                success:function(data)  
                {  
                        $('#userModal').modal('show'); 
                    
                      $('#firstname').val(data.firstname);
                       $('#lastname').val(data.lastname);
                     $('#username').val(data.username);  
                     $('#gender').val(data.gender);
                      $('#email').val(data.email);
                     $('#phone').val(data.phone);
                     $('#address').val(data.address);
                     $('.modal-title').text("Update Student");  
                     $('#user_id').val(user_id);
                      $('#action').val('Update');
        
                }  
           })  
      });   
  // for the password change
     $(document).on('click', '.updatepassword', function(){  
           var user_id1 = $(this).attr("id"); 
           $.ajax({  
                url:"<?php echo base_url(); ?>Admin/fetch_single_student",  
                method:"POST",  
                data:{user_id1:user_id1},  
                dataType:"json",  
                success:function(data)  
                {  
                        $('#userModal2').modal('show'); 
  
                     $('.modal-title').text("Student Password Update");  
                     $('#user_id1').val(user_id1);
                      $('#action').val('updatepassword');
        
                }  
           })  
      }); 
   //  update
         $(document).on('submit', '#user_form', function(event){  
                event.preventDefault();  
                var firstname = $('#coursename').val();  
               var lastname = $('#semester').val();  
                var username = $('#semester').val();
                var email=$('#year').val();
                 var phone=$('#aboutcourse').val();
                 var gender=$('#aboutcourse').val();
                 var address=$('#aboutcourse').val();     
                if(firstname !== '' && lastname !== '' && username !=='' && email !== '' && phone !== '' && gender !=='' && address !== '')  
                {  
                     $.ajax({  
                          url:"<?php echo site_url()?>/Admin/user_action_student",  
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
       //making user inactive
           $(document).on('click', '.delete', function(){  
           var user_id = $(this).attr("id");  
           if(confirm("Are you sure you want to make student inactive?"))  
           {  
                $.ajax({  
                     url:"<?php echo base_url() . 'Admin/inactive_studentjq'; ?>",  
                     method:"POST",  
                     data:{user_id:user_id},  
                     success:function(data)  
                     {  
                          alert('Successfully made inactive');  
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

