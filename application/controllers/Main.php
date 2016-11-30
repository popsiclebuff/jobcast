<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper(array('form'));
		$this->load->model('access_data');	
		
	}

	public function compnoty(){

			$session_data = $this->session->userdata('logged_in'); // condition if the session is in set
     		$data['user_id'] = $session_data['user_id'];
     		$id = $session_data['user_id'];

    		$num = $this->access_data->report_feleter("(SELECT prog_list FROM program WHERE prog_id = student.course) as program,apply_tbl.*,student.*, company_post.job_title","apply_tbl","INNER JOIN student ON student.userID = apply_tbl.userID INNER JOIN company_post ON company_post.post_id = apply_tbl.postID WHERE apply_tbl.compID = $id AND userBook = 0 AND apply_tbl.userDel = 0", "apply_tbl.apply_id"); 

    		return count($num);
	}

	public function notyreturn(){

		$session_data = $this->session->userdata('logged_in'); // condition if the session is in set
     		$data['user_id'] = $session_data['user_id'];
     		$id = $session_data['user_id'];

     		$tbl = "student";
     			$crs = $this->access_data->getdata("course","student","userID = ".$id);
     			foreach ($crs as $k) {}
     			if ($k->course == 12 || $k->course == 11 || $k->course == 13) { // IT student
     				$numnoty = $this->access_data->getdata("company_post.*","company_post","company_post.category_id = 10 OR company_post.category_id = 4  OR company_post.category_id = 11 OR company_post.category_id = 12 ");
     			}elseif ($k->course == 16) { // IT student
     				$numnoty = $this->access_data->getdata("company_post.*","company_post","(category_id = 1) OR  (category_id = 4) OR  (category_id = 11) OR  (category_id = 12)");
     			}elseif ($k->course == 19 || $k->course == 20) { // admin student
     				$numnoty = $this->access_data->getdata("company_post.*","company_post","(category_id = 2) OR  (category_id = 4) OR  (category_id = 11) OR  (category_id = 12)");
     			}elseif ($k->course == 7 || $k->course == 1) { 
     				$numnoty = $this->access_data->getdata("company_post.*","company_post","(category_id = 6) OR  (category_id = 4) OR  (category_id = 11) OR  (category_id = 12)");
     			}elseif ($k->course == 14) { 
     				$numnoty = $this->access_data->getdata("company_post.*","company_post","(category_id = 7) OR  (category_id = 4) OR  (category_id = 11) OR  (category_id = 12)");
     			}elseif ($k->course == 30 || $k->course == 31) { 
     				$numnoty = $this->access_data->getdata("company_post.*","company_post","(category_id = 5) OR  (category_id = 4) OR  (category_id = 11) OR  (category_id = 12)");
     			}elseif ($k->course == 27) { 
     				$numnoty = $this->access_data->getdata("company_post.*","company_post","(category_id = 8) OR  (category_id = 4) OR  (category_id = 11) OR  (category_id = 12)");
     			}elseif ($k->course == 22) { 
     				$numnoty = $this->access_data->getdata("company_post.*","company_post","(category_id = 9) OR  (category_id = 4) OR  (category_id = 11) OR  (category_id = 12)");
     			}elseif($k->course >= 1 && $k->course <=10) { 
                         $numnoty = $this->access_data->getdata("company_post.*","company_post","(category_id = 9) OR  (category_id = 4) OR  (category_id = 11) OR  (category_id = 12)");
                    }


     			return count($numnoty);

	}

	public function company_main()
	{

		if(!$this->session->userdata('logged_in')) // condition if the session is empty
   		 {
			redirect(base_url());
		 }else{
		 	$session_data = $this->session->userdata('logged_in'); // condition if the session is in set
     		$data['user_id'] = $session_data['user_id'];
     		$id = $session_data['user_id'];
     		$logtype = $session_data['type'];
     		//$data['user_id'] = $id;
     		//$data['typelogin'] = $logtype;
     		$tbl = "";
     		$numnoty = "";

     		if ($logtype == "Company") {
     			$tbl = "registered";
     			$aply = $this->access_data->getdata("*","apply_tbl","compID = ".$id." AND userBook = 0");
     			$data['aply'] = $this->compnoty();

     			$data['job_post'] = $this->access_data->report_feleter("company_post.*,registered.company_name","company_post","INNER JOIN registered ON registered.userID = company_post.id WHERE company_post.id = $id", "company_post.post_id");
     		}else{
     			$tbl = "student";
     			/*
     			$crs = $this->access_data->getdata("course","student","userID = ".$id);
     			foreach ($crs as $k) {}
     			if ($k->course == 12) { // IT student
     				$numnoty = $this->access_data->getdata("*","company_post","(category_id = 10) OR  (category_id = 4)");
     			}if ($k->course == 16) { // IT student
     				$numnoty = $this->access_data->getdata("*","company_post","(category_id = 1) OR  (category_id = 4)");
     			} */


     			$data['noty'] =  $this->notyreturn();
     			$data1['notyposted'] = $numnoty;
    			//$this->load->view('notify_view',$data1);

    			$data['job_post'] = $this->access_data->report_feleter("company_post.*,registered.company_name","company_post","INNER JOIN registered ON registered.userID = company_post.id", "company_post.post_id");
     		}
     		
     		$data['mydata'] = $this->access_data->getdata("*",$tbl,"userID = ".$id);
     		//$data['job_post'] = $this->access_data->getdata("*","company_post","");

     		//$data['job_post'] = $this->access_data->report_feleter("company_post.*,registered.company_name","company_post","INNER JOIN registered ON registered.userID = company_post.id", "company_post.post_id");
		 	
		 	$this->load->view('company_main',$data);
		 	$this->load->view('header',$data);
		 }

		
	}

	public function book(){ // book funtion

		if(!$this->session->userdata('logged_in')) // condition if the session is empty
   		 {
			redirect(base_url());
		 }else{
	
		 	$data2['stud_id'] = $this->uri->segment(3);
			$data2['postid'] =$this->uri->segment(4);
			$data2['company_id'] = $this->uri->segment(5);
			$data2['course_id'] = $this->uri->segment(6);


			$psid = $this->access_data->getdata("*","booknoty_tbl","postid = ".$this->uri->segment(4)." AND stud_id =".$this->uri->segment(3));
			 		if ($psid == null) {
				 			
					 	if($this->access_data->addevent('booknoty_tbl',$data2)){
							redirect(base_url().'Main/notify');
                                   //$data['msg'] = "<script>alert('Successfully bookmarked.')</script>";
							}
					 }else{
					 	$data['msg'] = "<script>alert('You have applied for this position already.')</script>";

						redirect(base_url().'Main/notify'); //tibay book
						
					 }

			
     	}

	}

	public function book_manage(){ // transfering to booking and manage applicant

		if(!$this->session->userdata('logged_in')) // condition if the session is empty
   		 {
			redirect(base_url());
		 }else{

		 	$data['msg'] = "";
		 	$session_data = $this->session->userdata('logged_in'); // condition if the session is in set
     		$data['user_id'] = $session_data['user_id'];
     		$id = $session_data['user_id'];
     		$logtype = $session_data['type'];

     		$tbl = "";
     		$numnoty = "";
     		//$data['aplicnt'] = array();


     		if ($logtype == "Company") {
     			$tbl = "registered";

     			$aply1 = $this->access_data->getdata("*","apply_tbl","compID = ".$id." AND userBook = 0");
     			$data['aply'] = $this->compnoty();

     			foreach ($aply1 as $ap) {}
     			
     			$data['aplicnt'] = $this->access_data->report_feleter("(SELECT prog_list FROM program WHERE prog_id = student.course) as program,apply_tbl.*,student.*, company_post.job_title","apply_tbl","INNER JOIN student ON student.userID = apply_tbl.userID INNER JOIN company_post ON company_post.post_id = apply_tbl.postID WHERE apply_tbl.compID = $id AND apply_tbl.userBook = 1 ", "apply_tbl.apply_id"); 
			

     		}else{

     			$tbl = "student";
     			$crs = $this->access_data->getdata("course","student","userID = ".$id);
     			foreach ($crs as $k) {}
     			if ($k->course == 12 || $k->course == 11) { // IT student
     				$numnoty = $this->access_data->report_feleter("company_post.*","company_post","INNER JOIN booknoty_tbl ON booknoty_tbl.postid = company_post.post_id WHERE booknoty_tbl.stud_id =".$id." AND (company_post.category_id = 10 OR company_post.category_id = 4  OR company_post.category_id = 11 OR company_post.category_id = 12)");
     			}elseif ($k->course == 16) { // IT student
     				$numnoty = $this->access_data->report_feleter("company_post.*","company_post","INNER JOIN booknoty_tbl ON booknoty_tbl.postid = company_post.post_id WHERE booknoty_tbl.stud_id =".$id." AND (category_id = 1 OR  category_id = 4 OR  category_id = 11 OR  category_id = 12)");
     			}elseif ($k->course == 19 || $k->course == 20) { // admin student
     				$numnoty = $this->access_data->report_feleter("company_post.*","company_post","INNER JOIN booknoty_tbl ON booknoty_tbl.postid = company_post.post_id WHERE booknoty_tbl.stud_id =".$id." AND (category_id = 2 OR  category_id = 4 OR  category_id = 11 OR  category_id = 12)");
     			}elseif ($k->course == 7 || $k->course == 1) { 
     				$numnoty = $this->access_data->report_feleter("company_post.*","company_post","INNER JOIN booknoty_tbl ON booknoty_tbl.postid = company_post.post_id WHERE booknoty_tbl.stud_id =".$id." AND (category_id = 6 OR  category_id = 4 OR  category_id = 11 OR  category_id = 12)");
     			}elseif ($k->course == 14) { 
     				$numnoty = $this->access_data->report_feleter("company_post.*","company_post","INNER JOIN booknoty_tbl ON booknoty_tbl.postid = company_post.post_id WHERE booknoty_tbl.stud_id =".$id." AND (category_id = 7 OR  category_id = 4 OR category_id = 11 OR  category_id = 12)");
     			}elseif ($k->course == 30 || $k->course == 31) { 
     				$numnoty = $this->access_data->report_feleter("company_post.*","company_post","INNER JOIN booknoty_tbl ON booknoty_tbl.postid = company_post.post_id WHERE booknoty_tbl.stud_id =".$id." AND (category_id = 5 OR category_id = 4 OR category_id = 11 OR category_id = 12)");
     			}elseif ($k->course == 27) { 
     				$numnoty = $this->access_data->report_feleter("company_post.*","company_post","INNER JOIN booknoty_tbl ON booknoty_tbl.postid = company_post.post_id WHERE booknoty_tbl.stud_id =".$id." AND (category_id = 8 OR category_id = 4 OR category_id = 11 OR category_id = 12)");
     			}elseif ($k->course == 22) { 
     				$numnoty = $this->access_data->report_feleter("company_post.*","company_post","INNER JOIN booknoty_tbl ON booknoty_tbl.postid = company_post.post_id WHERE booknoty_tbl.stud_id =".$id." AND (category_id = 9 OR category_id = 4 OR category_id = 11 OR category_id = 12)");
     			}


     			$data['noty'] = $this->notyreturn();
     			$data['notyposted'] = $numnoty;

     		}
     		$data['mydata'] = $this->access_data->getdata("*",$tbl,"userID = ".$id);
     		//$data['job_post'] = $this->access_data->getdata("*","company_post","");

     		$data['job_post'] = $this->access_data->report_feleter("company_post.*,registered.company_name","company_post","INNER JOIN registered ON registered.userID = company_post.id", "company_post.post_id");



     		$this->load->view('book_manage',$data);
		 	$this->load->view('header',$data);
     	}

	}
	public function manage_app(){
		if(!$this->session->userdata('logged_in')) // condition if the session is empty
   		 {
			redirect(base_url());
		 } else{
		 	$session_data = $this->session->userdata('logged_in'); // condition if the session is in set
     		$data['user_id'] = $session_data['user_id'];
     		$id = $session_data['user_id'];

			$upd = $this->uri->segment(3);
			$upid = $this->uri->segment(4);
	 		if ($upd == "manage") {
			 	if($this->access_data->updatestatus("apply_tbl","userBook = 1","apply_id =".$upid)){
					redirect(base_url().'Main/book_manage'); //altered tibay
				}
			 } else if($upd == "decline") {
	               if($this->access_data->updatestatus("apply_tbl","userDel = 1","apply_id =".$upid)){
					redirect(base_url().'Main/notify'); //altered tibay
				}
				
			 }
     	}
	}

     //tibay start make
     public function delete_notif(){


          if(!$this->session->userdata('logged_in')) // condition if the session is empty
           {
               redirect(base_url());
           }else{
               $session_data = $this->session->userdata('logged_in'); // condition if the session is in set
               $data['user_id'] = $session_data['user_id'];
               $id = $session_data['user_id'];

               $upd = $this->uri->segment(3);
               $upid = $this->uri->segment(4);
     
                         if ($upd == "manage") {
                                   
                              if($this->access_data->updatestatus("apply_tbl","userBook = 1","apply_id =".$upid)){
                                   redirect(base_url().'Main/book_manage'); //altered tibay
                                   }
                          }else if($upd == "decline"){

                          if($this->access_data->updatestatus("apply_tbl","userDel = 1","apply_id =".$upid)){
                                   redirect(base_url().'Main/notify'); //altered tibay
                                   }
                              
                          }
               
          }

     }

     //tibay end make

	public function notify() // notification in applicant and company
     {
          if(!$this->session->userdata('logged_in')) // condition if the session is empty
           {
               redirect(base_url());
           }else{
          
               $data['msg'] = "";
               $session_data = $this->session->userdata('logged_in'); // condition if the session is in set
               $data['user_id'] = $session_data['user_id'];
               $id = $session_data['user_id'];
               $logtype = $session_data['type'];

               $tbl = "";
               $numnoty = "";
          
               if ($logtype == "Company") {
                    $tbl = "registered";

                    $aply1 = $this->access_data->getdata("*","apply_tbl","compID = ".$id);
                    
                    $data['aply'] = $this->compnoty();

                    foreach ($aply1 as $ap) {}
                    // print_r($ap);die;
                    
                    $data['aplicnt'] = $this->access_data->getApplicants($id);
                    // $data['aplicnt'] = $this->access_data->report_feleter("(SELECT prog_list FROM program WHERE prog_id = student.course) as program,apply_tbl.*,student.*, company_post.job_title","apply_tbl","INNER JOIN student ON student.userID = apply_tbl.userID INNER JOIN company_post ON company_post.post_id = apply_tbl.postID WHERE apply_tbl.compID = $id AND userBook = 0 AND apply_tbl.userDel = 0", "apply_tbl.apply_id");  
               

               }else{

                    $tbl = "student";
                    $crs = $this->access_data->getdata("course","student","userID = ".$id);
                    foreach ($crs as $k) {}
                    if ($k->course == 12 || $k->course == 11) { // IT student
                         $numnoty = $this->access_data->getdata("company_post.*","company_post","company_post.category_id = 10 OR company_post.category_id = 4  OR company_post.category_id = 11 OR company_post.category_id = 12");
                    }else if ($k->course == 16) { // IT student
                         $numnoty = $this->access_data->getdata("company_post.*","company_post","(category_id = 1) OR  (category_id = 4) OR  (category_id = 11) OR  (category_id = 12)");
                    }else if ($k->course == 19 || $k->course == 20) { // admin student
                         $numnoty = $this->access_data->getdata("company_post.*","company_post","(category_id = 2) OR  (category_id = 4) OR  (category_id = 11) OR  (category_id = 12)");
                    }else if ($k->course == 7 || $k->course == 1) { 
                         $numnoty = $this->access_data->getdata("company_post.*","company_post","(category_id = 6) OR  (category_id = 4) OR  (category_id = 11) OR  (category_id = 12)");
                    }else if ($k->course == 14) { 
                         $numnoty = $this->access_data->getdata("company_post.*","company_post","(category_id = 7) OR  (category_id = 4) OR  (category_id = 11) OR  (category_id = 12)");
                    }else if ($k->course == 30 || $k->course == 31) { 
                         $numnoty = $this->access_data->getdata("company_post.*","company_post","(category_id = 5) OR  (category_id = 4) OR  (category_id = 11) OR  (category_id = 12)");
                    }else if ($k->course == 27) { 
                         $numnoty = $this->access_data->getdata("company_post.*","company_post","(category_id = 8) OR  (category_id = 4) OR  (category_id = 11) OR  (category_id = 12)");
                    }else if ($k->course == 22) { 
                         $numnoty = $this->access_data->getdata("company_post.*","company_post","(category_id = 9) OR  (category_id = 4) OR  (category_id = 11) OR  (category_id = 12)");
                    }


                    $data['noty'] = count($numnoty);
                    $data['notyposted'] = $numnoty;

               }
               
               $data['mydata'] = $this->access_data->getdata("*",$tbl,"userID = ".$id);
               //$data['job_post'] = $this->access_data->getdata("*","company_post","");

               $data['job_post'] = $this->access_data->report_feleter("company_post.*,registered.company_name","company_post","INNER JOIN registered ON registered.userID = company_post.id", "company_post.post_id");


               if ($this->uri->segment(3) != "" && $this->uri->segment(4) != "" && $this->uri->segment(5) != "" && $this->uri->segment(6) != "del") {

                         $data2['userID'] = $this->uri->segment(3);
                         $data2['postID'] =$this->uri->segment(4);
                         $data2['compID'] = $this->uri->segment(5);

                         $tr = $this->access_data->getdata("*","apply_tbl","userID = ".$this->uri->segment(3)." AND (postID =".$this->uri->segment(4).") AND (compID = ".$this->uri->segment(5).")");
                         foreach ($tr as $pl) {}
                         if ($tr == null) {

                              if($this->access_data->addevent('apply_tbl',$data2)){
                                   redirect(base_url().'Main/notify');
                              }
                                        
                          }else {

                              if($pl->userDel == 1){
                                   if($this->access_data->updatestatus("apply_tbl","userDel = 0","apply_id =".$pl->apply_id)){
                                   redirect(base_url().'Main/notify');
                                   $data['msg'] = "<script>alert('Successfully applied.')</script>";
                                   }

                              }else if($pl->userDel == 0){
                                   $data['msg'] = "<script>alert('You have applied for this position already.')</script>";
                              }
                         }

               }else if ($this->uri->segment(6) == "del") {
                    $data2['stud_id'] = $this->uri->segment(3);
                    $data2['post_id'] =$this->uri->segment(4);
                    $data2['comp_id'] = $this->uri->segment(5);
                    if($this->access_data->addevent('delete_noty',$data2)){
                         redirect(base_url().'Main/notify');
                    }
               }

               
               $this->load->view('notify_view',$data);
               $this->load->view('header',$data);
               
           }
     }


	public function profile()
	{

		$data['msg'] = "";
		if(!$this->session->userdata('logged_in')) // condition if the session is empty
   		 {
			redirect(base_url());
		 }else{
		 	$session_data = $this->session->userdata('logged_in'); // condition if the session is in set
		 	$id = $session_data['user_id'];
		 	$logtype = $session_data['type'];
		 	$tbl = "";
		 	$numnoty = "";

     		if ($logtype == "Company") {
     			$tbl = "registered";
     			$aply = $this->access_data->getdata("*","apply_tbl","compID = ".$id." AND userBook = 0");
     			$data['aply'] = $this->compnoty();
     		}else{
     			$tbl = "student";

     			$data['noty'] = $this->notyreturn();
     			$data['notyposted'] = $numnoty;
     		}

     		$data['user_id'] = $id;
		 	$data['mydata'] = $this->access_data->getdata("*",$tbl,"userID = ".$id);
		 	$this->load->view('profile',$data);
		 	$this->load->view('header',$data);
		 }

		
	}
	public function edit_profile()
	{

		$data['msg'] = "";
		$data['mgs'] = "";
		if(!$this->session->userdata('logged_in')) // condition if the session is empty
   		 {
			redirect(base_url());
		 }else{
		 	$session_data = $this->session->userdata('logged_in'); // condition if the session is in set
     		$id = $session_data['user_id'];
     		$logtype = $session_data['type'];
		 	$tbl = "";
		 	$numnoty = "";

		 	if ($logtype == "Company") {
     			$tbl = "registered";
     			$aply = $this->access_data->getdata("*","apply_tbl","compID = ".$id." AND userBook = 0");
     			$data['aply'] = $this->compnoty();
     		}else{
     			$tbl = "student";

     			$data['noty'] = $this->notyreturn();
     			$data['notyposted'] = $numnoty;
     		}

     		$data['user_id'] = $id;
		 	$data['mydata'] = $this->access_data->getdata("*",$tbl,"userID = ".$id);

		 	if (isset($_POST['save_change'])) {

		 		if ($this->input->post('logging') == "Company") { //if company is the user who logged in
		 			
		 		
				 	$newimg = "";
				 	$ret = $this->do_upload();
				 	$img = $this->input->post('img');
					 	
					 	if ($ret != "") {
					 		$newimg = $ret;
					 	}else{
					 		$newimg = $img;
					 	}

						$data['msg'] = "<script>alert('Updating Profile Success!')</script>";

						$this->access_data->updatestatus('registered','fname = "'.$this->input->post('fname').'",
																			lname = "'.$this->input->post('lname').'",
																			
																			
																			email = "'.$this->input->post('email').'",
																			contact_no = "'.$this->input->post('contno').'",
																			company_name = "'.$this->input->post('compname').'",
																			pics = "'.$newimg.'",
																			about = "'.$this->input->post('about').'"',
																			'userID = ' .$id);

						redirect(base_url().'Main/profile/'.$id);
                              //username = "'.$this->input->post('username').'",
				}else{  //if applicant is the user who logged in

					$newimg = "";
				 	$ret = $this->do_upload();
				 	$img = $this->input->post('img');
					 	
					 	if ($ret != "") {
					 		$newimg = $ret;
					 	}else{
					 		$newimg = $img;
					 	}

						$data['msg'] = "<script>alert('Updating Profile Success!')</script>";

						$this->access_data->updatestatus('student','fname = "'.$this->input->post('fname').'",
																			lname = "'.$this->input->post('lname').'",
																			
																			
																			email = "'.$this->input->post('email').'",
																			contact_no = "'.$this->input->post('contno').'",
																			pics = "'.$newimg.'"',
																			'userID = ' .$id);
						redirect(base_url().'Main/profile/'.$id);
                              //username = "'.$this->input->post('username').'",
					//}

				}
		 }

		$this->load->view('edit_profile',$data);
		 	
		 }
		 
	}

	private function do_upload(){ // upoading image function

		$target_file = "";
		$maxsize=2000000;
        $format=array('image/jpeg',
        				'image/JPEG',
				        'image/jpg',
				        'image/JPG',
				        'image/PNG',
				        'image/png');

		    if($_FILES['file_upload']['size']>=$maxsize){
		        return 'too_large';
		    }
		    elseif($_FILES['file_upload']['size']==0){
		        return $target_file;
		    }
		    elseif(!in_array($_FILES['file_upload']['type'],$format)){
		        return 'not_suported';
		        
		    }else{
		            $target_dir = "profile_img/";
		            $target_file = $target_dir . basename($_FILES["file_upload"]["name"]);
		            if(move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)){ 
		           	return $target_file;
		         	} 
		    }
	}
	public function Add_posting()
	{

		$data['msg'] = "";
		if(!$this->session->userdata('logged_in')) // condition if the session is empty
   		 {
			redirect(base_url());
		 }else{
		 	$session_data = $this->session->userdata('logged_in'); // condition if the session is in set
		 	$id = $session_data['user_id'];

		 	$logtype = $session_data['type'];
		 	$tbl = "";
		 	$numnoty = "";

		 	if ($logtype == "Company") {
     			$tbl = "registered";
     			$aply = $this->access_data->getdata("*","apply_tbl","compID = ".$id." AND userBook = 0");
     			$data['aply'] = $this->compnoty();
     		}



     		$data['user_id'] = $id;
     		$data['post_ret'] ="";
		 	$data['mydata'] = $this->access_data->getdata("*","registered","userID = ".$id);
		 	$data['jobs'] = $this->access_data->getdata("*","category","");

	if (isset($_POST['submitpost'])) {

		 	$data2['id'] = $this->input->post('comp_id');
		 	$data2['job_title'] = $this->input->post('position');
		 	$data2['qualification'] = $this->input->post('about');
		 	$data2['pics'] = $this->input->post('comp_pics');
		 	$data2['category_id'] = $this->input->post('category');

		 	$d = $this->access_data->addevent("company_post",$data2);
		 	if ($d == true) {
		 		$data['post_ret'] = "success";
		 	}
		 }

		 	$this->load->view('add_postings',$data);
		 }

		
	}

     //tibay altered
     public function edit_posting()
     {

          $data['msg'] = "";
          if(!$this->session->userdata('logged_in')) // condition if the session is empty
           {
               redirect(base_url());
           }else{
               $session_data = $this->session->userdata('logged_in'); // condition if the session is in set
               $id = $session_data['user_id'];

               $logtype = $session_data['type'];
               $tbl = "";
               $numnoty = "";

               if ($logtype == "Company") {
                    $tbl = "registered";
                    $aply = $this->access_data->getdata("*","apply_tbl","compID = ".$id." AND userBook = 0");
                    $data['aply'] = $this->compnoty();
               }

               $data['user_id'] = $id;
               $data['post_ret'] ="";
               $data['mydata'] = $this->access_data->getdata("*","registered","userID = ".$id);
               $data['jobs'] = $this->access_data->getdata("*","category","");

     if (isset($_POST['save_change'])) {


               //tibay alters
          
               $data['msg'] = "<script>alert('Updating Profile Success!')</script>";

               $this->access_data->updatestatus('company_post','category_id = "'.$this->input->post('category').'",
                                                 job_title = "'.$this->input->post('position').'",
                                                 qualification = "'.$this->input->post('about').'"',
                                                 'userID = ' .$id);
               //tibay end alter
               /*
               $data2['id'] = $this->input->post('comp_id');
               $data2['job_title'] = $this->input->post('position');
               $data2['qualification'] = $this->input->post('about');
               $data2['pics'] = $this->input->post('comp_pics');
               $data2['category_id'] = $this->input->post('category');

               $d = $this->access_data->addevent("company_post",$data2);
               if ($d == true) {
                    $data['post_ret'] = "success";
               }
               */
           }

               $this->load->view('edit_postings',$data);
           }

          
     }
     //tibay end altered

	public function changePass(){
		$data['msg'] = "";
		if(!$this->session->userdata('logged_in')) // condition if the session is empty
   		 {
			redirect(base_url());
		 }else{
		 	$session_data = $this->session->userdata('logged_in'); // condition if the session is in set
		 	$id = $session_data['user_id'];
		 	$logtype = $session_data['type'];
		 	$tbl = "";
		 	$numnoty = "";

     		if ($logtype == "Company") {
     			$tbl = "registered";
     			$aply = $this->access_data->getdata("*","apply_tbl","compID = ".$id." AND userBook = 0");
     			$data['aply'] = $this->compnoty();
     		}else{
     			$tbl = "student";
     			

     			$data['noty'] = $this->notyreturn();
     			$data['notyposted'] = $numnoty;
     		}


			if (isset($_POST['save_change_comp'])) {
					$pass = $this->input->post('current_password');
					$oldpas = $this->access_data->getdata("password","registered","userID = ".$id);
					$pass = $this->input->post('current_password');
					$pass1 = $this->input->post('new_password');
				 	$pass2 = $this->input->post('confirm_password');
				 	foreach ($oldpas as $pas) {}

				 if($pas->password != $pass){
				 	$data['msg'] = "<script>alert('Current Password Not Match!')</script>";
				 }else if ($pass1 != $pass2) {
				 		$data['msg'] = "<script>alert('Password Not Match!')</script>";
				 }else{

					if($this->access_data->updatestatus('registered','password = "'.$this->input->post('new_password').'"',
																			'userID = ' .$id)){
					$data['msg'] = "<script>alert('Change Password Success!')</script>";
					}
				}

				
			}else if(isset($_POST['save_change_app'])){
				
					$oldpas = $this->access_data->getdata("password","student","userID = ".$id);
					$pass = $this->input->post('current_password');
					$pass1 = $this->input->post('new_password');
				 	$pass2 = $this->input->post('confirm_password');
				 	foreach ($oldpas as $pas) {}


				 if($pas->password != $pass){
				 	$data['msg'] = "<script>alert('Current Password Not Match!')</script>";
				 }else if ($pass1 != $pass2) {
				 		$data['msg'] = "<script>alert('Password Not Match!')</script>";
				 }else{

					if($this->access_data->updatestatus('student','password = "'.$this->input->post('new_password').'"',
																			'userID = ' .$id) ){
						$data['msg'] = "<script>alert('Change Password Success!')</script>";
					}
				}

			}


     		$data['user_id'] = $id;
		 	$data['mydata'] = $this->access_data->getdata("*",$tbl,"userID = ".$id);
		 	$this->load->view('change_pass',$data);
		 	$this->load->view('header',$data);
		 }
	}

}