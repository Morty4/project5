<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8" />
  <title>CRUD</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body>
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="index.php">
      <img src="images/logo.png">
    </a>

      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="create.php">Create</a>
        <a class="navbar-item" href="read.php">Read</a>
        <a class="navbar-item" href="update.php">Update</a>
        <a class="navbar-item" href="delete.php">Delete</a>
      </div>

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            <a class="button is-primary">
            <strong>Sign up</strong>
          </a>
            <a class="button is-light">
            Log in
          </a>
          </div>
        </div>
      </div>
    </div>
  </nav>
<!--   <h1 class="title">Simple database app</h1> -->
  <div class="container">