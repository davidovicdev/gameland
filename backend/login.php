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
            if(isset($_POST["password"]) AND !empty($_POST["password"])){
                $password = md5($_POST["password"]);
            }
            $prepared= $connection->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
            $prepared->execute([$email,$password]);
            $user = $prepared->fetch();
            if($user){
                $_SESSION["user"] = $user;
                echo json_encode(1);
            }
            else{
                echo json_encode(0);
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