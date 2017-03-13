<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_Parser {

	
	public function __construct()
    {
        $this->CI =& get_instance();
    }

    /**     
     *
     * @param 	String 	@path
     * @param 	String 	@offset
     * @param 	String 	@path
     * @return 	Array
     */
	public function get_file_contents($path, $offset, $limit)
	{	
		$cols = array();
		$total_count = $this->get_contents_count($path);

		if($total_count > 0) {

			$file = $this->read_file($path);
			
			for ($i = $offset; $i < $limit + $offset; $i++) {
				if($i < $total_count)
				{
					$cols[$i]['line_no'] = $i+1;
					$cols[$i]['content'] = $file[$i];
				}
			}
		}
		
		return $cols;		
	}

	public function get_contents_count($path)
	{	
		return count($this->read_file($path));
	}

	private function read_file($path)
	{
		$handle = @fopen($path, "r"); 
		if ($handle) { 
		   while (!feof($handle)) { 
		   	   $line = fgets($handle, 4096); 
		   	   if(strlen(trim($line)) > 0) {
		   	   		$file[] = $line; 
		   	   }	
		   } 
		   fclose($handle); 
		}

		return $file;
	}
}
