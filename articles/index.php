<? require_once '../utils/set-base-root.php'; ?>
<? require_once '../template/prolog/all-pages.php'; ?>
<? require_once '../template/prolog/articles-page.php'; ?>
<!DOCTYPE html>
<html lang="ru" xmlns:og="http://ogp.me/ns#">

<head>
  <? require_once SITE__DIR.'template/components/head.php'; ?>

  <title><?= $response['title']; ?> | Designtalk - это БЛОГ О ДИЗАЙНЕ ПРОСТРАНСТВА.</title>
  <meta name="description" content="<?= $response['description']; ?>" />
  <meta name="keywords" content="<?= $response['keywords']; ?>" />
  <link rel="canonical" href="https://designtalk.ru/articles/<?= $response['url']; ?>" } />

  <meta name="og:title" content="<?= $response['title']; ?>" />
  <meta property="og:title" content="<?= $response['title']; ?>" />
  <meta name="og:description" content="<?= $response['description']; ?>" />
  <meta property="og:description" content="<?= $response['description']; ?>" />
  <meta name="og:image" content="https://designtalk.ru/images/<?= $response['picture']; ?>" />
  <meta property="og:image" content="https://designtalk.ru/images/<?= $response['picture']; ?>" />
  <meta property="og:type" content="article" />
  <meta name="og:url" content="https://designtalk.ru/articles/<?= $response['url']; ?>" />
  <meta property="og:url" content="https://designtalk.ru/articles/<?= $response['url']; ?>" />
  <meta name="twitter:card" content="summary_large_image" />
</head>

<body>
  <? require_once SITE__DIR.'template/prolog-content/all-pages.php'; ?>
  <? require_once SITE__DIR.'template/components/header.php'; ?>

  <main class="main">
    <div class="article container">
      <div class="row">
        <div class="col-lg-12">
          <? require_once SITE__DIR.'template/components/horizontal-ad-banner.php'; ?>
        </div>

        <div class="col-lg-12">
          <a class="article__rubric" href="/rubrics/<?= $response['rubric']['link']; ?>"><?= $response['rubric']['name']; ?></a>
          <h1 class="article__title"><?= $response['title']; ?></h1>
          <div class="article__subtitle"><?= $response['subtitle']; ?></div>
          <div class="article__copy">
            <span class="article__copywriter"><?= $response['copywriter']['name']; ?></span>
            <span class="article__date"><?= $response['date']; ?></span>
          </div>
          <img src="/images/<?= $response['picture']; ?>" alt="Брутальная квартира с графичными деталями, 52 кв. метра">
        </div>

        <div class="article__wrap col-lg-8">
          <div class="article__content">
            <?= $response['content']; ?>
          </div>

          <ul class="article-creators__list">
            <? if ($response['author']['id']):   ?>
              <li class="article-creators__item">
                <span class="article-creators__caption">автор проекта:</span><span
                class="article-creators__person"><?= $response['author']['name']; ?></span>
              </li>
            <? endif; ?>
            <? if ($response['photographer']['id']):   ?>
              <li class="article-creators__item">
                <span class="article-creators__caption">фотограф:</span><span
                class="article-creators__person"><?= $response['photographer']['name']; ?></span>
              </li>
            <? endif; ?>
            <? if ($response['stylist']['id']):   ?>
              <li class="article-creators__item">
                <span class="article-creators__caption">стилист:</span><span
                class="article-creators__person"><?= $response['stylist']['name']; ?></span>
              </li>
            <? endif; ?>
          </ul>

          <span class="sharing-article__caption">Читайте нас там где Вам удобно:</span>
          <ul class="sharing-article__social-list">
            <? require SITE__DIR.'template/components/social-list.php'; ?>
          </ul>
        </div>

        <div class="article__sidebar col-lg-4">
          <? require_once SITE__DIR.'template/components/vertical-ad-banner.php'; ?>
        </div>
      </div>
    </div>

     <? require_once SITE__DIR.'template/components/subscribe.php'; ?>
     <? require_once SITE__DIR.'template/components/last-rubric-article-list.php'; ?>
  </main>

  <? require_once SITE__DIR.'template/components/footer.php'; ?>
  <? require_once SITE__DIR.'template/epilogue-content/all-pages.php'; ?>
</body>

</html>
<? require_once SITE__DIR.'template/epilogue/all-pages.php'; ?>