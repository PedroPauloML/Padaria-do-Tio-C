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

    require_once 'connection.php';
    require_once 'verifica.php';

    echo "<div class='pedidos'>";
    echo "<h1>Pedidos</h1>";
    echo "<div id='progressbar'></div>";
    echo "<div id='slimscroll'>";
    require_once 'lista_pedidos.php';
    echo "</div>";
    echo "<div class='row actions'>";
    echo "<a href='index.html' class='action'>Voltar</a>";
    echo "<a href='logout.php' class='action'>Sair</a>";
    echo "<a href='sugestoes.php' class='action'>Sugestões</a>";
    echo "</div>";
    echo "</div>";

  ?>

  <script src="_js/jquery-3.2.1.min.js"></script>
  <script src="_js/jquery.slimscroll.min.js"></script>
  <script src="_js/notify.min.js"></script>
  <script src="_js/progressbar.min.js"></script>

  <?php require_once 'notify_messages.php' ?>

  <script>
    $(document).ready(function() {
      var bar = new ProgressBar.Line(progressbar, {
        strokeWidth: 4,
        easing: 'linear',
        duration: 3000,
        color: '#FFEA82',
        trailColor: '#eee',
        trailWidth: 1,
        svgStyle: {width: '100%', height: '100%'},
        text: {
          style: {
            // Text color.
            // Default: same as stroke color (options.color)
            color: '#999',
            position: 'absolute',
            right: '0',
            top: '30px',
            padding: 0,
            margin: 0,
            transform: null
          },
          autoStyleContainer: false
        },
        from: {color: '#FFEA82'},
        to: {color: '#ED6A5A'},
        step: (state, bar) => {
          bar.setText((Math.round(bar.value() * 30.0) / 10.0).toFixed(1) + ' s');
          bar.path.setAttribute('stroke', state.color);
        }
      });

      bar.animate(1, function(){bar.animate(0, {duration: 800});});

      setInterval(function function_name(argument) {
        bar.animate(1, function(){bar.animate(0, {duration: 1000});});
        setTimeout(function(){
          $.ajax({
            url: 'lista_pedidos.php',
            type: 'POST',
            success: function(data) {
              $('#slimscroll')[0].innerHTML = data;
            }
          });
        }, 0);
      }, 4000);

      if ($(window).width() <= 768) {
        $('.actions .action')[2].text = 'Sug.';
      } else {
        $('.actions .action')[2].text = 'Sugestões';
      }
      if ($(window).width() <= 320) {
        $('#slimscroll').slimScroll({
          height: '362'
        });
      } else {
        $('#slimscroll').slimScroll({
          height: '444'
        });
      }
    });
    $(window).resize(function(event) {
      if ($(window).width() <= 768) {
        $('.actions .action')[2].text = 'Sug.';
      } else {
        $('.actions .action')[2].text = 'Sugestões';
      }
      if ($(window).width() <= 320) {
        $('#slimscroll').slimScroll({
          height: '362'
        });
      } else {
        $('#slimscroll').slimScroll({
          height: '444'
        });
      }
    });
    $('.confirmation').on('click', function () {
        return confirm('Deseja realmente excluir esse pedido?');
    });
  </script>

</body>
</html>
