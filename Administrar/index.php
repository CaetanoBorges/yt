<?php
namespace Conta;
use Conta\Classes\Funcoes;
session_start();

require '../_API/vendor/autoload.php';

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
        <title>Luminaria</title>
    </head>
    <style>

        
    </style>
    <body>
        <div class="principal">
            <a href="" class="titulo"><h2>LUMINÁRIA</h2></a>
            <div class="menu">
                <a href="stocks.php"><div class="menu-item">
                    <img src="_arq/produt.svg">
                    <h3>Stoques</h3>
                </div></a>
                <a href="categorias.php"><div class="menu-item">
                    <img src="_arq/cat.svg">
                    <h3>Categorias</h3>
                </div></a>
                <a href="subcategorias.php"><div class="menu-item">
                    <img src="_arq/sub.svg">
                    <h3>Subcategorias</h3>
                </div></a>
                <a href="sugestoes.php"><div class="menu-item">
                    <img src="_arq/sugest.svg">
                    <h3>Sugestões</h3>
                </div></a>
                <a href="pedidos.php"><div class="menu-item">
                    <img src="_arq/pedidos.svg">
                    <h3>Pedidos</h3>
                </div></a>
                <a href="usuarios.php"><div class="menu-item">
                    <img src="_arq/usuarios.svg">
                    <h3>Usuarios</h3>
                </div></a>
            </div>
        </div>
    </body>
    </html>
    <?php
}else{


    if (isset($_POST['username'], $_POST['password'])) {
     	# code...
        $conexao = Funcoes::conexao();
     	$nome=$_POST['username'];
     	$passe=Funcoes::fazHash($_POST['password']);
     	if (empty($nome) or empty($passe)) {
     		# code...
     		$error ="Todos campos são necessários";
     	}else{
     		$query = $conexao -> prepare("SELECT * FROM luminaria WHERE email = ? and senha = ?");
     		$query->bindValue(1, $nome);
     		$query->bindValue(2, $passe);
     		$query->execute();
     		$num = $query -> rowCount();
     		if ($num > 0 ) {
     			# code...
     			$_SESSION['yetu-debliw']=True;
     			header('Location:index.php');
     			exit();
     		}else{
     			$error="Erro nas credenciais";
     		}
     	}
    }


    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../_arq/bootstrap.min.css">
        <title>Home</title>
    </head>
    <style>
        .entrar{display: block;width:300px;margin:100px auto;}
        .entrar img{display: block;margin:0 auto;}
    </style>
    <body>
        
        <div class="entrar">
            <img src="../_icones/logo.png" alt="">
            <form action="index.php"  method="post" autocomplete="off">
                <input type="email" name="username" class="form-control btn-default"><br>
                <input type="password" name="password" class="form-control btn-default"><br>
                <?php 
                
                if(isset($error)) { echo "oOh "; ?>
                    <small style="color: #aa0000;"><h3><?php echo $error;?></h3></small>
                <br>       
                <?php } ?>
                <button class="btn btn-danger" type="submit">ENTRAR</button>
            </form>
            
        </div>


    <script src="../_arq/jquery.js"></script>
    <script src="../_arq/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
}

?>

