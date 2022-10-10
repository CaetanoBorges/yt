 <?php

use Conta\Classes\Criptografia;
use Conta\Classes\Funcoes;

require '../vendor/autoload.php';

$funcoes = new Funcoes();
$conexao = $funcoes::conexao();

      
$query = $conexao->prepare("SELECT * FROM produto WHERE slide != ''");
$query->execute();
$re = $query->fetchAll();

$query = $conexao->prepare("SELECT * FROM cestas WHERE slide != ''");
$query->execute();
$reC = $query->fetchAll();

$result = array_merge($re, $reC);

$return['payload'] = json_encode($result);
$return['ok'] = true;

echo json_encode($return);