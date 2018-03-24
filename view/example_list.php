<p>
  Choose <?= $type['title'] ?>
</p>

<ol>
  <?php foreach($list as $code => $item): ?>
  <li><a href="index.php?<?= $type['category'] ?>=<?= $subject ?>&<?= $type['slug'] ?>=<?= $code ?>"><?= $item['title'] ?></a></li>
  <?php endforeach; ?>
</ol>
<br>
<?php if ($type['category'] == 'subject') {
    if (file_exists(get_directory($subject, 'tasks') . '_list.php')) { ?>
        <a href="/index.php?task_subject=<?= $subject; ?>">See provided tasks</a>
    <? }
} else {?>
    <a href="/index.php?subject=<?= $subject; ?>">Go to examples list</a>
  <?
} ?>
<br>
