<?php
    include_once("conexao.php");
    include_once("processo.php");

    // if(isset($_SESSION)){
    //     session_destroy();
    // }

    if(!isset($_SESSION["nome"])){
        die("Você não pode acessar a pagina no momento!<a href='index.php'>Volte para a home!</a>");
    }
    
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>BsTech</title>
</head>
<body>
    <header>
        <nav>
            <div class="navbar">
            <div class="logo">
                    <h2><a href="loginSucesso.php"><img src="imgs/WhatsApp Image 2022-02-22 at 22.58.11.jpeg" alt=""></a></h2>
                </div>
                <div> <img src="imgs/imagem-do-usuario-com-fundo-preto.png" alt="">
                <p>Olá, <?= $_SESSION["nome"]; ?><br><a href="logout.php">Sair</a></p>
                </div>
            </div>
        </nav>
    </header>
    
    <main>
        <div>
                <h1>Produtos</h1>
            </div> 
            <div class="titulo">
                <h2>HD EXTERNO</h2>
            </div>

        <div class="conteudo">
            <?php foreach($Hds as $hd): ?>
            <a href="pagProdutoLogado.php?id=<?php echo $hd["id"];?>">
                <div class="unidade-produtos">
                    <img src="imgs/<?= $hd["arquivo"]; ?>" alt="">
                    <p><?php echo $hd["nome"]; ?> </p>
                    <p>A vista</p>
                    <p>R$<?php echo $hd["valor"]; ?></p>
                </div>
            </a>
              
         <?php endforeach; ?>
        </div>


        <div class="titulo">
                <h2>COMPUTADORES GAMERS</h2>
            </div>
        <div class="conteudo">
            <?php foreach($computadores as $computer): ?>
            <a href="pagProdutoLogado.php?id=<?php echo $computer["id"];?>">
                <div class="unidade-produtos">
                    <img src="imgs/<?= $computer["arquivo"]; ?>" alt="">
                    <p><?= $computer["nome"] ?></p>
                    <p>A vista</p>
                    <p>R$<?= $computer["valor"] ?></p>
                    
                </div>
            </a>
            
            <?php endforeach; ?>
        </div>
    

    </main>



</body>
</html>