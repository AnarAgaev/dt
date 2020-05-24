<?
	session_start();

	/*
		* Create a global variable containing the name of the root folder of the site
		* Change the variable $BASE__ROOT__DIR when moving a site to a new hosting on the host folder of the hosting
		* SITE__DIR - ROOT FOLDER OF THE SITE
	*/
	$BASE__ROOT__DIR = 'dt';
  define ('SITE__DIR', explode($BASE__ROOT__DIR, __DIR__)[0].$BASE__ROOT__DIR.'/');

  require_once SITE__DIR.'config/connect.php'; // connecting to db

	require_once SITE__DIR.'utils/normalize-date.php';

  require_once SITE__DIR.'utils/shielding-variables.php';
  
?>