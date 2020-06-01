<? if($response['popular']) : ?>
  <div class="article-page container">
    <div class="article-list__title row">
      <div class="col-12">
        <h3>с этой статьёй также читают</h3>
      </div>
    </div>
    <div class="article-list row">
      <?
        foreach ($response['popular'] as $key => $val) {
          ?>
            <div id="<?= $val['id'] ?>" class="article-list__item article-page col-lg-6">
              <a class="article-list__picture" href="/articles/<?= $val['url'] ?>">
                <div class="padding-huck cross-cursor"
                     style="background-image: url('/images/<?= $val[picture] ?>');">
                </div>
              </a>
              <a class="article-list__rubric link" href="/rubrics/<?= $val['rubric']['link'] ?>">
                <?= $val['rubric']['name'] ?>
              </a>
              <a class="article-list__caption" href="/articles/<?= $val['url'] ?>">
                <span><?= $val['title'] ?></span>
              </a>
            </div>
          <?
        }
      ?>
    </div>
  </div>
<? endif; ?>