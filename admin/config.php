<?php

/**
  * Configuration for database connection
  *
  */

$host       = "localhost";
$username   = "gtuck";
$password   = "Hello987";
$dbname     = "gtuck";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
