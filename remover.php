<?php



     if(isset($_SESSION)){
         $_SESSION["removidos"] = [];
     }

 if(isset($_GET["remover"])){
    $idGet = $_GET["id"];
    $query = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(":id",$idGet);
        $stmt->execute();
        $item = $stmt->fetch(PDO::FETCH_ASSOC);

     if($_GET["remover"] == 1 && isset($idGet)){
        array_push($_SESSION["removidos"],$item);
        session_unset();
     }
     // session_destroy();
     // header("Location: carrinho.php");
//printr    
     
    }
    //unset($_SESSION["carrinho"][$idGet]);
      echo "REMOVIDO:";
      echo "<br>";
      print_r($_SESSION["removidos"]);
?>