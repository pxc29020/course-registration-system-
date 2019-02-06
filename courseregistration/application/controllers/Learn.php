<?php

class Learn extends CI_Controller{
    

      function fetch_user(){  
           $this->load->model("crud_model");  
           $fetch_data = $this->crud_model->make_datatables(); 
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
             $sub_array[] = $row->courseid;  
                $sub_array[] = $row->coursename;
                 $sub_array[] = $row->semester;
                  $sub_array[] = $row->year;
                  $sub_array[] = 'Dr'.$row->firstname.' '.$row->lastname;
                   $sub_array[] = $row->fid;
               $sub_array[] = '<a href="#" class="btn btn-primary btn-xs update" name="update" id="'.$row->courseid.'">Edit</a>';  
            //   $sub_array[] = '<button type="button" name="update" id="'.$row->courseid.'"  class="btn btn-warning btn-xs update">Update</button>';  
               
            $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->crud_model->get_all_data(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }  
     
      function fetch_single_user()  
      {  
           $output = array();  
           $this->load->model("crud_model");  
           $data = $this->crud_model->fetch_single_user($_POST["user_id"]);  
           foreach($data as $row)  
           {  
         
                   $output['test'] = $row->aboutcourse;
                 
           }  
           echo json_encode($output);  
      }  
  
    
}