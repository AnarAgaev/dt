<?
  // shielding variables
  require_once '../utils/shielding-variables.php';

	shieldingVariables();

  // get variables from the POST array
  extract($_GET);

	// how many articles will we send to the client
  $count = 6;

  require_once '../config/connect.php'; // connecting to db and get $link variable from them

  $res_rubric = mysqli_fetch_assoc(mysqli_query($link, "
  	SELECT
    	`id`,
      `link`,
      `name`
    FROM `rubrics`
    WHERE `link`='$rubric'
  "));


  $response['rubricId'] = $res_rubric['id'];
  $response['rubricLink'] = $res_rubric['link'];
  $response['rubricName'] = $res_rubric['name'];

  // get the number of articles in the database
  $res_count = mysqli_fetch_assoc(mysqli_query($link, "
    SELECT COUNT(*)
    FROM `articles`
    WHERE `rubric`=$res_rubric[id]
  " ));

  $response['count'] = $res_count['COUNT(*)'];

  $num_elements = $count; // set number of requested articles

  /*
   * Set the number of pages in a variable.
   * Divide the number of all articles by the number of
   * articles on one page and round up to a larger one.
   */
  $num_pages = ceil( $response['count'] / $num_elements );


  /*
   * If there isn't page from the $_GET parameter
   * or page is less than 0, then print the second page.
   */
  if (!$page || $page < 1) $page = 2;


  /*
   * If the page from the $_GET parameter is greater
   * than the number of pages, then print the last.
   */
  $page = $page > $num_pages ? $num_pages : $page;


  // If we are on the last page, we rewrite the previous and next page.
  if ($page == $num_pages) {
    $response['next'] = null;
    $response['previous'] = '/scripts/get-last-rubric-articles.php?rubric='. $rubric .'&page='. ($page - 1);
  } else {
    $response['next'] = '/scripts/get-last-rubric-articles.php?rubric='. $rubric .'&page='. ($page + 1);

    $response['previous'] = ($page == 1)
      ? null
      : '/scripts/get-last-rubric-articles.php?rubric='. $rubric .'&page='. ($page - 1);
  }


  $start = ($page - 1) * $num_elements + 2; // Starting position of a selection from the DB


  // receive articles according to the page
  $res_articles = mysqli_query($link, "
    SELECT
      `id`,
      `url`,
      `rubric`,
      `title`,
      `preview`,
      `picture`
    FROM `articles`
    WHERE `rubric`=$res_rubric[id]
    ORDER BY `date` DESC
    LIMIT " . $start . " , " . $num_elements
  );


  for($i = 0; $i < mysqli_num_rows($res_articles); $i++) {

    $row = mysqli_fetch_row($res_articles);

    $res_visits = mysqli_fetch_assoc(mysqli_query($link, "
      SELECT `visits`
      FROM `visits`
      WHERE `id`= $row[0]
    " ));


    $results[] = array(
      'id' => $row[0],
      'url' => $row[1],
      'title' => $row[3],
      'preview' => $row[4],
      'picture' => $row[5],
      'visits' => $res_visits['visits'],
      'rubric' => array(
        'id' => $res_rubric['id'],
        'link' => $res_rubric['link'],
        'name' => $res_rubric['name']
      ),
      'visible' => false
    );
  }

  $response['results'] = $results;


  // Reset next page if well be print all articles
  $count_articles_at_the_top_of_page = 1;
  $count_articles_on_first_page = 7;
  $count_articles_on_other_pages = $count;

  $will_print = $count_articles_at_the_top_of_page
              + $count_articles_on_first_page
              + ($page - 1)
              * $count_articles_on_other_pages;

  if ($will_print >= $response['count']) {
    $response['next'] = null;
  }


  echo json_encode($response);

?>