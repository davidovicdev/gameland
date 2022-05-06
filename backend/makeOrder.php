<?php
    require_once "../session.php";
    header("Content-type: application/json");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{
            require_once "../data/connection.php";
            global $connection;
            $ids = [];
            $price = [];
            $quantity = [];
            foreach ($_POST["ids"] as $id) {
                array_push($ids, +$id);
            }
            foreach ($_POST["quantity"] as $q) {
                array_push($quantity, +$q);
            }
            foreach ($_POST["price"] as $p) {
                array_push($price, +$p);
            }
            $userId = $_SESSION["user"]->user_id;
            $connection->prepare("INSERT INTO orders VALUES(null,?,CURRENT_TIMESTAMP)")->execute([$userId]);
            $orderId = +$connection->lastInsertId();
             for ($i=0; $i < count($ids) ; $i++) { 
                $id = $ids[$i];
                $q = $quantity[$i];
                $connection->prepare("INSERT INTO order_product VALUES(?,?,?)")->execute([$orderId,$id,$q]);
                $connection->prepare("UPDATE products SET quantity = quantity - ? WHERE product_id = ?")->execute([$q,$id]);
            }
            // REMOVE CART
            $connection->prepare("DELETE FROM cart WHERE user_id = ?")->execute([$userId]);
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