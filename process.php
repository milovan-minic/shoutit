<?php

include "database.php";

// Check if form is submitted
if(isset($_POST["submit"])){
    $user = mysqli_real_escape_string($con, $_POST["user"]);
    $message = mysqli_real_escape_string($con, $_POST["message"]);

    // Set timezone
    date_default_timezone_set("Europe/Belgrade");
    $time = date("h:i:s a", time());

    // Validate input
    if((!isset($user) || $user == '') && (!isset($message) || $message == '')){
        $error = "Please fill in your name and a message.";
        header("Location: index.php?error=" . urlencode($error));
        exit();
    } elseif((!isset($user) || $user == '') && isset($message)) {
        $error = "Please fill in your name.";
        header("Location: index.php?error=" . urlencode($error));
        exit();
    } elseif((!isset($message) || $message == '') && isset($user)) {
        $error = "Please fill in your message.";
        header("Location: index.php?error=". urlencode($error));
        exit();
    } else {
        $query = "INSERT INTO shouts (user, message, time)
                  VALUES ('$user', '$message', '$time')";

        if(!mysqli_query($con, $query)){
            die("ERROR: " . mysqli_error($con));
        } else{
            header("Location: index.php");
            exit();
        }
    }
}
