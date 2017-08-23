<!DOCTYPE html>
<html>
<head>
  <title> Padaria do TIO C </title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="_css/css.css">
  <meta name="viewport" content="width=device-width, inital-scale=1.0, minimun-scale=1.0">
</head>
<body>

  <?php

    require_once ('connection.php');
    require_once ('verifica.php');

    $sql = "SELECT * FROM sugestao ORDER BY id DESC";
    $sugestoes = mysqli_query($conn, $sql);

    echo "<div class='sugestoes'>";
    echo "<h1>Sugestões</h1>";
    echo "<div id='slimscroll'>";

    while($sugestao = mysqli_fetch_assoc($sugestoes)){
      echo "<p><b>Sugestão:</b> " . $sugestao['id'] . "</p>";
      echo "<p><b>Opnião:</b> " . $sugestao['sugestao'] . "</p>";
      echo "<br><a href='deletar_sugestao.php?id=" . $sugestao['id'] . "' class='action confirmation'>Deletar</a><br><br>";
      echo "<hr>";
    }
    echo "</div>";
    echo "<div class='row actions'>";
    echo "<a href='index.html' class='action'>Voltar</a>";
    echo "<a href='logout.php' class='action'>Sair</a>";
    echo "<a href='padaria.php' class='action'>Pedidos</a>";
    echo "</div>";
    echo "</div>";

  ?>

  <script src="_js/jquery-3.2.1.min.js"></script>
  <script src="_js/jquery.slimscroll.min.js"></script>
  <script src="_js/notify.min.js"></script>

  <?php require_once 'notify_messages.php' ?>

  <script>
    $(document).ready(function() {
      // setTimeout(function(){
      //   location.reload()
      // }, 10000);
      if ($(window).width() <= 768) {
        $('.actions .action')[2].text = 'Ped.';
      } else {
        $('.actions .action')[2].text = 'Pedidos';
      }
      if ($(window).width() <= 320) {
        $('#slimscroll').slimScroll({
          height: '395'
        });
      } else {
        $('#slimscroll').slimScroll({
          height: '477'
        });
      }
    });
    $(window).resize(function(event) {
      if ($(window).width() <= 768) {
        $('.actions .action')[2].text = 'Ped.';
      } else {
        $('.actions .action')[2].text = 'Pedidos';
      }
      if ($(window).width() <= 320) {
        $('#slimscroll').slimScroll({
          height: '395'
        });
      } else {
        $('#slimscroll').slimScroll({
          height: '477'
        });
      }
    });
    $('.confirmation').on('click', function () {
        return confirm('Deseja realmente excluir essa sugestão?');
    });
  </script>

</body>
</html>
