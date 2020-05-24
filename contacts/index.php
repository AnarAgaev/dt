<? require_once '../template/prolog/all-pages.php'; ?>
<!DOCTYPE html>
<html lang="ru" xmlns:og="http://ogp.me/ns#">

<head>
  <? require_once SITE__DIR.'template/components/head.php'; ?>

  <title>Контакты | Designtalk - это БЛОГ О ДИЗАЙНЕ ПРОСТРАНСТВА.</title>
  <meta name="description"
    content="Мы всегда внимательны к сообщениям со страницы Контакты. На этой странице вы можете задать вопросы по любым темам." />
  <meta name="keywords" content="контакты, написать в службу поддержки, письмо в службу поддержки, служба поддержки" />
  <link rel="canonical" href="https://designtalk.ru/contacts" />

  <meta name="og:title" content="Контакты | Designtalk - это БЛОГ О ДИЗАЙНЕ ПРОСТРАНСТВА." />
  <meta property="og:title" content="Контакты | Designtalk - это БЛОГ О ДИЗАЙНЕ ПРОСТРАНСТВА." />
  <meta name="og:description"
    content="Мы всегда внимательны к сообщениям со страницы Контакты. На этой странице вы можете задать вопросы по любым темам." />
  <meta property="og:description"
    content="Мы всегда внимательны к сообщениям со страницы Контакты. На этой странице вы можете задать вопросы по любым темам." />
  <meta name="og:image" content="https://designtalk.ru/images/cover.jpg" />
  <meta property="og:image" content="https://designtalk.ru/images/cover.jpg" />
  <meta property="og:type" content="article" />
  <meta name="og:url" content="https://designtalk.ru/contacts" />
  <meta property="og:url" content="https://designtalk.ru/contacts" />
  <meta name="twitter:card" content="summary_large_image" />
</head>

<body>
  <? require_once SITE__DIR.'template/prolog-content/all-pages.php'; ?>
  <? require_once SITE__DIR.'template/components/header.php'; ?>

  <main class="main">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h1>Контакты</h1>
          <h3>Мы всегда внимательны к сообщениям со страницы контакты. Вы можете использовать данную форму для отправки
            вопросов по любым темам.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-7">
          <form class="form">
            <div class="form-group"><input placeholder="Ваше имя" name="name" type="text" class="form-control"></div>
            <div class="form-group"><input placeholder="Телефон для контакта" name="phone" type="text"
                class="form-control"></div>
            <div class="form-group"><input placeholder="Адрес электронной почты" name="email" type="text"
                class="form-control"></div>
            <div class="form-group"><textarea rows="7" placeholder="Ваш вопрос или предложение" name="msg"
                class="form-control"></textarea></div><button type="submit"
              class="button btn btn-primary">Отправить</button>
            <p class="attention-policy">Нажимая на кнопку "Отправить", Вы даёте согласие на обработку персональных
              данных согласно <a class="link" href="/privacy-policy">Политике конфиденциальности</a> и <a class="link"
                href="/policy-personal-data">Политике обработки персональных данных</a>.</p>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-10">
          <h3 class="mt-4">или напишите письмо издателю</h3>
          <li class="person-card__item"><span class="person-card__position">издатель</span><span
              class="person-card__name">Наталья Кабанова</span><a class="person-card__email link"
              href="mailto:n.kabanova@designtalk.ru">n.kabanova@designtalk.ru</a></li>
        </div>
      </div>
    </div>
  </main>

  <? require_once SITE__DIR.'template/components/footer.php'; ?>
  <? require_once SITE__DIR.'template/epilogue-content/all-pages.php'; ?>
</body>

</html>
<? require_once SITE__DIR.'template/epilogue/all-pages.php'; ?>