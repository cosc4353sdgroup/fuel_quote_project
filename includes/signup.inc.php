<?php

if(isset($_POST['signup-submit'])){
    require 'dbh.inc.php';

    //grab uid, mail, pwd from signup.php and assign variables
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $passwordrepeat = $_POST['pwd-repeat'];

    //error checking statements
    if(empty($username) || empty($email) || empty($pwd) || empty($passwordrepeat)){
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)&& !preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invalidemail&uid=".$username);
        exit();
    }
    elseif(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    }
    elseif($pwd != $passwordrepeat){
        header("Location: ../signup.php?error=pwdcheckuid&uid=".$username."&mail=".$email);
        exit();
    }
    //search database for users with the same username
    else{
        $sql = "SELECT userid FROM users WHERE userid=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            //error msg for username taken
            if($resultCheck > 0){
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            }
            //if passes all if statements above then insert values into the database
            else{
                $sql = "INSERT INTO users (username, useremail, userpwd) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                //if failed then return sql error header
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                //else hash password and return sucessful signup msg
                else{
                    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username,$email,$hashedpwd);
                    mysqli_stmt_execute($stmt);
                    header("Location:../signup.php?signup=success");
                    exit();
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}    
else{
        header("Location:../signup.php");
        exit();
    }