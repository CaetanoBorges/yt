<?php
namespace Conta;
use Conta\Classes\Funcoes;
session_start();

require '../_API/vendor/autoload.php';

if(isset($_POST['acao']) and !empty($_POST['acao'])){
    $conexao = Funcoes::conexao();

    
    $apagar = $_POST['acao'];
    $query = $conexao -> prepare("DELETE FROM sugestoes WHERE id = ?");
    $query->bindValue(1,$apagar);
    
    if( $query->execute() ){
        header('Location: sugestoes.php');
        exit();
    }
    
}

if (isset($_SESSION['yetu-debliw'])) {

    $conexao = Funcoes::conexao();
    $query = $conexao -> prepare("SELECT * FROM sugestoes");
    $query->execute();
    $res = $query->fetchAll();

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
        <title>Sugestão</title>
    </head>
    <style>
    .principal-corpo{width: 90%;display: block;padding: 5%;background-color: #ddd;}
    .principal-corpo a{color:black;text-decoration: none;}
    .principal-corpo a:hover{color:red;}
    
    </style>
    <body>
        <div class="principal">
            <a href="index.php" class="titulo"><h2>SUGESTÃO</h2></a>
            <div class="principal-corpo">
                <a href="addSugestao.php">ADICIONAR SUGESTÃO</a>
                <br><br><br>

                <?php
                    echo "<p>".count($res)." Sugestões</p><br>";
                    ?>
                    <div class="menu">
                    <?php
                    foreach($res as $key => $value){ ?>
                        <div class="menu-item" style="background: none;">
                            <img src="../prod/<?php echo $value['img'] ?>">
                            <h3 style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $key ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $key ?>"><?php echo $value['nome'] ?></h3>
                            <div class="collapse" id="collapseExample<?php echo $key ?>">
                                <form action="sugestoes.php" method="post">
                                    <button type="submit" class="btn btn-danger" name="acao" value="<?php echo $value['id'] ?>">APAGAR</button>
                                    <button type="button" class="btn btn-success"  data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $key ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $key ?>">CANCELAR</button>
                                </form>
                                
                            </div>
                        </div>
                    <?php }
                ?>
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
