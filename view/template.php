<?php if (ENABLE_BREADCRUMBS) { ?>
  <a href="/">Home</a>
  <?php if (isset($_GET['subject'])) {
    $subject = $_GET['subject'];
    global $subject_list; ?>
  -> <a href="/index.php?subject=<?=$subject?>"><?= $subject_list[$subject] ?></a>
      <?php if (isset($_GET['example'])) {
        $example = $_GET['example'];
        global $example_list;?>
        -> <?= $example_list[$example]['title'] ?>
      <?php }; 
  }?>
<br>
<br>
<?php }

echo $content;
include 'footer.php';
