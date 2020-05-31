<? // Getting data for this component at the "template/prolog/rubrics-page.php" ?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="rubric__title"><?= $response['rubric']['name']; ?></h1>
    </div>

    <div class="col-lg-5">
      <div class="last-rubric-article">
        <a class="last-rubric-article__title" href="/articles/<?= $response['articles'][0]['url']; ?>">
          <span>
            <?= $response['articles'][0]['title']; ?>
          </span>
        </a>

        <p class="last-rubric-article__description">
          <?= $response['articles'][0]['preview']; ?>
        </p>

        <a class="button" href="/articles/<?= $response['articles'][0]['url']; ?>">
          Читать
        </a>
      </div>
    </div>

    <div class="my-5 col-lg-7">
      <a href="/articles/<?= $response['articles'][0]['url']; ?>">
        <img src="/images/<?= $response['articles'][0]['picture']; ?>"
             alt="<?= $response['articles'][0]['title']; ?>"
             title="<?= $response['articles'][0]['title']; ?>"
             class="cross-cursor">
      </a>
    </div>
  </div>
</div>