<?php

use Conta\Classes\Criptografia;
use Conta\Classes\Entrar;
use Conta\Classes\Funcoes;
use Conta\Classes\DB\Selecionar;
use Conta\Classes\DB\AX;

require '../vendor/autoload.php';

if(isset($_POST['json'])){
    $funcoes = new Funcoes(); //

    $json = (array) json_decode($_POST['json']); // JSON com {email: ..., palavra_passe:...}
    $email = $json['email'];
    $palavra_passe = $json['palavra_passe'];

    $conexao = $funcoes::conexao(); //Pega a conexão com a base de dados

    $db = new Selecionar($conexao); //Inicializa o QueryBuilder


    $init = new Entrar($db /* (QueryBuilder & PDO) */, $email, $palavra_passe);
    

    if($init->login()){
        $credencial['user']=$init->getUser();
        $credencial['email']=$init->getEmail();

        $credencial = json_encode($credencial);
        
        $cript = new Criptografia();
        $chave_sms_real = $cript->fazChave();
        $chave_sms = $cript->criptChave($chave_sms_real);

        $sms = $cript->encrypt($credencial,$chave_sms_real);

        $return['payload'] = $sms.'.'.$chave_sms;
        $return['ok'] = true;

        echo json_encode($return);

        //echo $sms.'.'.$chave_sms;

    }else{
        $return['payload'] = "Erro, credenciais errados";
        $return['ok'] = false;

        echo json_encode($return);
    }
    
}else{

}