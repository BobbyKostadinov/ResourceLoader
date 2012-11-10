<?php 
require_once (realpath( dirname( __FILE__ ) ) . '/Exception.php');

class Files_FileMIME
{
	
	public static function getMIME($filename)
	{
		
	   $ext = pathinfo($filename, PATHINFO_EXTENSION);
	   $mimes = self::getMIMES();
	   if (isset($mimes[$ext])) {
	   	return $mimes[$ext];
	   }
	   throw new Files_Exception('MIME not recognised');
	}
	
	public static function getMIMES()
	{
		return array(
	                 'gif'=>'image/gif'
	                ,'png'=>'image/png'
	                ,'jpeg'=>'image/jpg'
	                ,'jpg'=>'image/jpg'
	                ,'mp3'=>'audio/mpeg'
	                ,'wav'=>'audio/x-wav'
	                ,'mpeg'=>'video/mpeg'
	                ,'mpg'=>'video/mpeg'
	                ,'mov'=>'video/quicktime'
	                ,'avi'=>'video/x-msvideo'
	                ,'3gp'=>'video/3gpp'
	                ,'css'=>'text/css'
	                ,'jsc'=>'application/javascript'
	                ,'js'=>'application/javascript'
	                ,'ttf'=>'font/ttf'
	                ,'eot'=>'font/eot'
	                ,'otf'=>'font/otf'
	                ,'woff'=>'font/woff'
				    ,'swf' => 'application/x-shockwave-flash'
				    ,'xml' => 'application/xml'
		);
	}
}