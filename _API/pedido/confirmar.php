<?php

use PHPMailer\PHPMailer\PHPMailer;
use Conta\Classes\Funcoes;

require '../vendor/autoload.php';

if(isset($_POST['numero']) and !empty($_POST['numero'])){
    $array = $_POST['user'];
    
    $query = Funcoes::conexao() -> prepare("SELECT * FROM sms WHERE digitos = ? AND email = ? OR numero = ? ");
    $query->bindValue(1,$_POST['numero']);
    $query->bindValue(2,$array['email']);
    $query->bindValue(3,$array['telefone']);
    $query->execute();
    $res = $query->fetchAll();

    if(count($res) > 0){
        $user = '';
        if(isset($_POST['token']) and !empty($_POST['token'])){
            $acesso = Funcoes::valid($_POST['token']);
            $user = $acesso['user'];
        }

        $carrinho = $_POST['carrinho'];

        $total = 0;
        foreach($carrinho as $val){
            $total+=$val['total'];
        }
        
        $timestamp = time();
        $query = Funcoes::conexao() -> prepare("INSERT INTO pedidos (chave_user, total, timestamp, confirmado, itens, extra) VALUES (?, ?, ?, ?, ?, ?)");
        $query->bindValue(1,$user);
        $query->bindValue(2,$total);
        $query->bindValue(3,$timestamp);
        $query->bindValue(4,0);
        $query->bindValue(5,json_encode($_POST['carrinho']));
        $query->bindValue(6,json_encode($array));
        if($query->execute()){

            $res = $array;

            $datetimeFormat = 'd-m-Y H:i:s';
            $date = new \DateTime('now', new \DateTimeZone('Africa/Luanda'));
            $date->setTimestamp($timestamp);
            $data = $date->format($datetimeFormat);
            $itens=$_POST['carrinho'];
            $qtdItens = count($itens)." item(s)";
            $produtos = '';
            foreach($itens as $key => $v){ 
                $v = (array) $v;
                $produtos.='<tr style="width: 400px;display: block;margin:0;border-bottom:1px solid black;position:relative;margin:10px">
                                <td style="width: 200px;border-right:1px solid black;"><b>Nome</b></td>
                                <td style="width: 200px;"><b>'. $v['nome'] .'</b></td>
                            </tr><tr style="width: 400px;display: block;margin:0;border-bottom:1px solid black;position:relative;margin:10px">
                                <td style="width: 200px;border-right:1px solid black;"><b>Preco</b></td>
                                <td style="width: 200px;"><b>'.number_format($v['preco'], 0, '', ' ') .' kz</b></td>
                            </tr><tr style="width: 400px;display: block;margin:0;border-bottom:1px solid black;position:relative;margin:10px">
                                <td style="width: 200px;border-right:1px solid black;"><b>Quantidade</b></td>
                                <td style="width: 200px;"><b>'. $v['qtd'] .'</b></td>
                            </tr><tr style="width: 400px;display: block;margin:0;border-bottom:1px solid black;position:relative;margin:10px">
                                <td style="width: 200px;border-right:1px solid black;"><b>Total</b></td>
                                <td style="width: 200px;"><b>'. number_format($v['total'], 0, '', ' ') .' kz</b></td>
                            </tr>';
            }

            $mailer = new PHPMailer(true);
            $corpo = file_get_contents("../Conta/emailTemplates/pedidoNovo.html");
            $corpo=str_replace("--TOTAL--",number_format($total, 0, '', ' ')." kz",$corpo);
            $corpo=str_replace("--DATA--",$data,$corpo);
            $corpo=str_replace("--ITENS--",$qtdItens,$corpo);
            $corpo=str_replace("--PRODUTOS--",$produtos,$corpo);
            $corpo=str_replace("--NOME--",$array['nome'],$corpo);
            $corpo=str_replace("--EMAIL--",$array['email'],$corpo);
            $corpo=str_replace("--TELEFONE--",$array['telefone'],$corpo);
            $corpo=str_replace("--BAIRRO--",$array['bairro'],$corpo);
            $corpo=str_replace("--RUA--",$array['rua'],$corpo);

            $totalSMS = number_format($total, 0, '', ' ')." kz";
            $SMS = 'Pedido novo de '.$qtdItens.' itens no valor de '.$totalSMS.', o número telefonico do cliente é: '.$array['telefone'].'.';
            Funcoes::enviaSMS(["924021937"],$SMS);

            $enviar = Funcoes::enviaEmail($mailer, 'lojayetu@gmail.com', "Pedido novo - YETU | ".$data, $corpo);

            $query = Funcoes::conexao() -> prepare("DELETE FROM sms WHERE digitos = ? AND email = ? OR numero = ? ");
            $query->bindValue(1,$_POST['numero']);
            $query->bindValue(2,$array['email']);
            $query->bindValue(3,$array['telefone']);
            $query->execute();
            $return['payload'] = "deletou";
            $return['ok'] = true;

            echo json_encode($return);
        }
    }

    
    
}