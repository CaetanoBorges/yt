<?php
namespace Conta;
use Conta\Classes\Funcoes;
session_start();

require '../_API/vendor/autoload.php';


    $conexao = Funcoes::conexao();
if(isset($_POST['id']) and !empty($_POST['id'])){

    $id=$_POST['id'];
    $user=$_POST['user'];

    $query = $conexao -> prepare("UPDATE pedidos SET confirmado = ? WHERE id = ? AND chave_user = ?");
    $query->bindValue(1,true);
    $query->bindValue(2,$id);
    $query->bindValue(3,$user);
    
    if( $query->execute() ){
        header('Location: compras.php?u='.$user);
        exit();
    }
    
}

if (isset($_SESSION['yetu-debliw'])) {

    
    $query = $conexao -> prepare("SELECT * FROM pedidos WHERE confirmado = ?");
    $query->bindValue(1,false);
    $query->execute();
    $resPedidos = $query->fetchAll();

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
        <title>Compras</title>
    </head>
    <style>
    .principal-corpo{width: 90%;display: block;padding: 5%;background-color: #ddd;}
    .principal-corpo a{color:black;text-decoration: none;}
    .principal-corpo a:hover{color:red;}
    .item{margin:0}
    </style>
    <body>
        <div class="principal">
            <a href="index.php" class="titulo"><h2>PEDIDOS</h2></a>
            <div class="principal-corpo">
                <br>

                <?php
                    echo "<p>".count($resPedidos)." Pedido(s)</p><br>";
                    //echo (Funcoes::fazHash('123456'));
                    ?>
                    <div class="card card-body">
                    <?php
                    foreach($resPedidos as $key => $value){ 
                        $query = $conexao -> prepare("SELECT * FROM usuario WHERE id = ?");
                        $query->bindValue(1,$value['chave_user']);
                        $query->execute();
                        $resUser = $query->fetch();
                        ?>
                        <div  style="background: none;">
                            <h3 style="cursor: pointer;padding:10px;color:black;background:red;border-radius:7px;" data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $key ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $key ?>"><?php echo number_format($value['total'], 0, '', ' '); ?> kz</h3>
                            <div class="card card-body">
                                <p class="item">Nome: <b><?php echo $resUser['nome'] ?></b></p>
                                <p class="item">Telefone: <b><?php echo $resUser['telefone'] ?></b></p>
                                <p class="item">Email: <b><?php echo $resUser['email'] ?></b></p>
                                <p class="item">Bairro: <b><?php echo $resUser['bairro'] ?></b></p>
                                <p class="item">Rua: <b><?php echo $resUser['rua'] ?></b></p>
                            </div>
                            <div class="collapse card card-body" id="collapseExample<?php echo $key ?>">
                                <?php
                                    $datetimeFormat = 'd-m-Y H:i:s';

                                   // $date = new \DateTime();
                                    // If you must have use time zones
                                    $date = new \DateTime('now', new \DateTimeZone('Africa/Luanda'));
                                    $date->setTimestamp($value['timestamp']);
                                    echo $date->format($datetimeFormat)."<br>";
                                    $itens=json_decode($value['itens']);
                                    echo count($itens)." item(s)<br><br>";
                                    foreach($itens as $key => $v){ 
                                        $v = (array) $v;
                                        ?>
                                        <div style="width: 100%;display:block;position:relative;">   
                                            <img src="../prod/<?php echo $v['img'] ?>" style="position:absolute;width:110px;top:0;right:0;">
                                            <p class="item">Nome: <b><?php echo $v['nome'] ?></b></p>
                                            <p class="item">Preco: <b><?php echo number_format($v['preco'], 0, '', ' ') ?> kz</b></p>
                                            <p class="item">Quantidade: <b><?php echo $v['qtd'] ?></b></p>
                                            <p class="item">Total: <b><?php echo number_format($v['total'], 0, '', ' ') ?> kz</b></p>
                                        </div>
                                        <hr>
                                    <?php }
                                ?>
                                <?php
                                    if($value['confirmado']){?>
                                        <p class="btn btn-success" >CONFIRMADO</p>
                                    <?php }else{?>
                                        <form action="compras.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                            <input type="hidden" name="user" value="<?php echo $value['chave_user'] ?>">
                                            <button type="button" class="btn btn-danger form-control" style="width:100% !important;"  data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $value['id'] ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $value['id'] ?>">CONFIRMAR</button>
                                          
                                            <div class="collapse" id="collapseExample<?php echo $value['id'] ?>">
                                                    <div class="card card-body">
                                                        <button type="submit" class="btn btn-danger">CONFIRMAR MESMO</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $value['id'] ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $value['id'] ?>">NÃO</button>
                                                    </div>
                                            </div>

                                        </form>
                                    <?php }
                                ?>
                            </div>
                        </div><br>
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
