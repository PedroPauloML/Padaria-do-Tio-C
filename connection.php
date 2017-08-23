<?php
  $server = "localhost";
  $login = "root";
  $password = "usbw";
  $db = "padaria_do_tio_c";
  $conn = mysqli_connect($server, $login, $password, $db);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
 ?>