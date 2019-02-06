<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      <title>View Meet Faculty</title>
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
 width: 87%;
  margin-left: 13%;
   
} 
         body  
           {  
                margin:0;  
                padding:0;  
                background-color:#f1f1f1;  
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
  </style>
    </head>
    <body>
   
      <?php 
   include_once 'facultyheader.php';      
   ?>        <div class="list-group">
    <a href="viewnotes" class="list-group-item"><span>View Student Notes</span></a>
   <a href="viewnotes" class="list-group-item"><span>Reply notes</span></a>
    <a href="viewmeetupfaculty" class="list-group-item active"><span>View Meeting</span></a>
  <a href="testpage" class="list-group-item"><span>Appointments of the day</span></a>
 <a href="gradestudents" class="list-group-item"><span>Grade Student</span></a>
   <a href="addtimeslot" class="list-group-item"><span>Add My Time Slot</span></a>
 <a href="viewtimeslot" class="list-group-item"><span>View My Time Slots</span></a>
  <a href="viewtimeslotinactive" class="list-group-item"><span>View My Inactive Time Slots</span></a>
   <a href="facultyclassesavail" class="list-group-item"><span>Add My Classes Availability</span></a>
      <a href="viewappointmentcancelreport" class="list-group-item"><span>View Appointment Cancel Reports</span></a>
  
   </div>
        <br><br>
               <div class="test">
            <center class="table-responsive">
               <div class="container box">  
           <h3 align="center"><?php //$title = 'test page';echo $title; ?></h3><br />  
         
           <div class="table-responsive">  
         
               <table id="user_data" class="table table-bordered table-striped table-hover">  
                    <thead bgcolor="#a50000">  
                          <tr style="color: white">
                               <th width="10%">Appointment Id</th>  
                               <th width="10%">Student Id</th>  
                               <th width="10%">Student Name</th>  
                               <th width="10%">Date</th>  
                               <th width="10%">Time</th> 
                         <th width="5%">Delete</th> 
                              
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
      <h4 class="modal-title">Update Student Details</h4>
      </div>
      <div class="modal-body">
      <label>First Name</label>
      <input type="text" name="first_name" id="first_Name" class="form-control" pattern="^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$" title="Please enter only characters"/><br>
      <label>Last Name</label>
      <input type="text" name="last_name" id="last_Name" class="form-control" pattern="^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$" title="Please enter only characters"/><br>
      <label>Email</label>
      <input type="text" name="mail" id="mail" class="form-control" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="example@ex.com"/><br>
      <label>Phone</label>
      <input type="text" name="phone" id="phone" class="form-control" maxlength="10" pattern="^(?!(\d)\1{9})(?!0123456789|1234567890|0987654321|9876543210)\d{10}$" title="enter 10 digit phone number"/><br>
      <label>Address</label>
      <input type="text" name="address" id="address" class="form-control"/><br>
      <input type="hidden" name="user_name" id="user_name" class="form-control"/><br>
      </div>
      <div class="modal-footer">
      <input type="hidden" name="user_id" id="user_id"/>
      <input type="submit" name="action" id="action" value="Add" />
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </div>
      </form>
      </div>
      </div> 
            </center></div>
<script type="text/javascript" language="javascript" >  
 $(document).ready(function(){  
  
      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Faculty/meetup_student'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0,1,2,3,4,5],  
                     "orderable":false,  
                },  
           ],  
      }); 

           $(document).on('click', '.delete', function(){  
           var user_id = $(this).attr("id");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"<?php echo base_url() . 'Faculty/delete_appointment'; ?>",  
                     method:"POST",  
                     data:{user_id:user_id},  
                     success:function(data)  
                     {  
                          alert('Success fully deleted');  
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
    </body>
</html>