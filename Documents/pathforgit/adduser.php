<?php
session_start();
$isRestricted = false;
if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
    $isRestricted = true;
}?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body{
            padding-top: 3rem;
        }
        .container {
            width: 400px;
        }
    </style>
</head>
<body>
<div class="container">
    <?php if($isRestricted):?>

        <h3>Add New User</h3>
        <form action="handler.php" method="post" enctype="multipart/form-data">
            <!-- Form to add User -->
        </form>
    <?php else:?>
    <span>
           Content is restricted, please <a href="login.php">Login</a>
</span>
    <?php endif;?>
</div>
</body>
</html>
