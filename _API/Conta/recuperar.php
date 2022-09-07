<?php
namespace Conta;

use PHPMailer\PHPMailer\PHPMailer;
use Conta\Classes\Criptografia;
use Conta\Classes\Recuperar;
use Conta\Classes\Entrar;
use Conta\Classes\Funcoes;
use Conta\Classes\DB\Selecionar;
use Conta\Classes\DB\AX;

require '../vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


if(isset($_POST['email'])){

    $funcoes = new Funcoes();
    $db=new Selecionar($funcoes::conexao());

    $recuperar = new Recuperar($db);
    $email = $_POST['email'];

    $verificar = $recuperar->verificaEmail($email);

    if($verificar){
        $mailer = new PHPMailer(true);
        $numero = $funcoes::seisDigitos();
        $corp = file_get_contents("emailTemplates/numeroRecuperacao.html");
        $cor=str_replace("--codigo--",$numero,$corp);
        $corpo=str_replace("--endereco--","Mapunda de baixo rsrs",$cor);
        $enviar = $funcoes::enviaEmail($mailer, $email, "Recuperação de palavra passe", $corpo);

        if($enviar){
            $recuperar->selecionaNumeroDeRecuperacao($email, $numero);
            $res['ok'] = true;
            $res['payload'] = "Número de verificação enviado"; 
            echo json_encode($res);
        }else{

            
            $res['ok'] = false;
            $res['payload'] = "Ocorreu um erro inexperado";
            echo json_encode($res);

        }

    }else{
        $res['ok'] = false;
        $res['payload'] = "Esse mail não se encontra na base de dados.";
        echo json_encode($res);
    }

}