<?php
namespace Conta;
use Conta\Classes\Funcoes;
session_start();

require '../_API/vendor/autoload.php';

if (isset($_SESSION['yetu-debliw'])) {

    $conexao = Funcoes::conexao();
    $query = $conexao -> prepare("SELECT * FROM subcategorias");
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
        <title>Subategorias</title>
    </head>
    <style>
    
    
    </style>
    <body>
        <div class="principal">
            <a href="index.php" class="titulo"><h2>SUBCATEGORIA</h2></a>
            <div class="principal-corpo">
                <a href="addSubcategoria.php">ADICIONAR SUBCATEGORIA</a>
                <br><br><br>

                <?php
                    echo "<p>".count($res)." Categorias</p><br>";
                    foreach($res as $key => $value){ ?>
                        <a href="produtos.php?c=<?php echo $value['nome'] ?>"><h1><?php echo ($key+1)." - ".$value['nome'] ?></a></h1>
                    <?php }
                ?>
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
