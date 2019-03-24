<?php
  $template = $_POST['template'];
  header("Location: {$_SERVER['HTTP_REFERER']}"."?template=".urlencode($template));
  exit;
?>
