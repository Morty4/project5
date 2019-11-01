<?php
  require "config.php";
  require "common.php";

if (isset($_POST['submit'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $user = array(
      "id"        => $_POST['id'],
      "firstname" => $_POST['firstname'],
      "lastname"  => $_POST['lastname'],
      "email"     => $_POST['email'],
      "age"       => $_POST['age'],
      "location"  => $_POST['location'],
      "date"      => $_POST['date']
    );

    $sql = "UPDATE users SET id = :id, 
                             firstname = :firstname, 
                             lastname = :lastname,
                             email = :email,
                             age = :age,
                             location = :location,
                             date = :date
                             WHERE id = :id";
                         
    $statement = $connection->prepare($sql);
    $statement->execute($user);
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

}

if (isset($_GET['id'])) {
  //echo $_GET['id'];
  try {

    $connection = new PDO($dsn, $username, $password, $options);
    
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = $id";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
    
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
 
} else {
  echo "nothing to see here...";
  exit;
}

?>
<?php include "templates/header.php"?>

<?php 
  
  if (isset($_POST['submit']) && $statement) {
      echo escape($_POST['firstname']) . " successfully updated.";
}?>

<h2>Edit a user</h2>
<form action="" method="post">

  <?php foreach ($user as $key => $value) : ?>
  <!--print the data-->
  <label for="<?php echo $key;?>"><?php echo ucfirst ($key);?></label>
  <input type="text" 
         name="<?php echo $key;?>" 
         id="<?php echo $key;?>" 
         value="<?php echo escape($value);?>"
         <?php echo ($key === 'id' ? 'readonly' : null); ?>
         >
  <?php endforeach; ?>
  <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to Home</a>

<?php include "templates/footer.php"?>












