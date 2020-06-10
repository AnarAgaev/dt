<?
	/*
		* Create a global variable containing the name of the root folder of the site
		* Change the variable $BASE__ROOT__DIR when moving a site to a new hosting on the host folder of the hosting
		* SITE__DIR - ROOT FOLDER OF THE SITE
	*/
	$BASE__ROOT__DIR = 'designtalk';
  define ('SITE__DIR', explode($BASE__ROOT__DIR, __DIR__)[0].$BASE__ROOT__DIR.'/');

?>