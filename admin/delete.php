<?php
    require "config.php";
    require "common.php";

if (isset($_GET['id'])) {
  //echo $_GET['id'];
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id = :id";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
    
    echo "Record deleted.";
    
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
 
} 

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
<!-- HTML for your new page goes here -->
<h2>Delete users</h2>
<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
      <thead>
<tr>
  <th>ID</th>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Email Address</th>
  <th>Age</th>
  <th>Location</th>
  <th>Date</th>
  <th>Edit</th>
</tr>
      </thead>
  <tbody>
   <?php foreach ($result as $row) { ?>
      <tr>
<td><?php echo escape($row["id"]); ?></td>
<td><?php echo escape($row["firstname"]); ?></td>
<td><?php echo escape($row["lastname"]); ?></td>
<td><?php echo escape($row["email"]); ?></td>
<td><?php echo escape($row["age"]); ?></td>
<td><?php echo escape($row["location"]); ?></td>
<td><?php echo escape($row["date"]); ?> </td>
<td><a href="delete.php?id=<?php echo escape($row["id"]);?>">Delete</a></td>
      </tr>
    <?php } ?>
    </tbody>
</table>
<a href="index.php">Back to home</a>
<?php include "templates/footer.php"?>