<? require_once '../template/prolog/all-pages.php'; ?>
<? require_once '../template/prolog/confirm-subscription.php'; ?>
<!DOCTYPE html>
<html lang="ru" xmlns:og="http://ogp.me/ns#">

<head>
  <? require_once SITE__DIR.'template/components/head.php'; ?>

  <title>Подтверждение подписки на новости. | Designtalk - это БЛОГ О ДИЗАЙНЕ ПРОСТРАНСТВА.</title>
  <meta name="description" content="Процесс подписки на новости от Designtalk.ru завершился успешно." /></head>
<body>
  <? require_once SITE__DIR.'template/prolog-content/all-pages.php'; ?>
  <? require_once SITE__DIR.'template/components/header.php'; ?>

  <main class="main">
    <div class="container">
      <div class="confirm-subscription">
        <div class="row">
          <div class="col-lg-12">
            <?
              if ($result) {
                ?>
                  <h1>Подписка<br/>подтверждена</h1>
                  <p>
                    Спасибо за подписку на новости от Designtalk.ru.<br/>
                    Обещаем, будет много интересного из мира дизайна, архитектуры и искусства.
                  </p>
                <?
              } else {
                ?>
                  <h1>Подписка<br/>не подтверждена</h1>
                  <p>
                    К сожалению, не удалось завершить процесс подтверждения подписки.<br/>
                    Немного позже попробуйте ещё раз перейти по ссылке из письма.<br/>
                    Приносим свои извиннения.
                  </p>
                <?
              }
            ?>
            <a href="/" class="button confirm-subscription__btn">Перейти на главную</a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <? require_once SITE__DIR.'template/components/footer.php'; ?>
  <? require_once SITE__DIR.'template/epilogue-content/all-pages.php'; ?>
</body>

</html>
<? require_once SITE__DIR.'template/epilogue/all-pages.php'; ?>