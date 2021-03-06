<?php
class Access_data extends CI_Model{
  function __construct() {
parent::__construct();

}

function Check($field, $table, $where){ // method for checking of the data is excess
        $query = $this->db->query("SELECT ".$field." FROM ".$table." WHERE ".$where);
        $val = $query->result();
        if($val != null){
            return true;
        }
        
    }

/*function GetID($field, $table, $where){ // method for checking of the data is excess
        $query = $this->db->query("SELECT ".$field." FROM ".$table." WHERE ".$where);
        $val = $query->result();
        
            return $val;
    }*/

 function report_feleter($fields, $table, $join='', $orderby=''){ // query with join
        $arr = array();
        if($orderby!='') $orderby = 'ORDER BY '.$orderby. ' DESC';

        $query = $this->db->query("SELECT ".$fields." FROM ".$table." ".$join." ".$orderby);
        
        foreach($query->result() AS $q):
            $arr[] = $q;
        endforeach;
        return $arr;
     } // end of hrelpdesk function

function getdata($field, $table, $where=''){ // query without join
     	$arr = array();
     	if($where!='')$where = 'WHERE '.$where;
     	$query = $this->db->query("SELECT ".$field." FROM ".$table." ".$where);
     	foreach ($query->result() as $value) {
     		$arr[] = $value;
     	}
     	return $arr;
     } // end getdata

    function addevent($table,$data){
   		if(count($data) > 0){
			$sql = "INSERT INTO $table (";
			$cols = '';
			$vals = '';
			foreach($data AS $k => $v){
				$cols .= '`'.$k.'`,';
				if($v=='NOW()')
					$vals .= $v.',';
				else
					$vals .= '"'.$v.'",';
			}
			$sql .= rtrim($cols,',').') VALUES ('.rtrim($vals,',').')';
			
			$this->db->query($sql);
			//$num = $this->db->insert_id();
			
			return true;
		}
     } //end of Adding function

     function delete($table,$where=''){ //update any status
        if($where!='')$where = 'WHERE '.$where;
     	$sql = ("DELETE FROM ".$table." ".$where." ");
     	$this->db->query($sql);
         return true;
     }// end update function

      function updatestatus($table,$set,$where){ //update any status
     	$sql = ("UPDATE ".$table." SET ".$set." WHERE ".$where." ");
     	$this->db->query($sql);
         return true;
     }// end update function

     function applied($userID, $postID, $compID) {
        $where = array("userID" => $userID, "postID" => $postID, "compID" => $compID);
        $row = $this->db->get_where('apply_tbl', $where)->first_row('array');
        return !empty($row) && $row['userDel'] == 0;
     }
     function accepted($userID, $postID, $compID) {
        $where = array("userID" => $userID, "postID" => $postID, "compID" => $compID);
        $row = $this->db->get_where('apply_tbl', $where)->first_row('array');
        return !empty($row) && $row['userBook'] == 1;
     }
     function declined($userID, $postID, $compID) {
        $where = array("userID" => $userID, "postID" => $postID, "compID" => $compID);
        $row = $this->db->get_where('apply_tbl', $where)->first_row('array');
        return !empty($row) && $row['userDel'] == 1;
     }

     function getApplicants($compID, $apply_id = null) {
        $cond = "cp.id = $compID AND apply_id IS NOT NULL";
        if(!is_null($apply_id)) {
            $cond = "at.apply_id = $apply_id";
        }
        $sql = "SELECT 
                    s.*,
                    cp.job_title,
                    r.fname as company_name,
                    r.email as company_email,
                    at.apply_id,
                    p.prog_list as program
                FROM 
                    company_post cp 
                LEFT JOIN
                    registered r ON r.userID = cp.id 
                LEFT JOIN
                    apply_tbl at ON at.postID = cp.post_id 
                LEFT JOIN 
                    student s ON s.userID = at.userID
                LEFT JOIN 
                    program p ON s.course = p.prog_id 
                WHERE 
                    $cond";

        if(!is_null($apply_id)) {
            return $this->db->query($sql)->first_row();
        }                 
        return $this->db->query($sql)->result();
     }

     function getProgramByCategoryID($cat_id) {
        $where = array("cat_id" => $cat_id);
        $rows = $this->db->get_where('program', $where)->result();
        return $rows;
     }


}