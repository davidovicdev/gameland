<?php
    require_once "session.php";
    require_once "data/connection.php";
    global $connection;
    $message = !empty($_GET["message"]) ? $_GET["message"] : "";
    $success = !empty($_GET["success"]) ? $_GET["success"] : "";
    if(isset($_GET["productId"]) AND !empty($_GET["productId"])){
        $productId = $_GET["productId"];
        $product = $connection->query("SELECT *, products.name as productName, categories.name as category FROM products INNER JOIN prices ON products.product_id = prices.product_id INNER JOIN images ON products.product_id = images.product_id INNER JOIN categories ON categories.category_id = products.category_id WHERE products.product_id = $productId AND active = 1")->fetch();
        ?>
        <form action="backend/adminpanel/editProduct.php" method="POST" class="mt-3">
            <input type="hidden" name="productId" id="productId" value="<?php echo $productId?>">
            <h3><?php echo $product->productName?></h3>
            <h4><?php echo $product->category?></h4>
            <img src="assets/img/products/<?php echo $product->src?>" alt="<?php echo $product->name?>" height="150px">
            <p class="text mt-2"><?php echo $product->description?></p>
            <label for="productPrice">Price</label>
            <input type="number" class="form-control" id="productPrice" name="productPrice" value="<?php echo $product->price ?>" min="1" max="1000">
            <label for="productQuantity">Quantity</label>
            <input type="number" class="form-control" id="productQuantity" name="productQuantity" value="<?php echo $product->quantity ?>" min="1" max="1000">
            <input type="submit" class="btn btn-primary mt-2" id='editProductButton' value="Edit Product">
        </form>
        <?php
    }
    else{
        ?>
        <h4 class="text-success mt-2 mb-2"> <?php echo $success ?></h4>
<form  action="backend/adminpanel/addProduct.php" method="POST" class="mb-3" enctype="multipart/form-data">
    <div class="form-group">
        <label for="productName">Add Product Name</label>
        <input class='form-control' type="text" id="productName" name="productName"> 
    </div>
    <div class="form-group">
        <label for="productDescription">Description</label>
        <textarea name="productDescription" id="productDescription" class='form-control'></textarea>
    </div>
    <div class="form-group">
        <label for="productQuantity">Quantity</label>
        <input type="number" min="1" max="1000" name="productQuantity" class='form-control' id="productQuantity">
    </div>
    <div class="form-group">
        <label for="productPrice">Price</label>
        <input type="number" min="1" max="1000" name="productPrice" class='form-control' id="productPrice">
    </div>
    <div class="form-group">
        <label for="productCategoryId">Category</label>
        <select name="productCategoryId" id="productCategoryId" class="form-control">
            <?php 
                $categories = $connection->query("SELECT * FROM categories")->fetchAll();
                foreach ($categories as $category) {
                    ?>
                    <option value="<?php echo $category->category_id?>"><?php echo $category->name?></option>
                    <?php
                }
            ?>
        </select>
    </div>
    <div class="form-group">
         <label for="productImage">Image</label>
         <input type="file" class="form-control-file" id="productImage" name="productImage">
  </div>
    <input type="submit" class="btn btn-primary" id='addProductButton' value="Add Product">
</form>
<p class="text-danger mb-3"><?php echo $message?></p>
<table class="table">
<thead>
    <tr>
        <th>#</th>
        <th>Image</th>
        <th>Name</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Category</th>
        <th>Active Price</th>
        <th>EDIT</th>
        <th>DELETE</th>
    </tr>
</thead>
<tbody>
    <?php
    $counter = 1;
    $products = $connection->query("SELECT *, products.name as productName, categories.name as categoryName FROM products INNER JOIN prices ON products.product_id = prices.product_id INNER JOIN images ON products.product_id = images.product_id INNER JOIN categories ON products.category_id = categories.category_id WHERE active = 1 ORDER BY products.product_id ASC")->fetchAll();
    foreach ($products as $product) {
        ?>  
       <tr>
           <td><?php echo $counter?></td>
           <td><img src="assets/img/products/<?php echo $product->src?>" alt="<?php echo $product->productName?>" height="60px"></td>
           <td><?php echo $product->productName?></td>
           <td><?php echo $product->description?></td>
           <td><?php echo $product->quantity?></td>
           <td><?php echo $product->categoryName?></td>
           <td><?php echo $product->price?></td>
           <td><a class='buttonEdit' href="adminpanel.php?id=2&productId=<?php echo $product->product_id ?>">EDIT</a></td>
           <td><form action="backend/adminpanel/deleteProduct.php" method="POST"><input type="submit" value="DELETE" class="buttonDelete"> <input type="hidden" name="productId" value="<?php echo $product->product_id ?>"></form></td>
      
       </tr> 
        <?php
        $counter++;
    }
    ?>
    </tbody>
</table>
        <?php
    }
?>
