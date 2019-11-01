<?php
require "config.php";

try {
  $connection = new PDO("mysql:host=$host", $username, $password, $options);
  $sql = file_get_contents("data/init.sql");
  $connection->exec($sql);
  
  echo "Good job buddy you did it!";
}
catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}