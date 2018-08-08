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
    <title>About - airbmg</title>
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
                <li class="nav-item active">
                    <a class="nav-link" href="#">About<span class="sr-only">(current)</span></a>
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
                <li class="nav-item">
                    <?php
                        if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_fname'])) {
                            echo "<a class='nav-link' href='signin.php'>Sign in</a></li><li class='nav-item mr-3'><a class='nav-link' href='join.php'>Join airbmg</a></li>";
                        } else {
                            $user_id = $_SESSION['user_id'];
                            $user_fname = $_SESSION['user_fname'];
                            echo "<a class='nav-link' href='myairbmg.php' style='color:#000'>Hi, $user_fname($user_id).</a>";
                            echo "</li><li class='nav-item mr-3'><a class='nav-link' href='signout.php'>Sign out</a></li>";
                        }
                    ?>
                <form class="form-inline my-2 my-lg-0" action="error.html">
                    <input class="form-control mr-sm-2" type="search" placeholder="search for your guides' name, region, services, etc." aria-label="Search" style="width: 400px; text-align: center;">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </ul>
        </div>
    </nav>
    <!-- navBar ends here -->
    <div id="container" class="shadow">
        <p class="h2">What is airbmg?</p>
        <hr>
        <img src="data/airbmg_hi.png" id="airbmgLogo">
        <div id="airbmgDesc">
            <p class="h5"><!--
            <span id="airbmgDesc">
                &nbsp;Let's suppose that you are visiting Korea as a forigner, for the first time. You may feel nervous and be worried about your very first expreience in the country. What if you get lost because of those weird alphabets over the street and encounter with frightening Korean gangs? What if you got a stomachache after having your meal with unfamiliar foods?<br>&nbsp;Now, you don't have to worry about these things during your trip in Korea! 
            </span>-->
            </p>
        </div>
    </div>
    <!-- footer from here -->
    <footer id="footer">
        <span>Copyright© 2018 by airbmg. All Rights Reserved.<br>Designed and Developed by Seung-Yeon Hwang, seungyeon@seungyeon.xyz</span>
    </footer>
    <!-- bootstrap JavaScript codes -->
    <script type="text/javascript" src="bootstrapData/js/bootstrap.js"></script>
</body>

</html>