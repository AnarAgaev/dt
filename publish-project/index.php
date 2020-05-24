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
          <form class="form">
            <div class="form-group"><input placeholder="Название бюро / Ф.И.О. авторов проекта" name="author"
                type="text" class="form-control"></div>
            <div class="form-group"><input placeholder="Телефон для контакта" name="phone" type="text"
                class="form-control"></div>
            <div class="form-group"><input placeholder="Адрес электронной почты" name="email" type="text"
                class="form-control"></div>
            <div class="form-group"><input placeholder="Вeб-caйт" name="site" type="text" class="form-control"></div>
            <div class="form-group"><textarea rows="4" placeholder="Страницы бюро или автора в социальных сетях"
                name="socials" class="form-control"></textarea></div>
            <div class="form-group"><input placeholder="Ссылка на фотографию автора проекта" name="photo" type="text"
                class="form-control"></div>
            <div class="form-group"><input placeholder="Ссылка на фотографии интерьера/объекта" name="objectphotos"
                type="text" class="form-control"><small class="form-text">Загрузите фотографии на любой файлообменник и
                приложите ссылку</small></div>
            <div class="form-group"><textarea rows="4" placeholder="Был ли этот проект опубликован?" name="published"
                class="form-control"></textarea><small class="form-text">Укажите был ли этот проект опубликован в
                печатных изданиях? Был ли опубликован на сайтах? Каких?</small></div>
            <div class="form-group"><input placeholder="Фотограф съемки" name="photographer" type="text"
                class="form-control"></div>
            <div class="form-group"><input placeholder="Стилист съемки" name="stylist" type="text" class="form-control">
            </div>
            <div class="form-group"><input placeholder="Дата сдачи интерьера/объекта" name="datefinish" type="text"
                class="form-control"></div>
            <div class="form-group"><input placeholder="Город (в котором находится объект/интерьер)" name="city"
                type="text" class="form-control"></div>
            <div class="form-group"><input placeholder="Площадь объекта" name="area" type="text" class="form-control">
            </div>
            <div class="form-group"><textarea rows="4" placeholder="Предметы использованные в интерьере" name="things"
                class="form-control"></textarea><small class="form-text">Производитель, Коллекция, Наименование</small>
            </div>
            <div class="form-group"><textarea rows="8" placeholder="Описание интерьера/проекта" name="description"
                class="form-control"></textarea><small class="form-text">Приемы планировки и декора, другие важные
                подробности работы над интерьером/объектом</small></div><button type="submit"
              class="button btn btn-primary">Отправить</button>
            <p class="attention-policy">Нажимая на кнопку "Отправить", Вы даёте согласие на обработку персональных
              данных согласно <a class="link" href="/privacy-policy">Политике конфиденциальности</a> и <a class="link"
                href="/policy-personal-data">Политике обработки персональных данных</a>.</p>
          </form>
        </div>
      </div>
    </div>
  </main>

  <? require_once SITE__DIR.'template/components/footer.php'; ?>
  <? require_once SITE__DIR.'template/epilogue-content/all-pages.php'; ?>
</body>

</html>
<? require_once SITE__DIR.'template/epilogue/all-pages.php'; ?>