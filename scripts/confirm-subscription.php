<?

  // shielding variables
  require_once '../utils/shielding-variables.php';
  
	shieldingVariables();
  
  // get variables from the POST array
  extract($_GET);
  
  if ($sid) {
    
    // connecting to db and get $link variable from them
    require_once '../config/connect.php'; 
    
    
    // Update subscription status to the DB
		$result = mysqli_query($link, "
    	UPDATE `subscription` 
    	SET `confirmed`= 1 
    	WHERE `id`=" . $sid
    );
  }
  

  $response = array(
  	'status' => $sid && $result
  );  
  
  echo json_encode($response);

?>