<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .container {
            width: 400px;
        }
    </style>
</head>
<body style="padding-top: 3rem;">

<div class="container">
    <?php
    const ADMIN_EMAIL = 'admin@admin.com';
    const ADMIN_PASSWORD = '111111';
    $email = $_POST["email"];
    $password = $_POST["password"];
    session_start();
    echo "</div>";
    if (ADMIN_EMAIL == $email && ADMIN_PASSWORD == $password){
        $_SESSION['auth'] = true;
        header('Location: adduser.php');
    }else{
        header('Location: login.php');
    }




    ?>
