<?php 
require_once (realpath( dirname( __FILE__ ) ) . '/FileMIME.php');

class Files_File
{
	protected $path;
	
	protected $content;
	
	protected $fileMIME;
	
	public function __construct($path)
	{
		$this->path = $path;
		$this->content = $this->content = file_get_contents($path);
		
		$this->fileMIME = Files_FileMIME::getMIME($path);
	}
	
	public function displayFile()
	{
		if (headers_sent()) {
			throw new Files_Exception('Headers already sent');
		}
		if( strpos($_SERVER[HTTP_ACCEPT_ENCODING], 'x-gzip') !== false ){
			$encoding = 'x-gzip';
		}elseif( strpos($_SERVER[HTTP_ACCEPT_ENCODING],'gzip') !== false ){
			$encoding = 'gzip';
		}else{
			$encoding = false;
		}
		
		ob_start();
		ob_implicit_flush(0);
		echo $this->content;
		
		
		if( $encoding ){
			$contents = ob_get_contents();
			ob_end_clean();
			header('Content-type:'  . $this->fileMIME);
			header('Content-Encoding: '.$encoding);
			header("Cache-Control: public; max-age=36000");
			print("\x1f\x8b\x08\x00\x00\x00\x00\x00");
			$size = strlen($contents);
			$contents = gzcompress($contents, 9);
			$contents = substr($contents, 0, $size);
			print($contents);
			return;
		}else{
			ob_end_flush();
			return;
		}
	}
	
}