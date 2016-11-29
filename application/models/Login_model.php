<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model{
  function __construct() {
      parent::__construct();
}

public function validate($user,$password,$logintype){ // database for validate the  email and password
	   if ($logintype == "Company") {
  
        $this->db->select('*');
      	$this->db->from('registered');
      	$this->db->where('username',$user);
        $this->db->where('type','Company');
      	$this->db->where('password',$password);
      	$this -> db -> limit(1);
       
         $query = $this -> db -> get();

         if($query -> num_rows() == 1)
         {
           return $query->result();
         }
         else
         {
           return null;
         }
      }elseif($logintype == "Student"){
          $this->db->select('*');
          $this->db->from('student');
          $this->db->where('username',$user);
          $this->db->where('password',$password);
          $this -> db -> limit(1);
         
           $query = $this -> db -> get();

           if($query -> num_rows() == 1)
           {
             return $query->result();
           }
           else
           {
             return null;
           }

      }
	}
public function validatestatus($userid,$logintype){ // database for validate the status of user (admin OR client)
   if ($logintype == "Company") {
  
        $this->db->select('*');
        $this->db->from('registered');
        $this->db->where('username',$userid);
        $this -> db -> limit(1);
        $query = $this -> db -> get();
            if($query -> num_rows() == 1)
           {
             return $query->result();
           }
    }elseif($logintype == "Student"){

            $this->db->select('*');
            $this->db->from('student');
            $this->db->where('username',$userid);
            $this -> db -> limit(1);
            $query = $this -> db -> get();
                if($query -> num_rows() == 1)
               {
                 return $query->result();
               }
        }
     
  }

 
}