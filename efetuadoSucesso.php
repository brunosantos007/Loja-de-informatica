<?php

include_once("conexao.php");
    //$comprados = 0;
    $nome = $_SESSION["nome"];

    if(!isset($_SESSION["qtd"])){
        $_SESSION["qtd"] = [];
    }
    
    if(isset($_GET["compra"])){
        $quantidade = $_GET["qtd"];
        
         //$comprados ++;
        $contagemCompra = count($_SESSION["qtd"]);
        $contagemCompra += 1;
        $result = $quantidade + $contagemCompra;
           $query = "UPDATE usuario SET produtos_comprados = :produtos_comprados WHERE nome = :nome";
             $stmt = $conexao->prepare($query);
             $stmt->bindParam(":produtos_comprados",$result);
             $stmt->bindParam(":nome",$nome);
             $stmt->execute();
             array_push($_SESSION["qtd"],$result);
        
    }
    
?>