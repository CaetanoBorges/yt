<?php
use Conta\Classes\Criptografia;
use Conta\Classes\Funcoes;

require '../../vendor/autoload.php';

if(isset($_POST['token'])){
    
    $funcoes = new Funcoes();

    $TOKEN = $funcoes::substituiEspacoPorMais($_POST['token']);
    
    if($funcoes::tokeniza($TOKEN)){

        $conexao = $funcoes::conexao();

        $acesso = $funcoes::valid($TOKEN);

        $query = $conexao->prepare("UPDATE usuario SET nome=?, email =?, telefone = ?, bairro = ?, rua = ? WHERE id = ?");
        $query->bindValue(1, $_POST['nome']);
        $query->bindValue(2, $_POST['email']);
        $query->bindValue(3, $_POST['telefone']);
        $query->bindValue(4, $_POST['rua']);
        $query->bindValue(5, $_POST['bairro']);
        $query->bindValue(6, $acesso['user']);
        $query->execute();

        $return['payload'] = "Atualizou os dados";
        $return['ok'] = true;

        echo json_encode($return);

    }else{
        $return['payload'] = "Erro";
        $return['ok'] = false;

        echo json_encode($return);

    }

}

?>