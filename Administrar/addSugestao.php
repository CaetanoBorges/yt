<?php
namespace Conta;
use Conta\Classes\Funcoes;
session_start();

require '../_API/vendor/autoload.php';


if(isset($_POST['nome'])){
    $conexao = Funcoes::conexao();


    $nome = Funcoes::EspacoPorTraco($_POST['nome']);

    $cap=$_FILES['imagem']['name'];
    $imagem=time()."-".Funcoes::EspacoPorTraco($cap);
    $imagem_temp=$_FILES['imagem']['tmp_name'];

    $query = $conexao -> prepare("INSERT INTO sugestoes (nome, img) VALUES (?, ?)");
    $query->bindValue(1,$nome);
    $query->bindValue(2,$imagem);
    
    
    if($query->execute()){   
        move_uploaded_file($imagem_temp,"../prod/".$imagem);
        header('Location: sugestoes.php');
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
        <title>Adicionar sugestão</title>
    </head>
    <style>

        
    </style>
    <body>
        <div class="principal">
            <a href="index.php" class="titulo"><h2>ADD SUGESTÃO</h2></a>
            <div class="principal-corpo">
                <form action="addSugestao.php" method="post"  enctype="multipart/form-data" autocomplete="off">
                  
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control" required="required">
<br><label for="imagem">Imagem</label>
                    <input type="file" id="imagem" name="imagem" class="form-control" required="required">
<br>
                    <button type="submit" class="btn btn-success form-control" style="width:100% !important;">INSERIR SUGESTÃO</button>
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

