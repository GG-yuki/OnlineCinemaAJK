<?php
    include "bootstrap.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <style type="text/css">
            @import url('style.css');
        </style>
        <title></title>
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
            <a class="navbar-brand" href="#">OnlineCinema</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Login <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="register.php">Register <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Jumbotron -->
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4_register">Login</h1>
                <div class="lead_register">
                    <p> Belum punya akun? </p>
                </div>
                <p> <a href="register.php" class="btn-register">Register</a> </p>
            </div>
        </div>

        <!-- Form Register -->
        <div class="login">
            <form action="insert.php" method="POST">
                <b> <h1>Username</h1> </b>
                <p> <input type="text" title="username" name="username" /> </p>
                <b> <h1>Password</h1> </b>
                <p> <input type="Password" title="password" name="password" /> </p>
                <p> <button type="submit" class="btn-login">Submit</button> </p>
            </form>
        </div>
    </body>
</html>