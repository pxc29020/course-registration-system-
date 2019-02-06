<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Notes</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
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
     <a class="navbar-brand" href="#">services</a>
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
   
 <a href="listofcourses" class="list-group-item"><span>List Of Courses</span></a>
    <a href="enrollcourses" class="list-group-item"><span>Enrollment</span></a>
    <a href="meetupwithfaculty" class="list-group-item"><span>Meet Professor</span></a>
    <a href="feedetails" class="list-group-item"><span>Fee Details</span></a>
    <a href="testpage" class="list-group-item"><span>Notes to Faculty</span></a>
   <a href="viewnotes" class="list-group-item active"><span>View Notes</span></a>
    <a href="viewmeetupwithfaculty" class="list-group-item"><span>View Meeting</span></a>
 <a href="grades" class="list-group-item"><span>Grades</span></a>


  </div>
        <p>  </p>
        <div class="test">
        <center class="table-responsive">
         <?php
      /*    $id = $this->session->userdata('sid');
       // $courses =  $this->Crs_model->my_faculty_courses($id);  
     //   print_r($courses);
          //student should get access to faculty notes table
          //student will sent notes to faculty will have uniq nid
          //faculty will sent notes to same uniq nid note
          //the seen will become 0 
          //student can able to see the reply note
          ?>
 
        <div class="container">
   <br />
   <br />
   <br />
   <h2 align="center"></h2><br />
   <div class="form-group">
    <div class="input-group" style="color:#9d9d9d;width: 20%;margin-left: 35%;">
  
     <input type="text" name="search_text" id="search_text" placeholder="Search" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>
  <div style="clear:both"></div>
  <br />
  <br />
  <br />
  <br /></center></div>
      <script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>student/see_notes",
   method:"POST",
   data:{query:query},
   success:function(data){
    $('#result').html(data);
   }
  })
 }

 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search !== '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
       * 
       */ ?>
      <br />
  <br />       
   <div class="container box">  
           <h3 align="center"><?php //$title = 'test page';echo $title; ?></h3><br />  
           <div class="table-responsive">  
            
                <table id="user_data" class="table table-bordered table-striped table-hover">  
                    <thead bgcolor="#a50000"> 
                          <tr style="color: white">  
                               <th width="10%">Note Id</th>  
                               <th width="35%">Your Notes</th>  
                               <th width="30%">Faculty Notes</th>  
                               <th width="15%">Faculty Name</th>  
                               <th width="10%">datetime</th>
                             
                          </tr>  
                     </thead>  
                </table>  
           </div>  
      </div>
        <div id="userModal" class="modal fade">  
      <div class="modal-dialog">  
           <form method="post" id="user_form">  
                <div class="modal-content">  
              
          
         
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
                url:"<?php echo base_url() . 'Student/student_view_notes'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0,1,2,3,4],  
                     "orderable":false,  
                },  
           ],  
      });  
  
        
  
 });  
 </script>  