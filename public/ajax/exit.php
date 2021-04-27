<?php
  setcookie('u_login', $u_login, time() - 3600 * 24 * 30, "/");
  echo true;
?>
