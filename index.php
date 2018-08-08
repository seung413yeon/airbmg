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
    <title>airbmg</title>
    <!-- bootstrap css codes -->
    <link rel="stylesheet" href="bootstrapData/css/bootstrap.css">
    <link rel="stylesheet" href="cssCustom.css">
</head>

<body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
    <!-- navBar from here -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
        <a class="navbar-brand" href="#">
        <img src="data/airbmg.png" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class='nav-item'>
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
        <section>
            <!-- Booking banner from here -->
            <article>
                <div class="rounded" id="inner_container">
                    <div id="quickBooking" class="border border-light rounded shadow-lg p-3 mb-5 bg-white rounded">
                        <form action="error.html">
                            <label for="region">Regions</label>
                            <p>
                                <select class="custom-select" name="region" id="">
                                <option value="">Select region</option>
                                <option value="seoul">Seoul</option>
                                <option value="busan">Busan</option>
                                <option value="jeju">Jeju</option>
                                <option value="others">Others</option>
                            </select>
                            </p>
                            <label for="year">Year</label>
                            <p>
                                <select class="custom-select" name="year" id="">
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            </select>
                            </p>
                            <label for="month">Month</label>
                            <p>
                                <select class="custom-select" name="month" id="">
                                <option value="jan">January</option>
                                <option value="feb">February</option>
                                <option value="mar">March</option>
                                <option value="apr">April</option>
                                <option value="may">May</option>
                                <option value="jun">June</option>
                                <option value="jul">July</option>
                                <option value="aug">August</option>
                                <option value="sep">September</option>
                                <option value="oct">October</option>
                                <option value="nov">November</option>
                                <option value="dec">December</option>
                            </select>
                            </p>
                            <label for="day">Day</label>
                            <p>
                                <select class="custom-select" name="" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            </p>
                            <input class="btn btn-primary" type="submit" value="Book a Guide">
                        </form>
                    </div>
                </div>
            </article>
            <!-- Booking menu ends here -->
            <article>
                <br>
                <hr>
                <div class="" id="bestGuide">
                    <p class="h4">Best Guide of Month</p>
                    <a href="error.html">
                        <div id="bestGuide_1">
                            <div class="border border-light rounded shadow-sm rounded" id="bestGuide_1_inner">
                                <div class="border border-light rounded" id="bestGuide_1_pic">
                                    <img src="data/profile_default.png" alt="">
                                </div>
                            </div>
                            <div id="bestGuide_info">
                                <p class="h5" id="name">써똥휘</p>
                                <p class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A excepturi molestiae aliquam corrupti illo distinctio natus necessitatibus fuga culpa nisi tempore magni modi impedit, consectetur mollitia sint explicabo autem porro.</p>
                            </div>
                        </div>
                    </a>
                    <a href="error.html">
                        <div id="bestGuide_2">
                            <div class="border border-light rounded shadow-sm rounded" id="bestGuide_2_inner">
                                <div class="border border-light rounded" id="bestGuide_2_pic">
                                    <img src="data/profile_default.png" alt="">
                                </div>
                            </div>
                            <div id="bestGuide_info">
                                <p class="h5" id="name">노쑤찐</p>
                                <p class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A excepturi molestiae aliquam corrupti illo distinctio natus necessitatibus fuga culpa nisi tempore magni modi impedit, consectetur mollitia sint explicabo autem porro.</p>
                            </div>
                        </div>
                    </a>
                    <a href="error.html">
                        <div id="bestGuide_3">
                            <div class="border border-light rounded shadow-sm rounded" id="bestGuide_3_inner">
                                <div class="border border-light rounded" id="bestGuide_3_pic">
                                    <img src="data/profile_default.png" alt="">
                                </div>
                            </div>
                            <div id="bestGuide_info">
                                <p class="h5" id="name">Name3</p>
                                <p class="h6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A excepturi molestiae aliquam corrupti illo distinctio natus necessitatibus fuga culpa nisi tempore magni modi impedit, consectetur mollitia sint explicabo autem porro.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </article>
        </section>
    </div>
    <!-- footer from here -->
    <footer id="footer">
        <span>Copyright© 2018 by airbmg. All Rights Reserved.<br>Designed and Developed by Seung-Yeon Hwang, seungyeon@seungyeon.xyz</span>
    </footer>
    <!-- bootstrap JavaScript codes -->
    <script type="text/javascript" src="bootstrapData/js/bootstrap.js"></script>
</body>

</html>