<?php
require_once (realpath( dirname( __FILE__ ) ) . '/ExistsSpecification.php');
require_once (realpath( dirname( __FILE__ ) ) . '/File.php');

class Files_Factory
{
	public static function getFile($paths, $filename)
	{
		$validator = new Files_ExistsSpecification();
		$validPath = $validator->isSatisfiedBy($paths, $filename);
		if (!$validPath) {
			throw new Exception ('File does not exist');
		}
		$oFile = new Files_File($validPath);
		return $oFile;
	}
}