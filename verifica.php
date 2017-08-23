<?php
  session_start();
  if ((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome']))) {
    Header("Location: login.php");
  }
 ?>