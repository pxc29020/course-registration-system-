<?php

/* 
    Created By Pradeep Chandra Chitti
    Student ID : 700672902
    Email: PXC29020@UCMO.EDU
    ADVANCE SYSTEM PROJECT
 */

class Crs_model extends CI_Model{
    
    
    public function checkauthenticationadmin($username, $password){
     $query = $this->db->where(['username'=>$username,'password'=>$password,'flag'=>1])
                      ->get('admin');
        return    $query->result_array(); 
       // return $this->db->get('admin',$data)->result_array(); 
    }
    function register($data){
    $query= $this->db->insert('student',$data)    ;
    return true;
            
    }
        public function getsection(){
            $query = $this->db->get('section');
        return    $query->result_array(); 
    }
    public function get_courses_foradmin($id){
                 $query = $this->db->where(['cid'=>$id])->get('courses');
        return    $query->result_array(); 
     
    }
    public function check_faculty_teaching($fid,$day,$semester,$year,$time){
$query = $this->db->where(['fid'=>$fid,'time'=>$time,'day'=>$day,'semester'=>$semester,'year'=>$year])->get('courses');
        return    $query->result_array(); 
        
    }
    public function check_data_usergiven($id,$section,$time){
$query = $this->db->where(['cid'=>$id,'time'=>$time,'section'=>$section])->get('courses');
        return    $query->result_array(); 
        
    }


    public function get_list_coursesadmin(){
            $query = $this->db->where(['assignflag'=>0,'flag'=>0])->get('courses');
        return    $query->result_array(); 
    }
    function getstudent_emaijq($s){
      $query = $this->db->where(['sid'=>$s,'flag'=>1])
                      ->get('student');
        return    $query->result_array();   
    }

    public function e_mail($fid){
      
        $query=    $this->db->where(['fid'=>$fid])->get('faculty') ; 
   return $query->result_array();
    }
            function student_profile($id){
     $query = $this->db->where(['sid'=>$id,'flag'=>1])
                      ->get('student');
        return    $query->result_array();
    }
    function get_coursejq($id){
       $query = $this->db->where(['registrationid'=>$id])
                      ->get('registration');
        return    $query->result_array(); 
    }
    function get_startdatejq($cid){
      $query = $this->db->where(['cid'=>$cid])
                      ->get('courses');
        return    $query->result_array();      
    }

            function faculty_profile($id){
     $query = $this->db->where(['fid'=>$id,'flag'=>1])
                      ->get('faculty');
        return    $query->result_array();
    }
    public function Add_student($data){
        return $this->db->insert('student',$data);
    }
   public function Add_faculty($data){
        return $this->db->insert('faculty',$data);
    }
    public function get_course_name($id){
      $query = $this->db->select('courseid')->from('registration')->where('registrationid',$id) ; 
   return $query->result();
      }

    public function getadminstudents(){
    $query = $this->db->where(['flag' =>TRUE])->get('student');
         return    $query->result_array(); 
    }
       public function getadmincourses(){
    $query = $this->db->select('courses.courseid,courses.coursename,courses.year,courses.semester,courses.department,courses.fid,faculty.firstname,faculty.lastname');
            $this->db->from('courses')->join('faculty', 'courses.fid = faculty.fid');
            $this->db->where('courses.flag',true);
      $query =   $this->db->get();
      return $query->result();
    }
    //

    public function joincourses(){
        //USE IT IF WANTED TO RETRIVE COURSE TABLE JOINED WITH FACULTY TABLE TO GET FACULTY FIRSTNAME AND LASTNAME
        //this function can be used to get the view of courses with the faculty name added
    $query = $this->db->select('courses.courseid,courses.coursename,courses.year,courses.semester,courses.department,courses.fid,faculty.firstname,faculty.lastname');
            $this->db->from('courses')->join('faculty', 'courses.fid = faculty.fid');
            $this->db->where('courses.flag',true);
      $query =   $this->db->get();
      return $query->result();
    }
 
      public function facultyjq(){
        $query = $this->db->get('faculty');
        return $query->result();
    }
         public function coursesjq(){
        $query = $this->db->get('courses');
        return $query->result();
    }
   public function year(){
        $query = $this->db->get('year');
       return $query->result(); 
    }
 public function fetch_semi($yr,$semValue,$uid)
 {
 // $this->db->where('semester', $country_id);

$sql = "SELECT section from courses WHERE semester=? And year=? and flag = ?";
    // $sql ="SELECT coursename,courseid from courses WHERE courseid NOT IN(SELECT courseid from registration WHERE sid=?) AND semester=? And year=?";
             //"SELECT `courseid`, `coursename` FROM `courses` WHERE `year` = $yr AND`semester`= $semValue";
     //$query=$this->db->query($sql,array($uid,$semValue,$yr));
        $query=$this->db->query($sql,array($semValue,$yr,1));
  if($query->num_rows()>0){
            return $query->result_array();
        }

 } //
     public function check_avail_faculty($fid,$semester,$year,$day,$time){
 $sql = "SELECT flag FROM `facultyclassesavailablity` WHERE `fid`=? AND`semester`= ? AND `year`=? AND`day`=? AND time = ?";
 
         $query=$this->db->query($sql,array($fid,$semester,$year,$day,$time));
  if($query->num_rows()>0){
            return $query->result();
        }
 
     }
     function get_course_list($term){
     
     //    print_r($term);
   //$var = $term[0];
    $id = join("','", $_POST["selected"]);
 $year = join(",", $_POST["year"]);
 //print_r($year);
  $sql = "SELECT cid,coursename,section from courses WHERE semester IN ('".$id."') AND year IN ('".$year."')";

        $query=$this->db->query($sql);
  if($query->num_rows()>0){
            return $query->result_array();
        }     
    }
    //get_course_list
       function get_email_list($cid){
     
     //    print_r($term);
   //$var = $term[0];
    $id = join("','", $_POST["selected"]);
 
  $sql = "SELECT Mailid from registration WHERE cid IN ('".$id."')";

        $query=$this->db->query($sql);
  if($query->num_rows()>0){
            return $query->result_array();
        }     
    }
       public function semester(){
      $sql = "SELECT `semester` FROM `semester` WHERE 1";

        $query=$this->db->query($sql);
  if($query->num_rows()>0){
            return $query->result_array();
        }     
    }
  

    public function fetch_sem_admin($yr,$semValue)
 {
 // $this->db->where('semester', $country_id);

$sql = "SELECT coursename,courseid from courses WHERE semester=? And year=?";
    // $sql ="SELECT coursename,courseid from courses WHERE courseid NOT IN(SELECT courseid from registration WHERE sid=?) AND semester=? And year=?";
             //"SELECT `courseid`, `coursename` FROM `courses` WHERE `year` = $yr AND`semester`= $semValue";
     //$query=$this->db->query($sql,array($uid,$semValue,$yr));
        $query=$this->db->query($sql,array($semValue,$yr));
  if($query->num_rows()>0){
            return $query->result_array();
        }

 }
  public function fetch_students($yr, $courseid, $semValue, $fid)
 {
 // $this->db->where('semester', $country_id);

$sql ="SELECT student.firstname,student.lastname,student.sid from student JOIN registration ON student.sid=registration.sid WHERE registration.year=? AND registration.courseid=? AND registration.semester=? AND registration.fid=?";
        //SELECT student.firstname,student.lastname,student.sid from student JOIN registration ON student.sid=registration.sid WHERE registration.semester='Spring' And registration.year=2019 AND registration.fid=102 AND registration.courseid='CIS4665'";
//
//// "SELECT student.firstname,student.lastname,student.sid from student JOIN registration ON student.sid=registration.sid WHERE registration.semester=? And registration.year=? AND registration.fid=? AND registration.courseid=? ";
    // $sql ="SELECT coursename,courseid from courses WHERE courseid NOT IN(SELECT courseid from registration WHERE sid=?) AND semester=? And year=?";
             //"SELECT `courseid`, `coursename` FROM `courses` WHERE `year` = $yr AND`semester`= $semValue";
     //$query=$this->db->query($sql,array($uid,$semValue,$yr));
       $query=$this->db->query($sql,array($yr, $courseid, $semValue, $fid));
  if($query->num_rows()>0){
            return $query->result_array();
        }

 } //
 
