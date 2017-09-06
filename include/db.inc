<?php
// DB接続
try {
  $db_name = "cpfinance_boranking";
  $serv = "183.90.245.206";
  $user = "cpfinance_naka";
  $pass = "to565454";

  $pdo = new PDO("mysql:dbname=$db_name;host=$serv","$user","$pass",
  array(
  PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`"));

} catch (PDOException $e) {
  die($e->getMessage());
}