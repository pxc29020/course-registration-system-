<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="admindashboard">home </a>
        <h1>manage inactive students</h1>
        <?php
      $inactivestudents=  $this->Crs_model->getadmininactivestudents();
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
              <th>Delete student</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($inactivestudents as $rec){ ?>
                <tr>
                    <td><?php echo $rec['sid'] ?></td>
                  <td><?php echo $rec['firstname'] ?></td>
                  <td><?php echo $rec['lastname'] ?></td>
                  <td><?php echo $rec['username'] ?></td>
                  <td><?php echo $rec['gender'] ?></td>
                  <td><?php echo $rec['phone'] ?></td>
                <td><?php echo $rec['email'] ?></td>
                  <td><?php echo $rec['address'] ?></td>
   <td><a href="<?php echo base_url() . 'Admin/activestudent/' . $rec['sid'] ?>" ><span class="glyphicon glyphicon glyphicon-refresh"></span> Make student active</a></td>
     <td><a href="<?php echo base_url() . 'Admin/deletestudent/' . $rec['sid'] ?>" ><span class="glyphicon glyphicon glyphicon-refresh"></span>delete student</a></td>
                             
                </tr> 
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
