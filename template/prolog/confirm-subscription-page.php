<?
  // shielding variables
  require_once '../utils/shielding-variables.php';

	shieldingVariables();

  // get variables from the POST array
  extract($_GET);

  if ($sid) {

    // connecting to db and get $link variable from them
    require_once '../config/connect.php';

    // checking for subscription
    $isSubscribe = mysqli_num_rows(mysqli_query($link, "
        SELECT `id`
        FROM `subscription`
        WHERE `id`=" . $sid ."
        AND `confirmed`=0"
      ));

    if ($isSubscribe) {
      // Update subscription status to the DB
      $result = mysqli_query($link, "
        UPDATE `subscription`
        SET `confirmed`= 1
        WHERE `id`=" . $sid
      );
    } else $result = false;
  } else $result = false;
?>