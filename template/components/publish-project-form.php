<form class="form" id="publishProjectForm">
  <div class="form-group">
    <input placeholder="Название бюро / Ф.И.О. авторов проекта"
           name="author"
           type="text"
           class="form-control">
  </div>

  <div class="form-group phoneGroup">
    <input placeholder="Телефон для контакта"
           name="phone"
           type="text"
           class="form-control phone">
    <div class="invalid-feedback">
      Не корректный номер телефона
    </div>
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

  <div class="form-group">
    <input placeholder="Вeб-caйт"
           name="site"
           type="text"
           class="form-control">
  </div>

  <div class="form-group">
    <textarea rows="4"
              placeholder="Страницы бюро или автора в социальных сетях"
              name="socials"
              class="form-control"></textarea>
  </div>

  <div class="form-group">
    <input placeholder="Ссылка на фотографию автора проекта"
           name="photo"
           type="text"
           class="form-control">
  </div>

  <div class="form-group">
    <input placeholder="Ссылка на фотографии интерьера/объекта"
           name="objectphotos"
           type="text"
           class="form-control">
    <small class="form-text">
      Загрузите фотографии на любой файлообменник и приложите ссылку
    </small>
  </div>

  <div class="form-group">
    <textarea rows="4"
              placeholder="Был ли этот проект опубликован?"
              name="published"
              class="form-control"></textarea>
    <small class="form-text">
      Укажите был ли этот проект опубликован в печатных изданиях? Был ли опубликован на сайтах? Каких?
    </small>
  </div>

  <div class="form-group">
    <input placeholder="Фотограф съемки"
           name="photographer"
           type="text"
           class="form-control">
  </div>

  <div class="form-group">
    <input placeholder="Стилист съемки"
           name="stylist"
           type="text"
           class="form-control">
  </div>

  <div class="form-group">
    <input placeholder="Дата сдачи интерьера/объекта"
           name="datefinish"
           type="text"
           class="form-control">
  </div>

  <div class="form-group">
    <input placeholder="Город (в котором находится объект/интерьер)"
           name="city"
           type="text"
           class="form-control">
  </div>

  <div class="form-group">
    <input placeholder="Площадь объекта"
           name="area"
           type="text"
           class="form-control">
  </div>

  <div class="form-group">
    <textarea rows="4"
              placeholder="Предметы использованные в интерьере"
              name="things"
              class="form-control"></textarea>
    <small class="form-text">
      Производитель, Коллекция, Наименование
    </small>
  </div>

  <div class="form-group descriptionGroup">
    <textarea rows="8"
              placeholder="Описание интерьера/проекта"
              name="description"
              class="form-control description"></textarea>
    <small class="form-text">
      Приемы планировки и декора, другие важные подробности работы над интерьером/объектом
    </small>
    <div class="invalid-feedback">
      Необходимо описать проект
    </div>
  </div>

  <button type="submit" class="button btn btn-primary">
    Отправить
  </button>

  <p class="attention-policy">
    Нажимая на кнопку "Отправить", Вы даёте согласие на обработку персональных
    данных согласно <a class="link" href="/privacy-policy">Политике
    конфиденциальности</a> и <a class="link"  href="/policy-personal-data">Политике
    обработки персональных данных</a>.
  </p>
</form>