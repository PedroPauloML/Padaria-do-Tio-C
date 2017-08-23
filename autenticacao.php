<?php
  require_once 'connection.php';

  $email = $_POST['login'];
  $senha = $_POST['senha'];

  $sql = "SELECT * FROM autenticacao WHERE email='$email' AND password='$senha'";
  $user = mysqli_query($conn, $sql);

  if (mysqli_num_rows($user) > 0) {
    $user = mysqli_fetch_object($user);

    session_start();
    $_SESSION['id'] = $user->id;
    $_SESSION['name'] = $user->user_name;
    Header("Location: padaria.php");
  } else {
    Header("Location: login.php?error=404");
  }
 ?>