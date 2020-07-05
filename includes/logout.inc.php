<?php

    //logout by destroying the session and returning to the index/home page
    session_start();
    session_unset();
    session_destroy();

    header("Location: ../index.php");