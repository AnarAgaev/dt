<? require_once '../template/prolog/all-pages.php'; ?>
<!DOCTYPE html>
<html lang="ru" xmlns:og="http://ogp.me/ns#">

<head>
  <? require_once SITE__DIR.'template/components/head.php'; ?>

  <title>Designtalk - это БЛОГ О ДИЗАЙНЕ ПРОСТРАНСТВА.</title>
  <meta name="description" content="Список всех материалов рубрики ..." />
  <meta name="keywords" content="" />
  <link rel="canonical" href="https://designtalk.ru/rubrics/" />

  <meta name="og:title" content="" />
  <meta property="og:title" content="" />
  <meta name="og:description" content="Список всех материалов рубрики ..." />
  <meta property="og:description" content="Список всех материалов рубрики ..." />
  <meta name="og:image" content="https://designtalk.ru/images/cover.jpg" />
  <meta property="og:image" content="https://designtalk.ru/images/cover.jpg" />
  <meta property="og:type" content="article" />
  <meta name="og:url" content="https://designtalk.ru/rubrics/" />
  <meta property="og:url" content="https://designtalk.ru/rubrics/" />
  <meta name="twitter:card" content="summary_large_image" />
</head>

<body>
  <? require_once SITE__DIR.'template/prolog-content/all-pages.php'; ?>
  <? require_once SITE__DIR.'template/components/header.php'; ?>

  <main class="main">
    <? require_once SITE__DIR.'template/components/last-rubric-article.php'; ?>
    <? require_once SITE__DIR.'template/components/horizontal-ad-banner.php'; ?>
    <? require_once SITE__DIR.'template/components/rubric-articles.php'; ?>

    <div class="container">
      <div class="d-flex justify-content-center">
        <button
          class="button mb-5 px-5 py-4 button_show-more-articles"
          data-url-resource=""
          data-target-node-id="rubricArticleList">
            показать больше интересного
        </button>
      </div>
    </div>

    <? require_once SITE__DIR.'template/components/subscribe.php'; ?>
  </main>

  <? require_once SITE__DIR.'template/components/footer.php'; ?>
  <? require_once SITE__DIR.'template/epilogue-content/all-pages.php'; ?>
</body>

</html>
<? require_once SITE__DIR.'template/epilogue/all-pages.php'; ?>