<?php

    $con = mysqli_connect("localhost", "root", "", "votingSystem");

    if(!$con){
        die(mysqli_error($con));
    }

?>