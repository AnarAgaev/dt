<form class="form" id="contactsForm">
  <div class="form-group">
    <input placeholder="Ваше имя"
           name="name"
           type="text"
           class="form-control">
  </div>
  <div class="form-group">
    <input placeholder="Телефон для контакта"
           name="phone"
           type="text"
           class="form-control">
  </div>
  <div class="form-group emailGroup">
    <input placeholder="Адрес электронной почты"
           name="email"
           type="text"
           class="form-control email">

    <div class="invalid-feedback">
      Не корректный Адрес электронной почты
    </div>
  </div>
  <div class="form-group questionGroup">
    <textarea rows="7"
              placeholder="Ваш вопрос или предложение"
              name="msg"
              class="form-control question"></textarea>

    <div class="invalid-feedback">
      Необходимо написать сообщение
    </div>
  </div>
  <button type="submit" class="button btn btn-primary">
    Отправить
  </button>
  <p class="attention-policy">
    Нажимая на кнопку "Отправить", Вы даёте согласие на обработку персональных
    данных согласно <a class="link" href="/privacy-policy">Политике
    конфиденциальности</a> и <a class="link" href="/policy-personal-data">Политике обработки
    персональных данных</a>.
  </p>
</form>