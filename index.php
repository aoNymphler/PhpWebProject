<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: signin.php');
    exit();
}

date_default_timezone_set('Europe/Istanbul'); // Zaman dilimini ayarlayın
$current_date = date('M d, Y'); // Tarih formatını ayarlayın
$current_time = date('H:i'); // Saat formatını ayarlayın

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halic University</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" contents="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
    <link rel="stylesheet" href="./css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel&family=Montserrat:wght@200&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
</head>
<body>
    <div class="topBar">
        <div class="topBarLeftArea">
            <?php if ($_SESSION['role'] === 'admin'): ?>
            <a href="admin_panel.php" class="fontTopBar">Admin Paneli</a> <!-- Admin Paneli bağlantısı -->
            <span>/</span>
            <?php endif; ?>
            <i class="fa-regular fa-clock"></i>
            <p class="fontTopBar">
                <?php echo $current_date; ?>
            </p>
            <span>/</span>
            <i class="fa-solid fa-gear"></i>
            <p class="fontTopBar">
                <?php echo htmlspecialchars($_SESSION['firstname'] . ' ' . $_SESSION['lastname']); ?>
            </p>
            <span>/</span>
            <i class="fa-solid fa-right-to-bracket"></i>
            <p class="fontTopBar"><a href="signin.php">Sign Out</a></p>
        </div>
        <div class="images">
            <i class="fa-brands fa-facebook-f"></i>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-regular fa-envelope"></i></a>
        </div>
    </div>
    <div class="logo">
        <img src="./assets/logo.png" class="logosize" alt="Örnek Resim" />
    </div>
    <div class="menu">
        <ul>
            <div>
                <li><a href="#" style="width: 95px; background-color: rgb(194,8,15);">
                        <p style="transform: skew(15deg);">HOME</p>
                    </a></li>
                <li><a href="#">
                        <p>STORE <i class="fa fa-angle-down fa-xs"></i></p>
                    </a></li>
                <li>
                    <a href="#" style="width: 110px;">
                        <p>LIBRARY <i class="fa fa-angle-down fa-xs"></i></p>
                    </a>
                </li>
                <li><a href="#">
                        <p>TRENDS <i class="fa fa-angle-down fa-xs"></i></p>
                    </a></li>
                <li><a href="#">
                        <p>SUPPORT <i class="fa fa-angle-down fa-xs"></i></p>
                    </a></li>
            </div>
        </ul>
    </div>
    <div class="mainPicture">
        <div class="pictureMain">
            <div class="maindiv1">
                <p class="font3">PLAYSTATION AND PC GAMES</p>
                <h3 class="font4">Welcome to Your Gaming Haven! Get ready for endless adventures!</h3>
            </div>
            <div class="maindiv2">
                <div style="text-align: center;">
                    <div class="boxMain" style="margin-left: 10px;"></div>
                    <h3 class="font17"><i>TRENDING POSTS</i></h3>
                </div>
                <div style="padding-top: 30px;" id="centerSlider">
                
                </div>
            </div>
        </div>
    </div>
    <div class="latestPreview">
        <div>
            <div class="boxB"></div>
            <i>New & Trending</i>
        </div>
    </div>
    <div class="centerpictures">
        <div class="cp">
            <div class="center-slider owl-carousel owl-theme">
            <div class="center-slider__item">
                    <div class=" imagesdivpositionmainbox99" >
                        <img src="././assets/center/c11.PNG" class="imagebox2">
                            <div style="display: inline;">
                                <i class="fa-regular fa-clock fa-sm" style="color: #5c5c5c; display: inline-block;"></i>
                                <span class="font9Price">19.99$</span>
                                <span class="font9">/</span>
                                <i class="fa-regular fa-message fa-sm" style="color: #545454;"></i>
                                <span class="font9">534</span>
                            </div>
                    </div>
                </div>
                <div class="center-slider__item">
                    <div class=" imagesdivpositionmainbox99">
                        <img src="././assets/center/c22.PNG" class="imagebox2">
                            <div style="display: inline;">
                                <i class="fa-regular fa-clock fa-sm" style="color: #5c5c5c; display: inline-block;"></i>
                                <span class="font9Price">29.99$</span> 
                                <span class="font9">/</span>
                                <i class="fa-regular fa-message fa-sm" style="color: #545454;"></i>
                                <span class="font9">250</span>
                            </div>
                    </div>
                </div>
                <div class="center-slider__item">
                    <div class=" imagesdivpositionmainbox99">
                        <img src="././assets/center/c33.PNG" class="imagebox2">
                            <div style="display: inline;">
                                <i class="fa-regular fa-clock fa-sm" style="color: #5c5c5c; display: inline-block;"></i>
                                <span class="font9Price">5.99$</span>
                                <span class="font9">/</span>
                                <i class="fa-regular fa-message fa-sm" style="color: #545454;"></i>
                                <span class="font9">126</span>
                            </div>
                    </div>
                </div>
                <div class="center-slider__item">
                    <div class=" imagesdivpositionmainbox99">
                        <img src="././assets/center/c4.PNG" class="imagebox2">
                      
                            <div style="display: inline;">
                                <i class="fa-regular fa-clock fa-sm" style="color: #5c5c5c; display: inline-block;"></i>
                                <span class="font9Price">12.99$</span>
                                <span class="font9">/</span>
                                <i class="fa-regular fa-message fa-sm" style="color: #545454;"></i>
                                <span class="font9">823</span>
                            </div>
                    </div>
                </div>
                <div class="center-slider__item">
                    <div class=" imagesdivpositionmainbox99">
                        <img src="././assets/center/c5.PNG" class="imagebox2">
                            <div style="display: inline;">
                                <i class="fa-regular fa-clock fa-sm" style="color: #5c5c5c; display: inline-block;"></i>
                                <span class="font9Price">20.99$</span>
                                <span class="font9">/</span>
                                <i class="fa-regular fa-message fa-sm" style="color: #545454;"></i>
                                <span class="font9">132</span>
                            </div>
                    </div>
                </div>
                <div class="center-slider__item">
                    <div class=" imagesdivpositionmainbox99">
                        <img src="././assets/center/c6.PNG" class="imagebox2">
                            <div style="display: inline;">
                                <i class="fa-regular fa-clock fa-sm" style="color: #5c5c5c; display: inline-block;"></i>
                                <span class="font9Price">5.99$</span>
                                <span class="font9">/</span>
                                <i class="fa-regular fa-message fa-sm" style="color: #545454;"></i>
                                <span class="font9">123</span>
                            </div>
                    </div>
                </div>
                <div class="center-slider__item">
                    <div class=" imagesdivpositionmainbox99">
                        <img src="././assets/center/c7.PNG" class="imagebox2">
                            <div style="display: inline;">
                                <i class="fa-regular fa-clock fa-sm" style="color: #5c5c5c; display: inline-block;"></i>
                                <span class="font9Price">30.99$</span>
                                <span class="font9">/</span>
                                <i class="fa-regular fa-message fa-sm" style="color: #545454;"></i>
                                <span class="font9">614</span>
                            </div>
                    </div>
                </div>
                <div class="center-slider__item">
                    <div class=" imagesdivpositionmainbox99">
                        <img src="././assets/center/c8.PNG" class="imagebox2">
                            <div style="display: inline;">
                                <i class="fa-regular fa-clock fa-sm" style="color: #5c5c5c; display: inline-block;"></i>
                                <span class="font9Price">18.99$</span>
                                <span class="font9">/</span>
                                <i class="fa-regular fa-message fa-sm" style="color: #545454;"></i>
                                <span class="font9">392</span>
                            </div>
                    </div>
                </div>
                <div class="center-slider__item">
                    <div class=" imagesdivpositionmainbox99">
                        <img src="././assets/center/c9.PNG" class="imagebox2">
                            <div style="display: inline;">
                                <i class="fa-regular fa-clock fa-sm" style="color: #5c5c5c; display: inline-block;"></i>
                                <span class="font9Price">5.99$</span>
                                <span class="font9">/</span>
                                <i class="fa-regular fa-message fa-sm" style="color: #545454;"></i>
                                <span class="font9">435</span>
                            </div>
                    </div>
                </div>
                <div class="center-slider__item">
                    <div class=" imagesdivpositionmainbox99">
                        <img src="././assets/center/c5.PNG" class="imagebox2">
                            <div style="display: inline;">
                                <i class="fa-regular fa-clock fa-sm" style="color: #5c5c5c; display: inline-block;"></i>
                                <span class="font9Price">20.99$</span>
                                <span class="font9">/</span>
                                <i class="fa-regular fa-message fa-sm" style="color: #545454;"></i>
                                <span class="font9">343</span>
                            </div>
                    </div>
                </div>
                <div class="center-slider__item">
                    <div class=" imagesdivpositionmainbox99">
                        <img src="././assets/center/c22.PNG" class="imagebox2">
                            <div style="display: inline;">
                                <i class="fa-regular fa-clock fa-sm" style="color: #5c5c5c; display: inline-block;"></i>
                                <span class="font9Price">20.99$</span>
                                <span class="font9">/</span>
                                <i class="fa-regular fa-message fa-sm" style="color: #545454;"></i>
                                <span class="font9">544</span>
                            </div>
                    </div>
                </div>
                <div class="center-slider__item">
                    <div class=" imagesdivpositionmainbox99">
                        <img src="././assets/center/c33.PNG" class="imagebox2">
                            <div style="display: inline;">
                                <i class="fa-regular fa-clock fa-sm" style="color: #5c5c5c; display: inline-block;"></i>
                                <span class="font9Price">10.99$</span>
                                <span class="font9">/</span>
                                <i class="fa-regular fa-message fa-sm" style="color: #545454;"></i>
                                <span class="font9">132</span>
                            </div>
                    </div>
                </div>
                <div class="center-slider__item">
                    <div class=" imagesdivpositionmainbox99">
                        <img src="././assets/center/c4.PNG" class="imagebox2">
                            <div style="display: inline;">
                                <i class="fa-regular fa-clock fa-sm" style="color: #5c5c5c; display: inline-block;"></i>
                                <span class="font9Price">20.99$</span>
                                <span class="font9">/</span>
                                <i class="fa-regular fa-message fa-sm" style="color: #545454;"></i>
                                <span class="font9">12</span>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottomArea">
        <div>
            <div class="bottomAreaMainDiv">
                <div class="fdiv1">
                    <img src="./assets/logo.png" style="height: 75px; margin-top: 30px;" />
                    <p class="bottomFont1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod
                        tempor
                        incididunt ut labore et dolore magna aliqua lacus vel facilisis.</p>
                    <div style="display: inline-block; margin-top: 55px; transform: skew(-15deg); ">
                        <div class="bottomFont2"><a href="#"><i class="fa-brands fa-facebook-f"
                                    style="color: #ffffff; transform: skew(15deg); "></i></a></div>
                        <div class="bottomFont2"><a href="#"><i class="fa-brands fa-twitter"
                                    style="color: #ffffff;  transform: skew(15deg); "></i></a></div>
                        <div class="bottomFont2"><a href="#"><i class="fa-brands fa-youtube"
                                    style="color: #ffffff;  transform: skew(15deg); "></i></a></div>
                        <div class="bottomFont2"><a href="#"><i class="fa-brands fa-instagram"
                                    style="color: #ffffff;  transform: skew(15deg); "></i></a></div>
                    </div>
                </div>
                <div class="fdiv2">
                    <div>
                        <div>
                            <div class="boxB" style="display: inline-block; margin-top: 35px;"></div>
                            <i class="font12">EDITOR'S CHOICE</i><br><br>
                        </div>
                        <div>
                            <div class=" imagesdivpositionmainbox2">
                                <div class="areaBox">
                                    <img src="././assets/finalpart2/c11.PNG"
                                        style="display:inline-block; height: 90px;">
                                    <p class="font10">A MONSTER PROM POSTER<br> GOT HIJACKED FOR A PAPA<br>
                                        ROACH
                                        CONCERT...
                                    </p><br>
                                </div>
                            </div>
                            <div class=" imagesdivpositionmainbox2">
                                <div class="areaBox">
                                    <img src="././assets/finalpart2/c8.PNG"
                                        style="display:inline-block; height: 90px;">
                                    <p class="font10">A MONSTER PROM POSTER<br> GOT HIJACKED FOR A PAPA<br>
                                        ROACH
                                        CONCERT...
                                    </p><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="fdiv3">
                    <div class="boxB" style="margin-top: 35px;"></div>
                    <i class="font12">TAGS CLOUD </i>
                    <div class="boxfdiv33">
                        <a href="#" class="boxfdiv3"><span class="font13">Gaming</span></a>
                        <a href="#" class="boxfdiv3"><span class="font13">Platform</span></a>
                        <a href="#" class="boxfdiv3"><span class="font13">Playstation</span></a><br>
                        <a href="#" class="boxfdiv3"><span class="font13">Hardware</span></a>
                        <a href="#" class="boxfdiv3"><span class="font13">Reviews</span></a>
                        <a href="#" class="boxfdiv3"><span class="font13">Simulation</span></a><br>
                        <a href="#" class="boxfdiv3"><span class="font13">Strategy</span></a>
                        <a href="#" class="boxfdiv3"><span class="font13">Scientific</span></a>
                        <a href="#" class="boxfdiv3"><span class="font13">References</span></a><br>
                        <a href="#" class="boxfdiv3"><span class="font13">Role-Playing</span></a>
                        <a href="#" class="boxfdiv3"><span class="font13">Adventurea</span></a>
                    </div>
                </div>
            </div>
            <div style="border-top: 1px solid #545454;"></div>
            <div class="fp22">
                <div>
                    <p class="font15"> This template was made for Halic University.
                    </p>
                </div>
                <div class="fp23">
                    <a href=""><span class="font14">About</span></a>
                    <a href=""><span class="font14">Subscribe</span></a>
                    <a href=""><span class="font14">Contact</span></a>
                    <a href=""><span class="font14">Support</span></a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/owl.carousel.min.js"></script>
    <script src="./js/index.js"></script>
    <script src="./app.js"></script>
</body>
</html>