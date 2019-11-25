<!-- Page by: Jazmin Belmonte -->

<?php

/**
  * Function to query information based on
  * a parameter.
  *
  */
if (isset($_POST['submit'])) {
  try {
    require "config.php";
    require "common.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT *
    FROM users";

    $statement = $connection->prepare($sql);
    $statement->bindParam(PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>


<?php include "templates/header.php"?>



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
                <li class="selected"><a href="readAdmin.php">Find Other Admin Accounts</a></li>
                <li><a href="updateAdmin.php">Update Admin Account</a></li>
                <li><a href="deleteAdmin.php">Delete Admin Account</a></li>
            </ul>
        </div>
        <div class="column" id="secondC"> 
            <!-- Second column -->
            <p class="is-size-5 has-text-centered has-text-grey">Find Other Admin Accounts</p>
            <form method="post" class="has-text-centered">
                <input type="submit" name="submit" value="View Results">
            </form>


            <?php
            if (isset($_POST['submit'])) {
            if ($result && $statement->rowCount() > 0) { ?>
                <h2>Results</h2>

                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
            <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Role</th>
            <th>Location</th>
            <th>Date Created</th>
            </tr>
                </thead>
                <tbody>
            <?php foreach ($result as $row) { ?>
                <tr>
            <td><?php echo escape($row["user_id"]); ?></td>
            <td><?php echo escape($row["user_firstname"]); ?></td>
            <td><?php echo escape($row["user_lastname"]); ?></td>
            <td><?php echo escape($row["user_name"]); ?></td>
            <td><?php echo escape($row["user_role"]); ?></td>
            <td><?php echo escape($row["user_location"]); ?></td>
            <td><?php echo escape($row["user_created"]); ?> </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php } else { ?>
                > No results found.
            <?php }
            } ?>



        </div>
    </div>

</div>

<?php include "templates/footer.php"?>