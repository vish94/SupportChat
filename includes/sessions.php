<? ob_start(); ?>
<?php
  session_start();

  function confirm_log_in() {
  if (!isset($_SESSION['user_id'])) {
  header ("Location: index.php?session=1");
  exit();
  }
  }
?>
<? ob_flush(); ?>