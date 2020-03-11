<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
		//load constructs and helpers for controller
		$this->load->model('DatabaseModel');
		$this->load->helper('url_helper');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->library('email');
		
		
		$this->load->helper('url');
		$this->load->helper('form');
		
		$this->load->library("Aauth");
		
		
    }
	
	
		
	public function manageAccounts() {
		//WIP
		if($this->aauth->is_loggedin() && $this->aauth->is_Admin()) {

			$users['info'] = $this->DatabaseModel->getAccounts();
			$this->load->view('Header');
			$this->load->view('ManageAccounts', $users);
		} else {
		$this->session->set_flashdata('message', "You must be an Admin to access this page");
		redirect('Home/index', 'refresh');
		}
		
	}
	
	public function accountCreation() {
		//WIP
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$random = $this->generateRandomString();
		
		
		$flag = $this->aauth->create_user($email, $random, $username);
		if($flag == FALSE) {
			$this->session->set_flashdata('Message', $this->aauth->print_errors());
			redirect('Home/index');
		}
		$this->aauth->add_member($username, $this->input->post('group'));

		
		$this->session->set_flashdata('Message', "User successfully added! An email has been sent to the user for verification.");
		redirect('Home/index', 'refresh');
	}
	
	private function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	
	public function accountDeletion() {
		//WIP
		$username = $this->input->post('username');
		$id = $this->DatabaseModel->getUserID($username);
		$this->aauth->delete_user($id);
		if(!$this->aauth->user_exist_by_username($username)) {
			$this->DatabaseModel->deleteProfile($username);
			$this->session->set_flashdata('Message', "Deleted account and profile for ".$username);
			redirect('Home/index', 'refresh');
		} else {
			$this->session->set_flashdata('Message', "Error in deleteing ".$username);
			redirect('Home/index', 'refresh');
		}
			
		
	}


}
?>