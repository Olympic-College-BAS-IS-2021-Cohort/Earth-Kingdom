<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	
	public function index() {
		//is loaded by default
		$result['bioInfo'] = $this->DatabaseModel->getData();
		$this->load->view('Header');
		$this->load->view('Message');
		$this->load->view('HomeFoundation');
		$this->load->view('BodyFoundation', $result);
		

	

		
		
	
	}
	
	public function search() {
		//'get' query from form, search table with 'like', return results as array
		$query = $this->input->get('query');
		
		$result['bioInfo'] = $this->DatabaseModel->searchData($query);
		
		$this->load->view('Header');
		$this->load->view('HomeFoundation');
		$this->load->view('BodyFoundation', $result);
		
	}
	
	public function sessionCreate() {
		//retrieve username/password from post, validate against database and return boolean. 
		//if true, create string 'user' in superobject _SESSION and redirect
		//else, set flashdata to error Message and redirect
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		//$flag = $this->DatabaseModel->validateSession($username, $password);
		$this->aauth->login($username, $password);
		
		if($this->aauth->is_loggedin()) {
			$_SESSION['user'] = $username;
			$this->session->set_flashdata('Message', "You are now signed in as: ".$username);
			redirect(site_url('Home/index'));
		
		} else {
			$this->session->set_flashdata('Message', "Wrong username or password!");
			redirect(site_url('Home/SignIn'));
		}
	}
	
	public function sessionDestroy() {
		//destroy session
		session_destroy();
		$this->aauth->logout();
		redirect(site_url('Home/index'));		
	}
	
	public function profileView($username = '') {
		//has optional argument of $username
		//if a value has NOT been passed, user is accessing personal Profile form
		//else, someone's viewing someone else's Profile
		if(empty($username) && !isset($_SESSION['user'])) {
			redirect('Home/index');
		} elseif(empty($username)) {
			$data['bioInfo'] = $this->DatabaseModel->getProfile();
			$this->load->view('Header');
			$this->load->view('ProfileForm', $data);

		} else {
			$data['bioInfo'] = $this->DatabaseModel->getProfile($username);
			$this->load->view('Header');
			$this->load->view('Profile', $data);

		}
		
	}

	public function updateProfile() {
		//within array $update, retrieve data from Profile form through POST
		$update = array(
			'name' => $this->input->post('name'),
			'experience' => $this->input->post('experience'),
			'skills' => $this->input->post('skills'),
			'bio' => $this->input->post('bio'),
			'summary' => $this->input->post('summary'),
			'socialLinks' => $this->input->post('socialLinks'),
			'email' => $this->input->post('email'),
			'certification' => $this->input->post('certification')
		);
		//push $update to model function
		$this->DatabaseModel->updateData($update);
			
			//checks if a file has been specified
			//is not, flashdata of Profile update
			//if this was not here, Profile image would be overwritten with nothing
			if(!isset($_FILES['userfile']) || $_FILES['userfile']['error'] == UPLOAD_ERR_NO_FILE){
				$this->session->set_flashdata('Message', "Profile updated successfully!");
				redirect('Home/index', 'refresh');
			} else {
			//config options for file upload, including destination, file types, name, and overwrite
			$config['upload_path'] = "./assets/images/personal/";
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['file_name'] = $_SESSION['user'];
			$config['overwrite'] = TRUE;
			$this->upload->initialize($config);
			$this->load->library('upload', $config);
			
			
			//tries upload, and returns boolean if success or fail
			//if success(true), update image name (mostly extension) in database
			//if failure(false), error has happened. likely from file not meeting config criteria (i.e. wrong file type)
			if($this->upload->do_upload('userfile')) {
				$this->DatabaseModel->updateImage($config['file_name'].$this->upload->data('file_ext'));
				
				$this->session->set_flashdata('Message', "Image and Profile updated successfully!");
				redirect('Home/index', 'refresh');
			} else {
				$this->session->set_flashdata('Message', $this->upload->display_errors());
				redirect('Home/index', 'refresh');
			}
			
			}
		}
		
	public function emailUser($username) {
		//emails user from post
		$this->load->library('email');
		$email = $this->DatabaseModel->getEmail($username);
		
		if(empty($email->email)) {
			$this->session->set_flashdata('Message', "Sorry, this user has not provided their email to be contacted with.");
			redirect('Home/index', 'refresh');
		}

		$this->email->from($this->input->post('email'), $this->input->post('name'));
		$this->email->to($email->email);

		$this->email->subject($this->input->post('subject'));
		$this->email->Message('From: '.$this->input->post('email')."\r\n".$this->input->post('Message'));
		
		if($this->email->send()) {
			$this->session->set_flashdata('Message', "Message sent!");
			redirect('Home/index', 'refresh');
		} else {
			$this->session->set_flashdata('Message', "Message NOT sent! Please check your email");
			redirect('Home/index', 'refresh');
		}

		
	}

	public function signIn() {
		
		if(!$this->aauth->is_loggedin()){
			$this->load->view('Header');
			$this->load->view('Message');
			$this->load->view('SignIn');
		} else {
			redirect('Home/index');
		}
	}
	
		
	public function resetPassword() {
		$username = $this->input->post('username');
		$code = $this->input->post('code');
		$password = $this->input->post('password');
		
		$id = $this->DatabaseModel->getUserID($username);

		if($this->aauth->verify_user($id, $code)) {
			$this->aauth->update_user($id, FALSE, $password, FALSE);
			$email = $this->aauth->get_user($id);
			$this->DatabaseModel->addProfile($username, $email->email);
			$this->session->set_flashdata('Message', "Your Profile has been created! Please sign in to access it.");
			redirect('Home/index', 'refresh');
			
		} else {
			$this->session->set_flashdata('Message', 'Password not reset. Please check your username and verification code.');
			redirect('Home/SignIn');
		}
	}
}
	?>