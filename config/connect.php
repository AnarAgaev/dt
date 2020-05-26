<?
  $host='localhost';
  $user='root';
  $password='root';
  $db = 'u0856964_default';
  
  $link = mysqli_connect($host, $user, $password, $db);
  mysqli_set_charset($link, "utf8"); // for UTF-8 encoding
  mysqli_query($link, "SET SESSION time_zone = 'Europe/Moscow'"); // set the time zone for MySQL
  date_default_timezone_set("Europe/Moscow"); // choose geographic area for PHP

  /*
	if (!$link) {
		echo 'Error: Unable to establish connection with MySQL.' . PHP_EOL . '<br>';
		echo 'Error code errno: ' . mysqli_connect_errno() . PHP_EOL . '<br>';
		echo 'Error text error: ' . mysqli_connect_error() . PHP_EOL;
		exit;
	}

	echo 'Connection to MySQL is established!' . PHP_EOL . '<br>';
	echo 'Server Information: ' . mysqli_get_host_info($link) . PHP_EOL;
	*/
?>