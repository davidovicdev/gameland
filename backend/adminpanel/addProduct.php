<?php
    require_once "../../session.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        try{
            require_once "../../data/connection.php";
            global $connection;
            
            if(isset($_POST["productName"]) AND !empty($_POST["productName"])) $name=$_POST['productName'];
            if(isset($_POST["productDescription"]) AND !empty($_POST["productDescription"])) $description=$_POST['productDescription'];
            if(isset($_POST["productQuantity"]) AND !empty($_POST["productQuantity"])) $quantity=$_POST['productQuantity'];
            if(isset($_POST["productPrice"]) AND !empty($_POST["productPrice"])) $price=$_POST['productPrice'];
            if(isset($_POST["productCategoryId"]) AND !empty($_POST["productCategoryId"])) $categoryId=$_POST['productCategoryId'];
            if(isset($_FILES["productImage"])) {
                $prepared = $connection->prepare("INSERT INTO products VALUES (null, :name, :description, :quantity, :categoryId)");
                $prepared->bindParam(":name", $name);
                $prepared->bindParam(":description", $description);
                $prepared->bindParam(":quantity", $quantity);
                $prepared->bindParam(":categoryId", $categoryId);
                if($prepared->execute()){
                    $productId = $connection->lastInsertId();
                    $preparedPrice = $connection->prepare("INSERT INTO prices VALUES (null,:price, 1, :productId)");
                    $preparedPrice->bindParam(":price", $price);
                    $preparedPrice->bindParam(":productId", $productId);
                    $preparedPrice->execute();
                     // Set image placement folder
                $target_dir = "../../assets/img/products/";
                // Get file path
                $target_file = $target_dir . basename($_FILES["productImage"]["name"]);
              /*   // Get file extension
                $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                // Allowed file types
                $allowd_file_ext = array("jpg", "jpeg", "png");
                
                if (!file_exists($_FILES["fileUpload"]["tmp_name"])) {
                   $resMessage = array(
                       "status" => "alert-danger",
                       "message" => "Select image to upload."
                   );
                } else if (!in_array($imageExt, $allowd_file_ext)) {
                    $resMessage = array(
                        "status" => "alert-danger",
                        "message" => "Allowed file formats .jpg, .jpeg and .png."
                    );            
                } else if ($_FILES["fileUpload"]["size"] > 2097152) {
                    $resMessage = array(
                        "status" => "alert-danger",
                        "message" => "File is too large. File size should be less than 2 megabytes."
                    );
                } else if (file_exists($target_file)) {
                    $resMessage = array(
                        "status" => "alert-danger",
                        "message" => "File already exists."
                    );
                } else {
                    
                } */
                if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file)) {
                    $src = $_FILES["productImage"]["name"];
                 $sql = "INSERT INTO images VALUES (null, '$src', $productId)";
                 $stmt = $connection->prepare($sql);
                 $stmt->execute();
                 header("Location: ../../adminpanel.php?id=2&success=Successfully+added+product");
                }
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