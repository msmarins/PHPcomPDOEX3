<?php
session_start();
if ($_SESSION["login"] == "") {
    header("location:sessoes/admin.php?aviso=2");
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
                if (filter_input(INPUT_GET, "sessao")):$pg = filter_input(INPUT_GET, "sessao");
                    switch ($pg) {
                        case 1:
                            include "sessoes/alunos.php";
                            break;
                        case 2:
                            include "sessoes/usuarios.php";
                            break;
                        case 3:
                            include "formularios/form_aluno.php";
                            break;
                        case 4:
                            include "formularios/form_usuario.php";
                            break;
                    }
                else:
                    include 'sessoes/alunos.php';
                    $pg = "";
                endif;
                ?>
            </section>
            <?php include_once 'footer.php'; ?>
        </div>
    </body>
</html>