 public function fetch_timeslot($day,$fid,$sid)
 {
 // $this->db->where('semester', $country_id); 
$sql="select time from facultyavailablity where fid=? And day=? and flag=?";
//$sql ="SELECT time from facultyavailablity WHERE time NOT IN(SELECT time from meetinstructor WHERE sid=?) AND fid=? And day=?";
             //"SELECT `courseid`, `coursename` FROM `courses` WHERE `year` = $yr AND`semester`= $semValue";
    // $query=$this->db->query($sql,array($sid,$fid,$day));
 $query=$this->db->query($sql,array($fid,$day,1));
  if($query->num_rows()>0){
            return $query->result_array();
        }

 } //
     public function grade_student($c,$s,$f,$g,$r){
  
           $data = array(
            'grade'=> $g, 
             'remarks'=>$r,
            );
         $this->db->where(['fid' =>$f,'courseid'=>$c,'sid'=>$s]);  
       return $this->db->update("registration",$data);
   
     }

     public function get_listofstudents($c,$s,$y,$id,$z){
   $query=$this->db->select('registration.registrationid,student.email,registration.courseid,registration.sid,registration.semester,registration.year,student.firstname,student.lastname');
   $this->db->from('registration');
$this->db->join('student','registration.sid = student.sid');
$this->db->where(['registration.fid'=>$id, 'registration.cid'=>$z, 'registration.courseid'=>$c, 'registration.semester'=>$s, 'registration.year'=>$y,]);
$query =   $this->db->get(); 
  return $query->result_array();
     }
     public function course($id){
    $query = $this->db->where(['fid' =>$id])->get('courses');
         return    $query->result_array();
     }

     public function viewmeetup($id){
 $query =$this->db->select('meetinstructor.Id,meetinstructor.sid,meetinstructor.fid,meetinstructor.date,meetinstructor.time,student.firstname as sfname,student.lastname as slastname,faculty.firstname as ffname,faculty.lastname as flastname');
$this->db->from('meetinstructor');
$this->db->join('student','meetinstructor.sid = student.sid');
$this->db->join('faculty','meetinstructor.fid = faculty.fid');
$this->db->where('meetinstructor.sid',$id);
   $query =   $this->db->get(); 
 return $query->result_array();
 }

     public function meeting($data){
    $query = $this->db->insert('meetinstructor',$data);
    return $query;     
     }

