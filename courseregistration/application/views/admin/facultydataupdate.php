<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Faculty Update</title>
    </head>
    <body>
             <a href="http://localhost/courseregistration/Admin/admindashboard">home </a>
        
     <?php
 $id = $this->uri->segment(3);
 print_r($id);
 $data = $this->Crs_model->get_facultydata($id);
 print_r($data);
        ?>
    <table>
            <tr>
                <a href="logout"> logout</a> 
            </tr>
             <?php foreach($data as $rec){ ?>
                <?php echo form_open('Admin/update_faculty');?>
     
        <tr><input type="hidden" value="<?php echo $rec['fid']; ?>" name="id" placeholder="id"/></tr>  
       
            <tr><br></tr>
            <tr><input type="text" value="<?php echo $rec['firstname']; ?>" name="firstname" placeholder="firstname" pattern="[A-Za-z]{1,}" required="true"/></tr>  
         <tr><br></tr>
        
            <tr><input type="text" value="<?php echo $rec['lastname']; ?>" name="lastname" placeholder="lastname" pattern="[A-Za-z]{1,}" required="true"/></tr>  
         <tr><br></tr>
        
            <tr><input type="text" value="<?php echo $rec['username']; ?>" name="username" placeholder="username" pattern="[a-z]{1,15}"
        title="Username should only contain lowercase letters. e.g. john" required="true"/></tr> 
         <tr><br></tr>
        
         <!--   <tr><input type="text" value="<?php echo $rec['passwordhash']; ?>" name="password" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="true"/></tr> 
         <tr><br></tr>-->
        
            <tr>Gender:<input type="radio" name="gender" value="1" <?php 
    echo set_value('gender', $rec['gender']) == 1 ? "checked" : ""; 
?> />Male

<input type="radio" name="gender" value="0" <?php 
    echo set_value('gender', $rec['gender']) == 0 ? "checked" : ""; 
?> />Female</tr>       
 <tr><br></tr>

            <tr><input type="email" value="<?php echo $rec['email']; ?>" name="email" placeholder="email" pattern=".+ucmo.edu" size="30" required/></tr>
      <tr><br></tr>   
    <tr><input type="tel" id="phone" name="phone" value="<?php echo $rec['phone']; ?>"
       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
       placeholder="xxx-xxx-xxxx" required></tr>
    <tr><br></tr> 
      <tr><textarea name="address" rows="3" cols="22" placeholder="address" required="true"><?php echo $rec['address']; ?></textarea></tr>
     <tr><br></tr>
     
     <tr><button type="submit" name="submit">Update Faculty</button></tr>
     <?php echo form_close(); ?>   
</table> 
             <?php } ?>     
    </body>
</html>
