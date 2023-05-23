<h2 class="content__main-heading">Удаление брони</h2>

<form class="form" action="" method="post">
  <p>Удалить "<?= $booking['guest_name'] ?>"?</p><br>
  <p>
    <input type="submit" value="Удалить" class="btn btn-danger">
    <a href="bookings.php" class="btn btn-default">Отмена</a>
  </p>
</form>
