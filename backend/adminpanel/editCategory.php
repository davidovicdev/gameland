<?php
    require_once "../../session.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{
            require_once "../../data/connection.php";
            global $connection;
            if(isset($_POST["categoryName"]) AND !empty($_POST["categoryName"]) AND isset($_POST["categoryId"]) AND !empty($_POST["categoryId"])) {
                $categoryId= $_POST["categoryId"];
                $categoryName = $_POST["categoryName"];
                $prepared = $connection->prepare("UPDATE categories SET name = :name WHERE category_id = :categoryId");
                $prepared->bindParam(":name",$categoryName);
                $prepared->bindParam(":categoryId",$categoryId);
                $prepared->execute();
                header("Location: ../../adminpanel.php?id=4&success=Successfully+updated+category");
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