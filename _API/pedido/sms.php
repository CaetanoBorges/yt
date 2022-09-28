<?php
use PHPMailer\PHPMailer\PHPMailer;
use Conta\Classes\Funcoes;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';


Funcoes::enviaSMS(["921797626"],"Mensagem de Nova");

//$e = Funcoes::HTTPpost("https://app.smshub.ao/api/sms",["accessToken" => $data['authToken']]);
//var_dump($e);<<<