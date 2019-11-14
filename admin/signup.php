<?php

/**
  * Use an HTML form to create a new entry in the
  * users table.
  *
  */
  require "config.php";
  require "common.php";

if (isset($_POST['submit'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $new_user = array(
      "user_name" => $_POST['user_name'],
      "user_firstname" => $_POST['user_firstname'],
      "user_lastname"  => $_POST['user_lastname'],
      "user_email"     => $_POST['user_email'],
      "user_bday"       => $_POST['user_bday'],
      "user_postal_code"  => $_POST['user_postal_code'],
      "user_pwd"  => $_POST['user_pwd'],
      "user_gravatar"  => $_POST['user_gravatar'],
      "user_bio"  => $_POST['user_bio'],
      "user_role"  => $_POST['user_role'],
      "user_location"  => $_POST['user_location']
    );

    $sql = sprintf(
"INSERT INTO %s (%s) values (%s)",
"users",
implode(", ", array_keys($new_user)),
":" . implode(", :", array_keys($new_user))
    );

    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) {
  echo $_POST['firstname']." successfully added.";
} ?>

<h2>Add a user</h2>
name="firstname" id="firstname
<form method="post">

<div class="field">
  <label class="label">Username</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input is-success" type="text" placeholder="Text input" name="user_name" id="user_name">
    <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
  </div>
  <p class="help is-success">This username is available</p>
</div>


  <div class="field">
  <label class="label">First Name</label>
  <div class="control">
    <input class="input" type="text" placeholder="Text input" name="user_firstname" id="user_firstname">
  </div>
</div>


  <div class="field">
  <label class="label">Last Name</label>
  <div class="control">
    <input class="input" type="text" placeholder="Text input" name="user_lastname" id="user_lastname">
  </div>
</div>

<div class="field">
  <label class="label">Email</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input is-danger" type="email" placeholder="Email input" value="hello@" name="user_email" id="user_email">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
  </div>
  <p class="help is-danger">This email is invalid</p>
</div>

<div class="field">
<label class="label">Date of Birth</label>
<div class="control">
  <input class="input" type="date" placeholder="YYYY-MM-DD" name="user_bday" id="user_bday">
</div>
</div>

<div class="field">
<label class="label">Zipcode</label>
<div class="control">
  <input class="input" type="text" placeholder="ex 84401" name="user_postal_code" id="user_postal_code">
</div>
</div>

<div class="field">
<label class="label">Password</label>
<div class="control">
  <input class="input" type="text" name="user_pwd" id="user_pwd">
</div>
</div>


<div class="field">
  <label class="label">Avatar</label>
  <div class="control">
    <div class="select">
      <select>
        <option>Select dropdown</option>
        <option>Dog</option>
      </select>
      <input class="input" type="text" name="user_gravatar" id="user_gravatar">
    </div>
  </div>
</div>

<div class="field">
  <label class="label">Bio</label>
  <div class="control">
    <textarea class="textarea" placeholder="Textarea"></textarea>
    <input class="input" type="text" name="user_bio" id="user_bio">
  </div>
</div>

<div class="field">
<label class="label">User Role</label>
<div class="control">
  <input class="input" value="1" name="user_role" id="user_role">
</div>
</div>

<div class="field">
  <div class="control">
    <label class="checkbox">
      <input type="checkbox">
      I agree to the <a href="#">terms and conditions</a>
    </label>
  </div>
</div>

<div class="field">
  <div class="control">
    <label class="radio">
      <input type="radio" name="question">
      Yes
    </label>
    <label class="radio">
      <input type="radio" name="question">
      No
    </label>
  </div>
</div>

<div class="field is-grouped">
  <div class="control">
    <button class="button is-link">Submit</button>
  </div>
  <div class="control">
    <button class="button is-link is-light">Cancel</button>
  </div>
</div>
  <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
