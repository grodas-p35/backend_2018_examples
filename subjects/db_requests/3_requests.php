<?php

write_ln($_GET, '$_GET');
write_ln($_POST, '$_POST');
write_ln($_REQUEST, '$_REQUEST');
write_ln($_FILES, '$_FILES');


?>
<br>
<br>
<form action="" method="post" enctype="multipart/form-data">
  <input type="text" name="test_input">
  <input type="checkbox" name="test_checkbox">
  <input type="file" name="test_file">
  <button>Submit</button>
</form>
