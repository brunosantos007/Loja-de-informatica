<?php
    include_once("conexao.php");

    session_start();

    $noPost = $_POST;

    $id;
    ////// FAZER RELATORIOS DE CLIENTES
    if(!empty($_GET)){
        $id = $_GET["id"];
    }

    if(!empty($id)){
    
        $query = "SELECT * FROM produtos WHERE id = ?";
        $stmt = $conexao->prepare($query);

        $stmt->bindParam(1,$id);
        $stmt->execute();
        Global $produto;
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    }else{ // retorna os contatos
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

    if(!empty($noPost)){
   
        

        if($noPost["type"] === "logar"){
        $email = $_POST["email"];
        $senha = $_POST["senha"];

            if(empty($email) && empty($senha)){
                $_SESSION["msg"] = "Insira seus dados!";
                //header("Location: login.php");
            }elseif(empty($email)){
                $_SESSION["msg"] = "Insira seu e-mail!";
            }elseif(empty($senha)){
                $_SESSION["msg"] = "Insira sua senha!";
            }elseif(!empty($email) && !empty($senha)){

                $usuario = [];
                
                $query = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
                $stmt = $conexao->prepare($query);
                $stmt->bindParam(":email",$email);
                $stmt->bindParam(":senha",$senha);

                $stmt->execute();
                Global $usuario;
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

                if($stmt->rowCount() == 1){
                    // gettype($usuario);
                    print_r($usuario);
                    $_SESSION["nome"] = $usuario["nome"];
                    header("Location: loginSucesso.php");
                    
                }else{
                    $_SESSION["msg"] = "Usuario não consta na base de dados!";
                }

            }
        }elseif($noPost["type"] === "cadastro"){
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $cpf = $_POST["cpf"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            // SEM @ NO NOME E SOBRENOME
            $removerChrNome = preg_match("/@/",$nome);
            $removerChrSobrenome = preg_match("/@/",$sobrenome);
            /// TRANSFORMAR UMA STRING EM UM INTEIRO PARA RECEBER SO INTEIROS
            $apenasNumerosCPF = (int) $cpf;
            // EMAIL SO ACEITA @
            $emailCompleto = preg_match("/@/",$email);
            // SENHA SÓ ACEITA MAIS DE 5 CARACTERES E TENHA UMA LETRA MAIUSCULA
            $letrasMaiusculasSenha = preg_match("/[A-Z]/",$senha);
            if(empty($nome) && empty($sobrenome) && empty($cpf) && empty($email) && empty($senha)){
                $_SESSION["msg"] = "Insira seus dados!";
            }elseif(empty($nome)){
                $_SESSION["msg"] = "Insira seu Nome!";
            }elseif(empty($sobrenome)){
                $_SESSION["msg"] = "Insira seu sobrenome!";
            }elseif(empty($cpf)){
                $_SESSION["msg"] = "Insira seu CPF!";
            }elseif(empty($email)){
                $_SESSION["msg"] = "Insira seu e-mail!";
            }elseif(empty($senha)){
                $_SESSION["msg"] = "Insira sua senha!";
            }else{
                
                if($removerChrNome == 1 || $removerChrSobrenome == 1){
                    $_SESSION["msg"] = "Não pode haver @ nos campos Nome e Sobrenome!";
                }elseif(!$apenasNumerosCPF){
                    $_SESSION["msg"] = "O CPF só aceita números";
                }elseif($emailCompleto !== 1){
                    $_SESSION["msg"] = "Insira um @ no email";
                    //$_SESSION["msg"] = "Cadastrado com sucesso";
                }elseif(strlen($senha) <= 5){
                    $_SESSION["msg"] = "Senha deve ter mais de 5 caracteres";
                }elseif(strlen($senha) >= 5 && $letrasMaiusculasSenha == 0){
                    $_SESSION["msg"] = "Deve haver 1 caracter Maiusculo";
                }elseif(strlen($senha) >= 5 && $letrasMaiusculasSenha == 1){

                    $query = "INSERT INTO usuario (nome, sobrenome, cpf, email, senha)
                    VALUES (:nome, :sobrenome, :cpf, :email, :senha)";

                    $stmt = $conexao->prepare($query);
                    $stmt->bindParam(":nome",$nome);
                    $stmt->bindParam(":sobrenome",$sobrenome);
                    $stmt->bindParam(":cpf",$cpf);
                    $stmt->bindParam(":email",$email);
                    $stmt->bindParam(":senha",$senha);

                    $stmt->execute();

                    $_SESSION["nome"] = $nome;

                    header("Location: loginSucesso.php");
                }

               

            }
        }
        
    }


   

?>