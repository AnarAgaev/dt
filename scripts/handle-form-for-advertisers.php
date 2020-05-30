<?

	// manager's email for work with the request
  $managerEmail = "anar.n.agaev@gmail.com";
  
  // shielding variables
  require_once '../utils/shielding-variables.php';
  
	shieldingVariables();
  
  // get variables from the POST array
  extract($_POST);

  
  $message  = "Здравствуйте!\r\n";
  $message .= "Новое сообщение со страницы Рекламодателям.\r\n\n\n";
  
  $message .= "ДАННЫЕ ИЗ ФОРМЫ:\r\n\n";
  
  $message .= $name ? "Имя посетителя сайта: ". $name . "\r\n" : '';
  $message .= $phone ? "Телефонный номер для контакта: ". $phone . "\r\n" : '';
  $message .= $email ? "Адрес электронной почты для контакта: ". $email . "\r\n" : '';
  $message .= $msg ? "\r\nСообщение:\r\n". $msg . "\r\n\n\n" : '';
  
  $message .= "***\r\n";
  $message .= "Не отвечайте на данное сообщение, оно сформировано автоматически.\r\n";
  $message .= "Для ответа пользователю, воспользуйтесь контактами, указанными в сообщении.\r\n";
  
  $subject = "Сообщение со страницы Рекламодателям.";
  $subject = "=?utf-8?b?". base64_encode($subject) ."?=";			   

	$from = "Designtalk.ru";
	$from = "=?utf-8?b?". base64_encode($from) ."?=";	
	$header = "Content-type: text/plain; charset=utf-8\r\n";
	$header .= "From: ".$from."<support@designtalk.ru>\r\n";
	$header .= "MIME-Version: 1.0\r\n"; 
	$header .= "Date: ".date('D, d M Y h:i:s O'); 
	
  
	$status = ($email && $msg) 
  	? mail($managerEmail, $subject, $message, $header)
    : false;

	$response = array(
  	'status' => $status,
  );

  echo json_encode($response);
?>