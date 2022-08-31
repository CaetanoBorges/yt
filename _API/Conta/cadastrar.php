<?php
namespace ContaAPI;

use PHPMailer\PHPMailer\PHPMailer;
use ContaAPI\Classes\Criptografia;
use ContaAPI\Classes\Cadastrar;
use ContaAPI\Classes\Entrar;
use ContaAPI\Classes\Funcoes;


use ContaAPI\Classes\DB\Selecionar;
use ContaAPI\Classes\DB\AX;

//Load Composer's autoloader
require '../vendor/autoload.php';


if(isset($_POST["json"])){
    
    $funcoes = new Funcoes();
    $conexao = $funcoes::conexao();
    $json = $_POST["json"];
    $array = (array) json_decode($json);
    /* ARRAY FIELDS
    $array['nome'] = $_POST['nome'];
    $array['email'] = $_POST['email'];
    $array['apelido'] = $_POST['apelido'];
    $array['dia'] = $_POST['dia'];
    $array['mes'] = $_POST['mes'];
    $array['ano'] = $_POST['ano'];
    $array['palavra_passe'] = $_POST['palavra_passe'];
    $array['genero'] = $_POST['genero'];
    $array['telefone'] = $_POST['telefone'];
    */
    #var_dump($array);
    $db = new Selecionar($conexao);
    $init = new Cadastrar($db,$array, $funcoes);
     

    if($init->cadastrar()){

        $init = new Entrar($db, $array['email'], $array['palavra_passe']);
        if($init->login()){
            $mailer = new PHPMailer(true);
            $copy = '&copy;';
            $corp = file_get_contents("emailTemplates/boasVindas.html");
            $corpo=str_replace("--COPYRIGHT--",$copy." ".date("Y"),$corp);
            $enviar = $funcoes::enviaEmail($mailer, $array['email'], "Seja benvindo/a, Binga.", $corpo);


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
        $return['payload'] = "Erro, já existe um usuário com esse email";
        $return['ok'] = false;

        echo json_encode($return);
    }
    
}else{

}
