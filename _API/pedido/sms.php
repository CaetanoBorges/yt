<?php
use PHPMailer\PHPMailer\PHPMailer;
use Conta\Classes\Funcoes;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';

$enviar = Funcoes::HTTPpost("https://app.smshub.ao/api/authentication",["authId" => "160983163940495315","secretKey" => 'aNjB8hJZ1gu5NKPCNucqfLwnLhMu92i8wQgdoWPinrxDScvPTsGP62OZHCBVzagcVAnSVbkoXfK1qbLVOLGYdXa2bGMLWSH8CVlw']);
$res = (array) json_decode($enviar);
$data = (array) $res['data'];

Funcoes::enviaSMS($data['authToken'],["921797626"],"Mensagem de teste");

//$e = Funcoes::HTTPpost("https://app.smshub.ao/api/sms",["accessToken" => $data['authToken']]);
//var_dump($e);