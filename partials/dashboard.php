<?php

    session_start();
    if(!isset($_SESSION['id'])){
        header("location: ../");
    };

    $data = $_SESSION['data'];

    if($_SESSION['status']==1){
        $status = "<b class='text-success'>Voted</b>";
    }else{
        $status = "<b class='text-danger'>Not voted</b>";
    };

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System - Dashboard</title>

    <!-- css file -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</head>

<body class="bg-secondary text-light">
    <div class="container my-5">
        <div>
            <!-- <a href="../"><button class="btn btn-dark">Back</button></a> -->
            <a href="logout.php"><button class="btn btn-dark mx-2">Logout</button></a>

            <h2 class="my-3 text-center">Voting System</h2>
        </div>

        <div class="row">
            <div class="col-md-7">
                <!-- For Groups -->
                <?php 
                    if(isset($_SESSION['groups'])){
                        $groups = $_SESSION['groups'];
                        for($i=0;$i<count($groups);$i++){
                            ?>
                <div class="row my-2">
                    <div class="col-md-4">
                        <img src="../uploads/<?php echo $groups[$i]['photo']?>" alt="img" />
                    </div>
                    <div class="col-md-8">
                        <strong class='text-dark h5'>Group Name: </strong><?php echo $groups[$i]['username']?><br />
                        <strong class='text-dark h5'>Votes: </strong><?php echo $groups[$i]['votes']?><br />
                    </div>
                </div>
                <form action="../actions/voting.php" method="POST">
                    <input type="hidden" name="groupVotes" value=<?php echo $groups[$i]['votes']?>>
                    <input type="hidden" name="groupId" value=<?php echo $groups[$i]['id']?>>

                    <?php
                        if($_SESSION['status']==1){
                            ?>
                    <div class="text-center ">
                        <button type="submit" class="btn btn-success">Voted</button>
                    </div>
                    <?php
                        }else{
                            ?>
                    <div class="text-center ">
                        <button type="submit" class="btn btn-danger">Vote</button>
                    </div>
                    <?php
                        };
                    ?>

                </form>
                <hr />


                <?php
                        }
                    }else{
                        ?>

                <div>
                    <p>No groups to display</p>
                </div>
                <?php
                    }
                ?>
            </div>
            <div class="col-md-5">
                <!-- For user profile -->
                <img src="../uploads/<?php echo $data['photo']?>" alt="user img" />
                <br>
                <br>
                <strong class='text-dark h5'>User Name: </strong><?php echo $data['username']?><br /><br>
                <strong class='text-dark h5'>Mobile: </strong><?php echo $data['phone']?><br /><br>
                <strong class='text-dark h5'>Status: </strong><?php echo $status?><br /><br>
            </div>
        </div>

    </div>
</body>

</html>