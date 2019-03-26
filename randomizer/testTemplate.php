<?php
  $template = $_POST['template'];
  header("Location: http://tomaszhajas.azurewebsites.net/randomizer/index.html"."?template=".preg_quote(rawurlencode($template)));
  exit;
?>
