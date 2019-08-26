<?php
  $template = $_POST['template'];
  $file = 'templates.txt';
  $currentContent = file_get_contents($file);
  $currentContent .= $template . "\n";
  file_put_contents($file, $currentContent);
  header("Location: {$_SERVER['HTTP_REFERER']}");
  exit;
?>
