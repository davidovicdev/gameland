<?php
    require_once "../../session.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{
            require_once "../../data/connection.php";
            global $connection;
            if(isset($_POST["categoryName"]) AND !empty($_POST["categoryName"])) {
                $categoryName = $_POST["categoryName"];
                $prepared = $connection->prepare("INSERT INTO categories VALUES (null, :name)");
                $prepared->bindParam(":name",$categoryName);
                $prepared->execute();
                header("Location: ../../adminpanel.php?id=4&success=Successfully+added+category");
            }
            else{
                header("Location: ../../adminpanel.php?id=4&message=Category+name+can+not+be+empty");
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