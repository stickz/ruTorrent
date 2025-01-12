<?php

class User extends ruTorrentConfig
{	
	public static function getLogin()
	{
		return( (isset($_SERVER['REMOTE_USER']) && !empty($_SERVER['REMOTE_USER'])) ? 
			preg_replace( "/[^a-z0-9\-_]/", "_", strtolower($_SERVER['REMOTE_USER']) ) : '' );
	}

	public static function getUser()
	{
		return( !self::forbidUserSettings ? self::getLogin() : '' );
	}
	
	public static function isLocalMode( $host = null, $port = null )
	{
		global $localhosts; global $scgi_port; global $scgi_host;
		if(!isset($localhosts) || !count($localhosts))
			$localhosts = array( "127.0.0.1", "localhost" );
		if(is_null($port))
			$port = $scgi_port;
		if(is_null($host))
			$host = $scgi_host;
		return(($port == 0) || in_array($host,$localhosts));
	}
}