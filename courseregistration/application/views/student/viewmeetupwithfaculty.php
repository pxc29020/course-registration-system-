<html>
    <head>
        <meta charset="UTF-8">
        <title>View Meetup with Faculty</title>
       <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
       
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
           <style>
             body {
 background-image: url("<?php echo base_url();?>images/university.jpg");
 background-size: cover;
        }
  .center {
  text-align: center;
    margin-top: -100px; 
   
}
 .list-group {
     
     margin:auto;
     float:left;
     padding-top:20px;
    }
    .lead {
     
     margin:auto;
     left:0;
     right:0;
     padding-top:10%;
    }
   .test {
 width: 70%;
  margin-left: 15%;
   
} 
table#table1 {
    width:70%; 
    height:5%;
    margin-left:15%; 
    margin-right:15%;
  }
    
        </style>
    </head>
    <body>
     <?php include_once 'studentheader.php';   ?>

          <?php
          $id = $this->session->userdata('sid');
        $courses =  $this->Crs_model->viewcourse_enrolled($id);  
       // print_r();
          ?>
           <div class="list-group">
   
 <a href="listofcourses" class="list-group-item"><span>List Of Courses</span></a>
    <a href="enrollcourses" class="list-group-item"><span>Enrollment</span></a>
    <a href="meetupwithfaculty" class="list-group-item"><span>Meet Professor</span></a>
    <a href="feedetails" class="list-group-item"><span>Fee Details</span></a>
    <a href="testpage" class="list-group-item"><span>Notes to Faculty</span></a>
   <a href="viewnotes" class="list-group-item"><span>View Notes</span></a>
    <a href="viewmeetupwithfaculty" class="list-group-item active"><span>View Meeting</span></a>
 
 <a href="grades" class="list-group-item"><span>Grades</span></a>


  </div>
       
        <div class="test">
        <center class="table-responsive">    <?php
          $id = $this->session->userdata('sid');
        $courses =  $this->Crs_model->viewmeetup($id);  
       // print_r($courses);
        ?><br><br><br><br>
     <table id="table1" class="table table-bordered table-hover">
             
         <thead bgcolor="#a50000">
                <tr>
           
                    <th class="hidden"><font color="#fff">Student Id</th> 
                    <th class="hidden"><font color="#fff">Faculty Id</th>  
              <th><font color="#fff">Date</th> 
              <th><font color="#fff">Time</th> 
            
               <th><font color="#fff">Student Name</th> 
               <th><font color="#fff">faculty Name</th> 
      
 <th><font color="#fff">Drop Meeting</th>
     
                </tr>
            </thead>
            <tbody bgcolor="white">
                <?php foreach($courses as $rec){ ?>
                <tr>
                 <td class="hidden"><?php echo $rec['sid'] ?></td>
                  <td class="hidden"><?php echo $rec['fid']  ?></td>
                  <td><?php echo $rec['date'];  ?></td>
                  <td><?php echo $rec['time']  ?></td>
            
                  <td><?php echo $rec['sfname'].$rec['slastname']  ?></td>
 <td><?php echo 'Dr'.' '.$rec['ffname'].' '.$rec['flastname']  ?></td>
 <!--<td class="hidden"><a  href="<?php echo base_url() . 'Admin/modifycoursedetails/' . $rec->courseid ?>" ><span class="glyphicon glyphicon glyphicon-refresh"></span>modify Information</a></td>
 
 <td class="hidden"><a  href="<?php echo base_url() . 'Student/enrollcourses/' . $rec->courseid ?>" onclick="return confirm('are you sure ?')"><span class="glyphicon glyphicon glyphicon-danger"></span>Enroll Course</a></td>
        -->  
 <td class=""><a  href="<?php echo base_url() . 'Student/Drop_meet/' . $rec['Id'] ?>" onclick="return confirm('are you sure ?')"><span class="glyphicon glyphicon glyphicon-danger"></span><button type="button" style="padding: 5px;" class="btn btn-danger">Drop</button></a></td>
   
                </tr> 
                <?php } ?>
                
          
       
            </tbody>
     </table></center></div>
    </body>
</html>