     public function checkcount_register($year,$semester,$sid){
   $query = $this->db->where(['year'=>$year,'semester'=>$semester,'sid'=>$sid])
        ->get('registration');

        return $query->result_array();
}
public function student_register($data,$cid,$count){
    $course = array(
   
        'count' => 'count' + 1,
    );
    
    
    $query = $this->db->insert('registration',$data);
   // $query =
            
  return $query;
}
public function update_count($cid){
 $sql="UPDATE courses set `count` =`count` + 1 WHERE `cid` = ?";
//$sql ="SELECT time from facultyavailablity WHERE time NOT IN(SELECT time from meetinstructor WHERE sid=?) AND fid=? And day=?";
             //"SELECT `courseid`, `coursename` FROM `courses` WHERE `year` = $yr AND`semester`= $semValue";
    // $query=$this->db->query($sql,array($sid,$fid,$day));
 $query=$this->db->query($sql,array($cid));

          
}

public function faculty_assign($fid,$id){
    $data=array('fid'=>$fid,'flag'=>1,'assignflag'=>1);
    // $sql="UPDATE courses set `fid` = ? and `flag` =1 and `assignflag`=1 WHERE `cid` = ?";
$query=
        //$this->db->set('last_login','current_login',false);
$this->db->where('cid',$id);
$this->db->update('courses',$data);
        //$this->db->query($sql,array($fid,$id));
  
}

public function update_countjq($cid){
 $sql="UPDATE courses set `count` =`count` - 1 WHERE `cid` = ?";
$query=$this->db->query($sql,array($cid));
    
}
  public function inactive_single_timeslot($id){
       $sql="UPDATE facultyavailablity set `flag` = ? WHERE `timeid` = ?";
$query=$this->db->query($sql,array(0,$id));
 
        //delete from user where userid='$user_id'
        
    }
    public function active_single_timeslot($id){
       $sql="UPDATE facultyavailablity set `flag` = ? WHERE `timeid` = ?";
$query=$this->db->query($sql,array(1,$id));
 
        //delete from user where userid='$user_id'
        
    }
      public function delete_single_timeslot($id){
     //  $sql="UPDATE facultyavailablity set `flag` = ? WHERE `timeid` = ?";
   $data= array(
       'timeid' => $id ,
    );
    $query = $this->db->delete('facultyavailablity',$data);
    return $query; 
        //delete from user where userid='$user_id'
        
    }
public function update_slot($fid,$day,$time){
 $sql="UPDATE facultyavailablity set `flag` = ? WHERE `fid` = ? and `day` = ? and `time` = ?";
$query=$this->db->query($sql,array(0,$fid,$day,$time));
    
}
public function update_slot_flag($fid,$day,$time){
 $sql="UPDATE facultyavailablity set `flag` = ? WHERE `fid` = ? and `day` = ? and `time` = ?";
$query=$this->db->query($sql,array(1,$fid,$day,$time));
    
}
//insert

function get_date_time($id){
  
        $query =
           $this->db->where(['Id'=>$id])
        ->get('meetinstructor');
            return $query->result();
}
function get_student_email($sid){
  
        $query =
           $this->db->where(['sid'=>$sid])
        ->get('student');
            return $query->result();
}
public function student_registerjq($data,$cid,$count){
    $course = array(
   
        'flag' => 0,
    );
    
    $query =$this->db->where('cid', $cid);
            $this->db->update('courses',$course);
    $query = $this->db->insert('registration',$data);
    return $query;
}
public function update_avail_faculty($fid,$semester,$year,$day,$time){
$sql="UPDATE facultyclassesavailablity set `flag` = ? WHERE `fid` =? and `semester` = ? and `year` = ? and `day` = ? and `time` = ?";

/* $query=$this->db->set('flag', 1);
$this->db->where(['fid'=>$fid,'semester'=>$semester,'year'=>$year,'day'=>$day,'time'=>$time]);
$this->db->update('courses');
 * 
 */
         $this->db->query($sql,array(1,$fid,$semester,$year,$day,$time));
          
}
public function viewcourse_enrolled($id){
$query = $this->db->select('registration.registrationid,registration.cid,registration.semester,registration.year,registration.sid,courses.courseid,courses.coursename,courses.department,student.firstname as sfname,student.lastname as sflname');
$this->db->from('registration');
$this->db->join('student','registration.sid = student.sid');
//$this->db->join('faculty','registration.fid = faculty.fid');
$this->db->join('courses','registration.cid = courses.cid');
 $this->db->where('registration.sid',$id);     
   $query =   $this->db->get();      

      return $query->result();    
}
public function studenttofaculty($data){
    $query=$this->db->insert('studentnotes',$data);
    return $query;
}
public function facultytostudent($data){
    $query=$this->db->update('studentnotes',$data);
    return $query;  
}

public function get_message_faculty($id){
$query = $this->db->select('registration.courseid,registration.fid,faculty.firstname,faculty.lastname,faculty.email');
        $this->db->from('registration');
        $this->db->join('faculty','registration.fid = faculty.fid');
     $this->db->where('registration.sid',$id);
       $query =   $this->db->get();
        return $query->result();    
}
public function get_message_student($nid){
$query = $this->db->select('studentnotes.sid,student.firstname,student.lastname,student.email,studentnotes.nid');
        $this->db->from('studentnotes');
        $this->db->join('student','studentnotes.sid = student.sid');
     $this->db->where('studentnotes.nid',$nid);
       $query =   $this->db->get();
        return $query->result();    
}
public function studente_mail($nid){
 $query = $this->db->select('student.email,studentnotes.nid');
        $this->db->from('studentnotes');
        $this->db->join('student','studentnotes.sid = student.sid');
     $this->db->where('studentnotes.nid',$nid);
       $query =   $this->db->get();
        return $query->result();     
}
//public function get_avail_faculty($fid,$semester,$year,$day,$time){
//    $query= $this->db->get('facultyclassesavailablity')->where(['fid'=>$fid,'semester'=>$semester,'year'=>$year,'day'=>$day,'time'=>$time]);
  //    return $query->result_array();  
//}

public function my_faculty_courses($id){
$query = $this->db->select('courses.cid,courses.courseid,courses.day,courses.classsize,courses.count,courses.coursename,courses.time,courses.section,courses.fid,courses.semester,courses.year,faculty.firstname,faculty.lastname');
$this->db->from('courses');

$this->db->join('faculty','courses.fid = faculty.fid');

 $this->db->where('courses.fid',$id);     
   $query =   $this->db->get();      

      return $query->result();    
}
public function my_faculty_cancelreports($id){
$query = $this->db->select('facultycancelreport.fid,facultycancelreport.sid,facultycancelreport.date,facultycancelreport.day,facultycancelreport.time,student.firstname,student.email,student.lastname');
$this->db->from('facultycancelreport');

$this->db->join('faculty','facultycancelreport.fid = faculty.fid');
$this->db->join('student','facultycancelreport.sid = student.sid');

 $this->db->where('facultycancelreport.fid',$id);     
   $query =   $this->db->get();      

      return $query->result();    
}
public function Drop_courses($id){
    $data= array(
       'registrationid' => $id ,
    );
    $query = $this->db->delete('registration',$data);
    return $query; 
}
public function Drop_meet($id){
    $data= array(
       'Id' => $id ,
    );
    $query = $this->db->delete('meetinstructor',$data);
    return $query; 
}
function search($searchdata,$id)
{
    $set_query = $this
            ->db
            ->select('*')
            ->from('courses')
            ->like('courseid',$searchdata)
            ->or_like('coursename',$searchdata)
            ->where('fid',$id)
            ->get();
  
    if($set_query->num_rows()>0)
    {
        return $set_query->result(); 
    }
    else
    {
        return null;
    }       
}
function fetch_data($query,$id)
 {
  $this->db->select("*");
  $this->db->from("courses");
  $this->db->where('fid', $id);
  if($query != '')
  {
   
   $this->db->like('courseid', $query)->where('fid', $id);
   $this->db->or_like('coursename', $query)->where('fid', $id);
   $this->db->or_like('semester', $query)->where('fid', $id);
   $this->db->or_like('year', $query)->where('fid', $id);

           
  
  }
   // $this->db->where('fid', $id);
  $this->db->order_by('courseid', 'DESC');

  return $this->db->get();
 }
        function searchs($searchdata)
{
   
    $set_query = $this
            ->db
            ->select('*')
            ->from('courses')
            ->like('courseid',$searchdata)
            ->or_like('coursename',$searchdata)
            ->get();
  
    if($set_query->num_rows()>0)
    {
        return $set_query->result(); 
    }
    else
    {
        return null;
    }       
}
public function fetch_notes_student($query,$id){
$this->db->select('studentnotes.nid,studentnotes.studentnotes,studentnotes.seen,studentnotes.facultynotes,faculty.firstname,faculty.lastname');
$this->db->from('studentnotes');
$this->db->join('faculty','faculty.fid = studentnotes.fid');
$this->db->where('studentnotes.sid',$id);

  if($query != '')
  {
   
   $this->db->like('firstname', $query)->where('sid', $id);
   $this->db->or_like('lastname', $query)->where('sid', $id);
   $this->db->or_like('studentnotes', $query)->where('sid', $id);
   $this->db->or_like('facultynotes', $query)->where('sid', $id);

           
  
  }
   // $this->db->where('fid', $id);
  $this->db->order_by('nid', 'DESC');

  return $this->db->get();   
}
    public function get_student_trancrips($id){
   $query= $this->db->select('registration.registrationid,registration.courseid,registration.semester,registration.year,registration.fid,registration.grade,faculty.firstname,faculty.lastname,courses.coursename');
    $this->db->from('registration');
 $this->db->join('faculty','faculty.fid = registration.fid');
 $this->db->join('courses','courses.cid = registration.cid');
$this->db->where('registration.sid',$id);
$query =   $this->db->get();
    if($query->num_rows()>0){
            return $query->result_array();
        }
    }
public function appointmentsoftheday($id,$date){
  
 $query = $this->db->select('meetinstructor.id,meetinstructor.sid,meetinstructor.fid,meetinstructor.time,student.firstname as sfname,student.lastname as slname,faculty.firstname as ffname,faculty.lastname as flname');
 $this->db->from('meetinstructor');
         $this->db->join('student','student.sid = meetinstructor.sid');
         $this->db->join('faculty','faculty.fid = meetinstructor.fid');
         $this->db->where('meetinstructor.fid',$id);
         $this->db->where('meetinstructor.date',$date);
   $query =   $this->db->get();
    if($query->num_rows()>0){
            return $query->result_array();
        }
}

public function check_no_registered($courseid){

     /*  $sql = "SELECT COUNT(registrationid) FROM registration WHERE courseid = ?";  
       $query=$this->db->query($sql,array($courseid));
      * 
      */
       $sql = "SELECT * FROM registration WHERE courseid = ?";  
       $query=$this->db->query($sql,array($courseid));
     
  /*  $query = $this->db->select('*');
    $this->db->from('registration');
    $this->db->where(['courseid'=>$courseid]);
   * 
   */
 return $query->result_array();
}

public function fetch_faculty($course,$semester,$year,$section)
 {
 // $this->db->where('semester', $country_id);

$query = $this->db->select('courses.fid,faculty.firstname,faculty.lastname');
            $this->db->from('courses')->join('faculty', 'courses.fid = faculty.fid');
           $this->db->where('courses.courseid',$course);
           $this->db->where('courses.semester',$semester);
        //   $this->db->where('courses.section',$section);
           $this->db->where('courses.year',$year);
            $this->db->where('courses.flag',true);
      $query =   $this->db->get();
  if($query->num_rows()>0){
            return $query->result_array();
        }

 }
 
