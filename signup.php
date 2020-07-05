<!DOCTYPE html>
<html>

<head>
    <title>Please Register</title>
</head>

 
<style>
body {
    /* page formatting */
    font-family: Arial, Helvetica, sans-serif;
}

.quotebox {

    display: flex;
    flex-direction: column;
    align-items: center;
}
</style>

<body>

<?php
/* to include the header box */
    require "header.php"
?>

    <main class="status-box">
        <h1>Register</h1>
        <?php
            if(isset($_GET['error'])){
                if($_GET['error']=='emptyfields'){
                    echo '<p>No Empty Fields Allowed</p>';
                }
                if($_GET['error']=='invalidmailuid'){
                    echo '<p>Invalid Username</p>';
                }
                if($_GET['error']=='invalidemail'){
                    echo '<p>Invalid Email</p>';
                }
                if($_GET['error']=='pwdcheckuid'){
                    echo '<p>Password Must Match</p>';
                }
                if($_GET['error']=='usertaken'){
                    echo '<p>Username Taken</p>';
                }
                if($_GET['error']=='pwdcheckuid'){
                    echo '<p>Password Must Match</p>';
                }
            }
            elseif(isset($_GET['signup'])=='success'){
                echo '<p>Signup Successful!</p>';
            }


        ?>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username..."><br>
            <input type="text" name="mail" placeholder="Email..."><br>
            <input type="password" name="pwd" placeholder="Password..."><br>
            <input type="password" name="pwd-repeat" placeholder="Repeat Password..."><br>
            <button type="submit" name="signup-submit">Register!</button>
        </form>
    </main>
</body>
</hmtl>