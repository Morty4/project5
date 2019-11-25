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
    FROM users WHERE user_role = 1";

    //$location = $_POST['location'];

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
            <h2>Find other admin accounts</h2>
            <form method="post">
                <input type="submit" name="submit" value="View Results">
            </form>
        </div>
    </div>

</div>

<?php include "templates/footer.php"?>