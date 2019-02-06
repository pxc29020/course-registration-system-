<?php

/* 
 
Created by Pradeep Chandra Chitti
student id : 700672902
email: pxc29020@ucmo.edu

 */


class Crs_model_two extends CI_Model{
    
    public function getsection(){
            $query = $this->db->get('section');
        return    $query->result_array(); 
    }
}
   
