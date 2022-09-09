<?php
namespace Conta;
use Conta\Classes\Funcoes;
session_start();

require '../_API/vendor/autoload.php';

if (isset($_SESSION['yetu-debliw'])) {

    $conexao = Funcoes::conexao();
    $query = $conexao -> prepare("SELECT * FROM usuario WHERE id = ?");
    $query->bindValue(1,$_GET['u']);
    $query->execute();
    $resUsuario = $query->fetch();

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../_arq/bootstrap.min.css">
        <script src="../_arq/bootstrap.min.js"></script>
        <link rel="stylesheet" href="_arq/one.css">
        <title>SMS</title>
    </head>
    <style>
    .principal-corpo{width: 90%;display: block;padding: 5%;background-color: #ddd;}
    .principal-corpo a{color:black;text-decoration: none;}
    .principal-corpo a:hover{color:red;}
    
    </style>
    <body>
        <div class="principal">
            <a href="usuarios.php" class="titulo"><h2><?php echo  $resUsuario['nome'] ?></h2></a>
            <div class="principal-corpo">
                <br>
                    <div class="card card-body">
                    <form action="sms.php" method="post">
                        <input type="hidden" name="user" value="<?php echo $resUsuario['id'] ?>">
                        <input type="text" name="titulo" required="required" placeholder="Titulo" class="form-control" maxlength="25">
                        <input type="text" name="mensagem" required="required" placeholder="Mensagem" class="form-control" maxlength="50">
                        <button type="button" class="btn btn-danger form-control" style="width:100% !important;"  data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">ENVIAR SMS</button>
                

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <button type="submit" class="btn btn-danger" name="acao" value="apagar">NOTIFICAR MESMO</button>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">NÃO</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
}else{
    header('Location:index.php');
    exit();
}

?>
