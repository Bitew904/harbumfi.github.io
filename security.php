<?php
session_start();
include('db.php');
if($conn)
{
    // echo "Database Connected";
}
else
{
    header("Location: db.php");
}

if(!$_SESSION['username'])
{
    header('Location: login.php');
}
?>