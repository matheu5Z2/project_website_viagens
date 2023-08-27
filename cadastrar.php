<?php

session_start();
include_once("config.php");


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastra-se - ingresso.com </title>
    <link rel="stylesheet" href="css/form.css">
</head>

<body>
    <div class="voltar" id="voltar">
        <img src="img/seta-esquerda.png" alt="" srcset="">
    </div>

    <div class="cadastro">

        <?php

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($dados['submit'])) {
            $query_usuario = "INSERT INTO cadastro (nome, sobrenome, email, senha) VALUES ('" . $dados['nome'] . "', '" . $dados['sobrenome'] . "', '" . $dados['email'] . "', '" . $dados['senha'] . "')";
            $cad_usuario = $connLog->prepare($query_usuario);
            $cad_usuario->execute();
            $_SESSION['msg'] = " <p style='color: green' > Usuário cadastrado com Sucesso!! </p> <br> ";
        }

        ?>
        <h1> Cadastro </h1>

        <?php

        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

        ?>
        <form action="cadastrar.php" method="POST">

            <div class="half-box espaço">
                <label for="Nome"> Nome </label> <br>
                <input type="text" name='nome' placeholder="Digite seu nome" required>
            </div>

            <div class="half-box">
                <label for="Sobrenome"> Sobrenome </label> <br>
                <input type="text" name="sobrenome" placeholder="Digite seu sobrenome" required> 
            </div>

            <div class="full-box">
                <label for="Email"> E-mail </label> <br>
                <input type="email" name="email" placeholder="Digite seu E-mail" required>
            </div>

            <div class="full-box">
                <label for="Password"> Senha </label> <br>
                <input type="password" name="senha" placeholder="Digite sua Senha" required>
            </div>
            <div class="full-box">
                <input type="submit" name="submit" id="submit" class="button">
            </div>

        </form>
    </div>

    <script src="js/cadastrar.js"></script>
</body>

</html>