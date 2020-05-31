<?
  /*
   * Getting last articles for slider and
   * last article list on index page
   */

  $count_last_articles = 8; // number of last articles to print at the slider on main page

  $res = mysqli_query($link, "
  	SELECT
    	`id`,
      `url`,
      `rubric`,
      `title`,
      `preview`,
      `picture`
    FROM `articles`
    ORDER BY `date` DESC
    LIMIT " . $count_last_articles
  );

  for($i = 0; $i < mysqli_num_rows($res); $i++) {
    $row = mysqli_fetch_row($res);

    $res_rubric = mysqli_fetch_assoc(mysqli_query($link, "
      SELECT `id`, `link`, `name`
      FROM `rubrics`
      WHERE `id`='$row[2]'
    "));

		$results[] = array(
      'id' => $row[0],
      'url' => $row[1],
      'title' => $row[3],
      'preview' => $row[4],
      'picture' => $row[5],
      'rubric' => array(
        'id' => $res_rubric['id'],
        'link' => $res_rubric['link'],
        'name' => $res_rubric['name']
        ),
    );
  }


  $response['results'] = $results;

  /*
   * Because the script is getting data for firs page,
   * writing at the next page variable page number 2
   */
  $response['next'] = '/scripts/get-last-articles.php?page=2';

  /*
   * Getting last articles for popular list
   * at the bottom of index page
   */

  $count_popular = 9; // number of popular articles to print


  // receive articles according to the page
  $res_visits = mysqli_query($link, "
    SELECT
      `id`,
      `article`,
      `visits`
    FROM `visits`
    ORDER BY `visits` DESC
    LIMIT " . $count_popular
  );


  for($i = 0; $i < mysqli_num_rows($res_visits); $i++) {
    $row = mysqli_fetch_row($res_visits);


    $res_article = mysqli_fetch_assoc(mysqli_query($link, "
      SELECT
        `id`,
        `url`,
        `rubric`,
        `title`,
        `preview`,
        `picture`
      FROM `articles`
      WHERE `id`=$row[1]
    "));

    $res_rubric = mysqli_fetch_assoc(mysqli_query($link, "
      SELECT `id`, `link`, `name`
      FROM `rubrics`
      WHERE `id`='$res_article[rubric]'
    "));

    $articles[] = array(
      'id' => $res_article['id'],
      'url' => $res_article['url'],
      'title' => $res_article['title'],
      'preview' => $res_article['preview'],
      'picture' => $res_article['picture'],
      'visits' => $row[2],
      'rubric' => array(
        'id' => $res_rubric['id'],
        'link' => $res_rubric['link'],
        'name' => $res_rubric['name']
      ),
    );
  }

  $popular['results'] = $articles;
?>