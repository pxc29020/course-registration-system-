<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Manage Student</title>
    </head>
    <body>
        <a href="admindashboard">home </a>
        <h1>manage active students</h1>
        <?php
      $students=  $this->Crs_model->getadminstudents();
     // print_r($students);
      //sid
      ?>
        <table>
            <thead>
                <tr>
                   <th>Student Id</th> 
                    <th>First name</th>  
              <th>Last name</th> 
              <th>Username</th> 
              <th>Gender</th> 
               <th>Phone</th> 
               <th>Email</th> 
               <th>Address</th>
                <th>Make Inactive</th>
              <th>Update Student Information</th>
               <th>Update Student Password</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($students as $rec){ ?>
                <tr>
                    <td><?php echo $rec['sid'] ?></td>
                  <td><?php echo $rec['firstname'] ?></td>
                  <td><?php echo $rec['lastname'] ?></td>
                  <td><?php echo $rec['username'] ?></td>
                  <td><?php $gender =  $rec['gender'];
                  if($gender > 0){echo 'male';} else {
    echo 'female';
}?></td>
                  <td><?php echo $rec['phone'] ?></td>
                <td><?php echo $rec['email'] ?></td>
                  <td><?php echo $rec['address'] ?></td>
   <td><a href="<?php echo base_url() . 'Admin/inactivestudent/' . $rec['sid'] ?>" ><span class="glyphicon glyphicon glyphicon-refresh"></span> Make student inactive</a></td>
     <td><a href="<?php echo base_url() . 'Admin/updatestudentinformation/' . $rec['sid'] ?>" ><span class="glyphicon glyphicon glyphicon-refresh"></span>Update Student Information</a></td>
       <td><a href="<?php echo base_url() . 'Admin/studentpasswordchange/' . $rec['sid'] ?>" ><span class="glyphicon glyphicon glyphicon-refresh"></span>Update Password</a></td>
                            
                </tr> 
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
