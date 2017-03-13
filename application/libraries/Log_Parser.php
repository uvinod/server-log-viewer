<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_Parser {

	
	public function __construct()
    {
        $this->CI =& get_instance();
    }

    /**     
     *
     * @param 	String 	@log_file
     * @return 	Array
     */
	public function get_file($path, $start, $end)
	{	
		$cols = array();

		if($this->get_file_count($path) > 0) {

			$file = file($path);
			
			for ($i = ($start - 1); $i < $end; $i++) {
				$cols[$i]['line_no'] = $i+1;
				$cols[$i]['content'] = $file[$i];
			}
		}
		
		return $cols;		
	}

	public function get_file_count($path)
	{	
		$file = file($path);

		return count($file);
	}
}
