<?php 
require_once (realpath( dirname( __FILE__ ) ) . '/Exception.php');

class Files_ExistsSpecification
{

	public function isSatisfiedBy($paths, $filename)
	{
		if (!isset($paths) || !isset($filename)) {
			throw new Files_Exception('Path of filename not provided');
		}
	
		if (!is_array($paths)) {
			$paths = array($paths);
		}
	
		foreach ($paths as $path) {
			if (file_exists($path . $filename)) {
				return $path . $filename;
			}
		}
		return false;
	}
}