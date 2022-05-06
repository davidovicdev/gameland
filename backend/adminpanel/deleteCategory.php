<?php
    require_once "../../session.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{
            require_once "../../data/connection.php";
            global $connection;
            if(isset($_POST["categoryId"]) AND !empty($_POST["categoryId"])) {
                $categoryId = $_POST["categoryId"];
                $productsCount = $connection->query("SELECT * FROM products where category_id = $categoryId")->rowCount();
                if($productsCount == 0){
                    $prepared = $connection->prepare("DELETE FROM categories WHERE category_id = :categoryId");
                    $prepared->bindParam(":categoryId", $categoryId);
                    $prepared->execute();
                    header("Location: ../../adminpanel.php?id=4&success=Successfully+deleted+category");
                }
                else{
                    header("Location: ../../adminpanel.php?id=4&message=Category+already+has+products+,+please+delete+products+first");
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