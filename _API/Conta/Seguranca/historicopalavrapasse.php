<?php

use ContaAPI\Classes\Criptografia;
use ContaAPI\Classes\Funcoes;

require '../../vendor/autoload.php';

if(isset($_GET['token'])){
    
    $funcoes = new Funcoes();

    $TOKEN = $funcoes::substituiEspacoPorMais($_GET['token']);
    
    if($funcoes::tokeniza($TOKEN)){

        $conexao = $funcoes::conexao();

        $acesso = $funcoes::valid($TOKEN);
      
        $query = $conexao->prepare("SELECT * FROM historicopalavrapasse WHERE chave_user = ?");
        $query->bindValue(1, $acesso['user']);
        $query->execute();
        $re = $query->fetchAll();
        rsort($re);
        $return['payload'] = json_encode($re);
        $return['ok'] = true;

        echo json_encode($return);

    }else{
        $return['payload'] = "Erro";
        $return['ok'] = false;

        echo json_encode($return);

    }

}