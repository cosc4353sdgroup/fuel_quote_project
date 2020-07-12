<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="This is an ex of a meta desp. this will show up in the search results.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>


<body>

    <header>
        <nav class="topnav">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>

            <?php 
            /* this code sets up the header box included in each page */
                if(isset($_SESSION['userid'])){
                    echo    '
                    <ul>
                    <li><a href="profilemanager.php">Manage Profile</a></li>
                    <li><a href="fuelquote.php">Fuel Quote</a></li>
                    <li><a href="history.php">Quote History</a></li>
                    </ul>
                    <div class="topnav-right">
                    <form action="includes/logout.inc.php" method="post">
                            <button type="submit" name="logout-submit">Logout</button>
                             </form>';
                }
                else {
                    echo   '<div class="topnav-right">
                                <form action="includes/logincheck.inc.php" method="post">
                                <input type="text" name="mailuid" placeholder=" Type Username">
                                <input type="password" name="pwd" placeholder="Type Password">
                                <button type="submit" name="login-submit">Login</button>
                                <a href="signup.php">Register</a>
                                </form>';
                }
            ?>
            </div>
        </nav>
    </header>
</body>

</html>
