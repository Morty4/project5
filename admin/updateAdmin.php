<!-- Page by: Jazmin Belmonte -->


<?php
    require "config.php";
    require "common.php";
 try {
    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * FROM users";

    $statement = $connection->prepare($sql);
    $statement->execute();

    $result = $statement->fetchAll();
    
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

?>



<?php include "templates/header.php"?>
<!-- php if(userType = admin)
		manageAccountButton
		manageUsersButton
        manageContent -->
<br>
<br>
<div class="AD">
    <div class="tabs is-centered">
    <ul>
        <li class="is-active"><a href="#">Manage Admin Account</a></li>
        <li><a href="manageUsers.php">Manage Users</a></li>
        <li><a href="manageContent.php">Manage Content</a></li>
    </ul>
    </div>


    <div class="columns">
        <div class="column">
            <!-- First column -->
            <ul class="has-text-centered">
                <li><a href="readAdmin.php">Find Other Admin Accounts</a></li>
                <li class="selected"><a href="updateAdmin.php">Update Admin Account</a></li>
                <li><a href="deleteAdmin.php">Delete Admin Account</a></li>
            </ul>
        </div>
        <div class="column" id="secondC"> 
            <!-- Second column -->
            <p class="is-size-5 has-text-centered has-text-grey">Update Admin Accounts</p>
            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
            <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Role</th>
            <th>Location</th>
            <th>Date Created</th>
            <th>Edit</th>
            </tr>
                </thead>
            <tbody>
            <?php foreach($result as $row) { ?>
                <tr>
            <td><?php echo escape($row["user_id"]); ?></td>
            <td><?php echo escape($row["user_firstname"]); ?></td>
            <td><?php echo escape($row["user_lastname"]); ?></td>
            <td><?php echo escape($row["user_role"]); ?></td>
            <td><?php echo escape($row["location"]); ?></td>
            <td><?php echo escape($row["user_created"]); ?></td>
            <td>
            <a href="update-single.php?id=<?php echo escape($row["user_id"]);?>">Edit</a>
            </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include "templates/footer.php"?>