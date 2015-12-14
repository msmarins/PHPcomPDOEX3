<?php
session_start();
if ($_SESSION["login"] == "") {
    header("location:admin.php?aviso=2");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/main_style.css" />
    </head>
    <body>
        <div class="container clearfix">
            <?php include_once 'header.php'; ?>
            <section class="content">
                <h2>Seja bem-vindo <?php echo $_SESSION['login']; ?></h2><br />
                <?php
                require_once 'classes/Aluno.class.php';
                require_once 'classes/ServiceDb.class.php';
                require_once "conexao.php";
                $pdo = Conectar();
                $aluno = new Aluno();
                $processo = new ServiceDb($pdo, $aluno);
                if (filter_input(INPUT_GET, "sessao")):
                    $pg = filter_input(INPUT_GET, "sessao");
                    switch ($pg) {
                        case 1:
                            include "home.php";
                            break;
                        case 2:
                            $processo->Deletar(filter_input(INPUT_GET, "id"));
                            header("location:index.php");
                            break;

                        case 3:
                            include "cadastro.php";
                            break;
                        case 4:
                            include "cadastro.php";
                            break;
                        case 5:
                            include "cadastro.php";
                            break;
                    }
                else:
                    include 'home.php';
                    $pg = "";
                endif;
                ?>
            </section>
            <?php include_once 'footer.php'; ?>
        </div>
    </body>
</html>
