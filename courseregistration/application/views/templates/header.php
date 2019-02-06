<!DOCTYPE html>

 <!-- 
    Created By Pradeep Chandra Chitti
    Student ID : 700672902
    Email: PXC29020@UCMO.EDU
    ADVANCE SYSTEM PROJECT
    
    
    -->
        
    
   <?php if($this->session->userdata){ ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>

        <style>
                         
navbar-brand {
  position: absolute;
  width: auto;
  left: 15px;
  text-align: center;
  margin:0 auto;
  
}

.navbar-toggle {
  z-index:3;
}

/* On Tabs & Desktops */
@media screen and (min-width: 768px) {
  .navbar-left {
      
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
  }
}
   
        </style>
       <div class="logo" align="middle">
          <!---logo will be in the top-centre of the page  under the logo h1 tag course registration system-->
           <a href="<?php echo base_url();?>"><img src="images/logo3.jpg" alt="test" height="100px" width="110px"></a><span class="h3"style="color:white;"><br><p class="h4">Course Registration System</p></span>
            </div>
<nav class="navbar navbar-inverse" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>    
    <a class="navbar-brand" href="<?php echo base_url();?>">Home</a>
     <a class="navbar-brand" href="Welcome/about">About</a>
     
  </div>
  <div class="navbar-collapse collapse">
      <!-- navbar-collapse collapse is the extension depending on the screen size-->
    <ul class="nav navbar-nav navbar-left">
    
        <li><a href="Student/studentloginpage">Enroll Courses</a></li>
        <li><a href="Student/studentloginpage">Meet Faculty</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">

        <li><a href="Student/studentloginpage">Drop Course</a></li>
      <li><a href="Student/studentloginpage">View Grades</a></li>

    </ul>
      
  </div>
    
</nav>
   <?php }