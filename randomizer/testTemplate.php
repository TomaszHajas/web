<?php
  $template = $_POST['template'];
  header("Location: http://tomaszhajas.azurewebsites.net/randomizer/index.html"."?template=".rawurlencode(preg_quote($template)));
  exit;
?>
