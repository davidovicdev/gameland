<?php
require_once "session.php";
$success = !empty($_GET["success"]) ? $_GET["success"] : "";
?>
<h4 class="text-success"><?php echo $success?></h4>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Is Admin</th>
            <th>Give Admin</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once "data/connection.php";
        global $connection;
        $counter = 1;
        $users = $connection->query("SELECT * FROM users")->fetchAll();
        foreach ($users as $user) {
        ?>
            <tr>
                <td><?php echo $counter ?></td>
                <td><?php echo $user->first_name ?></td>
                <td><?php echo $user->last_name ?></td>
                <td><?php echo $user->address ?></td>
                <td><?php echo $user->phone ?></td>
                <td><?php echo $user->email ?></td>
                <td><?php echo $user->is_admin == 1 ? "Yes" : "No" ?></td>
                <?php
                if ($user->is_admin == 1) {
                    echo "<td>-</td>";
                } else {
                ?>
                    <td><a href="backend/adminpanel/giveAdmin.php?id=<?php echo $user->user_id?>" class="buttonEdit">SET</a></td>
                <?php
                }
                ?>
            </tr>
            <?php
            $counter++;
        }
        ?>
    </tbody>
</table>