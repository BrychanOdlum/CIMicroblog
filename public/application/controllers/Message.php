<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->library('session');
	}

	public function index() {
		if (!isset($this->session->username)) {
			redirect('/user/login/');
			return;
		}
		
		$this->load->view('Post');
	}
	
	public function doPost() {
		
		if (!isset($this->session->username)) {
			redirect('/user/login/');
			return;
		}
		
		$username = $this->session->username;
		
		$post = html_escape($this->input->post('message'));
		
		if (!isset($post) || $post == "") {
			redirect('/message');
			return;
		}
		
		$this->load->model('Messages_model');
		$this->Messages_model->insertMessage($username, $post);
		
		redirect('/user/view/' . $username);
	}
}
