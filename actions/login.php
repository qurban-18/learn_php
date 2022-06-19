<?php

    session_start();
    include('./connect.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $std = $_POST['std'];

    $sql = "Select * from `userData` where username='$username' and password='$password' and standard='$std'";

    $result = mysqli_query($con,$sql);

    if(mysqli_num_rows($result)>0){
        $sql="Select username,photo,votes,id from `userData` where standard='group'";
        
        $resultGroups = mysqli_query($con,$sql);
        if(mysqli_num_rows($resultGroups)>0){
            $groups = mysqli_fetch_all($resultGroups,MYSQLI_ASSOC);
            $_SESSION['groups'] = $groups;
        };
        $data = mysqli_fetch_array($result);
        $_SESSION['id'] = $data['id'];
        $_SESSION['status'] = $data['status'];
        $_SESSION['data'] = $data;

        header('location:../partials/dashboard.php');
    }else{
        echo "
        <script>alert('Invalide credentials')</script>
        ";
    }

?>