<nav class="nav">
  <ul class="nav__list">
    <li class="close-nav big-screen-hide"></li>
    <? include SITE__DIR.'/template/components/nav-list.php';?>
    <li class="mobile-nav-social big-screen-hide">
      <h4 class="social-title">подписывайтесь на нас в социальных сетях</h4>
      <ul class="social__list undefined">
        <? include SITE__DIR.'/template/components/social-list.php';?>
      </ul>
    </li>
    <li class="send-mail-to-us big-screen-hide">
      <div class="send-mail-to-us__title">Напишите нам письмо</div><a class="send-mail-to-us__link"
        href="mailto:hi@designtalk.ru">hi@designtalk.ru</a>
    </li>
    <li class="mobile-nav-logo big-screen-hide">
      <? include SITE__DIR.'/template/components/logo.php';?>
    </li>
  </ul>
</nav>