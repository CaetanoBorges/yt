 <?php

use Conta\Classes\Criptografia;
use Conta\Classes\Funcoes;

require '../vendor/autoload.php';

$funcoes = new Funcoes();
$conexao = $funcoes::conexao();

      
$query = $conexao->prepare("SELECT * FROM produto WHERE slide != ''");
$query->execute();
$re = $query->fetchAll();

$return['payload'] = json_encode($re);
$return['ok'] = true;

echo json_encode($return);