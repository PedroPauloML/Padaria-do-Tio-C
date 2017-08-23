<?php
  if (!isset($conn)) {
    require_once 'connection.php';
  }
  $sql = "SELECT * FROM pedido ORDER BY id DESC";
  $pedidos = mysqli_query($conn, $sql);

  while($pedido = mysqli_fetch_assoc($pedidos)){
    echo "<p><b>Pedido:</b> " . $pedido['id'] . "</p>";
    echo "<p><b>Cliente:</b> " . $pedido['nome_cliente'] . "</p>";
    echo "<p><b>Menu:</b> " . $pedido['menu'] . "</p>";
    echo "<p><b>Quantidade:</b> " . $pedido['qtd'] . "</p>";

    switch ($pedido['menu']) {
      case 'Pão':
        $preco = 0.50 * $pedido['qtd'];
        break;

      case 'Bolo':
        $preco = 3.50 * $pedido['qtd'];
        break;

      case 'Torrada':
        $preco = 1 * $pedido['qtd'];
        break;

      case 'Broinha':
        $preco = 0.15 * $pedido['qtd'];
        break;

      default:
        $preco = 'NaN';
        break;
    }

    printf ("<p><b>Valor a pagar:</b> R$ %.2f</p>", $preco);
    echo "<br><a href='deletar_pedido.php?id=" . $pedido['id'] . "' class='action confirmation'>Deletar</a><br><br>";
    echo "<hr>";
  }

 ?>