<?php
// Connect to MyuSQL

$con = mysqli_connect("localhost","root","","shoutit");

// Test connection
if(mysqli_connect_errno()){
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();

}
