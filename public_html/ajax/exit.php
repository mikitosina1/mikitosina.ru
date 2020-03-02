<?php
  setcookie('log', $u_login, time() - 3600 * 24 * 30, "/");
  echo true;
?>
