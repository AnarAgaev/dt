<? require_once 'template/prolog/all-pages.php'; ?>
<? require_once 'template/prolog/index-page.php'; ?>
<!DOCTYPE html>
<html lang="ru" xmlns:og="http://ogp.me/ns#">

<head>
  <? require_once SITE__DIR.'template/components/head.php'; ?>

  <title>Designtalk - цифровое издание о дизайне пространства.</title>
  <meta name="description"
    content="Designtalk - БЛОГ О ДИЗАЙНЕ пространства. Наша миссия вдохновлять и популяризировать качественный ДИЗАЙН ИНТЕРЬЕРА." />
  <meta name="keywords"
    content="блог о дизайне интерьера, блог дизайн интерьера, пуфик блог о дизайне интерьера, архитектура, дизайн, интерьер" />
  <link rel="canonical" href="https://designtalk.ru/" />

  <meta name="og:title" content="Designtalk - цифровое издание о дизайне пространства." />
  <meta property="og:title" content="Designtalk - цифровое издание о дизайне пространства." />
  <meta name="og:description"
    content="Designtalk - БЛОГ О ДИЗАЙНЕ пространства. Наша миссия вдохновлять и популяризировать качественный ДИЗАЙН ИНТЕРЬЕРА." />
  <meta property="og:description"
    content="Designtalk - БЛОГ О ДИЗАЙНЕ пространства. Наша миссия вдохновлять и популяризировать качественный ДИЗАЙН ИНТЕРЬЕРА." />
  <meta name="og:image" content="https://designtalk.ru/images/cover.jpg" />
  <meta property="og:image" content="https://designtalk.ru/images/cover.jpg" />
  <meta property="og:type" content="website" />
  <meta name="og:url" content="https://designtalk.ru/" />
  <meta property="og:url" content="https://designtalk.ru/" />
  <meta name="twitter:card" content="summary_large_image" />

</head>

<body>
  <? require_once SITE__DIR.'template/prolog-content/all-pages.php'; ?>
  <? require_once SITE__DIR.'template/components/header.php'; ?>

  <main class="main">
    <? require_once SITE__DIR.'template/components/last-article.php'; ?>
    <? require_once SITE__DIR.'template/components/horizontal-ad-banner.php'; ?>
    <? require_once SITE__DIR.'template/components/article-list.php'; ?>

    <div class="container">
      <div class="d-flex justify-content-center">
        <button
          class="button mb-5 px-5 py-4 button_show-more-articles"
          data-url-resource="<?= $response['next']; ?>" <? // Getting $response['next'] at the "template/prolog/index-page.php" ?>
          data-target-node-id="lastArticleList"
          data-page-name="main-page">
            показать больше интересного
        </button>
      </div>
    </div>

    <? require_once SITE__DIR.'template/components/subscribe.php'; ?>
    <? require_once SITE__DIR.'template/components/popular.php'; ?>
  </main>

  <? require_once SITE__DIR.'template/components/footer.php'; ?>
  <? require_once SITE__DIR.'template/epilogue-content/all-pages.php'; ?>
</body>

</html>
<? require_once SITE__DIR.'template/epilogue/all-pages.php'; ?>