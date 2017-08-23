<?php
  require_once 'connection.php';
  require_once 'verifica.php';
  $id = $_GET['id'];
  $sql = "SELECT * FROM sugestao WHERE id='$id'";
  session_start();
  if(mysqli_query($conn, $sql)){
    $sql = "DELETE FROM sugestao WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
      $_SESSION['notify'] = 200;
      Header('Location: sugestoes.php');
    } else {
      $_SESSION['notify'] = 500;
      Header('Location: sugestoes.php');
    }
  } else {
      $_SESSION['notify'] = 400;
      Header('Location: sugestoes.php');
    }
 ?>