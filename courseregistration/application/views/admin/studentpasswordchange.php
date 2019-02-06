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
        <?php
       $id = $this->uri->segment(3);
       $pass = $this->Crs_model->student_password($id);
       print_r($pass);
    
        ?>
        <?php foreach($pass as $res){?>
      
          <?php echo form_open('Admin/updatepassword_student');?>
        <input type="hidden" name="sid" value="<?php echo $res['sid'] ?>" />
        <input type="text" name="oldpassword" required="true"/>
          <input type="text" name="newpassword"  required="true"/>
          <input type="submit" name="submit"/>
   
          <?php echo form_close()?>
        <?php }?>
    </body>
</html>
