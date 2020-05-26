<?
  $count = 8; // number of last articles to print at the slider on main page

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