 //fetchcoursesc($cid,$semester,$year)
  public function fetchcoursesc($year,$semester,$section,$time)
 {
 // $this->db->where('semester', $country_id);

$sql = "SELECT `cid`,`coursename` FROM `courses` WHERE `year`= ? and `semester`= ? AND `section`= ? AND `time`= ? AND `assignflag`= 1 AND `flag`= 1 AND `classsize` <> `count`";
        //"SELECT `cid`,`coursename` FROM `courses` WHERE `year`= ? and `semester`= ? AND `section`= ? AND `flag`= 1";
    // $sql ="SELECT coursename,courseid from courses WHERE courseid NOT IN(SELECT courseid from registration WHERE sid=?) AND semester=? And year=?";
             //"SELECT `courseid`, `coursename` FROM `courses` WHERE `year` = $yr AND`semester`= $semValue";
     //$query=$this->db->query($sql,array($uid,$semValue,$yr));
//
        $query=$this->db->query($sql,array($year,$semester,$section,$time));
  if($query->num_rows()>0){
            return $query->result_array();
        }

 } //
   public function fetchcoursescjq($time,$section,$year,$semester)
 {
 // $this->db->where('semester', $country_id);

$sql = "SELECT `cid`,`coursename` FROM `courses` WHERE `time`= ? and `section`= ? AND `year`= ? AND `semester`= ? AND `assignflag`= 0 AND `flag`= 0 AND `classsize` <> `count`";
       //"SELECT `cid`,`coursename` FROM `courses` WHERE `year`= ? and `semester`= ? AND `section`= ? AND `flag`= 1";
    // $sql ="SELECT coursename,courseid from courses WHERE courseid NOT IN(SELECT courseid from registration WHERE sid=?) AND semester=? And year=?";
             //"SELECT `courseid`, `coursename` FROM `courses` WHERE `year` = $yr AND`semester`= $semValue";
     //$query=$this->db->query($sql,array($uid,$semValue,$yr));
//
        $query=$this->db->query($sql,array($time,$section,$year,$semester));
  if($query->num_rows()>0){
            return $query->result_array();
        }

 } //
 public function check_no_registeredjq($year,$semester,$courseid){
          $query = $this->db->where(['year'=>$year,'semester'=>$semester,'courseid'=>$courseid])
        ->get('courses');
        //,'notes'=>$Data['comments'],'UserId'=>$this->session->userdata('Id')
        return $query->result_array();
 }
 public function checkslotavl($fid,$day,$time){
   $query =
           $this->db->where(['fid'=>$fid,'day'=>$day,'time'=>$time])
        ->get('facultyavailablity');
        //,'notes'=>$Data['comments'],'UserId'=>$this->session->userdata('Id')
        return $query->result_array();   
 }
 public function Check_slot_available($data){
       $query =
           $this->db
             ->where(['fid'=>$data['fid'],'day'=>$data['day'],'time'=>$data['time'],'flag'=>1])
      ->get('facultyavailablity');
      return $query->result_array();  
 }
 public function Check_class_available($data){
       $query =
           $this->db
             ->where(['fid'=>$data['fid'],'day'=>$data['day'],'time'=>$data['time'],'semester'=>$data['semester'],'year'=>$data['year']])
      ->get('facultyclassesavailablity');
      return $query->result_array();  
 }
 ////////////////////checkingpart------------------------------------------
 public function checkmeetup($data){
     $query = $this->db->where(['date'=>$data['date'],'time'=>$data['time']])
        ->get('meetinstructor');
        //,'notes'=>$Data['comments'],'UserId'=>$this->session->userdata('Id')
        return $query->result_array();
 }
   public function get_course_q($sid,$courseid,$year,$semester){
    $query = $this->db->where(['courseid'=>$courseid,'sid'=>$sid,'semester'=>$semester,'year'=>$year])
        ->get('registration');
        //,'notes'=>$Data['comments'],'UserId'=>$this->session->userdata('Id')
     //courseid sid semester year
        return $query->result_array();    
    }
  public function checkenroll($data){
     $query = $this->db->where(['cid'=>$data['cid'],'sid'=>$data['sid'],'semester'=>$data['semester'],'year'=>$data['year']])
        ->get('registration');
        //,'notes'=>$Data['comments'],'UserId'=>$this->session->userdata('Id')
     //courseid sid semester year
        return $query->result_array();
 }//SELECT `registrationid`, `sid`, `semester`, `year` FROM `registration` WHERE `sid`=110 AND`semester`= 'Spring' AND`year`='2019';
    public function get_coursecount($cid){
    $query = $this->db->where(['cid'=>$cid])->get('courses');
    return $query->result_array();
    }
  

    public function checkmultipleenroll($data){
     $query = $this->db->where(['sid'=>$data['sid'],'semester'=>$data['semester'],'year'=>$data['year']])
        ->get('registration');
        //,'notes'=>$Data['comments'],'UserId'=>$this->session->userdata('Id')
     //courseid sid semester year
        return $query->result_array();
 }
 public function t(){
     //select coursename 
    $sql = "SELECT `courseid`, `coursename` FROM `courses` WHERE `year` = 2019 AND`semester`= 'Spring'";
  $query=$this->db->query($sql);    
return $query->result_array();  
 }

 public function coursedetails($id){
        //id= courseid
    /*    $data = array(
            'courseid' => $id
        );
$query = $this->db->get('courses',$data);
      return $query->result();    
     * 
     */ 
     $query = $this->db->where('courses.courseid',$id);
             $this->db->where('courses.flag',true);
             $this->db->select('courses.courseid,courses.coursename,courses.year,courses.semester,courses.department,courses.fid,faculty.firstname,faculty.lastname');
            $this->db->from('courses')->join('faculty', 'courses.fid = faculty.fid');
            
      $query =   $this->db->get();
      return $query->result();
    }

    public function getadmininactivestudents(){
    $query = $this->db->where(['flag' =>FALSE])->get('student');
         return    $query->result_array(); 
    }
        public function getadminfaculty(){
    $query = $this->db->where(['flag' =>TRUE])->get('faculty');
         return    $query->result_array(); 
    }
      public function getadmininacticefaculty(){
    $query = $this->db->where(['flag' =>FALSE])->get('faculty');
         return    $query->result_array(); 
    }
    public function inactivestudent($id){
        $data = array(
            'flag'=>0 , 
            );
         $this->db->where("sid",$id);  
       return $this->db->update("student",$data);
    }
   public function inactivefaculty($id){
        $data = array(
            'flag'=>0 , 
            );
         $this->db->where("fid",$id);  
       return $this->db->update("faculty",$data);
    }
       public function activefaculty($id){
        $data = array(
            'flag'=>1 , 
            );
         $this->db->where("fid",$id);  
       return $this->db->update("faculty",$data);
    }
    public function activestudent($id){
        $data = array(
            'flag'=>1 , 
            );
         $this->db->where("sid",$id);  
       return $this->db->update("student",$data);
    }
    public function deletestudent($id){
      
         $this->db->where("sid",$id);  
       return $this->db->delete("student");
    }
       public function deletefaculty($id){
      
         $this->db->where("fid",$id);  
       return $this->db->delete("faculty");
    }
    public function deletecourse($id){
          $this->db->where("courseid",$id);  
       return $this->db->delete("courses");
    }

    public function get_studentdata($id){
        $query = $this->db->where('sid',$id)->get('student');
        return $query->result_array();
    }
     public function get_facultydata($id){
        $query = $this->db->where('fid',$id)->get('faculty');
        return $query->result_array();
    }
 
    public function update_student($id,$data){
     $query = $this->db->where('sid',$id)->update('student',$data);
     return $query;
    }
       public function update_studentjq($id,$data){
     $query = $this->db->where('sid',$id)->update('student',$data);
     return $query;
    }
           public function update_facultyjq($id,$data){
     $query = $this->db->where('fid',$id)->update('faculty',$data);
     return $query;
    }
    public function update_coursedetails($id,$data){
   $query = $this->db->where('courseid',$id)->update('courses',$data);
     return $query;    }

