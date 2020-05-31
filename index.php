<!DOCTYPE html>
<?php
    session_start();
    $_SESSION['aviso'] = "<p>200 PACOTES DE AUDIO<br>PARA ESTOURAR SEU BEAT!</p>";
    $_SESSION['aviso2'] = "<p>VOCE RECEBERA UM LINK NO EMAIL<br>PARA FAZER O DOWNLOAD!</p>";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="shortcut icon" href="./images/gbeats.png" type="image/x-icon">
    <title>GBeats</title>
</head>
<body>
    <div class="logo">
        <img src="./images/logo1.png" alt="Logo GBeats">
    </div>
   
    <div class="imageMain"><img src="./images/fundo.png" alt=""></div>

    <div class="textDescripition">
        <?php
            if(isset($_SESSION['avisoOk'])){
                echo($_SESSION["aviso2"]);
            }else{
                echo($_SESSION["aviso"]);
            }
            session_destroy();
            
        ?>
    </div>

    <div class="form-wrapper">
        
        <form class="form-email" action="enviaEmail.php" method="post">
            <img src="./images/gbeats.png" alt="Logo GBeats">
            <input type="text" name="nome" placeholder="Nome">
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="profissao" placeholder="Profissao">
            <input type="submit" value="BAIXAR">
        </form>
    </div>

   
    
</body>
</html>