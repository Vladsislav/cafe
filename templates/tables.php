<h2 class="content__main-heading">Столы</h2>

<table class="tasks">
  <?php foreach ($tables as $table): ?>
  <tr class="tasks__item task">
    <td class="task__select">
      <?= htmlspecialchars($table['name']) ?>
    </td>
    <td>
      <?= $table['max_people'] ?>
    </td>
    <?php if ($user['is_admin']) : ?>
    <td>
      <a href="/table_delete.php?id=<?= $table['id'] ?>">Удалить</a>
    </td>
    <?php endif; ?>
  </tr>
  <?php endforeach; ?>
</table>

<?php if ($user['is_admin']) : ?>
<div>
  <a class="button" href="table_new.php">Добавить</a>
</div>
<?php endif; ?>
