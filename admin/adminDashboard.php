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

    <ul>
    <li><a href="readAdmin.php">Find other admin accounts</a></li>
    <li><a href="updateAdmin.php">Update admin account</a></li>
    <li><a href="deleteAdmin.php">Delete account</a></li>
    </ul>
</div>

<?php include "templates/footer.php"?>