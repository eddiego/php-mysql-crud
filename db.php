<?php
session_start();

$conn = mysqli_connect(
  'db1.coac4gmhpiwx.ap-northeast-2.rds.amazonaws.com',
  'dbedy',
  'password',
  'php_mysql_crud'
) or die(mysqli_erro($mysqli));

?>
