<!DOCTYPE html>
<?php
    session_start();
    require_once "db.php";
?>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <!-- browser compatibility codes -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in - airbmg</title>
    <!-- bootstrap css codes -->
    <link rel="stylesheet" href="bootstrapData/css/bootstrap.css">
    <link rel="stylesheet" href="cssCustom.css">
</head>

<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
    <!-- navBar from here -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
        <a class="navbar-brand" href="index.php">
        <img src="data/airbmg.png" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <?php
                            if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_fname'])) {
                                echo "<a class='nav-link' href='error.html'>Guide Hosting</a>";
                            } else {
                                $res = login($_SESSION['user_id'], $_SESSION['user_pw']);
                                if(isset($_SESSION['user_id']) || isset($_SESSION['user_fname']) || $res['host']===1) {
                                    echo "<a class='nav-link' href='myairbmg.php'>Guide Hosting</a>";
                                }
                            }
                        ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="error.html">Support</a>
                </li>
                <li class="nav-item">
                    <?php
                            if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_fname'])) {
                                echo "";
                            } else {
                                $user_id = $_SESSION['user_id'];
                                $user_fname = $_SESSION['user_fname'];
                                echo "<a class='nav-link' href='myairbmg.php'>My aribmg</a>";
                            }
                        ?>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Sign in<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link" href="join.php">Join airbmg</a>
                </li>
                <form class="form-inline my-2 my-lg-0" action="error.html">
                    <input class="form-control mr-sm-2" type="search" placeholder="search for your guides' name, region, services, etc." aria-label="Search" style="width: 400px; text-align: center;">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </ul>
        </div>
    </nav>
    <!-- navBar ends here -->
    <div id="container" class="shadow">
        <div>
            <p class="h2">Sign in</p>
            <hr>
            <?php
                if(!isset($_SESSION['user_id'])||!isset($_SESSION['user_fname'])){
            ?>
            <form method="post" action="signin_confirm.php">
                <p>ID: <input type="text" class="form-control" name="user_id" placeholder="Enter your ID"></p>
                <p>Password: <input type="password" class="form-control" name="user_pw" placeholder="Enter your password"></p>
                <input type="submit" class="btn btn-primary" value="Sign in">
                <small class="form-text text-muted">Or <a href="join.php">Join airbmg here.</a></small>
            </form>
            <?php
                }elseif($user_id === $_SESSION['user_id']&&$user_fname === $_SESSION['user_fname']){
                echo "<script>alert('You are already signed in, $user_fname($user_id).')</script>";
                header("Location: index.php");
                die();
                }else{
                    echo "<script>alert('Inappropriate Access.')</script>";
                    header("Location: index.php");
                    die();
                }
            ?>
        </div>
    </div>
    <!-- footer from here -->
    <footer id="footer" class="fixed-bottom">
        <span>Copyright© 2018 by airbmg. All Rights Reserved.<br>Designed and Developed by Seung-Yeon Hwang, seungyeon@seungyeon.xyz</span>
    </footer>
    <!-- bootstrap JavaScript codes -->
    <script type="text/javascript" src="bootstrapData/js/bootstrap.js"></script>
</body>

</html>