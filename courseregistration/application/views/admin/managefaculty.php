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
        <h1>manage faculty</h1>
        <?php
      $faculty =  $this->Crs_model->getadminfaculty();
     // print_r($faculty); getadmininacticefaculty
        ?>
      <table>
            <thead>
                <tr>
                   <th>Faculty Id</th> 
                    <th>First name</th>  
              <th>Last name</th> 
              <th>Username</th> 
              <th>Gender</th> 
               <th>Phone</th> 
               <th>Email</th> 
               <th>Address</th>
                <th>Make Faculty Inactive</th>
              <th>Update Faculty Information</th>
              <th>Update Faculty Password</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($faculty as $rec){ ?>
                <tr>
                    <td><?php echo $rec['fid'] ?></td>
                  <td><?php echo $rec['firstname'] ?></td>
                  <td><?php echo $rec['lastname'] ?></td>
                  <td><?php echo $rec['username'] ?></td>
                  <td><?php $gender =  $rec['gender'];
                  if($gender > 0){echo 'male';} else {
                  echo 'female';} ?></td>
                  <td><?php echo $rec['phone'] ?></td>
                <td><?php echo $rec['email'] ?></td>
                  <td><?php echo $rec['address'] ?></td>
   <td><a href="<?php echo base_url() . 'Admin/inactivefaculty/' . $rec['fid'] ?>" ><span class="glyphicon glyphicon glyphicon-refresh"></span> Make faculty inactive</a></td>
     <td><a href="<?php echo base_url() . 'Admin/updatefacultyinformation/' . $rec['fid'] ?>" ><span class="glyphicon glyphicon glyphicon-refresh"></span>Update faculty Information</a></td>
      <td><a href="<?php echo base_url() . 'Admin/facultypasswordchange/' . $rec['fid'] ?>" ><span class="glyphicon glyphicon glyphicon-refresh"></span>Password Update</a></td>
                             
                </tr> 
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
