<?php 
// Conncetion to DB
try {
    $con = new PDO(
      "mysql:host=localhost;dbname=mus_db",
      "root",
      ""
    );
  } catch (PDOException $f) {
    echo $f->getmessage();
  }
?>