<?php
include('db.php');

if(isset($_POST['login_btn']))
{
    $email_login = $_POST['emaill']; 
    $password_login = $_POST['passwordd']; 

    $query = "SELECT * FROM users WHERE email='$email_login' AND password='$password_login' LIMIT 1";
    $query_run = mysqli_query($conn, $query);
    $usertypes = mysqli_fetch_array($query_run);

    if($usertypes['user_type'] == "admin")
    {
        $_SESSION['username'] = $email_login;
        header('Location: Admin/home.php');
    }
    else if($usertypes['user_type'] == "user")
    {
        $_SESSION['cusername'] = $email_login;
        header('Location: Admin/home.php');
    }
    else
    {
        $_SESSION['status'] = "Email / Password is Invalid";
        header('Location: login.php');
    }
}
?>