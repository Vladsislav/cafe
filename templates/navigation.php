<nav class="main-navigation">
  <ul class="main-navigation__list">
    <li class="main-navigation__list-item">
      <a class="main-navigation__list-item-link" href="/tables.php">Столы</a>
    </li>
    <li class="main-navigation__list-item">
      <a class="main-navigation__list-item-link" href="/bookings.php">Брони</a>
    </li>
    <li class="main-navigation__list-item">
      <a class="main-navigation__list-item-link" href="/booking_new.php">Добавить бронь</a>
    </li>
    <?php if ($user['is_admin']) : ?>
    <li class="main-navigation__list-item">
      <a class="main-navigation__list-item-link" href="/users.php">Пользователи</a>
    </li>
    <?php endif; ?>
  </ul>
</nav>
