<?php
namespace Conta;
use Conta\Classes\Funcoes;
session_start();

require '../_API/vendor/autoload.php';


if(isset($_POST['nome'])){
    $conexao = Funcoes::conexao();


    $nome = Funcoes::EspacoPorTraco($_POST['nome']);

    $query = $conexao -> prepare("INSERT INTO estoque (nome) VALUES (?)");
    $query->bindValue(1,$nome);
    
    
    if($query->execute()){
        
        header('Location: stocks.php');
        exit();
    }
    
}

if (isset($_SESSION['yetu-debliw'])) {

  

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
        <title>Adicionar estoque</title>
    </head>
    <style>

        
    </style>
    <body>
        <div class="principal">
            <a href="index.php" class="titulo"><h2>ADD ESTOQUE</h2></a>
            <div class="principal-corpo">
                <form action="addStock.php" method="post" autocomplete="off">
                  
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control" required="required">
<br>
                    <button type="submit" class="btn btn-success form-control" style="width:100% !important;">INSERIR CATEGORIA</button>
                </form>
            </div>
        </div>
    </body>
    </html>
    <?php
}else{
    header('Location:index.php');
}

?>

