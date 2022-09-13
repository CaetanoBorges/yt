<?php
namespace Conta;
use Conta\Classes\Funcoes;
session_start();

require '../_API/vendor/autoload.php';

if (isset($_SESSION['yetu-debliw'])) {

    $conexao = Funcoes::conexao();
    $query = $conexao -> prepare("SELECT * FROM produto WHERE stock = ?");
    $query->bindValue(1,$_GET['s']);
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
        <title>Produtos</title>
    </head>
    <style>
    .principal-corpo{width: 90%;display: block;background-color: #ddd;
    padding: 0 5% 200px 5%;}
    .principal-corpo a{color:black;text-decoration: none;}
    .principal-corpo a:hover{color:red;}
    
    </style>
    <body>
        <div class="principal">
            <a href="index.php" class="titulo"><h2><?php echo $_GET['s'] ?></h2></a>
            <div class="principal-corpo">
                <a href="addProduto.php?s=<?php echo $_GET['s'] ?>">ADICIONAR PRODUTO</a>
                <br><br><br>

                <?php
                    echo "<p>".count($res)." Produtos nesse estoque</p><br>";
                    ?>
                    <div class="menu">
                    <?php
                    foreach($res as $key => $value){ ?>
                        <a href="produto.php?p=<?php echo $value['id'] ?>&s=<?php echo $value['stock'] ?>"><div class="menu-item" style="background: none;">
                            <img src="../prod/<?php echo $value['img'] ?>">
                            <h3><?php echo $value['nome'] ?></h3>
                        </div></a>
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
