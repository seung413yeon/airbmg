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
                        if(isset($_SESSION['user_id'])){
                            $user_fname = $_SESSION['user_fname'];
                            $user_lname = $_SESSION['user_lname'];
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
        <form method="post" action="member_update.php">
            <fieldset>
                <legend>마이페이지</legend>
                <table>
                    <tr>
                        <td>Id</td>
                        <td><input type="text" name="userid" value="<?php echo $_SESSION['user_id'];?>" disabled></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" size="128" name="user_pw" placeholder="Password"></td>
                    </tr>
                    <tr>
                        <td>Full Name</td>
                        <td><input type="text" placeholder="Name" value="<?php echo $user_fname; echo $user_lname; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><input type="text" value="<?php echo $member['adress']; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td>Birthday</td>
                        <td><input type="text" value="<?php echo $member['adress']; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td>Nationality</td>
                        <td><input type="text" value="<?php echo $member['adress']; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="text" size="128" name="user_email" placeholder="Password"></td>
                    </tr>
                    <tr>
                        <td>HOST</td>
                        <td><input type="text" value="<?php echo $member['adress']; ?>" disabled></td>
                    </tr>
                </table>
                <input type="submit" value="정보변경" />
            </fieldset>
        </form>
    </div>
    <!-- footer from here -->
    <footer id="footer">
        <span>Copyright© 2018 by airbmg. All Rights Reserved.<br>Designed and Developed by Seung-Yeon Hwang, seungyeon@seungyeon.xyz</span>
    </footer>
    <!-- bootstrap JavaScript codes -->
    <script type="text/javascript" src="bootstrapData/js/bootstrap.js"></script>
</body>

</html>

<?php }else{
	echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
}
?>