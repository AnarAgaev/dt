<? require_once '../utils/set-base-root.php'; ?>
<? require_once '../template/prolog/all-pages.php'; ?>
<? require_once '../template/prolog/rubrics-page.php'; ?>
<!DOCTYPE html>
<html lang="ru" xmlns:og="http://ogp.me/ns#">

<head>
  <? require_once SITE__DIR.'template/components/head.php'; ?>

  <title>#<?= $response['rubric']['name']; ?> | Designtalk - это БЛОГ О ДИЗАЙНЕ ПРОСТРАНСТВА.</title>
  <meta name="description" content="На этой странице Все статьи рубрики #<?= $response['rubric']['name']; ?>"/>
  <meta name="keywords" content="" />
  <link rel="canonical" href="https://designtalk.ru/rubrics/<?= $response['rubric']['link']; ?>"/>

  <meta name="og:title" content="#<?= $response['rubric']['name']; ?> | Designtalk - это БЛОГ О ДИЗАЙНЕ ПРОСТРАНСТВА." />
  <meta property="og:title" content="#<?= $response['rubric']['name']; ?> | Designtalk - это БЛОГ О ДИЗАЙНЕ ПРОСТРАНСТВА." />
  <meta name="og:description" content="На этой странице Все статьи рубрики #<?= $response['rubric']['name']; ?>"/>
  <meta property="og:description" content="На этой странице Все статьи рубрики #<?= $response['rubric']['name']; ?>"/>
  <meta name="og:image" content="https://designtalk.ru/images/cover.jpg" />
  <meta property="og:image" content="https://designtalk.ru/images/cover.jpg" />
  <meta property="og:type" content="article" />
  <meta name="og:url" content="https://designtalk.ru/rubrics/<?= $response['rubric']['link']; ?>" />
  <meta property="og:url" content="https://designtalk.ru/rubrics/<?= $response['rubric']['link']; ?>" />
  <meta name="twitter:card" content="summary_large_image" />
</head>

<body>
  <? require_once SITE__DIR.'template/prolog-content/all-pages.php'; ?>
  <? require_once SITE__DIR.'template/components/header.php'; ?>

  <main class="main">
    <? require_once SITE__DIR.'template/components/last-rubric-article.php'; ?>
    <? require_once SITE__DIR.'template/components/horizontal-ad-banner.php'; ?>
    <? require_once SITE__DIR.'template/components/rubric-articles.php';

    if ($response['next']) {
      ?>
        <div class="container">
          <div class="d-flex justify-content-center">
            <button
              class="button mb-5 px-5 py-4 button_show-more-articles"
              data-url-resource="<?= $response['next']; ?>"
              data-target-node-id="lastRubricArticleList"
              data-page-name="rubrics-page">
                показать больше интересного
            </button>
          </div>
        </div>
      <?
    }

    require_once SITE__DIR.'template/components/subscribe.php'; ?>
  </main>

  <? require_once SITE__DIR.'template/components/footer.php'; ?>
  <? require_once SITE__DIR.'template/epilogue-content/all-pages.php'; ?>
</body>

</html>
<? require_once SITE__DIR.'template/epilogue/all-pages.php'; ?>