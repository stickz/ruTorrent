<?php
	// configuration parameters

	// for snoopy client
	@define('HTTP_USER_AGENT', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Safari/537.36', true);
	@define('HTTP_TIME_OUT', 30, true);	// in seconds
	@define('HTTP_USE_GZIP', true, true);
	@define('RPC_TIME_OUT', 5, true);	// in seconds
	@define('LOG_RPC_CALLS', false, true);
	@define('LOG_RPC_FAULTS', true, true);
	@define('PHP_USE_GZIP', false, false); // for php
	@define('PHP_GZIP_LEVEL', 2, true);

	$do_diagnostic = true;
	$saveUploadedTorrents = true;		// Save uploaded torrents to profile/torrents directory or not

	$topDirectory = '/';			// Upper available directory. Absolute path with trail slash.
	$tempDirectory = null;			// Temp directory. Absolute path with trail slash. If null, then autodetect will be used.

	$XMLRPCMountPoint = "/RPC2";		// DO NOT DELETE THIS LINE!!! DO NOT COMMENT THIS LINE!!!

	$pathToExternals = array(
		"php" 	=> '',			// Something like /usr/bin/php. If empty, will be found in PATH.
		"curl"	=> '',			// Something like /usr/bin/curl. If empty, will be found in PATH.
		"gzip"	=> '',			// Something like /usr/bin/gzip. If empty, will be found in PATH.
		"id"	=> '',			// Something like /usr/bin/id. If empty, will be found in PATH.
		"stat"	=> '',			// Something like /usr/bin/stat. If empty, will be found in PATH.
	);
	
	$localhosts = array( 			// list of local interfaces
		"127.0.0.1",
		"localhost",
	);
	
	$enabledOrigins = array();		// List of enabled domains for CSRF check (only hostnames, without protocols, port etc.).
											// If empty, then will retrieve domain from HTTP_HOST / HTTP_X_FORWARDED_HOST
	
	// For web->rtorrent link through unix domain socket 
	// (scgi_local in rtorrent conf file), change variables 
	// above to something like this:
	//
	// $scgi_port = 0;
	// $scgi_host = "unix:///tmp/rpc.socket";
	
	$scgi_port = 5000;
	$scgi_host = "127.0.0.1";

	$profileMask = 0777;			// Mask for files and directory creation in user profiles.
						// Both Webserver and rtorrent users must have read-write access to it.
						// For example, if Webserver and rtorrent users are in the same group then the value may be 0770.

	$locale = "UTF8";
						
class ruTorrentConfig
{
	const canUseXSendFile = false;		// If true then use X-Sendfile feature if it exist
	const forbidUserSettings = false;
	const overwriteUploadedTorrents = false;     // Overwrite existing uploaded torrents in profile/torrents directory or make unique name
	const log_file = '/tmp/errors.log';		// path to log file (comment or leave blank to disable logging)
	const profilePath = '../../share';		// Path to user profiles
	const enableCSRFCheck = false;		// If true then Origin and Referer will be checked
	
	public $schedule_rand = 10;				// rand for schedulers start, +0..X seconds
	public $httpIP = null;				// IP string. Or null for any.
	public $httpProxy = array
	(
		'use' 	=> false,
		'proto'	=> 'http',		// 'http' or 'https'
		'host'	=> 'PROXY_HOST_HERE',
		'port'	=> 3128
	);
}
