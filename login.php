<!DOCTYPE html>
<html>
<head>
  <title> Padaria do TIO C </title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="_css/css.css">
  <meta name="viewport" content="width=device-width, inital-scale=1.0, minimun-scale=1.0">
</head>
<body>

  <div class="outer">
    <div class="inner">

      <form id="login" method="POST" action="autenticacao.php" >

        <h1>Login</h1>
        <h3>Insira suas credenciais</h3>
        <?php
          $error = isset($_GET['error']);
          if ($error != '') {
            echo "<p style='color: red;'>Usuário/senha inválidos</p>";
          }
         ?>

        <br>

        <label for="login">Login:</label><br>
        <input type="email" id="login" name="login" placeholder="Login" autofocus="true" required="true" /><br>

        <label for="senha">Quantidade:</label><br>
        <input type="password" id="senha" name="senha" placeholder="Senha" required="true" /><br>

        <br>
        <input type="submit" value="Acessar" />

        <br><br><br>
        <a href="index.html" class="action">Voltar</a>
        <br><br><br>
      </form>

    </div>
  </div>
</body>
</html>