    public function update_faculty($id,$data){
     $query = $this->db->where('fid',$id)->update('faculty',$data);
       return $query;}
public function student_password($id){
    $query = $this->db->where('sid',$id)->get('student');
    return $query->result_array();
}
public function faculty_password($id){
    $query = $this->db->where('fid',$id)->get('faculty');
    return $query->result_array();
}
public function checkstudentpassword($id,$oldpass){
    $query = $this->db->where(['sid'=>$id, 'passwordhash'=>$oldpass])->get('student');
      return $query->result_array();
}
public function checkfacultypassword($id,$oldpass){
    $query = $this->db->where(['fid'=>$id, 'passwordhash'=>$oldpass])->get('faculty');
      return $query->result_array();
}
public function checkadminpassword($id,$oldpass){
    $query = $this->db->where(['username'=>$id, 'password'=>$oldpass])->get('admin');
      return $query->result_array();
}
//
public function checkfacultypasswordjq($id,$oldpass){
    $query = $this->db->where(['fid'=>$id, 'passwordhash'=>$oldpass])->get('faculty');
      return $query->result_array();
}
public function updatefaculty_password($id,$newpass){
    $data = array(
        passwordhash => $newpass
    );
    $query = $this->db->where('fid',$id)->update('faculty',$data);
     return $query;
}
public function checkstudentpasswordjq($id,$oldpass){
    $query = $this->db->where(['sid'=>$id, 'passwordhash'=>$oldpass])->get('student');
      return $query->result_array();
}
public function updatestudent_password($id,$newpass){
    $data = array(
        passwordhash => $newpass
    );
    $query = $this->db->where('sid',$id)->update('student',$data);
     return $query;
}
public function update_student_password($id,$newpass){
    $data = array(
        passwordhash => $newpass
    );
    $query = $this->db->where('sid',$id)->update('student',$data);
     return $query;
}
public function update_faculty_password($id,$newpass){
    $data = array(
        passwordhash => $newpass
    );
    $query = $this->db->where('fid',$id)->update('faculty',$data);
     return $query;
}
public function update_admin_password($id,$newpass){
    $data = array(
        password => $newpass
    );
    $query = $this->db->where('username',$id)->update('admin',$data);
     return $query;
}
public function faculty(){
    $query = $this->db->get('faculty');
    return $query->result_array();
}
public function course_add($data,$timings){
   // $timings = join("','", $_POST["timings"]);
   // $section = join("','", $_POST["section"]);
    //print_r($section);
    //die();
    foreach ($timings as $key => $value) {
$timings = "splittedstring[".$key."] = ".$value."<br>";
$time = $value;
$dataa = array(
           'courseid'=> $data['courseid'],
           'coursename'=> $data['coursename'],
           'year'=> $data['year'],
           'semester'=> $data['semester'],
           'department'=> $data['department'],
            'day'=>$data['day'],
           'credithours' => 3,
           'section'=> $data['section'],
            'startdate' => $data['startdate'],
            'classsize' => $data['classsize'],
            'flag' => 0,
            'assignflag' =>0,
            'time'=>$time,
               );
 $query = $this->db->insert('courses',$dataa);
 
      //  foreach ($section as $key => $value) {
 //"splittedstring[".$key."] = ".$value."<br>"; 
// $sec = $value;
//print($data['courseid']);
//print_r($day);
/* $dataa = array(
           'courseid'=> $data['courseid'],
           'coursename'=> $data['coursename'],
           'year'=> $data['year'],
           'semester'=> $data['semester'],
           'department'=> $data['department'],
            'day'=>$data['day'],
           'credithours' => 3,
           //'section'=> $sec,
            'startdate' => $data['startdate'],
            'classsize' => $data['classsize'],
            'flag' => 0,
            'assignflag' =>0,
            'time'=>$data['time'],
               );
 $query = $this->db->insert('courses',$dataa);
 $this->db->insert('courses.time',$timings);
 $this->db->insert('courses.section',$section);
//$query = $this->db->insert(['courses.courseid'=>$data['courseid'],'courses.coursename'=>$data['coursename'],'courses.year'=>$data['year'],'courses.semester'=>$data['semester'],'courses.department'=>$data['department'],'courses.day'=>$data['day'],'courses.credithours'=>$data['credithours'],'courses.startdate'=>$data['startdate'],'courses.classsize'=>$data['classsize'],'courses.flag'=>$data['flag'],'courses.time'=>$data['time'],'courses.assignflag'=>$data['assignflag'],'courses.day'=>$data['day'],'courses.section'=>$sec]);
    //
   //  }
 * 
    */}
     return TRUE;
     //die();
    
}
function add_time_slotjq($data){
      $query = $this->db->insert('facultyavailablity',$data);
    return TRUE;  
}
function add_class_slotjq($data){
      $query = $this->db->insert('facultyclassesavailablity',$data);
    return TRUE;  
}
//------------------------------------feedetails-------------
    public function registrationtable($id){
       $data = array(
           'sid' => $id,
       );
      $query = $this->db->get('registration',$data);
    return $query->result_array(); 
    }
//-----------------------student models----------------
public function checkstudent($email, $password){
     $query = $this->db->where(['email'=>$email,'passwordhash'=>$password,'flag'=>1])
                      ->get('student');
        return    $query->result_array(); 
       // return $this->db->get('admin',$data)->result_array(); 
    }
    public function details_count($year,$semester,$id){
  $query = $this->db->where(['year'=>$year,'semester'=>$semester,'sid'=>$id])
                      ->get('registration');
        return    $query->result_array();       
    }
    public function faculty_tostudent($id){
        $query = $this->db->select('studentnotes.studentnotes,studentnotes.facultynotes,student.firstname,student.lastname,studentnotes.nid');
           $this->db->from('studentnotes');
          $this->db->join('student','student.sid = studentnotes.sid');
          $this->db->where('studentnotes.fid',$id);
          $query= $this->db->get();
          return  $query->result_array(); 
    }

    public function checkfaculty($email, $password){
     $query = $this->db->where(['email'=>$email,'passwordhash'=>$password,'flag'=>1])
                      ->get('faculty');
        return    $query->result_array(); 
       // return $this->db->get('admin',$data)->result_array(); 
    }
    /*
     * query to get the student notes to faculty
     *     $query = $this->db->select('studentnotes.studentnotes,studentnotes.facultynotes,student.firstname,student.lastname,studentnotes.nid');
           $this->db->from('studentnotes');
          $this->db->join('student','student.sid = studentnotes.sid');
          $this->db->where('studentnotes.fid',$id);
     */
    /////////////////////////////////////////////////////////////
//to retrive the list of courses and about course:

//get_table() get_data_courses() get_filtered_data() 
    //get_notes_student()
    
