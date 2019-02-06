<!-- 
    Created By Pradeep Chandra Chitti
    Student ID : 700672902
    Email: PXC29020@UCMO.EDU
    ADVANCE SYSTEM PROJECT
    
    -->
        
    
   <?php if($this->session->userdata('sessionadmin') == 1){ ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Header</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  
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
     <a class="navbar-brand" href="<?php echo base_url().'Admin/adminabout';?>">About</a>
     
  </div>
  <div class="navbar-collapse collapse">

    <ul class="nav navbar-nav navbar-right">


   <li class="dropdown movable">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<span class="caret"></span><span class="fa fa-4x fa-child"></span></a>
                  <ul class="dropdown-menu" role="menu">
                     
                      <li><a href="updatepassword"><span class="fa fa-gear"></span>Update Password</a></li>
                      <li class="divider"></li>
                      <li><a href="logout"><span class="fa fa-power-off"></span>Logout</a></li>
                  </ul>
              </li>
    </ul>
      
  </div>
    
</nav>
   <?php } else {   ?>
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
<?php }