<!DOCTYPE html>
<!--
Created by Pradeep Chandra Chitti
student id : 700672902
email: pxc29020@ucmo.edu
-->
<?php //if($this->session->userdata == '') {?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Faculty Login Page</title>
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
       <?php  include_once 'facultyheader.php'; ?>
      <div class="container">
     <?php echo form_open('Login/checkfaculty');?>

        
 <div class="test">
        <center class="table-responsive">
                       <?php  if($this->session->flashdata('error')){  ?>
<div style="width: 240px;" class="alert alert-danger"><strong>Error!</strong> <?php echo $this->session->flashdata('error'); echo '</div>'; } ?>          
          <p class="h2" style="color:white;">Faculty Login</p><br>
    <input type="email" style="width: 240px;" class="form-control input-sm chat-input" name="email" placeholder="email"  size="30" title="email should be in the format of school email. e.g. johnjs@ucmo.edu" required/><br>
          <!-- pattern=".+ucmo.edu" -->
           <input style="width: 240px;" name="passwordhash" class="form-control input-sm chat-input" type="password" placeholder="password" required="true"/><br>
       
                
                <button type="submit" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></button>
          
          
         
      <p class="h4" style="color:white;">Email: ravarthpeter.rp@gmail.com and password: admin123</p>
                
    </div> 
             <?php echo form_close(); ?>
        </center></div>
     
    </body>
</html>
<!--
 *  }elseif ($this->session->userdata('sessionstudent')== 3) {
     redirect('Student/studentdashboard');
} elseif ($this->session->userdata('sessionfaculty')== 2) {
     redirect('Faculty/facultydashboard');
} 
elseif ($this->session->userdata('sessionadmin')== 1) {
     redirect('Admin/admindashboard');
} 
 * 
 */-->