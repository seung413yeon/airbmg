<!DOCTYPE html>
<?php 
    session_start();
    require_once "db.php"
?>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <!-- browser compatibility codes -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Join - airbmg</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="signin.php">Sign in</a>
                </li>
                <li class="nav-item active mr-3">
                    <a class="nav-link" href="#">Join airbmg<span class="sr-only">(current)</span></a>
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
            <p class="h2">Join airbmg</p>
            <hr>
            <form method="post" action="join_confirm.php">
                <p>ID<input type="text" size="20" class="form-control" name="user_id"></p>
                <p>Password<input type="password" size="30" class="form-control" name="user_pw">
                <small class="form-text text-muted">Be careful on your typos.</small></p>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <p>First Name<input type="text" size="50" class="form-control" name="user_fname">
                        <small class="form-text text-muted">Each name should start with capital letter. ex) Seungyeon Hwang</small></p>
                    </div>
                    <div class="form-group col-md-6">
                        <p>Last Name<input type="text" size="50" class="form-control" name="user_lname"></p>
                    </div>
                </div>
                <p>Gender
                    <select class="custom-select" name="user_gndr">
                        <option value="">Gender</option>
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                        <option value="t">Third gender</option>
                    </select>
                </p>
                <p>Birthday<input type="text" size="8" class="form-control" name="user_bday">
                    <small class="form-text text-muted">Please type your birthday in eight digits. ex) 13/04/2001(day/month/year) → 20010413</small></p>
                <p>Nationality
                <input type="text" size="3" class="form-control" name="user_cntry">
                <small class="form-text text-muted">Please type your country's codename in three capital letters refer to <a href="data/countries.png" target="_sub">the list here</a>. ex) Korea, Republic of → KOR</small></p>
                <p>Email<input type="text" size="50" class="form-control" name="user_email">
                <small class="form-text text-muted">Be careful on your typos.</small></p>
                <br><input type="submit" class="btn btn-primary" value="Join airbmg">
            </form>
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