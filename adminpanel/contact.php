<?php
    $success = !empty($_GET["success"]) ? $_GET["success"] : "";
    require_once "session.php";
    require_once "data/connection.php";
    global $connection;
    $contactCount = $connection->query("SELECT * FROM contact")->rowCount();
    ?>
    <h4 class="text text-success mt-2"><?php echo $success ?></h4>
    <?php
    if($contactCount == 0){
        ?>
        <h3 class="mt-2">No messages</h3>
        <?php
    }
    else{
        ?>
        <table class="table">
<thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th>DELETE</th>
    </tr>
</thead>
<tbody>
    <?php
    
    $contact = $connection->query("SELECT * FROM contact ORDER BY contact_id ASC")->fetchAll();
    $counter=1;
    foreach ($contact as $c) {
        ?>  
       <tr>
           <td><?php echo $counter ?></td>
           <td><?php echo $c->name ?></td>
           <td><?php echo $c->email ?></td>
           <td><?php echo $c->message ?></td>
           <td><form action="backend/adminpanel/deleteContact.php" method="POST"><input type="submit" value="DELETE" class="buttonDelete"> <input type="hidden" name="contactId" value="<?php echo $c->contact_id ?>"></form></td>

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
