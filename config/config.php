<?php

try{

  $host   = "localhost";
  $dbname = "cleanblog";
  $user   = "root";
  $pass   = "root";
  
  $conn = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
  $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch(PDOException $e){
  echo "Connection failed: " . $e->getMessage();
}


?>