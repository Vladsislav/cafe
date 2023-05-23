<h2 class="content__main-heading">Активные брони</h2>

<table class="tasks">
  <?php foreach ($bookings as $booking): ?>
  <tr class="tasks__item task">
    <td>
      <?= htmlspecialchars($booking['table_name']) ?>
    </td>
    <td>
      <?= htmlspecialchars($booking['guest_name']) ?>
    </td>
    <td>
      <?= htmlspecialchars($booking['guest_phone_number']) ?>
    </td>
    <td>
      <?= $booking['start_time'] ?>
    </td>
    <td>
      <?= $booking['end_time'] ?>
    </td>
    <td>
      <a href="/booking_delete.php?id=<?= $booking['id'] ?>">Удалить</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
