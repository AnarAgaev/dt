<?
  // Parsing the URL of page and getting rubric name from it
  $rubric = explode("/", $CLIENT__URL)[4];

  // Getting rubric data
  $res_rubric = mysqli_fetch_assoc(mysqli_query($link, "
    SELECT `id`, `link`, `name`
    FROM `rubrics`
    WHERE `link`='$rubric'
  "));


  if ($res_rubric) {

    // Getting the number of articles at selected rubric in the DB
    $res_count = mysqli_fetch_assoc(mysqli_query($link, "
      SELECT COUNT(*)
      FROM `articles`
      WHERE `rubric`=$res_rubric[id]
    " ));

    $response['count'] = $res_count['COUNT(*)'];

    /*
     * Getting last articles from selected rubric
     * for latest article and article list on
     * page with some selected rubric
     */


    $count_last_articles = 8;

    $articles = mysqli_query($link, "
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
      LIMIT " . $count_last_articles
    );

    for($i = 0; $i < mysqli_num_rows($articles); $i++) {
      $row = mysqli_fetch_row($articles);

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

    $response['articles'] = $results;

    // Reset next page if well be print all articles
    if ($response['count'] > $count_last_articles) {
      $response['next'] = '/scripts/get-last-rubric-articles.php?rubric=' . $res_rubric['link'] . '&page=2';
    } else {
      $response['next'] = null;
    }

    // Adding rubric to the result array
    $response['rubric']['id'] = $res_rubric['id'];
    $response['rubric']['link'] = $res_rubric['link'];
    $response['rubric']['name'] = $res_rubric['name'];
  } else  {
    require_once SITE__DIR.'template/components/redirect-to-404.php';
  }
?>