<? // Getting data for this component at the "template/prolog/index-page.php" ?>
<div class="popular">
  <div class="container">
    <h3 class="popular__title">это читают больше всего</h3>
    <div class="popular__list__wrap">
      <div class="popular__list" style="left: 0px;">
        <?
          foreach ($popular['results'] as $k => $value) {
            ?>
              <article class="popular-list-item">
                <div>
                  <a class="popular-list-item__picture"
                     href="/articles/<?= $value['url']; ?>"
                     style="background-image: url('/images/<?= $value[picture]; ?>');">
                  </a>
                  <a class="popular-list-item__caption"
                    href="/articles/<?= $value['url']; ?>">
                      <span><?= $value['title']; ?></span>
                  </a>
                </div>
                <p class="popular-list-item__description">
                  <span><?= $value['preview']; ?></span>
                  <a href="/rubrics/<?= $value['rubric']['link']; ?>">
                    <?= $value['rubric']['name']; ?>
                  </a>
                </p>
              </article>
            <?
          }
        ?>
      </div>
    </div>
    <div class="popular__controls">
      <div class="controller controller__left"></div>
      <div class="controller"></div>
    </div>
  </div>
</div>