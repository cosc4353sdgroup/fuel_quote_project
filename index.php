<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
</head>

 
<style>
body {
    /* page formatting */
    font-family: Arial, Helvetica, sans-serif;
}
</style>

<body>
<?php
    /* to include the header box */
    require "header.php"
?>

    <main class="status-box">
        <?php 
        /* this code gives the log in prompts for the home page */
        if(isset($_SESSION['userid'])){
            echo '<p>You are logged in!</p>';
            
        }
        else {
            echo '<p>You are not signed in!</p>';
            echo '<p>Please sign in or register.</p>';
        }
    ?>
    </main>
</body>

</html>