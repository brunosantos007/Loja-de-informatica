<?php
    include_once("conexao.php");
    include_once("processo.php");
    include_once("efetuadoSucesso.php");

    if(!isset($_SESSION["nome"])){
        die("Você não pode acessar a pagina no momento!<a href='index.php'>Volte para a home!</a>");
    }

    if(!empty($id)){
        $contacts = [];

        $query = "SELECT * FROM produtos WHERE nome LIKE 'HD%'";
        $query2 = "SELECT * FROM produtos WHERE nome LIKE 'COMPUTADOR%'";

        $stmt = $conexao->prepare($query);
        $stmt2 = $conexao->prepare($query2);
        $stmt->execute();
        $stmt2->execute();
        Global $Hds;
        $Hds = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $computadores = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    }

    if(isset($_SESSION)){
    
        $query = "SELECT produtos_comprados FROM usuario WHERE nome = :nome";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(":nome",$nome);
        $stmt->execute();

        $qtd = $stmt->fetch(PDO::FETCH_ASSOC);

        foreach($qtd as $i){
        }

        
        //print_r($qtd);
        
        //echo $qtd;
    }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pagProduto.css">
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

        <div class="conteudo">
                <div class="unidade-produtos">
                    <img src="imgs/<?= $produto["arquivo"]; ?>" alt="">
                    
                    <div class="informacoes">
                        <p><?= $produto["nome"]; ?></p> <br>
                        <p>A vista</p>
                        <p>R$<?= $produto["valor"] ?></p>
                        <!-- <a href="pagProdutoLogado.php?compra=finalizada&id=<?= $produto["id"] ?>&qtd=<?= $i ?>" class="comprar">Comprar Agora</a>
                        <a href="carrinho.php?add=carrinho&id=<?= $produto["id"]; ?>" class="botoes">Adicionar ao Carrinho</a> -->
                    </div>
                </div>
        </div>
        <div class="titulo">
                <h2>ITENS RELACIONADOS</h2>
            </div>

            <div class="relacionados">
            <?php foreach($Hds as $hd): ?>
            <a href="pagProdutoLogado.php?id=<?php echo $hd["id"];?>">
                <div class="relacionados-produtos">
                    <img src="imgs/<?= $hd["arquivo"]; ?>" alt="">
                    <p><?php echo $hd["nome"]; ?> </p>
                    <p>A vista</p>
                    <p>R$<?php echo $hd["valor"]; ?></p>
                </div>
            </a>
         <?php endforeach; ?>
        </div>  

        <div class="relacionados">
            <?php foreach($computadores as $computer): ?>
                    <a href="pagProdutoLogado.php?id=<?php echo $computer["id"];?>">
                    <div class="relacionados-produtos">
                        <img src="imgs/<?= $computer["arquivo"]; ?>" alt="">
                        <p><?php echo $computer["nome"]; ?> </p>
                        <p>A vista</p>
                        <p>R$<?php echo $computer["valor"]; ?></p>
                    </div>
                    </a>
                <?php endforeach; ?>
        </div>
    </main>



</body>
</html>