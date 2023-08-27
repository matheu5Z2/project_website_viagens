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
    <title> Login - ingresso.com </title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="voltar" id="voltar">
        <img src="img/seta-esquerda.png" alt="" srcset="">
    </div>

    <div class="cadastro">
        <?php

            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
         
            if (!empty($dados['logar'])) {
                //var_dump($dados);
                $query_usuario = "SELECT id, email, senha
                                FROM cadastro 
                                WHERE email =:email 
                                LIMIT 1";
                $resulta_usuario = $connLog->prepare($query_usuario);
                $resulta_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
                $resulta_usuario->execute();

                if(($resulta_usuario) AND ($resulta_usuario->rowCount() != 0)){
                    $row_usuario = $resulta_usuario->fetch(PDO::FETCH_ASSOC);
                    //var_dump($row_usuario);
                    if ($dados['senha'] == $row_usuario['senha']) {
                        $_SESSION['msg'] = " <p style='color: green' > Usuário Logado!! </p> <br> ";
                        header('location: index.html');
                    } else {
                        $_SESSION['msg'] = " <p style='color: red' > Erro: Senha inválida! </p>";  
                    }
                    
                } else {
                    $_SESSION['msg'] = " <p style='color: red' > Erro: Usuário inválido! </p>";
                }

            }

        ?>

        <h1> Login </h1>

        <?php

            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }

        ?>

        <form action="" method="POST">

           <div class="full-box">
               <label for="email"> E-mail </label> <br>
               <input type="email" name="email" id="email" placeholder="Digite seu E-mail">
           </div>
           
            <div class="full-box">
                <label> Senha </label> <br>
                <input type="password" name="senha" id="senha" placeholder="Digite sua Senha">
            </div>
            <div class="full-box">
                <input type="submit" id="submit" class="button" name="logar">
            </div>
    
        </form>
    </div>

    <script src="js/login.js"></script>
</body>
</html>