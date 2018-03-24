<p>
  Choose subject
</p>

<ul>
  <?php foreach($subject_list as $code => $subject): ?>
  <li><a href="index.php?subject=<?= $code ?>"><?= $subject ?></a></li>
  <?php endforeach; ?>
</ul>
