<?php

    include('./connect.php');

    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $image = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $std = $_POST['std'];

    if($password!=$cpassword){
        echo "
            <script>
            alert('Passwords didnt match');
            window.location='../partials/register.php';
            </script>
        ";
    }else{
        move_uploaded_file($tmp_name, "../uploads/$image");
        $sql="insert into `userData` (username,photo,phone,password,standard,status,votes) values ('$username','$image','$phone','$password','$std',0,0)";

        $result=mysqli_query($con,$sql);

        if($result){
            echo "
                        <script>
                            alert('User created successfully');
                            window.location = '../index.php';
                        </script>
                    ";
        }
    }

    // else {
    //     $sql="insert into `userData` (username,phone,password,standard,status,votes) values ('$username','$phone','$password','$standard',0,0)";

    //     $result=$mysqli_query($con,$sql);
    
    //     if($result){
    //         echo "
    //             <script>
    //                 alert('User created successfully');
    //                 window.location = '../index.php';
    //             </script>
    //         ";
    //     }
    


?>