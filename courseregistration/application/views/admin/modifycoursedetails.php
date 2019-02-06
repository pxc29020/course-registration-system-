<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mofify Course</title>
       <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
    </head>
    <body>
         <?php
         $id = $this->uri->segment(3);
        $details = $this->Crs_model->coursedetails($id);
        $faculty = $this->Crs_model->faculty();
       // print_r($details);
        ?>
  <table><tr>
      <a href="<?php echo base_url().'Admin/admindashboard';?>">home </a>
            </tr>
            <tr>     </tr>
  
                <?php echo form_open('Admin/update_coursedetails');?>
            <tr><br></tr>
            <tr><input type="hidden" name="courseid" value="<?php echo $id; ?>"/></tr>  
         <tr><br></tr> 
            <tr><br></tr>
            <tr><input type="text" name="cid" placeholder="CourseId" disabled="true" value="<?php echo $id; ?>"/></tr>  
         <tr><br></tr>
        
            <tr><input type="text" name="coursename" placeholder="Coursename" required="true"/></tr>  
         <tr><br></tr>
        
            <tr><input type="text" name="year" placeholder="Year" 
        required="true"/></tr> 
         <tr><br></tr>
         <?php foreach($details as $previous){ ?>
         <tr><label>Previously entered semester</label>
         <input name="sem" disabled="true" value="<?php echo $previous->semester; ?>"/>
  </tr> <tr><br></tr>
         <tr><label>change semester</label>
         <select name="semester" required="true"><option>select semester</option>
             <option value="Spring">Spring</option><option value="FALL">FALL</option><option value="Summer">Summer</option></select></tr> 
         <tr><br></tr>
         <tr>
         <input type="text" name="department" pattern="[A-Za-z]{1,}" placeholder="department"required="true"/>
  </tr>   <tr><br></tr> 
  
            <tr><label>Previously entered faculty</label>
         <input name="fac" disabled="true" value="<?php echo $previous->firstname.' '.$previous->lastname; ?>"/>
         </tr> 
<tr><br></tr>   <tr>
         <?php } ?><label>change faculty</label>
         <select name="fid">
             <option>select faculty</option> 
           <?php
 foreach($faculty as $name){ ?>
    <option id="<?php echo $name['fid']; ?>" value="<?php echo $name['fid']; ?>"><?php  echo $name['firstname'].$name['lastname']; ?> </option> <?php  } ?>
         </select></tr>
         <tr><br></tr>


     
     <tr><button type="submit" name="submit">Update details</button></tr>
     <?php echo form_close(); ?>   
</table>
    </body>
</html>
