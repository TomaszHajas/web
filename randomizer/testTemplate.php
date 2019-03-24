<?php
  $template = $_POST['template'];
  header("Location: http://tomaszhajas.azurewebsites.net/randomizer/index.html"."?seed=0&template=".urlencode($template));
  exit;
?>
