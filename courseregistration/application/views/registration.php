<!DOCTYPE html>
<!--
Created by Pradeep Chandra Chitti
student id : 700672902
email: pxc29020@ucmo.edu
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Student Registration</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
            <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style>
            .container.body-content {
    padding-bottom: 110px;
    height: 500px; /* Force height on body */
}
            .center {
  text-align: center;
}
      body {
 background-image: url("<?php echo base_url();?>images/university.jpg");
 background-size: cover;
        }
  
        </style>
</head>

<body>
    

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
    <a class="navbar-brand" href="<?php echo base_url().'Welcome/about' ?>">About</a>
    
  </div>

    
</nav>
 <br>

 
    <div class="test">
 <center class="table-responsive">
 <?php 
$err = validation_errors();
//if(isset($err) && !empty($err)):
echo validation_errors('<div class="alert alert-danger">','</div>');
//endif;
?>                                        <?php  if($this->session->flashdata('error')){  ?>
<div class="alert alert-danger" style="width: 240px;"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; }elseif($this->session->flashdata('success')){ ?>
<div class="alert alert-success" style="width: 240px;"><strong>Success!</strong> <?php echo $this->session->flashdata('success'); echo '</div>'; } elseif($this->session->flashdata('warning')){ ?>
<div class="alert alert-warning" style="width: 240px;"><strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); echo '</div>'; } ?>       
            
               <br><br>  
               <p style="color:white;" class="h3">Welcome to Student Registration</p>         
             <?php echo form_open('Welcome/register');?><br><br>
  
  <input class="form-control" placeholder="Firstname" style="width: 240px;" type="text" name="firstname" value="" pattern="[A-Za-z]{1,}" title="Firstname should have starting letter as capital letter remaining should be in lowercase. e.g. John" required="true"/>
   <br>
   <input class="form-control" placeholder="Lastname" style="width: 240px;" type="text" name="lastname" value="" pattern="[A-Za-z]{1,}" title="Lastname should have starting letter as capital letter remaining should be in lowercase. e.g. John" required="true"/>
   <br>
   <input class="form-control" style="width: 240px;" type="text" value="" name="username" placeholder="username" pattern="[a-z]{1,15}"
        title="Username should only contain lowercase letters. e.g. john" required="true"/>
   <br><label style="color:white;">Select Gender</label>
   <select required="" style="width: 240px;"  class="form-control" name="gender" >
           <option value="">select gender</option>
           <option value="male">Male</option>
           <option value="female">Female</option>
           <option value="other">Other</option>
       </select>
   
  <br>
   <input class="form-control" style="width: 240px;" type="text" value="" name="email" placeholder="Email" pattern=".+ucmo.edu" size="30" title="email should be in the format of school email. e.g. johnjs@ucmo.edu" required/>
   <br><label style="color:white;">Phone</label><br>
   <input class="form-control" style="width: 240px;" type="text" id="phone" name="phone" value=""
       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
       placeholder="xxx-xxx-xxxx" title="Phone no should be in the format of XXX-XXX-XXXX. e.g. 838-939-9399" required/>
   <br>
   
   <textarea class="form-control" style="width: 240px;" id="address" name="address" rows="3" cols="22" placeholder="Address" required="true"></textarea>
   <br>
   <br><input class="btn btn-primary" type="submit" placeholder="" name="Update"/>
   
          <?php echo form_close()?>
     </center> 
    </div>
</body>       
  
</html>
