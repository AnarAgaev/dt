<?

  // manager's email for work with the request
  $managerEmail = "anar.n.agaev@gmail.com";
  
  // shielding variables
  require_once '../utils/shielding-variables.php';
  
	shieldingVariables();
  
  // get variables from the POST array
  extract($_POST);
  

  $message  = "Здравствуйте!\r\n";
  $message .= "С сайта поступила новая заявка на Публикацию проекта.\r\n\n\n";
  
  $message .= "ДАННЫЕ ИЗ ФОРМЫ ЗАЯВКИ:\r\n\n";  
  $message .= $author ? "Название бюро / Ф.И.О. авторов проекта: ". $author . "\r\n" : '';
  $message .= $phone ? "Телефон для контакта: ". $phone . "\r\n" : '';
  $message .= $email ? "Адрес электронной почты для контакта: ". $email . "\r\n" : '';
  $message .= $site ? "Вeб-caйт автора проекта: ". $site . "\r\n" : '';
  $message .= $socials ? "\r\nСтраницы бюро или автора в социальных сетях:\r\n". $socials . "\r\n\n" : '';
  $message .= $photo ? "Ссылка на фотографию автора проекта: ". $photo . "\r\n" : '';
  $message .= $objectphotos ? "Ссылка на фотографии интерьера/объекта: ". $objectphotos . "\r\n" : '';
  $message .= $published ? "\r\nБыл ли этот проект опубликован в печатных или веб изданиях?: ". $published . "\r\n" : '';
  $message .= $photographer ? "Фотограф съемки: ". $photographer . "\r\n" : '';
  $message .= $stylist ? "Стилист съемки: ". $stylist . "\r\n" : '';
  $message .= $datefinish ? "Дата сдачи интерьера/объекта: ". $datefinish . "\r\n" : '';
  $message .= $area ? "Площадь объекта: ". $area . "\r\n" : '';
  $message .= $things ? "\r\nПредметы использованные в интерьере:\r\n". $things . "\r\n" : '';
  $message .= $description ? "\r\nОписание интерьера/проекта:\r\n". $description . "\r\n\n\n" : '';

  
  $message .= "***\r\n";
  $message .= "Не отвечайте на данное сообщение, оно сформировано автоматически.\r\n";
  $message .= "Для ответа пользователю, воспользуйтесь контактами, указанными в сообщении.\r\n";
  
  $subject = "Навая заявка на Публикацию проекта.";
  $subject = "=?utf-8?b?". base64_encode($subject) ."?=";			   

	$from = "Designtalk.ru";
	$from = "=?utf-8?b?". base64_encode($from) ."?=";	
	$header = "Content-type: text/plain; charset=utf-8\r\n";
	$header .= "From: ".$from."<support@designtalk.ru>\r\n";
	$header .= "MIME-Version: 1.0\r\n"; 
	$header .= "Date: ".date('D, d M Y h:i:s O'); 
	
  // send mail only if there is required data
	$status = ($phone && $email && $description) 
  	? mail($managerEmail, $subject, $message, $header)
    : false;

	$response = array(
  	'status' => $status,
  );
 
  echo json_encode($response);
 
?>