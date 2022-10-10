<?php
use PHPMailer\PHPMailer\PHPMailer;
use Conta\Classes\Funcoes;

require 'vendor/autoload.php';

if(isset($_POST['nome']) and !empty($_POST['telefone'])){

    
    $mensagem = 'Nome: '.$_POST['nome'].'<br>';
    $mensagem .= 'Telefone: '.$_POST['telefone'].'<br>';
    $mensagem .= 'Mensagem: '.$_POST['mensagem'];
    $mailer = new PHPMailer(true);
    $enviar = Funcoes::enviaEmail($mailer, 'cbcaetanoborges@gmail.com', "Mensagem nova ".date('d m Y m:i'), $mensagem);

   header('Location: ../ ');
}