<?php
    require_once "../../session.php";
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        try{
            require_once "../../data/connection.php";
            global $connection;
            if(isset($_GET["id"]) AND !empty($_GET["id"])){
                $userId = $_GET["id"];
                $prepared = $connection->prepare("UPDATE users SET is_admin = 1 WHERE user_id = :userId");
                $prepared->bindParam(":userId", $userId);
                $prepared->execute();
                header("Location: ../../adminpanel.php?id=1&success=Successfully+gave+admin+role");
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