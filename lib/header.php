<?php 
include "inc/session.php"; 
session::init();
?>

<?php 

include "inc/database1.php";
include "inc/format.php";
include "class/catclass.php";
include "class/productcls.php";
include "class/contcls.php";
include "class/usercls.php";
include "class/cartcls.php";

?>

<?php 
$db = new Database();
$fm = new Format();
$catcls = new catacls();
$prodcl = new productcls();
$usercls = new userdatacls();
$concls = new contactcls();
$ctcls = new cartcls();

?>


<!doctype php>
<php class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Asbab - eCommerce php5 Templatee</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>

    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="index.php"><img src="images/logo/4.png" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="index.php">Home</a></li>
                                        <?php 
                                        $showcat =$catcls->showcatagorybyid();
                                        foreach ($showcat as $key) {
                                        ?>                           
                                        <li><a href="productbycat.php?cataid=<?php echo $key['id']?>"><?php echo $key['catname'];?></a></li>
                                        <?php } ;?>
                                        <li><a href="contact.php">contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__search search search__open">
                                        <a href="#"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <div class="header__account">
                                      
                                      
                                           <?php   if(session::get("login") == true){?>
                                        <a href="logout.php"><i class="icon-user icons"></i>Logout</a>
                                        <?php }else{ ;?>
                                          <a href="login.php"><i class="icon-user icons"></i>Login/Reg</a>
                                             <?php };?>
                                    </div>
                                    <div class="htc__shopping__cart">
                                        <a class="cart__menu" href=""><i class="icon-handbag icons"></i></a>
                                        <a href="cart.php"><span class="htc__qua">
                                        <?php 
                                        if((session::get("qty"))){
                                             echo session::get("qty");
                                        }else{
                                            echo 0;
                                        }
                                      

                                        ?>
                                        
                                        </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->
        
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
          
        </div>
        <!-- End Offset Wrapper -->