    public function get_notes_tabl()  
      {  
 $this->db->select("studentnotes.nid,studentnotes.studentnotes,studentnotes.facultynotes,studentnotes.datetime,faculty.firstname,faculty.lastname");  
           $this->db->from("studentnotes")->where(['sid'=>$id]);  
            $this->db->join('faculty','studentnotes.fid = faculty.fid');
           
         if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("studentnotes.nid", $_POST["search"]["value"]);  
                $this->db->or_like("studentnotes.studentnotes", $_POST["search"]["value"]);
                 $this->db->or_like("studentnotes.facultynotes", $_POST["search"]["value"]);
                  $this->db->or_like("studentnotes.datetime", $_POST["search"]["value"]);
                 $this->db->or_like("faculty.firstname", $_POST["search"]["value"]);
                 $this->db->or_like("faculty.lastname", $_POST["search"]["value"]);
               //  $this->db->or_like("faculty.fid", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
       $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('nid', 'DESC');  
           }   
            
      }
   public function getnotes_table($id){  
           //$this->get_notes_tabl();
        $this->db->select("studentnotes.nid,studentnotes.studentnotes,studentnotes.facultynotes,studentnotes.datetime,faculty.firstname,faculty.lastname");  
           $this->db->from("studentnotes")->where(['sid'=>$id]);  
            $this->db->join('faculty','studentnotes.fid = faculty.fid');
           
         if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("studentnotes.nid", $_POST["search"]["value"]);  
                $this->db->or_like("studentnotes.studentnotes", $_POST["search"]["value"]);
                 $this->db->or_like("studentnotes.facultynotes", $_POST["search"]["value"]);
                  $this->db->or_like("studentnotes.datetime", $_POST["search"]["value"]);
                 $this->db->or_like("faculty.firstname", $_POST["search"]["value"]);
                 $this->db->or_like("faculty.lastname", $_POST["search"]["value"]);
               //  $this->db->or_like("faculty.fid", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
       $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('nid', 'DESC');  
           } 
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  

    public function get_notes_student($id){
                 $this->db->select("studentnotes.nid,studentnotes.studentnotes,studentnotes.facultynotes,studentnotes.datetime,faculty.firstname,faculty.lastname");  
           $this->db->from("studentnotes")->where(['sid'=>$id]);  
            $this->db->join('faculty','studentnotes.fid = faculty.fid');
           return $this->db->count_all_results();   
    }
    public function get_filtered_notes($id){
             //  $this->get_notes_tabl(); 
             $this->db->select("studentnotes.nid,studentnotes.studentnotes,studentnotes.facultynotes,studentnotes.datetime,faculty.firstname,faculty.lastname");  
           $this->db->from("studentnotes")->where(['sid'=>$id]);  
            $this->db->join('faculty','studentnotes.fid = faculty.fid');
           
         if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("studentnotes.nid", $_POST["search"]["value"]);  
                $this->db->or_like("studentnotes.studentnotes", $_POST["search"]["value"]);
                 $this->db->or_like("studentnotes.facultynotes", $_POST["search"]["value"]);
                  $this->db->or_like("studentnotes.datetime", $_POST["search"]["value"]);
                 $this->db->or_like("faculty.firstname", $_POST["search"]["value"]);
                 $this->db->or_like("faculty.lastname", $_POST["search"]["value"]);
               //  $this->db->or_like("faculty.fid", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
       $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('nid', 'DESC');  
           } 
           $query = $this->db->get();  
           return $query->num_rows();  
    }
    ////////////////////////////////////////////////////
    public function get_courses_tabl()  
      {  
 
             $this->db->select("courses.cid,courses.courseid,courses.day,courses.time,courses.startdate,courses.section,courses.coursename,courses.semester,courses.year");  
             $this->db->from('courses');  
           // $this->db->join('faculty','courses.fid = faculty.fid');
           //  $this->db->where('courses.flag',0);
              //$this->db->where('courses.assignflag',0);
         if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("courses.courseid", $_POST["search"]["value"]);
        //->where('courses.flag',0)->where('courses.assignflag',0);  
                $this->db->or_like("courses.coursename", $_POST["search"]["value"]);
        //->where('courses.flag',0)->where('courses.assignflag',0);
                 $this->db->or_like("courses.semester", $_POST["search"]["value"]);
        //->where('courses.flag',0)->where('courses.assignflag',0);
                  $this->db->or_like("courses.year", $_POST["search"]["value"]);
                  $this->db->or_like("courses.day", $_POST["search"]["value"]);
                  $this->db->or_like("courses.time", $_POST["search"]["value"]);
        //->where('courses.flag',0)->where('courses.assignflag',0);
              //   $this->db->or_like("faculty.firstname", $_POST["search"]["value"]);
        //->where('courses.flag',0)->where('courses.assignflag',0);
             //    $this->db->or_like("faculty.lastname", $_POST["search"]["value"])
                         ;
        //->where('courses.flag',0);
        //->where('courses.assignflag',0);
               //  $this->db->or_like("faculty.fid", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
       $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('courseid', 'DESC');  
             
           }   
            
      }
   public function get_table(){  
           $this->get_courses_tabl();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  

    public function get_data_courses(){
                 $this->db->select("courses.cid,courses.courseid,courses.day,courses.time,courses.startdate,courses.section,courses.coursename,courses.semester,courses.year");  
           $this->db->from("courses");  
          //  $this->db->join('faculty','courses.fid = faculty.fid');
          //  $this->db->where('courses.flag',0);
           // $this->db->where('courses.assignflag',0);
           return $this->db->count_all_results();   
    }
    public function get_filtered_data(){
               $this->get_courses_tabl();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }
 
      public function result_builder(){
     $this->db->select('meetinstructor.Id,meetinstructor.date,meetinstructor.time,meetinstructor.sid,student.firstname,student.lastname');  
           $this->db->from('meetinstructor');  
            $this->db->join('student','meetinstructor.sid = student.sid');
            //$this->db->where('meetinstructor.fid',$id);
         if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("meetinstructor.Id", $_POST["search"]["value"]);  
                $this->db->or_like("meetinstructor.date", $_POST["search"]["value"]);
                 $this->db->or_like("meetinstructor.time", $_POST["search"]["value"]);
                  $this->db->or_like("meetinstructor.sid", $_POST["search"]["value"]);
                 $this->db->or_like("student.firstname", $_POST["search"]["value"]);
                 $this->db->or_like("student.lastname", $_POST["search"]["value"]);
               //  $this->db->or_like("faculty.fid", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
       $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('Id', 'DESC');  
           }         
      }
          public function result_builderinactivejq($id){
     $this->db->select('facultyavailablity.timeid,facultyavailablity.day,facultyavailablity.time');  
           $this->db->from('facultyavailablity');  
            //$this->db->join('student','meetinstructor.sid = student.sid');
          $this->db->where('facultyavailablity.fid',$id);
           $this->db->where('facultyavailablity.flag',0);
         if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("facultyavailablity.day", $_POST["search"]["value"])->where('facultyavailablity.flag',0)->where('facultyavailablity.fid',$id);  
                $this->db->or_like("facultyavailablity.time", $_POST["search"]["value"])->where('facultyavailablity.flag',0)->where('facultyavailablity.fid',$id);
              //  $this->db->or_like("faculty.fid", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
       $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('timeid', 'DESC');  
           }         
      }
    public function result_builderjq($id){
     $this->db->select('facultyavailablity.timeid,facultyavailablity.day,facultyavailablity.time');  
           $this->db->from('facultyavailablity');  
            //$this->db->join('student','meetinstructor.sid = student.sid');
          $this->db->where('facultyavailablity.fid',$id);
           $this->db->where('facultyavailablity.flag',1);
         if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("facultyavailablity.day", $_POST["search"]["value"])->where('facultyavailablity.flag',1)->where('facultyavailablity.fid',$id);  
                $this->db->or_like("facultyavailablity.time", $_POST["search"]["value"])->where('facultyavailablity.flag',1)->where('facultyavailablity.fid',$id);
              //  $this->db->or_like("faculty.fid", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
       $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('timeid', 'DESC');  
           }         
      }
public function get_table_meet(){  
           $this->result_builder();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }
      function get_table_timeslot($id){
             $this->result_builderjq($id);  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();      
      }
            function get_data_timeslotinactive($id){
             $this->result_builderinactivejq($id);  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();      
      }
      //get_data_timeslotinactivejq
              function update_crud($user_id, $data)  
      {  
           $this->db->where("cid", $user_id);  
           $this->db->update("courses", $data);  
      }    
      function get_faculty_email($fid){
        $this->db->where("fid", $fid);  
           $query=$this->db->get('faculty');  
           return $query->result();    
      }
     function fetch_single_student($user_id)  
      {  
           $this->db->where("sid", $user_id);  
           $query=$this->db->get('student');  
           return $query->result();  
      } 
 
              function fetch_single_faculty($user_id)  
      {  
           $this->db->where("fid", $user_id);  
           $query=$this->db->get('faculty');  
           return $query->result();  
      } 
          function fetch_single_user($user_id)  
      {  
           $this->db->where("cid", $user_id);  
           $query=$this->db->get('courses');  
           return $query->result();  
      } 
    public function get_data_meet(){
     $this->db->select('meetinstructor.Id,meetinstructor.date,meetinstructor.time,meetinstructor.sid,student.firstname,student.lastname');  
           $this->db->from('meetinstructor');  
            $this->db->join('student','meetinstructor.sid = student.sid');
           return $this->db->count_all_results();   
    }
    //get_data_timeslotjq
      public function get_data_timeslotjq($id){
     $this->db->select('facultyavailablity.timeid,facultyavailablity.day,facultyavailablity.time');  
           $this->db->from('facultyavailablity');  
         // $this->db->where('facultyavailablity.','meetinstructor.sid = student.sid');
           $this->db->where('facultyavailablity.fid',$id);
           $this->db->where('facultyavailablity.flag',1);
        
           return $this->db->count_all_results();   
    }
         public function get_data_timeslotinactive_jq($id){
     $this->db->select('facultyavailablity.timeid,facultyavailablity.day,facultyavailablity.time');  
           $this->db->from('facultyavailablity');  
         // $this->db->where('facultyavailablity.','meetinstructor.sid = student.sid');
           $this->db->where('facultyavailablity.fid',$id);
           $this->db->where('facultyavailablity.flag',0);
        
           return $this->db->count_all_results();   
    }
    public function get_filtered_meetjq($id){
               $this->result_builderjq($id);  
           $query = $this->db->get();  
           return $query->num_rows();  
    }
       public function get_filtered_meetinactivejq($id){
               $this->result_builderinactivejq($id);  
           $query = $this->db->get();  
           return $query->num_rows();  
    }
     public function get_filtered_meet(){
               $this->result_builder();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }
        public function delete_single_user($id){

            $this->db->where("Id",$id);
        $this->db->delete("meetinstructor");
   // $this->db->insert('facultycancelreport',$data);
   // return $query; 
        //delete from user where userid='$user_id'
        
    }
  public function insert_slot_flag($fid,$day,$date,$time,$sid){
    
  $data= array(
       'fid' => $fid ,
       'day' => $day ,
       'date' => $date ,
       'time' => $time ,
       'sid' => $sid ,
    );
    $query = $this->db->insert('facultycancelreport',$data);
    return true; 
}
 
