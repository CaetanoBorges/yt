<?php
namespace Conta;

use PHPMailer\PHPMailer\PHPMailer;
use Conta\Classes\Criptografia;
use Conta\Classes\Cadastrar;
use Conta\Classes\Entrar;
use Conta\Classes\Funcoes;


use Conta\Classes\DB\Selecionar;
use Conta\Classes\DB\AX;

//Load Composer's autoloader
require '../vendor/autoload.php';


if(isset($_POST["json"])){
    
    $funcoes = new Funcoes();
    $conexao = $funcoes::conexao();
    $json = $_POST["json"];
    $array = (array) json_decode($json);

    /* ARRAY FIELDS */
    #var_dump($array);

    $db = new Selecionar($conexao);
    $init = new Cadastrar($db,$array, $funcoes);
     

    if($init->cadastrar()){

        $init = new Entrar($db, $array['email'], $array['palavra_passe']);
        if($init->login()){
            $mailer = new PHPMailer(true);
            $corp = file_get_contents("emailTemplates/boasVindas.html");
            $corpo=str_replace("--contacto--","999 999 999",$corp);
            $enviar = $funcoes::enviaEmail($mailer, $array['email'], "Seja benvindo/a, YETU.", $corpo);


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
