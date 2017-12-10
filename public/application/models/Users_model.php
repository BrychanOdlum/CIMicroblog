<?php
	
class Users_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function checkLogin($username, $pass) {
		$pass = sha1($pass); // These should so be salted...
		$sql = "SELECT 1 FROM Users WHERE username = ? AND password = ?";
		$query = $this->db->query($sql, array($username, $pass));
		return $query->num_rows() == 1;
	}
	
	public function isFollowing($follower, $followed) {
		$sql = "SELECT 1 FROM User_Follows WHERE follower_username = ? AND followed_username = ?";
		$query = $this->db->query($sql, array($follower, $followed));
		return $query->num_rows() == 1;
	}
	
	public function follow($followed) {
		$sql = "INSERT INTO User_Follows (follower_username, followed_username) VALUES (?, ?)";
		$this->db->query($sql, array($this->session->username, $followed));
	}
	
}
?>