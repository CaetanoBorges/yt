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
                       <div class="menu-item" style="background: none;position:relative;">
                            <img src="../prod/<?php echo $value['img'] ?>">
                            <buttun type="button" class="btn btn-sm btn-danger" style="width: 91%;border-radius:0;"  data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $value['id'] ?>">Informação</buttun>
                             <a href="produto.php?p=<?php echo $value['id'] ?>&s=<?php echo $value['stock'] ?>"  class="btn btn-sm btn-info" style="width: 91%;border-radius:0;"><?php echo $value['nome'] ?></a>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $value['id'] ?>" tabindex="-1"  aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3>Restam <?php echo $value['qtd'] ?> <?php echo $value['unidades'] ?></h3>
                            </div>
                            </div>
                        </div>
                        </div>
                    <?php }
                ?>
                </div>
            </div>
        </div>
        <script src="../_arq/jquery.js"></script>
        <script src="../_arq/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
}else{
    header('Location:index.php');
    exit();
}

?>
