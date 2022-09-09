<?php
namespace Conta;
use PHPMailer\PHPMailer\PHPMailer;
use Conta\Classes\Funcoes;
session_start();

require '../_API/vendor/autoload.php';


$conexao = Funcoes::conexao();
if(isset($_POST['id']) and !empty($_POST['id'])){

    $id=$_POST['id'];

    $query = $conexao -> prepare("UPDATE pedidos SET confirmado = ? WHERE id = ?");
    $query->bindValue(1,true);
    $query->bindValue(2,$id);
    
    if( $query->execute() ){


        $query = $conexao -> prepare("SELECT * FROM pedidos WHERE id = ? ");
        $query->bindValue(1,$id);
        $query->execute();
        $resPedido = $query->fetch();

        $res = (array) json_decode($resPedido['extra']);

        $datetimeFormat = 'd-m-Y H:i:s';
        $date = new \DateTime('now', new \DateTimeZone('Africa/Luanda'));
        $date->setTimestamp($resPedido['timestamp']);
        $data = $date->format($datetimeFormat);
        $itens=json_decode($resPedido['itens']);
        $qtdItens = count($itens)." item(s)";
        $produtos = '';
        foreach($itens as $key => $v){ 
            $v = (array) $v;
            $produtos.='<div style="width: 100%;display:block;position:relative;">'
                .'<p stayle="margin:0;font-size:14px;">Nome: <b>'. $v['nome'] .'</b></p>'
                .'<p stayle="margin:0;font-size:14px;">Preco: <b>'.number_format($v['preco'], 0, '', ' ') .' kz</b></p>'
                .'<p stayle="margin:0;font-size:14px;">Quantidade: <b>'. $v['qtd'] .'</b></p>'
                .'<p stayle="margin:0;font-size:14px;">Total: <b>'. number_format($v['total'], 0, '', ' ') .' kz</b></p>'
            .'</div>'
            .'<hr>';
         }

        $mailer = new PHPMailer(true);
        $corpo = file_get_contents("../_API/Conta/emailTemplates/pedidoConfirmado.html");
        $corpo=str_replace("--TOTAL--",number_format($resPedido['total'], 0, '', ' ')." kz",$corpo);
        $corpo=str_replace("--DATA--",$data,$corpo);
        $corpo=str_replace("--ITENS--",$qtdItens,$corpo);
        $corpo=str_replace("--PRODUTOS--",$produtos,$corpo);
        $enviar = Funcoes::enviaEmail($mailer, $res['email'], "Pedido Confirmado - YETU | ".$data, $corpo);

        header('Location: pedidos.php');
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
        <title>Pedidos</title>
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
                        $resUser = (array) json_decode($value['extra']);
                        ?>
                        <div  style="background: none;">
                            <h3 style="cursor: pointer;padding:10px;color:black;background:red;border-radius:7px;" data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $key ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $key ?>"><?php echo number_format($value['total'], 0, '', ' '); ?> kz</h3>
                            <h6 style="cursor: pointer;padding:5px;color:white;background:green;border-radius:3px;" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key ?>" aria-expanded="false" aria-controls="collapse<?php echo $key ?>">DETALHES DO CLIENTE</h6>
                            <div class="collapse card card-body" id="collapse<?php echo $key ?>">
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
                                        <form action="pedidos.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                            <button type="button" class="btn btn-danger form-control" style="width:100% !important;"  data-bs-toggle="collapse" data-bs-target="#collapseExamplee<?php echo $value['id'] ?>" aria-expanded="false" aria-controls="collapseExamplee<?php echo $value['id'] ?>">CONFIRMAR</button>
                                          
                                            <div class="collapse" id="collapseExamplee<?php echo $value['id'] ?>">
                                                    <div class="card card-body">
                                                        <button type="submit" class="btn btn-danger">CONFIRMAR MESMO</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#collapseExamplee<?php echo $value['id'] ?>" aria-expanded="false" aria-controls="collapseExamplee<?php echo $value['id'] ?>">NÃO</button>
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
