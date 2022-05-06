<?php
require_once "data/connection.php";
global $connection;
    require_once "session.php";
    if(isset($_GET["categoryId"])){
        $categoryId = $_GET["categoryId"];
        $category = $connection->query("SELECT * FROM categories WHERE category_id = $categoryId")->fetch(); 
        ?>
        <form  action="backend/adminpanel/editCategory.php" method="POST" class="mt-3">
    <div class="form-group">
        <label for="categoryName">Edit Category Name</label>
        <input class='form-control' type="text" id="categoryName" name="categoryName" value="<?php echo $category->name?>"> 
        <input type="hidden" name="categoryId" value="<?php echo $category->category_id?>">
    </div>
    <input type="submit" class="btn btn-primary" id='editCategoryButton' value="Edit Category">
</form>
        <?php
    }
    else{
    $message = !empty($_GET["message"]) ? $_GET["message"] : "";
    $success = !empty($_GET["success"]) ? $_GET["success"] : "";
?>

<h4 class="text-success mt-2 mb-2"> <?php echo $success ?></h4>
<form  action="backend/adminpanel/addCategory.php" method="POST" class="mb-3">
    <div class="form-group">
        <label for="categoryName">Add Category Name</label>
        <input class='form-control' type="text" id="categoryName" name="categoryName"> 
    </div>
    <input type="submit" class="btn btn-primary" id='addCategoryButton' value="Add Category">
</form>
<p class="text-danger mb-3"><?php echo $message?></p>
<table class="table">
<thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>EDIT</th>
        <th>DELETE</th>
    </tr>
</thead>
<tbody>
    <?php
    
    $categories = $connection->query("SELECT * FROM categories")->fetchAll();
    $counter = 1;
    foreach ($categories as $category) {
        ?>  
       <tr>
           <td><?php echo $counter ?></td>
           <td><?php echo $category->name ?></td>
           <td><a class='buttonEdit' href="adminpanel.php?id=4&categoryId=<?php echo $category->category_id ?>">EDIT</a></td>
           <td><form action="backend/adminpanel/deleteCategory.php" method="POST"><input type="submit" value="DELETE" class="buttonDelete"> <input type="hidden" name="categoryId" value="<?php echo $category->category_id?>"></form></td>
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