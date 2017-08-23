<?php
  $notify = isset($_SESSION['notify']);
  switch ($notify) {
    case 200:
      echo "<script>$.notify('HTTP 200 - Excluído com sucesso!', 'success');</script>";
      unset($_SESSION['notify']);
      break;
    case 500:
      echo "<script>$.notify('HTTP 500 - Error ao tentar excluir', 'error');</script>";
      unset($_SESSION['notify']);
      break;
    case 400:
      echo "<script>$.notify('HTTP 400 - Item não encontrado', 'warn');</script>";
      unset($_SESSION['notify']);
      break;
    default:
      # code...
      break;
  }
 ?>