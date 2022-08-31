<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("_partes/css.php") ?>
    <link rel="stylesheet" href="_css/conta.css">
    <title>Conta</title>
</head>
<style>
    
</style>
<body>
    <?php
        include("_partes/header.php");
     ?>


    <div class="yetu-body">
        <div class="cliente">
            <div class="cliente-nome">
                <p class="nome-ver nome-user"></p>
                <img src="_icones/btn-minhas-compras.png" class="btn-compras" onclick="irMinhasCompras()">
            </div>
            <div class="clear"></div>
            <div class="info">
                <h3>Localização</h3>
                <table>
                    <tr>
                        <td class="faded">Bairro: </td>
                        <td class="bairro-user"> </td>
                    </tr>
                    <tr>
                        <td class="faded">Rua: </td>
                        <td class="rua-user"></td>
                    </tr>
                </table>
            </div>
            <div class="clear"></div>
            <div class="clear"></div>
            <div class="clear"></div>
            <div class="info">
                <h3>Contactos</h3>
                <table>
                    <tr>
                        <td class="faded">Email: </td>
                        <td class="email-user"></td>
                    </tr>
                    <tr>
                        <td class="faded">Telefone: </td>
                        <td class="telefone-user"></td>
                    </tr>
                </table>
            </div>
            <div class="clear"></div>
            <div class="clear"></div>
            <div class="clear"></div>
            <div class="clear"></div>
           
           <a href="#" data-bs-toggle="modal" data-bs-target="#editarmodal"><img src="_icones/btn-edita-perfil.png" alt="" class="btn-acao"></a>
           <a href="#" data-bs-toggle="modal" data-bs-target="#passemodal"><img src="_icones/btn-mudar-passe.png" alt="" class="btn-acao"></a>

        </div>
        <br><br><br><br><br><br><br>
        <div class="modal fade" id="editarmodal" tabindex="-1" aria-labelledby="editarmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">

                <div class="modal-header">
                    <h2 style="display:block;margin:0 auto;font-size:32px">Editar dados</h2>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body">
                    <div class="cliente-form">
                        <div>
                            <p>Nome completo</p>
                            <input type="text" id="nome-user">
                        </div>
                        <div>
                            <p>Rua</p>
                            <input type="text" id="rua-user">
                        </div>
                        <div>
                            <p>Bairro</p>
                            <input type="text" id="bairro-user">
                        </div>
                        <div>
                            <p>Email</p>
                            <input type="email" id="email-user"> 
                        </div>
                        <div>
                            <p>Telefone</p>
                            <input type="text" id="telefone-user">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <img src="_icones/btn-edita-perfil.png" class="btn-acao centrar">
                </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="passemodal" tabindex="-1" aria-labelledby="passemodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">

                <div class="modal-header">
                    <h2 style="display:block;margin:0 auto;font-size:32px">Mudar palavra passe</h2>
                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                </div>
                <div class="modal-body">
                    <div class="cliente-form">
                        <div>
                            <p>Palavra passe antiga</p>
                            <input type="password">
                        </div>
                        <div>
                            <p>Palavra passe nova</p>
                            <input type="password">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <img src="_icones/btn-mudar-passe.png" alt="" class="btn-acao centrar">
                </div>
                </div>
            </div>
        </div>


    </div>
     
           
    <?php
        include("_partes/pes.php");
    ?>

    <?php include("_partes/script.php") ?>
    <script src="_js/paginas/conta.js"></script>
    
     <script>
       
     </script>
</body>
</html>