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
                $produtos.='<div style="width: 100%;display:block;position:relative;">'
                    .'<p stayle="margin:0;font-size:14px;">Nome: <b>'. $v['nome'] .'</b></p>'
                    .'<p stayle="margin:0;font-size:14px;">Preco: <b>'.number_format($v['preco'], 0, '', ' ') .' kz</b></p>'
                    .'<p stayle="margin:0;font-size:14px;">Quantidade: <b>'. $v['qtd'] .'</b></p>'
                    .'<p stayle="margin:0;font-size:14px;">Total: <b>'. number_format($v['total'], 0, '', ' ') .' kz</b></p>'
                .'</div>'
                .'<hr>';
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
            $enviar = Funcoes::enviaEmail($mailer, 'cbcaetanoborges@gmail.com', "Pedido novo - YETU | ".$data, $corpo);

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