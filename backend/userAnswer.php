<?php
    require_once "../session.php";
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        try{
            require_once "../data/connection.php";
            global $connection;
            if(isset($_GET["id"]) AND !empty($_GET["id"])){
                $answerId = $_GET["id"];
            }
            $userId = $_SESSION["user"]->user_id;
            $prepared= $connection->prepare("INSERT INTO user_answer VALUES (null, :user, :answer)");
            $prepared->bindParam(":user", $userId);
            $prepared->bindParam(":answer", $answerId);
            $prepared->execute();
            header("Location: ../index.php");
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