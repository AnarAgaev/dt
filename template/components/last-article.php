<?
  $count = 1; // number of last articles to print at the slider on main page

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
    LIMIT " . $count
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
?>

<div class="container">
  <div class="row">
    <div class="last-article__caption-wrap col-lg-6">
      <div class="last-article">
        <a class="last-article__title"
           href="/articles/<?= $response['results'][0]['url']; ?>">
            <span><?= $response['results'][0]['title']; ?></span>
        </a>
        <p class="last-article__description">
          <?= $response['results'][0]['preview']; ?>
        </p>
        <a class="button"
           href="/articles/<?= $response['results'][0]['url']; ?>">
            Читать
        </a>
      </div>
    </div>
    <div class="last-article__picture-wrap col-lg-6">
      <a class="last-article__picture"
         href="/articles/<?= $response['results'][0]['url']; ?>">
          <img
            src="/images/<?= $response['results'][0]['picture']; ?>"
            alt="<?= $response['results'][0]['title']; ?>"
            title="<?= $response['results'][0]['title']; ?>" >
      </a>
    </div>
  </div>
</div>