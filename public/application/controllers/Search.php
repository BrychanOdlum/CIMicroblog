<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->library('session');
	}

	public function index() {
		$data['selectedSearch'] = true;
		$this->load->view('Search', $data);
	}
	
	public function dosearch() {
		$this->load->model('Messages_model');
		$data['messages'] = $this->Messages_model->searchMessages($_GET['q']);
		$data['pageName'] = "Search Results.";	
		$data['pageDescription'] = "Showing " . count($data['messages']) . " results for '" . $_GET['q'] . "'.";
		$data['pageColour'] = "pink";
		$data['selectedSearch'] = true;
		$this->load->view('ViewMessages', $data);
	}
}
