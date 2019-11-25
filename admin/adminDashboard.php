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
                <li><a href="updateAdmin.php">Update Admin Account</a></li>
                <li><a href="deleteAdmin.php">Delete Admin Account</a></li>
            </ul>
        </div>
        <div class="column" id="secondC"> 
            <!-- Second column -->
            <br>
            <p class="is-size-5 has-text-centered has-text-grey">Please make a selection.</p>
        </div>
    </div>

</div>

<?php include "templates/footer.php"?>