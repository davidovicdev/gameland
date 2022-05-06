<?php
    require_once "../../session.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{
            require_once "../../data/connection.php";
            global $connection;
            if(isset($_POST["productId"]) AND !empty($_POST["productId"])) {
                $productId = $_POST["productId"];
                $productInOrder = $connection->query("SELECT * FROM order_product where product_id = $productId")->fetch();
                if(!$productInOrder){
                    $prep = $connection->prepare("DELETE FROM images WHERE product_id = :productId");
                    $prep->bindParam(":productId", $productId);
                    $prep->execute();
                    $prepar = $connection->prepare("DELETE FROM prices WHERE product_id = :productId");
                    $prepar->bindParam(":productId", $productId);
                    $prepar->execute();
                    $prepared = $connection->prepare("DELETE FROM products WHERE product_id = :productId");
                    $prepared->bindParam(":productId", $productId);
                    $prepared->execute();
                    header("Location: ../../adminpanel.php?id=2&success=Successfully+deleted+product");
                }
                else{
                    header("Location: ../../adminpanel.php?id=2&message=This+product+is+already+ordered");
                }
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