<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin Login Page</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
            <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
     
        <style>
             body {
 background-image: url("<?php echo base_url();?>images/uni.jpg");
 background-size: cover;
        }
 .test {
 width: 80%;
  margin-left: 11%;
  margin-top: 90px;
   
} 
  .center {
  text-align: center;
    margin-top: -100px; 
   
}

        </style>
    </head>
        <body>
            
       <?php  include_once 'adminheader.php'; ?>
      
      <br>
         <div class="test">
        <center class="table-responsive">
       <?php  if($this->session->flashdata('error')){  ?>
<div style="width: 240px;" class="alert alert-danger"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; } ?>          
          <p class="h2" style="color:white;">Admin Login</p><br>
     <?php echo form_open('Login/checkauthenticationadmin');?>
        <input name="username" style="width: 240px;" class="form-control input-sm chat-input" type="text" placeholder="username" required="true"/><br>
        <input name="password" style="width: 240px;" type="password" class="form-control input-sm chat-input" placeholder="password" required="true"/><br>
        <button class="btn btn-primary btn-md" type="submit">login</button>
        <p class="h4" style="color: white;">username: admin and password: admin123</p>
    <?php echo form_close(); ?></center></div>
    </body>
</html>

