<? require_once 'utils/set-base-root.php'; ?>
<? require_once 'template/prolog/all-pages.php'; ?>
<!DOCTYPE html>
<html lang="ru" xmlns:og="http://ogp.me/ns#">

<head>
  <? require_once SITE__DIR.'template/components/head.php'; ?>

  <title>Страница не найдена | Designtalk - это БЛОГ О ДИЗАЙНЕ ПРОСТРАНСТВА.</title>
  <meta name="description"
    content="К сожалению, данной страницы на сайте больше нет. Возможно, она переименована, перенесена в другой раздел или удалена." />
</head>

<body>
  <? require_once SITE__DIR.'template/prolog-content/all-pages.php'; ?>
  <? require_once SITE__DIR.'template/components/header.php'; ?>

  <main class="main">
    <div class="pnf container">
      <div class="row">
        <div class="col-lg-9">
          <div class="pnf__pic">
            <img src="/images/giphy.webp" alt="Страница не найдена" title="Страница не найдена">
          </div>
          
          <h1>Страница не найдена</h1>
          <h3>К сожалению, данной страницы на сайте больше нет. Возможно, она переименована, перенесена в другой раздел
            или удалена.</h3>
          <p class="mt-5">Чтобы устранить причину ошибки, выполните следующие действия:<br>1. Проверь, правильно ли
            набран URL-адрес страницы в адресной строке браузера.<br>2. Если Вы считаете, что это наша ошибка, сообщи
            нам, пожалуйста, воспользовавшись формой ниже. Не забудь указать неработающую ссылку или страницу.</p><a
            class="button pnf__btn mt-5" href="/">перейти на главную</a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-7">
          <h3 class="mt-5">Нашли ошибку на сайте? Сообщите нам.</h3>
          <? require_once SITE__DIR.'template/components/contacts-form.php'; ?>
        </div>
      </div>
    </div>
  </main>

  <? require_once SITE__DIR.'template/components/footer.php'; ?>
  <? require_once SITE__DIR.'template/epilogue-content/all-pages.php'; ?>
</body>

</html>
<? require_once SITE__DIR.'template/epilogue/all-pages.php'; ?>