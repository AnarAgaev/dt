<?

  /*
   * Getting data of the selected article from DB
   */

  // Parsing the URL of page and getting article name from it
  $article_url = explode("/", $CLIENT__URL)[4];

  $article = mysqli_fetch_assoc(mysqli_query($link, "
    SELECT *
    FROM `articles`
    WHERE `url`='$article_url'
  "));

  // Getting rubric of article
  $rubric = mysqli_fetch_assoc(mysqli_query($link, "
    SELECT *
    FROM `rubrics`
    WHERE `id`='$article[rubric]'
  " ));
  $response['rubric'] = array (
      'id' => $rubric['id'],
      'link' => $rubric['link'],
      'name' => $rubric['name']
  );

  // Getting copywriter of article
  $copywriter = mysqli_fetch_assoc(mysqli_query($link, "
    SELECT *
    FROM `copywriters`
    WHERE `id`='$article[copywriter]'
  " ));
  $response['copywriter'] = array (
      'id' => $copywriter['id'],
      'name' => $copywriter['name'],
      'photo' => $copywriter['photo']
  );

  // Getting author of article
  $author = mysqli_fetch_assoc(mysqli_query($link, "
    SELECT *
    FROM `authors`
    WHERE `id`='$article[author]'
  " ));
  $response['author'] = array (
      'id' => $author['id'],
      'name' => $author['name'],
      'photo' => $author['photo']
  );

  // Getting photographer of article
  $photographer = mysqli_fetch_assoc(mysqli_query($link, "
    SELECT *
    FROM `photographers`
    WHERE `id`='$article[photographer]'
  " ));
  $response['photographer'] = array (
      'id' => $photographer['id'],
      'name' => $photographer['name'],
      'photo' => $photographer['photo']
  );

  // Getting stylist of article
  $stylist = mysqli_fetch_assoc(mysqli_query($link, "
    SELECT *
    FROM `stylists`
    WHERE `id`='$article[stylist]'
  " ));
  $response['stylist'] = array (
      'id' => $stylist['id'],
      'name' => $stylist['name'],
      'photo' => $stylist['photo']
  );

  // date normalizer
  require_once '../utils/normalize-date.php';
  $response['date'] = normalize_date($article['date']);

  // Getting other article data
  $response['id'] = $article['id'];
  $response['url'] = $article['url'];
  $response['title'] = $article['title'];
  $response['subtitle'] = $article['subtitle'];
  $response['preview'] = $article['preview'];
  $response['picture'] = $article['picture'];
  $response['keywords'] = $article['keywords'];
  $response['description'] = $article['description'];
  $response['content'] = $article['content'];


  // If the requested article is not there, rewrite the response to false
  if ($response['id'] === null) {
    require_once SITE__DIR.'template/components/redirect-to-404.php';
  } else {

    // Update the number of article views in the database
    mysqli_query($link, "
      UPDATE `visits`
      SET `visits`=`visits` + 1
      WHERE `article`='$response[id]'
    ");
  }






  /*
   * Getting most popular four articles from
   * the rubric of the selected article
   */

  $rubric_id = $response['rubric']['id'];

  // Fetching rubric data
  $rubric_data = mysqli_fetch_assoc(mysqli_query($link, "
    SELECT `id`, `link`, `name`
    FROM `rubrics`
    WHERE `id`='$rubric_id'
  "));

  // Fetching most popular articles from the rubric
  $article_list = mysqli_query($link, "
    SELECT `article`, `rubric`, `visits`
    FROM `visits`
    WHERE `rubric`='$rubric_data[id]'
    ORDER BY `visits` DESC
    LIMIT 4
  " );

  if (mysqli_num_rows($article_list)) {

    for($i = 0; $i < mysqli_num_rows($article_list); $i++) {
      $row = mysqli_fetch_row($article_list);


      // Fetching article data
      $article = mysqli_fetch_assoc(mysqli_query($link, "
        SELECT `id`, `url`, `title`, `preview`, `picture`
        FROM `articles`
        WHERE `id`='$row[0]'
      "));


      // Building the article and push it at the response array
      $response['popular'][] = array(
        'id' => $article['id'],
        'url' => $article['url'],
        'title' => $article['title'],
        'preview' => $article['preview'],
        'picture' => $article['picture'],
        'rubric' => array(
          'id' => $rubric_data['id'],
          'link' => $rubric_data['link'],
          'name' => $rubric_data['name']
        ),
        'visits' => $row[2],
        'visible' => false
      );
    }
  } else $response['popular'] = null;

?>