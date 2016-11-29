<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('login_model'); //load the model login_model.php
		$this->load->model('access_data');	// loaded of model function
		$this->load->helper('url');
		$this->load->helper(array('form'));
	}


	public function index()
	{
		$data['error'] ="";
		if(!$this->session->userdata('logged_in')) // condition if the session is empty
		{		
			$this->load->view('welcome_message',$data);
		}
		if (isset($_POST['login']) || true) {
			// 
			$user = $this->input->post('username'); // pass to the email variable what in the POST name=EnterEmail
			$password = $this->input->post('password');// pass to the email variable what in the POST name=EnterPass
			$logintype = $this->input->post('logtype');
			
			$user = 'iris';
			$password = '111';
			$logintype = 'Student';

			// $user = 'alliance';
			// $password = '123';
			// $logintype = 'Company';
			$qrt = $this->login_model->validate($user,$password,$logintype); // pass the $email and $password to the validate function from login_model.php

			//$base = "D:/PROGRAM/xampp/htdocs/mobile_app/admin/uploads/";
			/*$base = "E:/PROGRAM FILE/xampp10\htdocs/mobile_app/admin/uploads/";
			$folname = "Events";
			$dir = $base."".$folname;
			if(!file_exists($dir)){
				mkdir($base.$folname,7777,true);				
			} */
			// print_r($qrt);die;
			if($qrt != null){
				foreach ($qrt as $row) {
					$data1[] = $row;
				}
				$userid = $row->email;
				$data = array(
						'user_id' => $row->userID, //data array use for get the email who login and use to session
						'type' => $row->type,
						'is_login' => true
					);
				$this->session->set_userdata('logged_in',$data); // for session , logged_in is the name of the session
				$qrystatus = $this->login_model->validatestatus($userid,$logintype); // return the status of the user
				foreach ($qrystatus as $rslt) {
					$data2[] = $rslt;
				}
				$userstatus = $rslt->status;
					if($userstatus == 'Company'){
						redirect('Main/company_main'); // redirecting the page in admin dashboard if it is the user is admin

					}else{
						redirect('Main/company_main');
						//redirect(base_url()); // redirecting the page in welcome page if the user is not admin
					}
				
			}else{
				$data['error'] ="User not found";
				redirect(base_url(), 'refresh');
			}
		}elseif(isset($_POST['sign'])){
			$data['error'] = "";
		 	$pass1 =  $this->input->post('Rpassword');
		 	$pass2 = $this->input->post('repassword');
		 	$user = $this->input->post('Rusername');
		 	$email = $this->input->post('Remail');


			$stat = $this->access_data->getdata("username,email","registered","username = '".$user."' OR email = '".$email."'");
			
			if ($stat != null) {
				$data['error'] = "<script>alert('User Name or Email are already register please try another one!')</script>";
			}elseif ($pass1 != $pass2 && $pass1 == "" && $this->input->post('Remail') == "" && $this->input->post('Rusername') == "") {
		 		$data['error'] = "<script>alert('Password Not Match!')</script>";
		 		
		 	}else{

		 	$data2['email'] = $email;
			$data2['username'] = $user;
			$data2['password'] = $pass1;
			//$data2['repassword'] = $pass2;
			$data2['type'] = "Company";
			$data2['fname'] = $this->input->post('fname');
			$data2['lname'] = $this->input->post('lname');
			$data2['company_name'] = $this->input->post('compname');

			
			$this->access_data->addevent('registered',$data2);
			$data['error'] = "<script>alert('Registration Success!')</script>";
		 }
		 $this->load->view('welcome_message',$data);

		}

	}


function logout() // function for the logout
	 {
	   $this->session->unset_userdata('logged_in'); // unset the session or clear the session
	   session_destroy();// destroy the session
	   redirect(base_url(), 'refresh'); // redirecting the page to login page
	 }

}
