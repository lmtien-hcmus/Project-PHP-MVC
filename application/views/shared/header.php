<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo $this->title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,900,700,500' rel='stylesheet' type='text/css'>
        <link href="public/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <script src="public/js/jquery.min.js" type="text/javascript"></script>
        <!-- start details -->
        <link rel="stylesheet" type="text/css" href="public/css/productviewgallery.css" media="all" />
        <script type="text/javascript" src="public/js/cloud-zoom.1.0.3.min.js"></script>
        <script type="text/javascript" src="public/js/jquery.fancybox.pack.js"></script>
        <script type="text/javascript" src="public/js/productviewgallery.js"></script>
        <!--- start-mmmenu-script---->
        <script src="public/js/jquery.min.js" type="text/javascript"></script>
        <link type="text/css" rel="stylesheet" href="public/css/jquery.mmenu.all.css" />
        <script type="text/javascript" src="public/js/jquery.mmenu.js"></script>
        <script type="text/javascript">
            //	The menu on the left
            $(function () {
                $('nav#menu-left').mmenu();
            });
        </script>
        <!-- start slider -->
        <link href="public/css/slider.css" rel="stylesheet" type="text/css" media="all" />

        <script type="text/javascript" src="public/js/jquery.eislideshow.js"></script>
        <script type="text/javascript" src="public/js/easing.js"></script>
        <script type="text/javascript">
            $(function () {
                $('#ei-slider').eislideshow({
                    animation: 'center',
                    autoplay: true,
                    slideshow_interval: 3000,
                    titlesFactor: 0
                });
            });
        </script>
        <!-- start top _js_button -->
        <script type="text/javascript" src="public/js/move-top.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                /*sub menu top */
                $('.menu ul.child').removeClass('child');
                $('.menu li').has('ul').hover(function () {
                    $(this).children('ul').addClass('shadow').slideDown(100);
                },
                        function () {
                            $(this).children('ul').stop(true, true).slideUp(100);
                        }
                );
                /*scroll website*/
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
                });

            });
        </script>
    </head>
    <body>
        <!-- start header -->
        <div class="top_bg">
            <div class="wrap">
                <div class="header container">
                    <div class="logo">
                        <a href="index.php"><img src="public/images/logo.png" alt=""/></a>
                    </div>
                    <div class="log_reg">
                        <?php 
                        $checkLogin = new Libarary();
                            if($checkLogin->isAuthenticated()){
                                ?>
                        <ul>
                            <li><a href="index.php?con=user&act=viewInfo"><?php echo $_SESSION['user']->FullName ;?></a> </li>
                        </ul>
                        <?php
                            }else{
                                ?>
                        <ul>
                            <li><a href="index.php?con=user&act=login#login">Login</a> </li>
                            <span class="log"> or </span>
                            <li><a href="index.php?con=user&act=register#register">Register</a> </li>								   
                            <div class="clear"></div>
                        </ul>
                        <?php
                            }
                        ?>
                        
                    </div>	
                    <div class="web_search">
                        <form>
                            <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = '';
                                    }">
                            <input type="submit" value=" " />
                        </form>
                    </div>						
                    <div class="clear"></div>
                </div>	
            </div>
        </div>
        <!-- start header_btm -->        
        <?php
        include 'application/views/shared/menu.php';

        if (!isset($_GET["con"]) || !isset($_GET["act"]) || isset($_GET["con"]) == "home" && isset($_GET["act"]) == "index") {
            include 'application/views/shared/slider.php';
        }
        ?>
        

