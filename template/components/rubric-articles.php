<? // Getting data for this component at the "template/prolog/rubrics-page.php" ?>
<div class="container">
  <div class="article-list__title row">
    <div class="col-12">
      <h3>последине публикации в рубрике <?= $response['rubric']['name']; ?></h3>
    </div>
  </div>

  <div class="article-list row" id="lastRubricArticleList">
    <?
      foreach ($response['articles'] as $key => $val) {

        if (!$key) {
          continue;
        }

        ?>
          <div id="<?= $val['id'] ?>" class="article-list__item rubrics-page col-lg-6">
            <a class="article-list__picture" href="/articles/<?= $val['url'] ?>">
              <div>
                <div class="padding-huck cross-cursor"
                     style="background-image: url('/images/<?= $val[picture] ?>');">
                </div>
              </div>
            </a>
            <span class="article-list__rubric link">
              <?= $val['rubric']['name'] ?>
            </span>
            <a class="article-list__caption" href="/articles/<?= $val['url'] ?>">
              <span>
                <?= $val['title'] ?>
              </span>
            </a>
          </div>
        <?

        // Print advertising horizontal banner if we are on first articles line
        if ($key === 1) {
          ?>
            <div class="sidebar col-lg-6">
              <a target="_blank" rel="nofollow" class="vertical-ad-banner" href="https://www.glamour.ru/shopping_week/card/">
                <img src="https://designtalk.ru/images/adv/3585987843283241866.jpg" alt="">
              </a>
            </div>
          <?
        }
      }
    ?>
  </div>
</div>