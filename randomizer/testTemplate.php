<?php
  $template = $_POST['template'];
  header("Location: http://tomaszhajas.azurewebsites.net/randomizer/index.html"."?seed=1&template=".urlencode($template));
  exit;
?>
