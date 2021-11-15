<!doctype html>
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
    // code with validation will be here and saving user will be here
    echo "<div class='invalid-message'>";
    require 'db.php';
    require 'upload.php';

    echo "</div>";
    if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["gender"])){
        echo "<span class='invalid-message'>Invalid Data<span>";
    }
    else{





        if (!file_exists('database/users.csv')){
            file_put_contents('database/users.csv', '');
        }
        $name = $_POST["name"];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        if($isUploaded = true){
            $filePath ='';
            $path = $filePath;
        }else{
            $path = '';
        }

        // id можно не вказувати, тому що auto increment
// пароль будемо встановлювати всім однаковий
        $sql = "INSERT INTO users (email, name, gender, password, path_to_img)
   VALUES ('$email', '$name','$gender', '11111', '$filePath')";
        echo $sql;
        $res = mysqli_query($conn, $sql);
        if ($res) {
            $valid = true;
        }


        echo "User Added: " . $_POST["name"] . "<br>".
            "Email: " . $_POST["email"]. "<br>".
            "Gender: " . $_POST["gender"] . "<br>".
            "Image path: " . $path . "<br>";





    }
    filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    ?>
    <hr>
    <a class="btn" href="adduser.php">return back</a>
    <a class="btn" href="table.php">view list</a>
</div>
</body>


