<?php
namespace Conta;
use Conta\Classes\Funcoes;
session_start();

require '../_API/vendor/autoload.php';

if(isset($_POST['acao']) and !empty($_POST['acao'])){
    $conexao = Funcoes::conexao();

    
    $apagar = $_POST['acao'];
    $query = $conexao -> prepare("DELETE FROM subcategorias WHERE id = ?");
    $query->bindValue(1,$apagar);
    
    if( $query->execute() ){
        header('Location: subcategorias.php');
        exit();
    }
    
}

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
        <title>Subcategorias</title>
    </head>
    <style>
    .principal-corpo{width: 90%;display: block;padding: 5%;background-color: #ddd;}
    .principal-corpo a{color:black;text-decoration: none;}
    .principal-corpo a:hover{color:red;}
    
    </style>
    <body>
        <div class="principal">
            <a href="index.php" class="titulo"><h2>SUBCATEGORIAS</h2></a>
            <div class="principal-corpo">
                <a href="addSubcategoria.php">ADICIONAR SUBCATEGORIA</a>
                <br><br><br>

                <?php
                    echo "<p>".count($res)." Subcategorias</p><br>";
                    foreach($res as $key => $value){ ?>
                        <div class="card card-body">
                            <h1 style="cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $key ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $key ?>"><?php echo ($key+1)." - ".$value['nome'] ?></h1> 
                            <div class="collapse" id="collapseExample<?php echo $key ?>">
                                <form action="subcategorias.php" method="post">
                                    <button type="submit" class="btn btn-danger" name="acao" value="<?php echo $value['id'] ?>">APAGAR</button>
                                    <button type="button" class="btn btn-success"  data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $key ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $key ?>">CANCELAR</button>
                                </form>
                                
                            </div>
                        </div>  
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
