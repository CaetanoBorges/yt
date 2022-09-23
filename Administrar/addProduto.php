<?php
namespace Conta;
use Conta\Classes\Funcoes;
session_start();

require '../_API/vendor/autoload.php';


if(isset($_POST['nome'])){
    $conexao = Funcoes::conexao();

    $id=Funcoes::chaveDB();
    $stock = Funcoes::EspacoPorTraco($_POST['stock']);
    $categoria = Funcoes::EspacoPorTraco($_POST['categoria']);
    $subcategoria = Funcoes::EspacoPorTraco($_POST['subcategoria']);
    $unidades = $_POST['unidades'];
    $nome = $_POST['nome'];
    $preco = Funcoes::EspacoPorTraco($_POST['preco']);
    $qtd = Funcoes::EspacoPorTraco($_POST['qtd']);
    $descricao = $_POST['descricao'];

    $cap=$_FILES['imagem']['name'];
    $imagem=time()."-".Funcoes::EspacoPorTraco($cap);
    $imagem_temp=$_FILES['imagem']['tmp_name'];

    $query = $conexao -> prepare("INSERT INTO produto (id,nome,categoria,subcategoria, unidades, stock,qtd,preco,descricao,img) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->bindValue(1,$id);
    $query->bindValue(2,$nome);
    $query->bindValue(3,$categoria);
    $query->bindValue(4,$subcategoria);
    $query->bindValue(5,$unidades);
    $query->bindValue(6,$stock);
    $query->bindValue(7,$qtd);
    $query->bindValue(8,$preco);
    $query->bindValue(9,$descricao);
    $query->bindValue(10,$imagem);
    
    
    if($query->execute()){
        move_uploaded_file($imagem_temp,"../prod/".$imagem);
        header('Location: produtos.php?s='.$stock);
        exit();
    }
    header('Location: addProduto.php?s='.$stock);
    
}

if (isset($_SESSION['yetu-debliw'])) {

    $conexao = Funcoes::conexao();

    $categoria = $conexao -> prepare("SELECT * FROM categorias");
    $categoria->execute();
    $categoriaRes = $categoria->fetchAll();

    $subcategoria = $conexao -> prepare("SELECT * FROM subcategorias");
    $subcategoria->execute();
    $subcategoriaRes = $subcategoria->fetchAll();

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
        <title>Adicionar produto</title>
    </head>
    <style>

        
    </style>
    <body>
        <div class="principal">
            <a href="index.php" class="titulo"><h2><?php echo $_GET['s'] ?></h2></a>
            <div class="principal-corpo">
                <form action="addProduto.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" value="<?php echo $_GET['s'] ?>" name="stock">
                    <label for="">Categoria</label>
                    <select name="categoria" class="form-control" style="width:100%;text-align:center;">
                        <option value="">Selecionar categória</option>
                        <?php 
                            foreach($categoriaRes as $res){ ?>
                                <option value="<?php echo $res['nome'] ?>"><?php echo $res['nome'] ?></option>
                            <?php }
                        ?>
                    </select>
                    <br>
                    <label for="">Subcategoria</label>
                    <select name="subcategoria" class="form-control" style="width:100%;text-align:center;">
                        <option value="">Selecionar subcategória</option>
                        <?php 
                            foreach($subcategoriaRes as $res){ ?>
                                <option value="<?php echo $res['nome'] ?>"><?php echo $res['nome'] ?></option>
                            <?php }
                        ?>
                    </select>
                    <br>
                    <label for="">Unidade</label>
                    <div style="display:flex;align-items:center;justify-content:space-between;background:white;padding:5px;">
                        <div style="display: inline-block;width:fit-content">
                            <input class="form-check-input" type="radio" name="unidades" id="flexRadioDefault1" value="Caixas(s)" >
                            <label class="form-check-label" for="flexRadioDefault1">
                                Caixa
                            </label>
                        </div>
                        <div style="display: inline-block;width:fit-content">
                            <input class="form-check-input" type="radio" name="unidades" id="flexRadioDefault2" value="Embalagem(s)" >
                            <label class="form-check-label" for="flexRadioDefault2">
                                Embalagem
                            </label>
                        </div>
                        <div style="display: inline-block;width:fit-content">
                            <input class="form-check-input" type="radio" name="unidades" id="flexRadioDefault3" value="Unidade(s)" checked >
                            <label class="form-check-label" for="flexRadioDefault3">
                                Unidade
                            </label>
                        </div>
                    </div>
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

