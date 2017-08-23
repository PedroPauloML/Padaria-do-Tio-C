<?php
  require_once 'connection.php';
  $sugestao = $_POST['sugestao'];
  $sql = "INSERT INTO sugestao(sugestao) VALUES ('$sugestao')";
  mysqli_query($conn, $sql);
 ?>