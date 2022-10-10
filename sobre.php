<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("_partes/css.php") ?>
    <title>Quem somos</title>
</head>
<style>
    .dispensa{width: 100px;display: block;margin: 30px auto 15px auto;}
    .border{border:1px solid #ff0000;border-radius: 0;}
</style>
<body>
    <?php
        include("_partes/header.php");
     ?>


    <div class="yetu-body">
        <img src="_icones/dispensa-familia.png" class="dispensa">
        <p style="text-indent: 20px;">Somos uma empresa centrada no consumidor, confiável e segura de realizar suas compras no Lubango. Somos uma das maiores lojas de comércio online, e chegamos com os melhores preços do mercado e com uma grande variedade de produtos. Além disso, a  temos um acompanhamento pós-venda incomparável.
        </p>

        <div>
            <br><br><br>
            <h4>ENTRAR EM CONTACTO</h4>
            <form action="_API/contacto.php" method="post">
            <input type="text" name="nome" placeholder="O seu nome" class="btn btn-default border form-control" required="required" style="width: 97.3%;"> <br>
            <input type="number" name="telefone" placeholder="O seu telefone" class="btn btn-default border form-control" required="required" style="width: 97.3%;"> <br>
            <textarea name="mensagem" cols="30" rows="10"  placeholder="A sua mensagem" class="btn btn-default border form-control" required="required" style="width: 97.3%;"></textarea>
            <br>
            <button type="submit" class="btn btn-danger border form-control">ENVIAR MENSAGEM</button>
        </form>
        </div>
        <br> <br> <br>
    </div>
     
           
    <?php
        include("_partes/pes.php");
    ?>

    <?php include("_partes/script.php") ?>

    
     <script>
       
     </script>
</body>
</html>