<!DOCTYPE html>
<html>
<head>
    <title>Polygonator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
    <link href="libs/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">
    <link href="libs/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" >
</head>
<body>
<section class="header" id="header">
    <div class="container">
        <div class="header__container">
            <a href="index.html" class="header__logo-wrap">
                <img src="img/logo.svg" class="logo header__logo">
            </a>

            <button class="header-menu-toggle only-mobile" onclick="toggleMenu()">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>

            <ul class="header-menu" id="header-menu">
                <li class="header-menu__item">
                    <a href="about.html" class="header-menu__link">ABOUT</a>
                </li>
                <li class="header-menu__item">
                    <a href="contacts.html" class="header-menu__link">CONTACTS</a>
                </li>
                <li class="header-menu__item">
                    <a href="services.html" class="header-menu__link header-menu__link_active">SERVICES</a>
                </li>
                <li class="header-menu__item">
                    <a href="blog.html" class="header-menu__link">BLOG</a>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="container">
    <section class="services-top">
        <div class="services-top-title">
            <h1 class="title">SERVICES</h1>
        </div>
        <div class="services-menu">
            <ul class="services-menu__list">
                <li class="services-menu__item">
                    <a href="services.php" class="services-menu__link  <?php if (!isset($_GET['cat'])) echo 'services-menu__link_active'; ?>">All</a>
                </li>
                <li class="services-menu__item">
                    <a href="services.php?cat=interactive" class="services-menu__link <?php if ($_GET['cat'] == 'interactive') echo 'services-menu__link_active'; ?>">Interactive Tour</a>
                </li>
                <li class="services-menu__item">
                    <a href="services.php?cat=modelling" class="services-menu__link <?php if ($_GET['cat'] == 'modelling') echo 'services-menu__link_active'; ?>">3D Modelling</a>
                </li>
                <li class="services-menu__item">
                    <a href="services.php?cat=visualization" class="services-menu__link <?php if ($_GET['cat'] == 'visualization') echo 'services-menu__link_active'; ?>">Visialisation</a>
                </li>
                <li class="services-menu__item">
                    <a href="#" class="services-menu__link">Animation</a>
                </li>
            </ul>
        </div>
    </section>

    <section class="services">
        <div class="grid">
    <?php
        function printImages($paths) {
            $allowed_types=array("jpg", "png", "gif");  //разрешеные типы изображений
            $all_files = array();

            foreach ($paths as $path) {
                $dir_handle = @opendir($path) or die("Ошибка при открытии папки !!!");
                $files = scandir($path);

                $len = count($files);
                for ($i = 0; $i < $len; $i++) {
                    if($files[$i] == "." || $files[$i] == "..") continue;  //пропустить ссылки на другие папки
                    $files[$i] = $path.'/'.$files[$i];
                }
                $all_files = array_merge($all_files, $files);
            }

            foreach( $all_files as $file) {    //поиск по файлам
                if($file=="." || $file == "..") continue;  //пропустить ссылки на другие папки
                $file_parts = explode(".",$file);          //разделить имя файла и поместить его в массив
                $ext = strtolower(array_pop($file_parts));   //последний элеменет - это расширение


                if(in_array($ext,$allowed_types))
                {
                    echo '<div class="grid__item">
                                <a href="'.$file.'" class="services__link js-open-gallery" rel="services-all">
                                    <img src="'.$file.'" alt="" class="services__image">
                                </a>
                         </div>';
                }
            }
            closedir($dir_handle);  //закрыть папку
        }

        $paths = array(
            "./img/services/visualization",
            "./img/services/interactive",
            "./img/services/modelling",
        );

        if (isset($_GET['cat'])) {
            if ($_GET['cat'] == 'visualization') {
                printImages(array("./img/services/visualization"));
            } else if ($_GET['cat'] == 'interactive') {
                printImages(array("./img/services/interactive"));
            }
            else if ($_GET['cat'] == 'modelling') {
                printImages(array("./img/services/modelling"));
            }
            else {
                printImages($paths);
            }
        } else {
            printImages($paths);
        }
    ?>
        </div>
    </section>
</section>



<section class="footer">
    <div class="container footer__container">
        <div class="footer__column">
            <div class="footer__column-content">
                <div class="footer__title">
                    We offer
                </div>
                <br>
                <div class="footer__description">
                    <a href="" class="footer__link">Ineractive VR</a><br>
                    <a href="" class="footer__link">3D Modelling</a><br>
                    <a href="" class="footer__link">Visialisation</a><br>
                    <a href="" class="footer__link">Animation</a><br>
                </div>
            </div>
            <div class="footer__column-content">
                <div class="footer__title">
                    Get in touch
                </div>
                <br>
                <div class="footer__description">
                    <a href="" class="footer__link">Russia</a><br>
                    <a href="" class="footer__link">Greece</a><br>
                    <a href="" class="footer__link">China</a><br>
                </div>
            </div>
        </div>
        <div class="footer__column footer__column_logo">
            <div class="footer__column-content footer__column-content_logo">
                <img src="img/logo.svg" class="logo footer__logo">
                <div class="footer-social">
                    <a href="">
                        <img src="img/facebook.svg" alt="facebook" title="facebook" class="footer-social__img">
                    </a>
                    <a href="">
                        <img src="img/twitter.svg" alt="twitter" title="twitter" class="footer-social__img">
                    </a>
                    <a href="">
                        <img src="img/skype.svg" alt="skype" title="skype" class="footer-social__img">
                    </a>
                    <a href="">
                        <img src="img/linkedin.svg" alt="linkedin" title="linkedin" class="footer-social__img">
                    </a>
                    <a href="">
                        <img src="img/youtube.svg" alt="youtube" title="youtube" class="footer-social__img">
                    </a>
                </div>
            </div>
        </div>

        <div class="footer__column">
            <div class="footer__column-content">
                <div class="footer__title">
                    Media
                </div>
                <br>
                <div class="footer__description">
                    <a href="" class="footer__link">Amazing VR</a><br>
                    <a href="" class="footer__link">Off-plan property</a><br>
                    <a href="" class="footer__link">Why Interactive VR</a><br>
                    <a href="" class="footer__link">How does it work</a><br>
                </div>
            </div>

            <div class="footer__column-content">
                <div class="footer__title">
                    Navigation
                </div>
                <br>
                <div class="footer__description">
                    <a href="about.html" class="footer__link">About</a><br>
                    <a href="contacts.html" class="footer__link">Contacts</a><br>
                    <a href="services.html" class="footer__link">Services</a><br>
                    <a href="" class="footer__link">Blog</a><br>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="copyright">
    Polygonator.com 2017 © All rights reserved.
</section>

<script src="js/main.js"></script>

<script type="text/javascript" src="libs/jquery.min.js"></script>
<script type="text/javascript" src="libs/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script src="js/fancy-init.js"></script>
</body>
</html>
