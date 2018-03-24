<br>
<footer>
<?php if(!ENABLE_BREADCRUMBS) {
  if (isset($_GET['subject'])) {
    if (isset($_GET['example'])) :?>
      <br>
      <a href="index.php?subject=<?= $_GET['subject'] ?>">Back to examples list</a>
    <?php endif; ?>
    <br>
  <a href="\">Back to subjects list</a>
  <br>
  <?php }
} ?>
  Made by <a href="mailto:grodas.p35@gmail.com">Pavlo Zhukov</a>
  <br>
  <a href="tel:+380966610835">+380966610835</a>
  <br>
  2018 
</footer>