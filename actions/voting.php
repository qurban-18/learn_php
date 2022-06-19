<?php

    session_start();
    include('./connect.php');

    $votes = $_POST['groupVotes'];
    $totalVotes = $votes + 1;

    $g_id = $_POST['groupId'];
    $u_id = $_SESSION['id'];

    $updateVotes = mysqli_query($con,"UPDATE `userData` SET votes='$totalVotes' WHERE id='$g_id'");

    $updateStatus = mysqli_query($con,"UPDATE `userData` SET status='1' WHERE id='$u_id'");

    if($updateVotes and $updateStatus){
        $getGroups = mysqli_query($con, "SELECT username,photo,votes,id FROM `userData` WHERE standard='group'");
        $groups = mysqli_fetch_all($getGroups,MYSQLI_ASSOC);
        $_SESSION['groups'] = $groups;
        $_SESSION['status'] = 1;
        header('location: ../partials/dashboard.php');
    }else{
        echo "<script>
            alert('Technical error !! Vote after sometime);
            window.location = '../partials/dashboard.php';
        </script>";
    };

?>