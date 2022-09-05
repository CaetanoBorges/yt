<?php

use Minishlink\WebPush\VAPID;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;
use Conta\Classes\Funcoes;

require '../vendor/autoload.php';

if(isset($_POST['user']) and !empty($_POST['user'])){
     
    $vapid = (array) json_decode(file_get_contents("vapid.json"));

    $webPush = new WebPush([
        "VAPID" => [
            "subject" => $vapid['subject'],
            "publicKey" => $vapid['publicKey'],
            "privateKey" => $vapid['privateKey']
        ]
    ]);

    $query = Funcoes::conexao() -> prepare("SELECT * FROM push WHERE chave_user = ?");
    $query->bindValue(1,$_POST['user']);
    $query->execute();
    $resPush = $query->fetch();



    $subscription = Subscription::create([
        "endpoint" => $resPush['endpoint'],
        "contentEncoding" => "aesgcm",
        "authToken" => $resPush['authtoken'],
        "keys" => [
            "auth" => $resPush['authtoken'],
            "p256dh" => $resPush['p256dh']
        ]
    ]);
    $result = $webPush -> sendOneNotification(
        $subscription,
        json_encode([
            "title" => $_POST['titulo'],
            "body" => $_POST['mensagem'],
            "icon" => "_icones/logo.png",
            "image" => "_icones/logo.png",
            "data" => "1",
            "actions" => [
                [
                    "title" => "Abrir",
                    "action" => "Abrir"
                ],
                [
                    "title" => "Fechar",
                    "action" => "Fechar"
                ]
            ]
        ])
    );

    if ($result -> isSuccess()) {
        header('Location: ../../Administrar/usuarios.php?u='.$_POST['user']);
        exit();
    }
    else {
        
        ?>
            <div style="display: block;margin:100px auto;width: 200px;font-size:30px">
                O usuario desativou as notificações.<br>
                Só poderá ser notificado depois de as ativar novamente.
                <br><br>
                <a href="../../Administrar/usuarios.php?u=<?php echo $_POST['user'] ?>"> Click aqui para voltar</a>
            </div>
        <?php
        // something went wrong
        error_log($result -> getReason());
    
        // provides raw HTTP response data
        //error_log($result -> getResponse());
    
    }
}