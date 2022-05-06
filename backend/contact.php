<?php
    require_once "../session.php";
    header("Content-type: application/json");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{
            require_once "../data/connection.php";
            global $connection;
            if(isset($_POST["email"]) AND !empty($_POST["email"])){
                $email = $_POST["email"];
            }
            if(isset($_POST["name"]) AND !empty($_POST["name"])){
                $name = $_POST["name"];
            }
            if(isset($_POST["message"]) AND !empty($_POST["message"])){
                $message = $_POST["message"];
            }
            $prepared = $connection->prepare("INSERT INTO contact VALUES (null, :name, :email,:message)");
            $prepared->bindParam(":name",$name);
            $prepared->bindParam(":email",$email);
            $prepared->bindParam(":message",$message);
            $prepared->execute();
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