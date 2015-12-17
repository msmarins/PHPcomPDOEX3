<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../css/main_style.css" />
    </head>
    <body>
        <div class="container clearfix">
            <span class="aviso">
                <?php
                if (filter_input(INPUT_GET, "aviso")) {
                    $e = filter_input(INPUT_GET, "aviso");

                    if ($e == "1") {
                        echo "Login ou senha incorretos!";
                    }
                    if ($e == "2") {
                        echo "Você precisa estar logado para acessar esta área";
                    }
                }
                ?>
            </span>
            <form method="post" action="../autenticar.php">
                <fieldset>
                    <legend>Digite seu login e senha para logar no sistema</legend>
                    <label for="login">Login</label>
                    <input type="text" value="" name="login" id="login" size="20"/>
                    <label for="senha">Senha</label>
                    <input type="password" value="" name="senha" id="senha" size="10"/>
                    <input type="submit" value="Enviar"/>
                </fieldset>
            </form>
        </div>
    </body>
</html>
