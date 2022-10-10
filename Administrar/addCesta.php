<?php
namespace Conta;
use Conta\Classes\Funcoes;
session_start();

require '../_API/vendor/autoload.php';


if(isset($_POST['nome'])){
    $conexao = Funcoes::conexao();

    $id=Funcoes::chaveDB();
    
    $nome = $_POST['nome'];
    $preco = Funcoes::EspacoPorTraco($_POST['preco']);
    $qtd = Funcoes::EspacoPorTraco($_POST['qtd']);
    $descricao = $_POST['descricao'];

    $cap=$_FILES['imagem']['name'];
    $imagem=time()."-".Funcoes::EspacoPorTraco($cap);
    $imagem_temp=$_FILES['imagem']['tmp_name'];

    $query = $conexao -> prepare("INSERT INTO cestas (id,nome,categoria,subcategoria, unidades, stock,qtd,preco,descricao,img) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->bindValue(1,$id);
    $query->bindValue(2,$nome);
    $query->bindValue(3,"Cesta Básica");
    $query->bindValue(4,"Cesta Básica");
    $query->bindValue(5,"Cestas");
    $query->bindValue(6,"Cesta Básica");
    $query->bindValue(7,$qtd);
    $query->bindValue(8,$preco);
    $query->bindValue(9,$descricao);
    $query->bindValue(10,$imagem);
    
    
    if($query->execute()){
        move_uploaded_file($imagem_temp,"../prod/".$imagem);
        header('Location: cestas.php');
        exit();
    }
    header('Location: addCesta.php');
    
}

if (isset($_SESSION['yetu-debliw'])) {

    $conexao = Funcoes::conexao();



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
        <title>Adicionar cesta básica</title>
    </head>
    <style>

        
    </style>
    <body>
        <div class="principal">
            <a href="cestas.php" class="titulo"><h2>Cestas</h2></a>
            <div class="principal-corpo">
                <form action="addCesta.php" method="post" enctype="multipart/form-data" autocomplete="off">
                   
                    <br>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control" required="required">
<br>
                    <label for="preco">Preço</label>
                    <input type="number" name="preco" id="preco" placeholder="Preco" class="form-control" required="required">
<br>
                    <label for="qtd">Quantidade</label>
                    <input type="number" name="qtd" id="qtd" placeholder="QTD" class="form-control" required="required">
<br>
                    <label for="imagem">Imagem</label>
                    <input type="file" id="imagem" name="imagem" class="form-control" required="required">
<br>
                    <textarea name="descricao" maxlength="221" placeholder="Descrição do produto" class="form-control" required="required"></textarea>
                    <br>
                    <button type="submit" class="btn btn-success form-control" style="width:100% !important;">INSERIR PRODUTO</button>
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

