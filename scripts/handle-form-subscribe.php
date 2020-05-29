<?
  
  // shielding variables
  require_once '../utils/shielding-variables.php';
  
	shieldingVariables();
  
  // get variables from the POST array
  extract($_GET);

  if ($email) {
    
    // connecting to db and get $link variable from them
    require_once '../config/connect.php'; 
    
    
    // Add email to the DB
		$result = mysqli_query($link, "
    	INSERT INTO `subscription` (`id`, `email`) 
      VALUES (null,'". $email ."')
    ");
    
    $subscription_id = mysqli_insert_id($link);
    
    
    if ($result) {
      $message  = "ЗДРАВСТВУЙТЕ!\r\n\n";
      
      $message .= "Вы подписались на новости блога о дизайне и исскусстве Designtalk.ru.\r\n";
      $message .= "В нашей рассылке мы будем сообщать Вам о последних новостях архитектуры, дизайна и искусства.\r\n\n";
      
      $message .= "Для завершения подписки пожалуйста перейдите ссылке: https://designtalk.ru/confirm-subscription/?sid=". $subscription_id ."\r\n";
      $message .= "Спасибо за подписку на наши новости!\r\n\n\n";

      $message .= "***\r\n";
      $message .= "Вы получили это письмо потому, что выразили свое согласие получать новости блога о дизайне Designtalk.ru.\r\n";
      $message .= "Если Вы не совершали подписку то просто проигнорируйте данное сообщение.\r\n";

      $subject = "Подтверждение подписки на новости от Designtalk";
      $subject = "=?utf-8?b?". base64_encode($subject) ."?=";			   

      $from = "Designtalk.ru";
      $from = "=?utf-8?b?". base64_encode($from) ."?=";	
      $header = "Content-type: text/plain; charset=utf-8\r\n";
      $header .= "From: ".$from."<hi@designtalk.ru>\r\n";
      $header .= "MIME-Version: 1.0\r\n"; 
      $header .= "Date: ".date('D, d M Y h:i:s O'); 
    }
  }
  
  $status = ($email && $result) 
  	? mail($email, $subject, $message, $header)
    : false;

	$response = array(
  	'status' => $status
  );  
  
  echo json_encode($response);
?>