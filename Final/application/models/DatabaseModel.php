<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DatabaseModel extends CI_Model {

        public function __construct(){
            $this->load->database();
			
        }
		
		public function getData() {
			//select everything from profiles, the select is implied
			$query = $this->db->get('profiles');
			return $query->result_array();
			
		}
		
		public function searchData($query) {	
			//select * like name, experience or skills
			$this->db->like('name', $query)
					 ->or_like('experience', $query)
					 ->or_like('skills', $query)
					 ->or_like('bio', $query)
					 ->or_like('certification', $query)
					 ->or_like('summary', $query);
			$searched = $this->db->get('profiles');
			return $searched->result_array();
			
		}	
		
		public function getProfile($username = '') {
			//recieves optional arguement of username, which is passed through url from bodyFoundation
			//if value is NOT passed, we can assume a user is viewing their profileForm
			//if a value is passed, we can assume the user is trying to view a person's public profile
			if(empty($username)){
				$this->db->where('username', $_SESSION['user']);
			} else {
				$this->db->where('username', $username);
			}
			$data = $this->db->get('profiles');
			return $data->result_array();
			
		}
		

		
		public function updateData($update) {
			
			$this->db->where('username', $_SESSION['user']);
			$this->db->update('profiles', $update);
			
		}
		
		public function updateImage($image) {
			//does not save the image, only the image file name
			$this->db->set('image', $image);
			$this->db->where('username', $_SESSION['user']);
			$this->db->update('profiles');
			
		}
		
		public function getEmail($username) {
			$this->db->select('email')
					 ->where('username', $username);
			$email = $this->db->get('profiles');
			return $email->row();
			
		}
		
		public function getUserID($username) {
			$this->db->select('id');
			$this->db->where('username', $username);
			$result = $this->db->get('aauth_users');
			$id = $result->row();
			return $id->id;
		}
		
		public function getAccounts() {
			$this->db->select('id,email,username,banned');
			$result = $this->db->get('aauth_users');
			return $result->result_array();
		}
		
		public function deleteProfile($username) {
			$this->db->where('username', $username);
			$this->db->delete('profiles');
			
		}
		
		public function addProfile($username, $email) {
			$data = array(
				'username' => $username,
				'email' => $email,
				'image' => 'placeholder.png'
			);
			$this->db->insert('profiles', $data);
			
		}
	
}
?>