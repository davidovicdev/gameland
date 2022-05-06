<?php
    require_once "../../session.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{
            require_once "../../data/connection.php";
            global $connection;
            if(isset($_POST["productPrice"]) AND !empty($_POST["productPrice"]) AND isset($_POST["productQuantity"]) AND !empty($_POST["productQuantity"])) {
                $productId = $_POST["productId"];
                $quantity= $_POST["productQuantity"];
                $price = $_POST["productPrice"];
                $prepared = $connection->prepare("UPDATE products SET quantity = :quantity WHERE product_id = :productId");
                $prepared->bindParam(":quantity",$quantity);
                $prepared->bindParam(":productId",$productId);
                $prepared->execute();
                $prepared = $connection->prepare("UPDATE prices SET active = 0 WHERE product_id = :productId");
                $prepared->bindParam(":productId",$productId);
                $prepared->execute();
                $prepared = $connection->prepare("INSERT INTO prices VALUES (null, :price, 1, :productId)");
                $prepared->bindParam(":price", $price);
                $prepared->bindParam(":productId", $productId);
                $prepared->execute();
                header("Location: ../../adminpanel.php?id=2&success=Successfully+updated+product");
            }
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