<?php

class Crud_model extends CI_Model  
 {  
     // var $table = "courses";  
     // var $select_column = array("courseid", "coursename", "semester", "year");  
     // var $order_column = array(null, "courseid", "coursename", null, null);  
        public function getsection(){
            $query = $this->db->get('section');
        return    $query->result_array(); 
    }
      function make_query()  
      {  
 
       $this->db->select('courses.courseid,courses.aboutcourse,courses.coursename,courses.fid,courses.semester,courses.year,faculty.firstname,faculty.lastname');  
           $this->db->from('courses');  
            $this->db->join('faculty','courses.fid = faculty.fid');
         if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("courses.courseid", $_POST["search"]["value"]);  
                $this->db->or_like("courses.coursename", $_POST["search"]["value"]);
                 $this->db->or_like("courses.semester", $_POST["search"]["value"]);
                  $this->db->or_like("courses.year", $_POST["search"]["value"]);
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
                $this->db->order_by('courseid', 'DESC');  
           }   
            
      }  
      function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data()  
      {  
           $this->db->select("courses.courseid,courses.aboutcourse,courses.coursename,courses.fid,courses.semester,courses.year,faculty.firstname,faculty.lastname");  
           $this->db->from("courses");  
            $this->db->join('faculty','courses.fid = faculty.fid');
           return $this->db->count_all_results();  
      }  

      function fetch_single_user($user_id)  
      {  
           $this->db->where("courseid", $user_id);  
           $query=$this->db->get('courses');  
           return $query->result();  
      }  
  
  
 }  

