<?php
    include_once("conexao.php");
    include_once("processo.php");

    if(isset($_SESSION["msg"])){
        $printMSG = $_SESSION["msg"];
        $_SESSION["msg"] = " ";
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
            </div>
        </nav>
    </header>

    <main>
        <form action="" class="form" method="POST">
            <input type="hidden" name="type" value="cadastro">
            <div class="div-login">
                <div>
                    <img src="imgs/lock-in-a-circle.png" alt="">
                    <h3>Cadastre uma nova conta</h3>
                    <p>Informe os seus dados abaixo para acessá-la.</p>
                </div>
                <div>
                    <input type="text" name="nome" placeholder="Nome *">
                    <input type="text" name="sobrenome" placeholder="Sobrenome *">
                    <input type="text" name="cpf" placeholder="CPF *">
                    <input type="text" name="email" placeholder="E-mail *">
                    <input type="password" name="senha" placeholder="Senha *">
                    <?php if(isset($printMSG) && $printMSG != ""):?>
                        <p><?php echo $printMSG; ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <a href="#"><button>Cadastrar</button></a>
                   <div><a href="login.php">Voltar ao Login</a></div>
                </div>
            </div>
        </form>
        

    </main>

</body>

</html>