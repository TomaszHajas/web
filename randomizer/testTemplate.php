<?php
  $template = $_POST['template'];
  header("Location: http://tomaszhajas.azurewebsites.net/randomizer/index.html"."?template=".rawpreg_quote(urlencode($template)));
  exit;
?>
