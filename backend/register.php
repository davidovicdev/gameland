<?php
    require_once "../session.php";
    header("Content-type: application/json");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{
            require_once "../data/connection.php";
            global $connection;
            define("REGEX_NAME", "/^[A-Z][a-z]{2,20}$/");
            define("REGEX_PHONE", "/^[0][6]\d{7,8}$/");
            define("REGEX_PASSWORD", "/^(?=.*[A-Z])(?=.*[0-9])[A-z0-9$%^&*]{8,}$/");


            if(isset($_POST["firstName"]) AND !empty($_POST["firstName"]) AND preg_match(REGEX_NAME,$_POST["firstName"])){
                    $firstName = $_POST["firstName"];
            }
            if(isset($_POST["lastName"]) AND !empty($_POST["lastName"]) AND preg_match(REGEX_NAME,$_POST["lastName"])){
                $lastName = $_POST["lastName"];
            }
            if(isset($_POST["address"]) AND !empty($_POST["address"])){
                $address = $_POST["address"];
            }
            if(isset($_POST["phone"]) AND !empty($_POST["phone"]) AND preg_match(REGEX_PHONE,$_POST["phone"])){
                $phone = $_POST["phone"];
            }
            if(isset($_POST["email"]) AND !empty($_POST["email"])){
                $email = $_POST["email"];
            }
            if(isset($_POST["password"]) AND !empty($_POST["password"]) AND preg_match(REGEX_PASSWORD,$_POST["password"])){
                $password = md5($_POST["password"]);
            }
            $checkForEmail = $connection->query("SELECT * FROM users WHERE email = '$email'")->fetch();
            if($checkForEmail){
                echo json_encode(0);
            }
            else{
                $prepared= $connection->prepare("INSERT INTO users VALUES (null, ?,?,?,?,?,?,0)");
                $prepared->execute([$firstName,$lastName,$email,$password,$address,$phone]);
                $userId = $connection->lastInsertId();
                $user = $connection->query("SELECT * FROM users WHERE user_id = $userId")->fetch();
                $_SESSION["user"] = $user;
                echo json_encode(1);
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
