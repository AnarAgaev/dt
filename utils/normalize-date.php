<?
	function normalize_date ($sql_date) {
	
		$month = array (
  		'', 
			'ЯНВАРЯ', 'ФЕВРАЛЯ', 'МАРТА',
			'АПРЕЛЯ', 'МАЯ', 'ИЮНЯ',
			'ИЮЛЯ', 'АВГУСТА', 'СЕНТЯБРЯ',
			'ОКТЯБРЯ', 'НОЯБРЯ', 'ДЕКАБРЯ'
    );
    
		$sql_date  = date_create($sql_date);
		$date      = (int)date_format($sql_date, 'd ').' ';
		$date     .= $month[date_format($sql_date, 'n')];
		$date     .= date_format($sql_date, ' Y');
		
    return $date;
	}
  
?>