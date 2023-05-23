<h2 class="content__main-heading">Добавление брони</h2>

<form class="form" action="" method="post" autocomplete="off">
  <div class="form__row">
    <label class="form__label" for="date">Дата <sup>*</sup></label>
    <input class="form__input" type="text"id="date" value="<?= $booking['date'] ?>" disabled="true">
    <input type="hidden" name="date" value="<?= $booking['date'] ?>"/>
  </div>

  <div class="form__row">
    <label class="form__label" for="time">Время <sup>*</sup></label>
    <input class="form__input" type="text" id="time" value="<?= $booking['time'] ?>" disabled="true">
    <input type="hidden" name="time" value="<?= $booking['time'] ?>"/>
  </div>

  <div class="form__row">
    <label class="form__label" for="duration_hours">Длительность (часов) <sup>*</sup></label>
    <input class="form__input" type="number" id="duration_hours" value="<?= $booking['duration_hours'] ?>" disabled="true">
    <input type="hidden" name="duration_hours" value="<?= $booking['duration_hours'] ?>"/>
  </div>

  <div class="form__row">
    <label class="form__label" for="people_count">Количество человек <sup>*</sup></label>
    <input class="form__input" type="number" id="people_count" value="<?= $booking['people_count'] ?>" disabled="true">
    <input type="hidden" name="people_count" value="<?= $booking['people_count'] ?>"/>
  </div>

  <div class="form__row">
    <label class="form__label" for="table_id">Стол <sup>*</sup></label>
    <select class="form__input" name="table_id" id="table_id">
      <?php foreach($tables as $table): ?>
      <option value="<?= $table['id'] ?>"><?= $table['name'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form__row">
    <label class="form__label" for="guest_name">Имя гостя <sup>*</sup></label>
    <input class="form__input" type="text" name="guest_name" id="guest_name" value="">
  </div>

  <div class="form__row">
    <label class="form__label" for="guest_phone_number">Номер телефона <sup>*</sup></label>
    <input class="form__input" type="text" name="guest_phone_number" id="guest_phone_number" value="">
  </div>

  <div class="form__row form__row--controls">
    <input class="button" type="submit" name="" value="Добавить">
  </div>
</form>
