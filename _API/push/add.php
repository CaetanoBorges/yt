<?php

use Conta\Classes\Funcoes;

require '../vendor/autoload.php';

if(isset($_POST['endpoint']) and !empty($_POST['endpoint'])){


    if(isset($_POST['token']) and !empty($_POST['token'])){
        $acesso = Funcoes::valid($_POST['token']);
        
        $query = Funcoes::conexao() -> prepare("SELECT * FROM push WHERE chave_user = ?");
        $query->bindValue(1,$acesso['user']);
        $query->execute();
        $res = $query->fetchAll();

        if(count($res) > 0){
            $query = Funcoes::conexao() -> prepare("UPDATE push SET authtoken = ?, p256dh = ?, endpoint = ? WHERE chave_user = ?");
            $query->bindValue(1,$_POST['auth']);
            $query->bindValue(2,$_POST['pdh']);
            $query->bindValue(3,$_POST['endpoint']);
            $query->bindValue(4,$acesso['user']);
            $query->execute();
            
        }else{
            $query = Funcoes::conexao() -> prepare("INSERT INTO push (chave_user, authtoken, p256dh, endpoint) VALUES(?, ?, ?, ?)");
            $query->bindValue(1,$acesso['user']);
            $query->bindValue(2,$_POST['auth']);
            $query->bindValue(3,$_POST['pdh']);
            $query->bindValue(4,$_POST['endpoint']);
            $query->execute();
        }
        return;
    }

    $query = Funcoes::conexao() -> prepare("INSERT INTO push (authtoken, p256dh, endpoint) VALUES(?, ?, ?, ?)");
    $query->bindValue(1,$_POST['auth']);
    $query->bindValue(2,$_POST['pdh']);
    $query->bindValue(3,$_POST['endpoint']);
    $query->execute();
}