//-------------get the student table search by
    
   
    public function get_table_studentjs(){
     $this->get_students_tabl();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();    
    }
    public function get_data_studentjs(){  
         
    $this->db->select('student.sid,student.firstname,student.lastname,student.username,student.gender,student.email,student.phone,student.address');  
           $this->db->from('student')->where(['flag' =>TRUE]); 
          
           return $this->db->count_all_results();   
   
    }
    public function get_filtered_studentjs(){
               $this->get_students_tabl();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }
    public function get_students_tabl(){
    $this->db->select('student.sid,student.firstname,student.lastname,student.username,student.gender,student.email,student.phone,student.address');  
           $this->db->from('student')->where(['flag' =>TRUE]);  
  
         if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("student.sid", $_POST["search"]["value"])->where(['flag' =>TRUE]);  
                $this->db->or_like("student.firstname", $_POST["search"]["value"])->where(['flag' =>TRUE]);
                 $this->db->or_like("student.lastname", $_POST["search"]["value"])->where(['flag' =>TRUE]);
                  $this->db->or_like("student.username", $_POST["search"]["value"])->where(['flag' =>TRUE]);
                 $this->db->or_like("student.gender", $_POST["search"]["value"])->where(['flag' =>TRUE]);
                 $this->db->or_like("student.email", $_POST["search"]["value"])->where(['flag' =>TRUE]);
                $this->db->or_like("student.phone", $_POST["search"]["value"])->where(['flag' =>TRUE]);
                  $this->db->or_like("student.address", $_POST["search"]["value"])->where(['flag' =>TRUE]);
               //  $this->db->or_like("faculty.fid", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
       $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('sid', 'DESC');  
           }        
    }
     function update_crud_student($user_id, $data)  
      {  
           $this->db->where("sid", $user_id);  
           $this->db->update("student", $data);  
      }
                 public function inactive_studentjq($id){
                     $data= array(
                    'flag' => FALSE    
                     );
        $this->db->where("sid",$id);
        $this->db->update("student",$data);
        //delete from user where userid='$user_id'->where(['flag' =>TRUE])
        
    }
    ////manage faculty and get the faculty search by//////////////////////////
  public function get_table_facultyjs(){
     $this->get_faculty_tabl();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();    
    }
      public function get_table_facultyavailjs(){
     $this->get_faculty_availtabl();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();    
    }
    public function get_data_facultyjs(){  
         
    $this->db->select('faculty.fid,faculty.firstname,faculty.lastname,faculty.username,faculty.gender,faculty.email,faculty.phone,faculty.address');  
           $this->db->from('faculty')->where(['flag' =>TRUE]); 
          
           return $this->db->count_all_results();   
   
    }
        public function get_data_facultyavailjs(){  
         
    $this->db->select('faculty.fid,faculty.firstname,faculty.lastname,facultyclassesavailablity.semester,facultyclassesavailablity.year,facultyclassesavailablity.day,facultyclassesavailablity.time,facultyclassesavailablity.flag');  
           $this->db->from('faculty');
           $this->db->join('facultyclassesavailablity','faculty.fid = facultyclassesavailablity.fid');
   
          
           return $this->db->count_all_results();   
   
    }
    public function get_filtered_facultyjs(){
               $this->get_faculty_tabl();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }
        public function get_filtered_facultyavailjs(){
               $this->get_faculty_availtabl();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }
    public function get_faculty_tabl(){
    $this->db->select('faculty.fid,faculty.firstname,faculty.lastname,faculty.username,faculty.gender,faculty.email,faculty.phone,faculty.address');  
           $this->db->from('faculty')->where(['flag' =>TRUE]);  
  
         if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("faculty.fid", $_POST["search"]["value"])->where(['flag' =>TRUE]);  
                $this->db->or_like("faculty.firstname", $_POST["search"]["value"])->where(['flag' =>TRUE]);
                 $this->db->or_like("faculty.lastname", $_POST["search"]["value"])->where(['flag' =>TRUE]);
                  $this->db->or_like("faculty.username", $_POST["search"]["value"])->where(['flag' =>TRUE]);
                 $this->db->or_like("faculty.gender", $_POST["search"]["value"])->where(['flag' =>TRUE]);
                 $this->db->or_like("faculty.email", $_POST["search"]["value"])->where(['flag' =>TRUE]);
                $this->db->or_like("faculty.phone", $_POST["search"]["value"])->where(['flag' =>TRUE]);
                  $this->db->or_like("faculty.address", $_POST["search"]["value"])->where(['flag' =>TRUE]);
               //  $this->db->or_like("faculty.fid", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
       $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('fid', 'DESC');  
           }        
    }
        public function get_faculty_availtabl(){
    $this->db->select('faculty.fid,faculty.firstname,faculty.lastname,facultyclassesavailablity.semester,facultyclassesavailablity.year,facultyclassesavailablity.day,facultyclassesavailablity.time,facultyclassesavailablity.flag');  
           $this->db->from('faculty');
           $this->db->join('facultyclassesavailablity','faculty.fid = facultyclassesavailablity.fid');
   
         if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("faculty.fid", $_POST["search"]["value"]);  
                $this->db->or_like("faculty.firstname", $_POST["search"]["value"]);
                 $this->db->or_like("faculty.lastname", $_POST["search"]["value"]);
                  $this->db->or_like("facultyclassesavailablity.semester", $_POST["search"]["value"]);
                 $this->db->or_like("facultyclassesavailablity.year", $_POST["search"]["value"]);
                 $this->db->or_like("facultyclassesavailablity.day", $_POST["search"]["value"]);
                $this->db->or_like("facultyclassesavailablity.time", $_POST["search"]["value"]);
                  $this->db->or_like("facultyclassesavailablity.flag", $_POST["search"]["value"]);
               //  $this->db->or_like("faculty.fid", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
       $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('fid', 'DESC');  
           }        
    }
     function update_crud_faculty($user_id, $data)  
      {  
           $this->db->where("fid", $user_id);  
           $this->db->update("faculty", $data);  
      }
                 public function inactive_facultyjq($id){
                     $data= array(
                    'flag' => FALSE    
                     );
        $this->db->where("fid",$id);
        $this->db->update("faculty",$data);
        //delete from user where userid='$user_id'->where(['flag' =>TRUE])
        
    }
    /////////manage inactive ////////////////////////////////////////
     public function get_table_inactivestudentjs(){
     $this->get_inactivestudents_tabl();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();    
    }
    public function get_data_inactivestudentjs(){  
         
    $this->db->select('student.sid,student.firstname,student.lastname,student.username,student.gender,student.email,student.phone,student.address');  
           $this->db->from('student')->where(['flag' =>FALSE]); 
          
           return $this->db->count_all_results();   
   
    }
    public function get_filtered_inactivestudentjs(){
               $this->get_inactivestudents_tabl();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }
    public function get_inactivestudents_tabl(){
    $this->db->select('student.sid,student.firstname,student.lastname,student.username,student.gender,student.email,student.phone,student.address');  
           $this->db->from('student')->where(['flag' =>FALSE]);  
  
         if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("student.sid", $_POST["search"]["value"])->where(['flag' =>FALSE]);  
                $this->db->or_like("student.firstname", $_POST["search"]["value"])->where(['flag' =>FALSE]);
                 $this->db->or_like("student.lastname", $_POST["search"]["value"])->where(['flag' =>FALSE]);
                  $this->db->or_like("student.username", $_POST["search"]["value"])->where(['flag' =>FALSE]);
                 $this->db->or_like("student.gender", $_POST["search"]["value"])->where(['flag' =>FALSE]);
                 $this->db->or_like("student.email", $_POST["search"]["value"])->where(['flag' =>FALSE]);
                $this->db->or_like("student.phone", $_POST["search"]["value"])->where(['flag' =>FALSE]);
                  $this->db->or_like("student.address", $_POST["search"]["value"])->where(['flag' =>FALSE]);
               //  $this->db->or_like("faculty.fid", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
       $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('sid', 'DESC');  
           }        
    }
     function update_crud_inactivestudent($user_id, $data)  
      {  
           $this->db->where("sid", $user_id);  
           $this->db->update("student", $data);  
      }
                 public function active_studentjq($id){
                     //actives the student profile
                     $data= array(
                    'flag' => TRUE    
                     );
        $this->db->where("sid",$id);
        $this->db->update("student",$data);
        //delete from user where userid='$user_id'->where(['flag' =>TRUE])
        
    }
     public function inactive_studentjqdelete($id){
                     //actives the student profile
                
        $this->db->where("sid",$id);
        $this->db->delete("student"); 
      
        //delete from user where userid='$user_id'->where(['flag' =>TRUE])
        
    }
    ////////////inactive faculty
     public function get_table_inactivefacultyjs(){
     $this->get_inactivefaculty_tabl();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();    
    }
    public function get_data_inactivefacultyjs(){  
         
    $this->db->select('faculty.fid,faculty.firstname,faculty.lastname,faculty.username,faculty.gender,faculty.email,faculty.phone,faculty.address');  
           $this->db->from('faculty')->where(['flag' =>FALSE]); 
          
           return $this->db->count_all_results();   
   
    }
    public function get_filtered_inactivefacultyjs(){
               $this->get_inactivefaculty_tabl();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }
    public function get_inactivefaculty_tabl(){
    $this->db->select('faculty.fid,faculty.firstname,faculty.lastname,faculty.username,faculty.gender,faculty.email,faculty.phone,faculty.address');  
           $this->db->from('faculty')->where(['flag' =>FALSE]);  
  
         if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("faculty.fid", $_POST["search"]["value"])->where(['flag' =>FALSE]);  
                $this->db->or_like("faculty.firstname", $_POST["search"]["value"])->where(['flag' =>FALSE]);
                 $this->db->or_like("faculty.lastname", $_POST["search"]["value"])->where(['flag' =>FALSE]);
                  $this->db->or_like("faculty.username", $_POST["search"]["value"])->where(['flag' =>FALSE]);
                 $this->db->or_like("faculty.gender", $_POST["search"]["value"])->where(['flag' =>FALSE]);
                 $this->db->or_like("faculty.email", $_POST["search"]["value"])->where(['flag' =>FALSE]);
                $this->db->or_like("faculty.phone", $_POST["search"]["value"])->where(['flag' =>FALSE]);
                  $this->db->or_like("faculty.address", $_POST["search"]["value"])->where(['flag' =>FALSE]);
               //  $this->db->or_like("faculty.fid", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
       $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('fid', 'DESC');  
           }        
    }
     function update_crud_inactivefaculty($user_id, $data)  
      {  
           $this->db->where("fid", $user_id);  
           $this->db->update("faculty", $data);  
      }
                 public function active_facultyjq($id){
                     //actives the student profile
                     $data= array(
                    'flag' => TRUE    
                     );
        $this->db->where("fid",$id);
        $this->db->update("faculty",$data);
        //delete from user where userid='$user_id'->where(['flag' =>TRUE])
        
    }
     public function inactive_facultyjqdelete($id){
                     //actives the student profile
                
        $this->db->where("fid",$id);
        $this->db->delete("faculty"); 
      
        //delete from user where userid='$user_id'->where(['flag' =>TRUE])
        
    }
    public function sample_dta(){
         $query=        $this->db->select("registration.registrationid,registration.courseid,registration.sid,registration.fid,courses.coursename,registration.semester,registration.year,student.firstname,student.lastname,faculty.firstname as ffirstname,faculty.lastname as flastname");  
           $this->db->from("registration");  
             $this->db->join('courses','registration.courseid = courses.courseid');
               $this->db->join('student','registration.sid = student.sid');
            $this->db->join('faculty','registration.fid = faculty.fid');
            $query=$this->db->get();
            return $query->result();
    }

    ///////////////////////registration table update and view
    public function get_registration_tabl()  
      {  
 
         $this->db->select("registration.registrationid,registration.courseid,registration.sid,registration.fid,courses.coursename,registration.semester,registration.year,student.firstname,student.lastname,faculty.firstname as ffirstname,faculty.lastname as flastname");  
           $this->db->from("registration");  
           $this->db->join('courses','registration.cid = courses.cid');
           $this->db->join('student','registration.sid = student.sid');
            $this->db->join('faculty','registration.fid = faculty.fid');
         if(isset($_POST["search"]["value"]))  
           {  
               $this->db->like("registration.registrationid", $_POST["search"]["value"]);  
                
                $this->db->like("registration.courseid", $_POST["search"]["value"]);  
              //  $this->db->or_like("courses.coursename", $_POST["search"]["value"]);
                 $this->db->or_like("registration.semester", $_POST["search"]["value"]);
                  $this->db->or_like("registration.year", $_POST["search"]["value"]);
                 $this->db->or_like("faculty.firstname", $_POST["search"]["value"]);
                 $this->db->or_like("faculty.lastname", $_POST["search"]["value"]);
                       $this->db->or_like("student.firstname", $_POST["search"]["value"]);
                 $this->db->or_like("student.lastname", $_POST["search"]["value"]);
               //  $this->db->or_like("faculty.fid", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
       $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('registrationid', 'DESC');  
           }   
            
      }
   public function get_tablejq(){  
           $this->get_registration_tabl();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  

    public function get_data_registration(){
                 $this->db->select("registration.registrationid,registration.courseid,registration.sid,registration.fid,courses.coursename,registration.semester,registration.year,student.firstname,student.lastname,faculty.firstname as ffirstname,faculty.lastname as flastname");  
           $this->db->from("registration");  
             $this->db->join('courses','registration.cid = courses.cid');
               $this->db->join('student','registration.sid = student.sid');
            $this->db->join('faculty','registration.fid = faculty.fid');
           return $this->db->count_all_results();   
    }
       function fetch_single_registration($user_id){
          //  $this->db->where("sid", );  
           $query=$this->db->select("registration.registrationid,registration.courseid,registration.sid,registration.fid,courses.coursename,registration.semester,registration.year,student.firstname,student.lastname,faculty.firstname as ffirstname,faculty.lastname as flastname");  
           $this->db->from("registration");  
             $this->db->join('courses','registration.courseid = courses.courseid');
               $this->db->join('student','registration.sid = student.sid');
            $this->db->join('faculty','registration.fid = faculty.fid');
           $this->db->where('registration.registrationid',$user_id)  ;
           //$user_id
           $query=$this->db->get();
           return $query->result();     
      }
    public function get_filtered_datajq(){
               $this->get_registration_tabl();  
           $query = $this->db->get();  
           return $query->num_rows();  
    }
 
}
//;
  