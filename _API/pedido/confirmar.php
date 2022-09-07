<?php

use Conta\Classes\Funcoes;

require '../vendor/autoload.php';

if(isset($_POST['numero']) and !empty($_POST['numero'])){

    
    $query = Funcoes::conexao() -> prepare("SELECT * FROM sms WHERE digitos = ? AND email = ? OR numero = ? ");
    $query->bindValue(1,$_POST['numero']);
    $query->bindValue(2,$_POST['user']['email']);
    $query->bindValue(3,$_POST['user']['telefone']);
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
        $query->bindValue(6,json_encode($_POST['user']));
        if($query->execute()){
            $query = Funcoes::conexao() -> prepare("DELETE FROM sms WHERE digitos = ? AND email = ? OR numero = ? ");
            $query->bindValue(1,$_POST['numero']);
            $query->bindValue(2,$_POST['user']['email']);
            $query->bindValue(3,$_POST['user']['telefone']);
            $query->execute();
            $return['payload'] = "deletou";
            $return['ok'] = true;

            echo json_encode($return);
        }
    }

    
    
}