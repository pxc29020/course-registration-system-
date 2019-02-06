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
        <h1>manage inactive faculty</h1>
        <?php
      $inactivefaculty =  $this->Crs_model->getadmininacticefaculty();
     // print_r($faculty); 
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
                </tr>
            </thead>
            <tbody>
                <?php foreach($inactivefaculty as $rec){ ?>
                <tr>
                    <td><?php echo $rec['fid'] ?></td>
                  <td><?php echo $rec['firstname'] ?></td>
                  <td><?php echo $rec['lastname'] ?></td>
                  <td><?php echo $rec['username'] ?></td>
                  <td><?php echo $rec['gender'] ?></td>
                  <td><?php echo $rec['phone'] ?></td>
                <td><?php echo $rec['email'] ?></td>
                  <td><?php echo $rec['address'] ?></td>
   <td><a href="<?php echo base_url() . 'Admin/activefaculty/' . $rec['fid'] ?>" ><span class="glyphicon glyphicon glyphicon-refresh"></span> Make faculty active</a></td>
     <td><a href="<?php echo base_url() . 'Admin/deletefaculty/' . $rec['fid'] ?>" ><span class="glyphicon glyphicon glyphicon-refresh"></span>delete faculty</a></td>
                             
                </tr> 
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
