<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->library('session');
	}
	
	public function view($name = null) {
		if (!$name) {
			echo "User not specified.";
		} else {
			$this->load->model('Users_model');
			$data['following'] = $this->Users_model->isFollowing($this->session->userdata('username'), $name);
			
			$this->load->model('Messages_model');
			$data['messages'] = $this->Messages_model->getMessagesByPoster($name);
			$data['pageName'] = $name == $this->session->username ? "Your Profile." : ucwords($name) . "'s Profile.";
			$data['pageDescription'] = count($data['messages']) . " total chirps.";
			$data['pageColour'] = $name == $this->session->username ? "green" : "red";
			if (!$data['following'] && ($name != $this->session->username) && (isset($this->session->username))) {
				$data['followUsername'] = $name;
			}
			$this->load->view('ViewMessages', $data);
		}
	}
	
	public function login() {
		$this->load->view('Login');
	}
	
	public function logout() {
		$this->session->unset_userdata('username');
		redirect('/user/login/');
	}
	
	public function doLogin() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$this->load->model('Users_model');
		
		if ($this->Users_model->checkLogin($username, $password)) {
			$this->session->set_userdata('username', $username);
			redirect('/user/view/' . $username);
		} else {
			$data['error'] = "Incorrect username or password.";
			$this->load->view('Login', $data);
		}
		
	}
	
	public function follow($followed) {
		if (!isset($this->session->username)) {
			redirect('/user/login');
			return;
		}
		
		$this->load->model('Users_model');
		if (!$this->Users_model->isFollowing($this->session->username, $followed)) {
			$this->Users_model->follow($followed);
		}
		redirect('/user/view/' . $followed);
	}
	
	public function feed($name) {
		if (!isset($this->session->username)) {
			redirect('/user/login');
			return;
		}
		
		$this->load->model('Messages_model');
		$data['messages'] = $this->Messages_model->getFollowedMessages($name);	
		$data['pageName'] = "Your Feed.";	
		$data['pageDescription'] = "There are " . count($data['messages']) . " updated for you.";
		$data['pageColour'] = "blue";
		$data['selectedFeed'] = true;
		
		$this->load->view('ViewMessages', $data);
	}
	
}
