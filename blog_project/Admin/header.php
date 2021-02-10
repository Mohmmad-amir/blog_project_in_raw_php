<?php

// session_start();
// if (!$_SESSION['user_email']) {
//     header('location:login.php');
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donkey || Admin || Dashboard</title>

    <link rel="shortcut icon" href="./images/favIcon.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <div class="bg-docnky-special">
        <div class="container clearfix py-3">
            <h1 class="float-left">Dashboard</h1>
            <a href="logout.php" class="logout f-30 float-right"><i class="fas fa-sign-out-alt"></i></a>
        </div>
    </div>
    <div class="d-flex">
        <div class="bg-doncky-1" id="sidebar">
            <span id="sidebar-collupse">&lt; &lt;</span>
            <div class="sidebar-links">

                <a href="index.php" class="sidebar-link active">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="link-text">Banner</span>
                </a>
                <a href="post_input.php" class="sidebar-link active">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="link-text">Input</span>
                </a>
                <a href="post_table.php" class="sidebar-link active">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="link-text">Table</span>
                </a>
            </div>

        </div>
        <div id="main">