<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller {

	function __construct() {
		parent::__construct();
		// Load url helper
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('Pagination');
	}

	public function index()
	{
		$this->load->view('logs/index.php');
	}

	public function get_logs()
	{
		$file = $this->input->post('file');
		$start = $this->input->post('url');
		$display_records = 10;

		if(file_exists($file))
		{
			$this->load->library('Log_Parser');
			
			$data['result'] = $this->log_parser->get_file($file, 1, ($display_records - 1) + 1);
			$data['total_count'] = $this->log_parser->get_file_count($file);

			$config["total_rows"] = $data['total_count'];
			$config["per_page"] = $display_records;
        	$config["display_pages"] = FALSE;
        	$config["uri_segment"] = 3;
        	//$config['page_no'] = $start;

        	$this->pagination->initialize($config);
        	 $data["links"] = $this->pagination->create_links();

			$this->load->view('logs/_logs.php', $data);	
		} else {
			echo '<div class="alert alert-danger form-file-group">File doesn\'t exist.</div>';
		}		
	}
}
