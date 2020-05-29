<?
	/*   
	 * The function is shielding variables
   * at the $_POST and $_GET arrays.
   */
 
 	function shieldingVariables() {

    if ($_POST) {
			foreach ($_POST as $key => &$value) {
    		$value = htmlspecialchars(strip_tags(trim($value)));
    
    		if (get_magic_quotes_gpc()) {
      		$value = stripcslashes($value);
    		}
  		}  
    }
    
    
    if ($_GET) {
			foreach ($_GET as $key => &$value) {
    		$value = htmlspecialchars(strip_tags(trim($value)));
    
    		if (get_magic_quotes_gpc()) {
      		$value = stripcslashes($value);
    		}
  		}      
    }
  }
  
?>