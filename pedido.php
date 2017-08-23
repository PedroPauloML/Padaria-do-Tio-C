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

    $nome = $_POST["nome"];
    $menu = $_POST["menu"];
    $qtd = $_POST["qtd"];
    $preco = 0;

    switch ($menu) {
      case 'Pão':
        $preco = 0.50 * $qtd;
        break;

      case 'Bolo':
        $preco = 3.50 * $qtd;
        break;

      case 'Torrada':
        $preco = 1 * $qtd;
        break;

      case 'Broinha':
        $preco = 0.15 * $qtd;
        break;

      default:
        $preco = 'NaN';
        break;
    }

    require ('connection.php');

    $sql = "INSERT INTO pedido(nome_cliente, menu, qtd) VALUES ('$nome', '$menu', '$qtd')";

    if(!mysqli_query($conn, $sql)){
      die("Erro ao inserir os dados no Banco");
    }
  ?>

  <div class="pedido">
    <h3>Pedido realizado com sucesso!</h3>
    <h4>Obrigado! Bom apetite.</h4>
    <p><b>Cliente:</b> <?php echo $nome; ?></p>
    <p><b>Menu:</b> <?php echo $menu; ?></p>
    <p><b>Quantidade:</b> <?php echo $qtd; ?></p>
    <p><b>Valor a pagar:</b> <?php printf("R$ %.2f", $preco); ?></p>
    <br>
    <a href="index.html" class="action">Novo pedido</a>

    <br><br><br>

    <h4>Ajude-nos a melhor cada vez mais. Digite sua sugetão.</h4>
    <span id="msg"></span>
    <label for="sugestao" id="labelSugestao">Sugestão:</label>
    <textarea name="sugestao" id="sugestao" cols="30" rows="6"></textarea>
    <button id="buttonSugestao" onclick="sendSugestao()">Enviar</button>
  </div>

  <script  src="_js/jquery-3.2.1.min.js"></script>
  <script>
    function sendSugestao() {
      var sugestao = $('#sugestao').val();
      $.ajax({
        type: "POST",
        url: "sendSugestao.php",
        data: {sugestao: sugestao},
        success: function(){
          $('#labelSugestao').remove();
          $('#buttonSugestao').remove();
          $('#sugestao').remove();
          $('#msg').html("<br>Sugestão enviada com sucesso!<br><br><br>");
        }
      });
    }
  </script>

</body>
</html>
