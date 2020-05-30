<? require_once '../template/prolog/all-pages.php'; ?>
<!DOCTYPE html>
<html lang="ru" xmlns:og="http://ogp.me/ns#">

<head>
  <? require_once SITE__DIR.'template/components/head.php'; ?>

  <title>Опубилковать проект | Designtalk - это БЛОГ О ДИЗАЙНЕ ПРОСТРАНСТВА.</title>
  <meta name="description"
    content="Как опубликовать свой проект на сайте designtalk.ru и в группах в социальных сетях." />
  <meta name="keywords" content="опубликовать проект, архитектура, дизайн интерьера, искусство" />
  <link rel="canonical" href="https://designtalk.ru/publish-project" />

  <meta name="og:title" content="Опубилковать проект | Designtalk - это БЛОГ О ДИЗАЙНЕ ПРОСТРАНСТВА." />
  <meta property="og:title" content="Опубилковать проект | Designtalk - это БЛОГ О ДИЗАЙНЕ ПРОСТРАНСТВА." />
  <meta name="og:description"
    content="Как опубликовать свой проект на сайте designtalk.ru и в группах в социальных сетях." />
  <meta property="og:description"
    content="Как опубликовать свой проект на сайте designtalk.ru и в группах в социальных сетях." />
  <meta name="og:image" content="https://designtalk.ru/images/cover.jpg" />
  <meta property="og:image" content="https://designtalk.ru/images/cover.jpg" />
  <meta property="og:type" content="article" />
  <meta name="og:url" content="https://designtalk.ru/publish-project" />
  <meta property="og:url" content="https://designtalk.ru/publish-project" />
  <meta name="twitter:card" content="summary_large_image" />
</head>

<body>
  <? require_once SITE__DIR.'template/prolog-content/all-pages.php'; ?>
  <? require_once SITE__DIR.'template/components/header.php'; ?>

  <main class="main">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1>Опубилковать проект</h1>
          <h3>Вы архитектор, дизайнер интерьеров или архитектурное бюро?</h3>
          <p>Мы будем рады опубликовать Ваш проект на страницах сайта <b>Designtalk.ru</b> и в наших аккаунтах в
            социальных сетях. Для того чтобы попасть к нам реализуйте проект, организуйте качественную фотосъемку и
            подайте заявку заполнив форму ниже. После отправки формы, редакция в двухнедельный срок рассмотрит Ваш
            проект и даст обратную связь. В случае положительного решения, мы сообщим даты публикации проекта на сайте и
            в социальных сетях.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-7">
          <? require_once SITE__DIR.'template/components/publish-project-form.php'; ?>
        </div>
      </div>
    </div>
  </main>

  <? require_once SITE__DIR.'template/components/footer.php'; ?>
  <? require_once SITE__DIR.'template/epilogue-content/all-pages.php'; ?>
</body>

</html>
<? require_once SITE__DIR.'template/epilogue/all-pages.php'; ?>