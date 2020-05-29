<? // Getting data for this component at the "template/prolog/index-page.php" ?>
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
          <img class="cross-cursor"
            src="/images/<?= $response['results'][0]['picture']; ?>"
            alt="<?= $response['results'][0]['title']; ?>"
            title="<?= $response['results'][0]['title']; ?>" >
      </a>
    </div>
  </div>
</div>