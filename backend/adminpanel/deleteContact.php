<?php
    require_once "../../session.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{
            require_once "../../data/connection.php";
            global $connection;
            if(isset($_POST["contactId"]) AND !empty($_POST["contactId"])) {
                $contactId = $_POST["contactId"];
                $prepared= $connection->prepare("DELETE FROM contact WHERE contact_id = :contactId");
                $prepared->bindParam(":contactId", $contactId);
                $prepared->execute();
                header("Location: ../../adminpanel.php?id=5&success=Successfully+deleted+message");
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