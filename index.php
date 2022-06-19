<?php

    session_start();
    if(isset($_SESSION['id'])){
        header('location: ./partials/dashboard.php');
    };

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System - Login page</title>

    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</head>

<body class="">
    <h1 class="header text-center">Voting System</h1>
    <div class="container border mt-5 py-4 text-center">
        <h2 class="text-center ">Login Form</h2>
        <form action="./actions/login.php" method="POST">
            <!-- <input type="text" name="fullName" class="form-control mx-auto w-50 my-3" placeholder="Enter Your Full Name"> -->
            <!-- <input type="text" name="fullName" class="form-control mx-auto w-50 my-3" placeholder="Enter Your Phone No."> -->
            <input type="text" name="username" class="form-control mx-auto w-50 my-3" placeholder="Enter Your username">
            <input type="text" name="password" class="form-control mx-auto w-50 my-3" placeholder="Enter Your password">
            <select name="std" class="form-select mx-auto w-50">
                <option value="group">Group</option>
                <option value="voter">Voter</option>
            </select>
            <button type="submit" class="btn btn-dark mt-4">Login</button>
            <p class="mt-3">If you don't have a account click <a href="./partials/register.php">here</a></p>
        </form>
    </div>
</body>

</html>