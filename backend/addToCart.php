<?php
    require_once "../session.php";
    header("Content-type: application/json");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{
            require_once "../data/connection.php";
            global $connection;
            if(isset($_POST["quantity"]) AND !empty($_POST["quantity"])) $quantity = $_POST["quantity"];
            if(isset($_POST["productId"]) AND !empty($_POST["productId"])) $productId = $_POST["productId"];
            $userId = $_SESSION["user"]->user_id;
            $prepared = $connection->prepare("INSERT INTO cart VALUES ($userId,?,?)");
            $prepared->execute([$productId,$quantity]);
            echo json_encode(1);
           
        }
        catch(PDOException $e){
            echo $e->getMessage();
            http_response_code(500);
        }
    }
    else{
        http_response_code(404);
    }
?>