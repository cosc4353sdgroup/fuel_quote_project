<?php
if(isset($_POST['login-submit'])){

    require 'dbh.inc.php';

    //pulls mailuid and pwd from header page when clicking the login button

    $mailuid = $_POST['mailuid'];
    $pwd = $_POST['pwd'];

    //error checking for the login
    if(empty($mailuid)||empty($pwd))
    {
        header("Location:../index.php?error=emptyfields");
        exit();
    }
    else{
        //if fields are entered then login the user if the password matches the database
        $sql = "SELECT * FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location:../index.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $mailuid);
            mysqli_stmt_execute($stmt);
            $results = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($results)){
                $pwdcheck = password_verify($pwd, $row['userpwd']);
                //if password is wrong send error wrong password in header
                if($pwdcheck == false){
                    header("Location:../index.php?error=wrongpassword");
                    exit();
                }
                elseif($pwdcheck == true){
                    session_start();
                    $_SESSION['userid']= $row['userid'];
                    $_SESSION['useruid'] = $row['username'];

                    header("Location:../index.php?error=sucess");
                    exit();
                }
                else{
                    header("Location:../index.php?error=wrongpassword");
                    exit();
                }
            }
            else{
                header("Location:../index.php?error=nouser");
                exit();
            }
        }
    }
}
else{
    header("Location:../index.php");
    exit();
}