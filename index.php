<?php
    include_once("conexao.php");
    include_once("processo.php");

    if(isset($_SESSION)){
        session_destroy();
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
                    <h2><a href="index.php"><img src="imgs/WhatsApp Image 2022-02-22 at 22.58.11.jpeg" alt=""></a></h2>
                </div>
                <div>
                    <a href="login.php"><img src="imgs/imagem-do-usuario-com-fundo-preto.png" alt=""><p>Acesse a conta</p></a>
                    <!-- <a href="carrinho.php"><img src="imgs/carrinho-de-compras-de-design-xadrez.png" alt=""><p>Meu Carrinho</p></a> -->
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
            <a href="pagProduto.php?id=<?php echo $hd["id"];?>">
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
            <a href="pagProduto.php?id=<?php echo $computer["id"];?>">
                <div class="unidade-produtos">
                    <img src="imgs/<?= $computer["arquivo"]; ?>" alt="">
                    <p><?= $computer["nome"] ?></p>
                    <p>A vista</p>
                    <p>R$<?= $computer["valor"] ?></p>
                    <!-- <a href="login.php"><button class="botoes">Comprar</button></a> -->
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    

    </main>



</body>
</html>