<?php
use PHPMailer\PHPMailer\PHPMailer;
use Conta\Classes\Funcoes;

require '../vendor/autoload.php';

if(isset($_POST['numero']) and !empty($_POST['numero'])){

    $digitos = Funcoes::seisDigitos();

    $query = Funcoes::conexao() -> prepare("SELECT * FROM sms WHERE numero = ? OR email = ?");
    $query->bindValue(1,$_POST['numero']);
    $query->bindValue(2,$_POST['email']);
    $query->execute();
    $res = $query->fetchAll();
    if(count($res) > 0){
        $query = Funcoes::conexao() -> prepare("UPDATE sms SET digitos = ? WHERE numero = ? OR email = ?");
        $query->bindValue(1,$digitos);
        $query->bindValue(2,$_POST['numero']);
        $query->bindValue(3,$_POST['email']);
        $query->execute();
        $mailer = new PHPMailer(true);
        $corp = file_get_contents("../Conta/emailTemplates/confirmarPedido.html");
        $corpo=str_replace("--NUMERO--",$digitos,$corp);
        if(isset($_POST['email']) and !empty($_POST['email'])){
            $enviar = Funcoes::enviaEmail($mailer, $_POST['email'], "Confirmar pedido-YETU. ( ".$digitos." )", $corpo);
        }
        
        
        $return['payload'] = "Certo";
        $return['ok'] = true;
        echo json_encode($return);
        return;
    }

    $query = Funcoes::conexao() -> prepare("INSERT INTO sms (email, numero, digitos) VALUES (?, ?, ?)");
    $query->bindValue(1,$_POST['email']);
    $query->bindValue(2,$_POST['numero']);
    $query->bindValue(3,$digitos);
    $query->execute();
    $mailer = new PHPMailer(true);
    $corp = file_get_contents("../Conta/emailTemplates/confirmarPedido.html");
    $corpo=str_replace("--NUMERO--",$digitos,$corp);
    $enviar = Funcoes::enviaEmail($mailer, $_POST['email'], "Confirmar pedido-YETU. ( ".$digitos." )", $corpo);

    $return['payload'] = "Certo";
    $return['ok'] = true;
    echo json_encode($return);
}