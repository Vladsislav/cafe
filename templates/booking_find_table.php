<h2 class="content__main-heading">Добавление брони</h2>

<form class="form" action="" method="post" autocomplete="off">
  <div class="form__row">
    <label class="form__label" for="date">Дата <sup>*</sup></label>
    <input class="form__input form__input--date" type="text" name="date" id="date" value="" placeholder="Введите дату в формате ГГГГ-ММ-ДД">
  </div>

  <div class="form__row">
    <label class="form__label" for="time">Время <sup>*</sup></label>
    <input class="form__input" type="text" name="time" id="time" value="" placeholder="Введите время в формате ЧЧММ">
  </div>

  <div class="form__row">
    <label class="form__label" for="duration_hours">Длительность (часов) <sup>*</sup></label>
    <input class="form__input" type="number" name="duration_hours" id="duration_hours" value="">
  </div>

  <div class="form__row">
    <label class="form__label" for="people_count">Количество человек <sup>*</sup></label>
    <input class="form__input" type="number" name="people_count" id="people_count" value="">
  </div>

  <div class="form__row form__row--controls">
    <input class="button" type="submit" name="" value="Найти столы">
  </div>
</form>
