<?php include "templates/header.php"?>
<!-- <ul>
  <li><a href="create.php">Create</a></li>
  <li><a href="read.php">Read</a></li>
  <li><a href="update.php">Update</a></li>
  <li><a href="delete.php">Delete</a></li>
</ul> -->

<form name="frmUser" method="post" action="">
	<div class="message"><?php if($message!="") { echo $message; } ?></div>
		<table border="0" cellpadding="10" cellspacing="1" width="500" align="center" class="tblLogin">
			<tr class="tableheader">
			<td align="center" colspan="2">Enter Login Details</td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="text" name="userName" placeholder="User Name" class="login-input"></td>
			</tr>
			<tr class="tablerow">
			<td>
			<input type="password" name="password" placeholder="Password" class="login-input"></td>
			</tr>
			<tr class="tableheader">
			<td align="center" colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
			</tr>
		</table>
</form>
<br>
<br>
<div class="container">
  <div class="has-text-centered">
  	<a class="button" href="adminDashboard.php">Go to admin dashboard</a>
  </div>
</div>
<?php include "templates/footer.php"?>
