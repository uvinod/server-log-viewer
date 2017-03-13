<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller {

	function __construct() {
		parent::__construct();
		// Load url helper
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('Ajax_Pagination');
		$this->load->library('Log_Parser');
        $this->perPage = 10;
	}

	public function index()
	{
		$this->load->view('logs/index.php');
	}

	public function get_logs()
	{
		$file = $this->input->post('file');
		$page = $this->input->post('page');
		if(!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }

		//print_r(pathinfo($file));die;
		if(file_exists($file))
		{	
			$data['result'] = $this->log_parser->get_file_contents($file, $offset, $this->perPage);
			$data['total_count'] = $this->log_parser->get_contents_count($file);

			$config['total_rows'] = $data['total_count'];
        	$config['per_page'] = $this->perPage;
        	$config['display_pageno'] = false;

        	$this->ajax_pagination->initialize($config);

			$this->load->view('logs/_logs.php', $data);	
		} else {
			echo '<div class="alert alert-danger form-file-group">File doesn\'t exist.</div>';
		}		
	}
}
