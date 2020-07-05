<!DOCTYPE html>
<html>

<head>
    <title>Profile Manager</title>
</head>

 
<style>
body {
    /* page formatting */
    font-family: Arial, Helvetica, sans-serif;
}

.quotebox {

    display: flex;
    flex-direction: row;
    justify-content: center;
}

#box1 {
    background-color: #A8A8A8;
}

#box2 {
    background-color: #A8A8A8;
}

#fonthack {
    color: #A8A8A8;
}
</style>


<body>
    <?php
    /* to include the header box */
    require "header.php";
    require 'includes/dbh.inc.php';
?>
<?php

    $username=$_SESSION['userid'];
    $userdata = mysqli_query($conn,"SELECT fullname, userstaddy, userstaddy2, usercity, userst, userzip FROM users WHERE userid = $username;");
    $result = mysqli_fetch_array($userdata);

?>
<?php
    if(isset($_GET['update'])=='success'){
        echo '<p class="status-box">Update Successful!</p>';
    }

?>

<!-- this code lets you update your personal information -->
    <div class="quotebox">
        <div class="status-box" id="box1">
            <div>*Please Update Information*</div>
            <div id="fonthack">-------</div>
            <form action="includes/profilemanager.inc.php" method="post">
                <label>Fullname: </label> <input type="text" name="fullname" placeholder="Full name..."><br>
                <label>Address: </label><input type="text" name="addy" placeholder="Address..."><br>
                <label>Address 2: </label> <input type="text" name="addy2" placeholder="Address2..."><br>
                <label>City: </label><input type="text" name="city" placeholder="City..."><br>
                <label for="state">State: </label>
                <select name="state" id="state">
                    <option value="">-- Select State --</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MI">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select><br>
                <label>Zipcode: </label><input type="text" name="zip" placeholder="Zip..."><br>
                <button type="submit" name="update-submit">Update!</button>
            </form>
        </div>
        <!-- this code displays your current personal information -->
        <div class="status-box" id="box2">
            <div>*Current Information*</div>
            <br>
            <label>Full Name: </label><?php echo $result['fullname']?><br>
            <label>Address: <?php echo $result['userstaddy']?><br>
                <label>Address 2: <?php echo $result['userstaddy2']?><br>
                    <label>City: <?php echo $result['usercity']?></label><br>
                    <label>State: <?php echo $result['userst']?></label><br>
                    <label>Zipcode: <?php echo $result['userzip']?></label><br>
        </div>
    </div>
</body>

</html>