<?php
namespace Conta;
use Conta\Classes\Funcoes;
session_start();

require '../_API/vendor/autoload.php';


if(isset($_POST['acao']) and $_POST['acao'] == "editar"){
    $conexao = Funcoes::conexao();

    
    $nome = $_POST['nome'];
    $preco = Funcoes::EspacoPorTraco($_POST['preco']);
    $qtd = Funcoes::EspacoPorTraco($_POST['qtd']);
    $descricao = $_POST['descricao'];
    $imagem = Funcoes::EspacoPorTraco($_POST['img']);
    $id=$_POST['id'];

    $apagar='';
    $imagem_temp = '';

    $cap=$_FILES['imagem']['name'];

    if(isset($cap) and !empty($cap)){
        $apagar = $imagem;
        $imagem=time()."-".Funcoes::EspacoPorTraco($cap);
        $imagem_temp=$_FILES['imagem']['tmp_name'];
    }

    $query = $conexao -> prepare("UPDATE cestas SET nome = ?, qtd = ?, preco = ?, descricao = ?, img = ? WHERE id = ?");
    $query->bindValue(1,$nome);
    $query->bindValue(2,$qtd);
    $query->bindValue(3,$preco);
    $query->bindValue(4,$descricao);
    $query->bindValue(5,$imagem);
    $query->bindValue(6,$id);
    
    
    if( $query->execute() ){
        
        if(isset($cap) and !empty($cap)){
            move_uploaded_file($imagem_temp,"../prod/".$imagem);
            unlink("../prod/".$apagar);
        }
        header('Location: cesta.php?c='.$_POST['id']);
        exit();
    }
    
}

if(isset($_POST['acao']) and $_POST['acao'] == "meterslide"){
    $conexao = Funcoes::conexao();

    $apagar = $_POST['apagar'];
    $id=$_POST['id'];

    $cap=$_FILES['imagem']['name'];
    $imagem=time()."-".Funcoes::EspacoPorTraco($cap);
    $imagem_temp=$_FILES['imagem']['tmp_name'];

    $query = $conexao -> prepare("UPDATE cestas SET slide = ? WHERE id = ?");
    $query->bindValue(1,$imagem);
    $query->bindValue(2,$id);
    
    
    
    if( $query->execute() ){
        move_uploaded_file($imagem_temp,"../prod/".$imagem);
        if(isset($apagar) and !empty($apagar)){
            unlink("../prod/".$apagar);
        }
        header('Location: cesta.php?c='.$_POST['id']);
        exit();
    }
    
}

if(isset($_POST['acao']) and $_POST['acao'] == "tirardoslide"){
    $conexao = Funcoes::conexao();

    $id=$_POST['id'];
    $apagar = $_POST['apagar'];

    $query = $conexao -> prepare("UPDATE cestas SET slide = ? WHERE id = ?");
    $query->bindValue(1,'');
    $query->bindValue(2,$id);
    
    if( $query->execute() ){
        unlink("../prod/".$apagar);
        header('Location: cesta.php?c='.$id);
        exit();
    }
    
}

if(isset($_POST['acao']) and $_POST['acao'] == "apagar"){
    $conexao = Funcoes::conexao();

    $id=$_POST['id'];
    $slide = $_POST['slide'];
    $imagem = $_POST['imagem'];

    $query = $conexao -> prepare("DELETE FROM cestas WHERE id = ?");
    $query->bindValue(1,$id);
    
    if( $query->execute() ){
        if(isset($slide) and !empty($slide)){
            unlink("../prod/".$slide);
        }
        unlink("../prod/".$imagem);
        header('Location: cestas.php');
        exit();
    }
    
}


if (isset($_SESSION['yetu-debliw'])) {

    $conexao = Funcoes::conexao();

    $produto = $conexao -> prepare("SELECT * FROM cestas WHERE id = ? ");
    $produto->bindValue(1,$_GET['c']);
    $produto->execute();
    $resProduto = $produto->fetch();

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
        <title>Ver cesta</title>
    </head>
    <style>

        
    </style>
    <body>
        <div class="principal">
            <a href="index.php" class="titulo"><h2><?php echo $resProduto['nome'] ?></h2></a>
            <div class="principal-corpo">
                <form action="cesta.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" value="<?php echo $resProduto['id'] ?>" name="id">
                    <input type="hidden" value="<?php echo $resProduto['img'] ?>" name="img">
                    
                    <br>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control" value="<?php echo $resProduto['nome'] ?>" required="required">
<br>
                    <label for="preco">Preço</label>
                    <input type="number" name="preco" id="preco" placeholder="Preco" class="form-control" value="<?php echo $resProduto['preco'] ?>" required="required">
<br>
                    <label for="qtd">Quantidade</label>
                    <input type="number" name="qtd" id="qtd" placeholder="QTD" class="form-control" value="<?php echo $resProduto['qtd'] ?>" required="required">
<br>
                    <label for="imagem">Imagem</label><br>
                    <img src="../prod/<?php echo $resProduto['img'] ?>" style="width:200px;border:1px solid #eaeaea">
                    <input type="file" id="imagem" name="imagem" class="form-control">
<br>
                    <textarea name="descricao" maxlength="221" placeholder="Descrição do produto" class="form-control"  required="required"><?php echo $resProduto['descricao'] ?></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary form-control" style="width:100% !important;" name="acao" value="editar">ATUALIZAR CESTA</button>
                </form>
            </div>

            <br>
            <div class="principal-corpo">
                <?php
                    if($resProduto['slide']){ ?>
                        <form action="cesta.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $resProduto['id'] ?>">
                            <input type="hidden" name="apagar" value="<?php echo $resProduto['slide'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm" name="acao" value="tirardoslide">TIRAR DO SLIDE</button>
                        </form>    
                        <img src="../prod/<?php echo $resProduto['slide'] ?>" style="width:100%;border:1px solid #eaeaea">
                    <?php }else{ ?>
                        <h3>ADICIONE A CESTA AO SLIDE</h3>
                    <?php }
                ?>
                <br>
                <form action="cesta.php" method="post" enctype="multipart/form-data">
                    
                    <input type="hidden" name="stock" value="<?php echo $resProduto['stock'] ?>" >
                    <input type="hidden" name="id" value="<?php echo $resProduto['id'] ?>" >
                    <input type="hidden" name="apagar" value="<?php echo $resProduto['slide'] ?>" >
                    <input type="file" id="imagem" name="imagem" class="form-control" required="required">
                    <button type="submit" class="btn btn-warning form-control" style="width:100% !important;" name="acao" value="meterslide">ADICIONAR CESTA AO SLIDE</button>
                </form>
            </div>
            <br>
            <div class="principal-corpo"><br>
                <h3>APAGAR CESTA DA LOJA</h3>
                <button type="submit" class="btn btn-danger form-control" style="width:100% !important;"  data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">APAGAR</button>
                <p>

                <div class="collapse" id="collapseExample">
                    <form action="cesta.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $resProduto['id'] ?>" >
                        <input type="hidden" name="slide" value="<?php echo $resProduto['slide'] ?>">
                        <input type="hidden" name="imagem" value="<?php echo $resProduto['img'] ?>" >
                        <div class="card card-body">
                            <button type="submit" class="btn btn-danger" name="acao" value="apagar">APAGAR MESMO</button>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">NÃO</button>
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
}

?>

