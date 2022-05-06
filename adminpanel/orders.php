<?php
    require_once "session.php";
    require_once "data/connection.php";
    global $connection;
    $orderCount = $connection->query("SELECT * FROM orders")->rowCount();
    if($orderCount == 0){
        ?>
        <h3 class="mt-2">No orders</h3>
        <?php
    }
    else{
?>
<table class="table">
<thead>
    <tr>
        <th>#</th>
        <th>User ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date</th>
        <th>Total</th>
    </tr>
</thead>
<tbody>
    <?php
    require_once "data/connection.php";
    global $connection;
    $totalOfTotal = 0;
    $users = $connection->query("SELECT * FROM orders INNER JOIN users ON users.user_id = orders.user_id")->fetchAll();
    $counter=1;
    foreach ($users as $user) {
        $orderId = $user->order_id;
        $total = 0;
        foreach ($connection->query("SELECT * FROM order_product WHERE order_id = $orderId")->fetchAll() as $orderProduct) {
            $productId = $orderProduct->product_id;
            $price = $connection->query("SELECT * FROM prices where product_id = $productId AND active = 1")->fetch();
            $total += $orderProduct->quantity*$price->price;
        }
        $totalOfTotal += $total;
        ?>  
       <tr>
           <td><?php echo $counter ?></td>
           <td><?php echo $user->user_id ?></td>
           <td><?php echo $user->first_name ?></td>
           <td><?php echo $user->last_name ?></td>
           <td><?php echo $user->date?></td>
           <td><?php echo $total ?> $</td>
       </tr> 
        <?php
        $counter++;
    }
    ?>
    </tbody>
</table>
    <h4>Total profit: <?php echo $totalOfTotal?> $</h4>
<?php } ?>