<!DOCTYPE html>
<html lang="en">

<?
session_start();
require "../connect.php";

print_r($_SESSION['user_id']);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Ekka - Ecommerce HTML Template.</title>
    <meta name="keywords"
        content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops" />
    <meta name="description" content="Best ecommerce html template for single and multi vendor store.">
    <meta name="author" content="ashishmaraviya">

    <!-- site Favicon -->
    <link rel="icon" href="assets/images/favicon/favicon.png" sizes="32x32" />
    <link rel="apple-touch-icon" href="assets/images/favicon/favicon.png" />
    <meta name="msapplication-TileImage" content="assets/images/favicon/favicon.png" />

    <!-- css Icon Font -->
    <link rel="stylesheet" href="assets/css/vendor/ecicons.min.css" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css" />
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/countdownTimer.css" />
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/bootstrap.css" />

    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/demo1.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />

    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="assets/css/backgrounds/bg-4.css">
</head>


<body>
    <!-- Header start  -->
    <header class="ec-header">
        <!--Ec Header Top Start -->

        <!-- Ec Header Top  End -->
        <!-- Ec Header Bottom  Start -->
        <div class="ec-header-bottom d-none d-lg-block">
            <div class="container position-relative">
                <div class="row">
                    <div class="ec-flex">
                        <!-- Ec Header Logo Start -->
                        <div class="align-self-center">
                            <div class="header-logo">
                                <a href="index.php"><img src="assets/images/logo/LogoInstr.jpg" alt="Site Logo" /><img
                                        class="dark-logo" src="assets/images/logo/dark-logo.png" alt="Site Logo"
                                        style="display: none;" /></a>
                            </div>
                        </div>
                        <!-- Ec Header Logo End -->

                        <!-- Ec Header Search Start -->
                        <div class="align-self-center">
                            <div class="header-search">
                            <form class="ec-btn-group-form" action="shop-full-width.php" method="GET">
                                    <input class="form-control" name="search" placeholder="Введите название товара..." type="text"
                                        value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                                    <button class="submit" type="submit">
                                        <img src="assets/images/icons/search.svg" class="svg_img header_svg" alt="Искать" />
                                    </button>
                                </form>

                            </div>
                        </div>
                        <!-- Ec Header Search End -->

                        <!-- Ec Header Button Start -->
                        <div class="align-self-center">
                            <div class="ec-header-bottons">

                                <!-- Header User Start -->
                                <div class="ec-header-user dropdown">
                                    <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <img src="assets/images/icons/user.svg" class="svg_img header_svg" alt="" />
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <?php if (isset($_SESSION['user_id'])): ?>
                                            <!-- Если пользователь авторизован -->
                                            <li><a class="dropdown-item" href="orders.php">Заказы</a></li>
                                            <li><a class="dropdown-item" href="user-profile.php">Профиль</a></li>
                                            <li><a class="dropdown-item" href="../logout.php">Выход</a></li>
                                        <?php else: ?>
                                            <!-- Если пользователь не авторизован -->
                                            <li><a class="dropdown-item" href="register.php">Регистрация</a></li>
                                            <li><a class="dropdown-item" href="login.php">Вход</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <!-- Header User End -->

                                <!-- Header Cart Start -->
                                <a href="cart.php" class="ec-header-btn ec-header-wishlist">
                                    <div class="header-icon"><img src="assets/images/icons/cart.svg"
                                            class="svg_img header_svg" alt="" /></div>
                                </a>
                                <!-- <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                                    <div class="header-icon"><img src="assets/images/icons/cart.svg"
                                            class="svg_img header_svg" alt="" /></div>
                                </a> -->
                                <!-- Header Cart End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec Header Button End -->
        <!-- Header responsive Bottom  Start -->
        <div class="ec-header-bottom d-lg-none">
            <div class="container position-relative">
                <div class="row ">

                    <!-- Ec Header Logo Start -->
                    <div class="col">
                        <div class="header-logo">
                            <a href="index.php"><img src="assets/images/logo/LogoInstr.jpg" alt="Site Logo" /><img
                                    class="dark-logo" src="assets/images/logo/dark-logo.png" alt="Site Logo"
                                    style="display: none;" /></a>
                        </div>
                    </div>
                    <!-- Ec Header Logo End -->
                    <!-- Ec Header Search Start -->
                    <div class="col">
                        <div class="header-search">
                            <form class="ec-btn-group-form" action="#">
                                <input class="form-control" placeholder="Введите название товара..." type="text">
                                <button class="submit" type="submit"><img src="assets/images/icons/search.svg"
                                        class="svg_img header_svg" alt="icon" /></button>
                            </form>
                        </div>
                    </div>
                    <!-- Ec Header Search End -->
                </div>
            </div>
        </div>
        <!-- Header responsive Bottom  End -->
        <!-- EC Main Menu Start -->
        <div id="ec-main-menu-desk" class="d-none d-lg-block sticky-nav">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12 align-self-center">
                        <div class="ec-main-menu">
                            <ul>
                                <li><a href="index.php">Главная</a></li>


                                <li><a href="shop-full-width.php">Список Товаров</a>

                                </li>

                                </li>

                                <!-- <li><a href="about-us.php">О нас</a></li> -->
                                <!-- <li class="dropdown"><a href="javascript:void(0)">Страницы</a>
                                <ul class="sub-menu">
                                    <li><a href="about-us.php">О нас</a></li>
                                    <li><a href="contact-us.php">Contact Us</a></li>
                                    <li><a href="cart.php">Cart</a></li>
                                    <li><a href="checkout.php">Checkout</a></li>
                                    <li><a href="compare.php">Compare</a></li>
                                    <li><a href="faq.php">FAQ</a></li>
                                    <li><a href="login.php">Вход</a></li>
                                    <li><a href="register.php">Регистрация</a></li>
                                    <li><a href="terms-condition.php">Terms Condition</a></li>
                                    <li><a href="privacy-policy.php">Privacy Policy</a></li>
                                </ul>
                            </li> -->

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec Main Menu End -->
        <!-- ekka Mobile Menu Start -->
        <div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
            <div class="ec-menu-title">
                <span class="menu_title">My Menu</span>
                <button class="ec-close">×</button>
            </div>
            <div class="ec-menu-inner">
                <div class="ec-menu-content">
                    <ul>
                        <li><a href="index.php">Главная</a></li>
                        <li><a href="javascript:void(0)">Categories</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="javascript:void(0)">Classic Variation</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-left-sidebar-col-3.php">Left sidebar 3 column</a></li>
                                        <li><a href="shop-left-sidebar-col-4.php">Left sidebar 4 column</a></li>
                                        <li><a href="shop-right-sidebar-col-3.php">Right sidebar 3 column</a></li>
                                        <li><a href="shop-right-sidebar-col-4.php">Right sidebar 4 column</a></li>
                                        <li><a href="shop-full-width.php">Full width 4 column</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Classic Variation</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-banner-left-sidebar-col-3.php">Banner left sidebar 3
                                                column</a></li>
                                        <li><a href="shop-banner-left-sidebar-col-4.php">Banner left sidebar 4
                                                column</a></li>
                                        <li><a href="shop-banner-right-sidebar-col-3.php">Banner right sidebar 3
                                                column</a></li>
                                        <li><a href="shop-banner-right-sidebar-col-4.php">Banner right sidebar 4
                                                column</a></li>
                                        <li><a href="shop-banner-full-width.php">Banner Full width 4 column</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Columns Variation</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-full-width-col-3.php">3 Columns full width</a></li>
                                        <li><a href="shop-full-width-col-4.php">4 Columns full width</a></li>
                                        <li><a href="shop-full-width-col-5.php">5 Columns full width</a></li>
                                        <li><a href="shop-full-width-col-6.php">6 Columns full width</a></li>
                                        <li><a href="shop-banner-full-width-col-3.php">Banner 3 Columns</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">List Variation</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-list-left-sidebar.php">Shop left sidebar</a></li>
                                        <li><a href="shop-list-right-sidebar.php">Shop right sidebar</a></li>
                                        <li><a href="shop-list-banner-left-sidebar.php">Banner left sidebar</a></li>
                                        <li><a href="shop-list-banner-right-sidebar.php">Banner right sidebar</a></li>
                                        <li><a href="shop-list-full-col-2.php">Full width 2 columns</a></li>
                                    </ul>
                                </li>
                                <li><a class="p-0" href="shop-left-sidebar-col-3.php"><img class="img-responsive"
                                            src="assets/images/menu-banner/1.jpg" alt=""></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Products</a>
                            <ul class="sub-menu">
                                <li><a href="javascript:void(0)">Product page</a>
                                    <ul class="sub-menu">
                                        <li><a href="product-left-sidebar.php">Product left sidebar</a></li>
                                        <li><a href="product-right-sidebar.php">Product right sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Product 360</a>
                                    <ul class="sub-menu">
                                        <li><a href="product-360-left-sidebar.php">360 left sidebar</a></li>
                                        <li><a href="product-360-right-sidebar.php">360 right sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Product vodeo</a>
                                    <ul class="sub-menu">
                                        <li><a href="product-video-left-sidebar.php">vodeo left sidebar</a></li>
                                        <li><a href="product-video-right-sidebar.php">vodeo right sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Product gallery</a>
                                    <ul class="sub-menu">
                                        <li><a href="product-gallery-left-sidebar.php">Gallery left sidebar</a></li>
                                        <li><a href="product-gallery-right-sidebar.php">Gallery right sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="product-full-width.php">Product full width</a></li>
                                <li><a href="product-360-full-width.php">360 full width</a></li>
                                <li><a href="product-video-full-width.php">Video full width</a></li>
                                <li><a href="product-gallery-full-width.php">Gallery full width</a></li>
                            </ul>
                        </li>

                        <li><a href="javascript:void(0)">Страницы</a>
                            <ul class="sub-menu">
                                <!-- <li><a href="about-us.php">О нас</a></li> -->
                                <li><a href="contact-us.php">Связаться с нами</a></li>
                                <li><a href="cart.php">Корзина</a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                                <li><a href="compare.php">Compare</a></li>
                                <li><a href="faq.php">FAQ</a></li>
                                <li><a href="login.php">Вход</a></li>
                                <li><a href="register.php">Регистрация</a></li>
                                <li><a href="track-order.php">Track Order</a></li>
                                <li><a href="terms-condition.php">Terms Condition</a></li>
                                <li><a href="privacy-policy.php">Privacy Policy</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="javascript:void(0)">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="blog-left-sidebar.php">Blog left sidebar</a></li>
                                <li><a href="blog-right-sidebar.php">Blog right sidebar</a></li>
                                <li><a href="blog-detail-left-sidebar.php">Blog detail left sidebar</a></li>
                                <li><a href="blog-detail-right-sidebar.php">Blog detail right sidebar</a></li>
                                <li><a href="blog-full-width.php">Blog full width</a></li>
                                <li><a href="blog-detail-full-width.php">Blog detail full width</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="javascript:void(0)">Elements</a>
                            <ul class="sub-menu">
                                <li><a href="elemets-products.php">Товары</a></li>
                                <li><a href="elemets-typography.php">Typography</a></li>
                                <li><a href="elemets-title.php">Заголовки</a></li>
                                <li><a href="elemets-categories.php">Категории</a></li>
                                <li><a href="elemets-buttons.php">Кнопки</a></li>
                                <li><a href="elemets-tabs.php">Отступы</a></li>
                                <li><a href="elemets-accordions.php">Accordions</a></li>
                                <li><a href="elemets-blog.php">Блоги</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <div class="header-res-lan-curr">
                    <div class="header-top-lan-curr">
                        <!-- Language Start -->
                        <div class="header-top-lan dropdown">
                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Language <i
                                    class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                            <ul class="dropdown-menu">
                                <li class="active"><a class="dropdown-item" href="#">English</a></li>
                                <li><a class="dropdown-item" href="#">Italiano</a></li>
                            </ul>
                        </div>
                        <!-- Language End -->
                        <!-- Currency Start -->
                        <div class="header-top-curr dropdown">
                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Currency <i
                                    class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                            <ul class="dropdown-menu">
                                <li class="active"><a class="dropdown-item" href="#">USD $</a></li>
                                <li><a class="dropdown-item" href="#">EUR €</a></li>
                            </ul>
                        </div>
                        <!-- Currency End -->
                    </div>
                    <!-- Social Start -->
                    <div class="header-res-social">
                        <div class="header-top-social">
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook" href="#"><i
                                            class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-twitter" href="#"><i
                                            class="ecicon eci-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-instagram" href="#"><i
                                            class="ecicon eci-instagram"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i
                                            class="ecicon eci-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Social End -->
                </div>
            </div>
        </div>
        <!-- ekka mobile Menu End -->
    </header>
    <!-- Header End  -->

    <!-- ekka Cart Start -->
    <!-- ekka Cart End -->

    <!-- Category Sidebar start -->
    <div class="ec-side-cat-overlay"></div>
    <div class="col-lg-3 category-sidebar" data-animation="fadeIn">
        <div class="cat-sidebar">
            <div class="cat-sidebar-box">
                <div class="ec-sidebar-wrap">
                    <!-- Sidebar Category Block -->
                    <div class="ec-sidebar-block">
                        <div class="ec-sb-title">
                            <h3 class="ec-sidebar-title">Category<button class="ec-close">×</button></h3>
                        </div>
                        <div class="ec-sb-block-content">
                            <ul>
                                <li>
                                    <div class="ec-sidebar-block-item"><img src="assets/images/icons/dress-8.svg"
                                            class="svg_img" alt="drink" />Cothes</div>
                                    <ul style="display: block;">
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">Shirt <span
                                                        title="Available Stock">- 25</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">shorts & jeans <span
                                                        title="Available Stock">- 52</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">jacket<span
                                                        title="Available Stock">- 500</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">dress & frock <span
                                                        title="Available Stock">- 35</span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="ec-sb-block-content">
                            <ul>
                                <li>
                                    <div class="ec-sidebar-block-item"><img src="assets/images/icons/shoes-8.svg"
                                            class="svg_img" alt="drink" />Footwear</div>
                                    <ul>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">Sports <span
                                                        title="Available Stock">- 25</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">Formal <span
                                                        title="Available Stock">- 52</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">Casual <span
                                                        title="Available Stock">- 40</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">safety shoes <span
                                                        title="Available Stock">- 35</span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="ec-sb-block-content">
                            <ul>
                                <li>
                                    <div class="ec-sidebar-block-item"><img src="assets/images/icons/jewelry-8.svg"
                                            class="svg_img" alt="drink" />jewelry</div>
                                    <ul>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">Earrings <span
                                                        title="Available Stock">- 50</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">Couple Rings <span
                                                        title="Available Stock">- 35</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">Necklace <span
                                                        title="Available Stock">- 40</span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="ec-sb-block-content">
                            <ul>
                                <li>
                                    <div class="ec-sidebar-block-item"><img src="assets/images/icons/perfume-8.svg"
                                            class="svg_img" alt="drink" />perfume</div>
                                    <ul>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">Clothes perfume<span
                                                        title="Available Stock">- 4 pcs</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">deodorant <span
                                                        title="Available Stock">- 52 pcs</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">Flower fragrance <span
                                                        title="Available Stock">- 10 pack</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a href="shop-left-sidebar-col-3.php">Air
                                                    Freshener<span title="Available Stock">- 35 pack</span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="ec-sb-block-content">
                            <ul>
                                <li>
                                    <div class="ec-sidebar-block-item"><img src="assets/images/icons/cosmetics-8.svg"
                                            class="svg_img" alt="drink" />cosmetics</div>
                                    <ul>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">shampoo<span
                                                        title="Available Stock"></span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">Sunscreen<span
                                                        title="Available Stock"></span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a href="shop-left-sidebar-col-3.php">body
                                                    wash<span title="Available Stock"></span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">makeup kit<span
                                                        title="Available Stock"></span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="ec-sb-block-content">
                            <ul>
                                <li>
                                    <div class="ec-sidebar-block-item"><img src="assets/images/icons/glasses-8.svg"
                                            class="svg_img" alt="drink" />glasses</div>
                                    <ul>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">Sunglasses <span
                                                        title="Available Stock">- 20</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">Lenses <span
                                                        title="Available Stock">- 52</span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="ec-sb-block-content">
                            <ul>
                                <li>
                                    <div class="ec-sidebar-block-item"><img src="assets/images/icons/bag-8.svg"
                                            class="svg_img" alt="drink" />bags</div>
                                    <ul>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">shopping bag <span
                                                        title="Available Stock">- 25</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a href="shop-left-sidebar-col-3.php">Gym
                                                    backpack <span title="Available Stock">- 52</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">purse <span
                                                        title="Available Stock">- 40</span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="ec-sidebar-sub-item"><a
                                                    href="shop-left-sidebar-col-3.php">wallet <span
                                                        title="Available Stock">- 35</span></a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar Category Block -->
                </div>
            </div>
            <div class="ec-sidebar-slider-cat">
                <div class="ec-sb-slider-title">Best Sellers</div>
                <div class="ec-sb-pro-sl">
                    <div>
                        <div class="ec-sb-pro-sl-item">
                            <a href="product-left-sidebar.php" class="sidekka_pro_img"><img
                                    src="assets/images/product-image/1.jpg" alt="product" /></a>
                            <div class="ec-pro-content">
                                <h5 class="ec-pro-title"><a href="product-left-sidebar.php">baby fabric shoes</a></h5>

                                <span class="ec-price">
                                    <span class="old-price">$5.00</span>
                                    <span class="new-price">$4.00</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="ec-sb-pro-sl-item">
                            <a href="product-left-sidebar.php" class="sidekka_pro_img"><img
                                    src="assets/images/product-image/2.jpg" alt="product" /></a>
                            <div class="ec-pro-content">
                                <h5 class="ec-pro-title"><a href="product-left-sidebar.php">Men's hoodies t-shirt</a>
                                </h5>

                                <span class="ec-price">
                                    <span class="old-price">$10.00</span>
                                    <span class="new-price">$7.00</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="ec-sb-pro-sl-item">
                            <a href="product-left-sidebar.php" class="sidekka_pro_img"><img
                                    src="assets/images/product-image/3.jpg" alt="product" /></a>
                            <div class="ec-pro-content">
                                <h5 class="ec-pro-title"><a href="product-left-sidebar.php">Girls t-shirt</a></h5>

                                <span class="ec-price">
                                    <span class="old-price">$5.00</span>
                                    <span class="new-price">$3.00</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="ec-sb-pro-sl-item">
                            <a href="product-left-sidebar.php" class="sidekka_pro_img"><img
                                    src="assets/images/product-image/4.jpg" alt="product" /></a>
                            <div class="ec-pro-content">
                                <h5 class="ec-pro-title"><a href="product-left-sidebar.php">woolen hat for men</a></h5>

                                <span class="ec-price">
                                    <span class="old-price">$15.00</span>
                                    <span class="new-price">$12.00</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="ec-sb-pro-sl-item">
                            <a href="product-left-sidebar.php" class="sidekka_pro_img"><img
                                    src="assets/images/product-image/5.jpg" alt="product" /></a>
                            <div class="ec-pro-content">
                                <h5 class="ec-pro-title"><a href="product-left-sidebar.php">Womens purse</a></h5>

                                <span class="ec-price">
                                    <span class="old-price">$15.00</span>
                                    <span class="new-price">$12.00</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="ec-sb-pro-sl-item">
                            <a href="product-left-sidebar.php" class="sidekka_pro_img"><img
                                    src="assets/images/product-image/6.jpg" alt="product" /></a>
                            <div class="ec-pro-content">
                                <h5 class="ec-pro-title"><a href="product-left-sidebar.php">Baby toy doctor kit</a>
                                </h5>

                                <span class="ec-price">
                                    <span class="old-price">$50.00</span>
                                    <span class="new-price">$45.00</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="ec-sb-pro-sl-item">
                            <a href="product-left-sidebar.php" class="sidekka_pro_img"><img
                                    src="assets/images/product-image/7.jpg" alt="product" /></a>
                            <div class="ec-pro-content">
                                <h5 class="ec-pro-title"><a href="product-left-sidebar.php">teddy bear baby toy</a>
                                </h5>

                                <span class="ec-price">
                                    <span class="old-price">$35.00</span>
                                    <span class="new-price">$25.00</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="ec-sb-pro-sl-item">
                            <a href="product-left-sidebar.php" class="sidekka_pro_img"><img
                                    src="assets/images/product-image/2.jpg" alt="product" /></a>
                            <div class="ec-pro-content">
                                <h5 class="ec-pro-title"><a href="product-left-sidebar.php">Mens hoodies blue</a></h5>

                                <span class="ec-price">
                                    <span class="old-price">$15.00</span>
                                    <span class="new-price">$13.00</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Slider Start -->
    <div class="sticky-header-next-sec ec-main-slider section section-space-pb">
        <div class="ec-slider swiper-container main-slider-nav main-slider-dot">
            <!-- Main slider -->
            <div class="swiper-wrapper">
                <div class="ec-slide-item swiper-slide d-flex ec-slide-1">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center" style="background-color: #1E2019;">
                                <div class="ec-slide-content slider-animation">
                                    <h1 class="ec-slide-title" style="color: #F0F7F4;">2 ЛУЧШЕ, ЧЕМ 1</h1>
                                    <h2 class="ec-slide-stitle" style="color: #F0F7F4;">Набор инструментов</h2>
                                    <!-- <p>Описание инструмента</p> -->
                                    <a href="product-full-width.php?id=7" class="btn btn-lg btn-secondary" style="margin-bottom: 30px;">Заказать сейчас</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ec-slide-item swiper-slide d-flex ec-slide-2">
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center" style="background-color: #1E2019;">
                                <div class="ec-slide-content slider-animation">
                                    <h1 class="ec-slide-title" style="color: #F0F7F4;">ЛУЧШИЙ ДЛЯ РАБОТЫ ПО ЛАГЕРЮ</h1>
                                    <h2 class="ec-slide-stitle" style="color: #F0F7F4;">Топор туристический</h2>
                                    <!-- <p>Описание инструмента</p> -->
                                    <a href="product-full-width.php?id=11" class="btn btn-lg btn-secondary" style="margin-bottom: 30px;">Заказать сейчас</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination swiper-pagination-white"></div>
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->

    <!-- Product tab Area Start -->
    <section class="section ec-product-tab section-space-p" id="collection">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Популярные инструменты</h2>
                        <h2 class="ec-title">Популярные инструменты</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="tab-content">
                        <!-- ВСЕ ТОВАРЫ -->
                        <div class="tab-pane fade show active" id="tab-pro-for-all">
                            <div class="row">
                                <?php
                                // Запрос для всех товаров
                                $result = $db->query("SELECT * FROM products");
                                while ($product = $result->fetch_assoc()) {
                                    echo '<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 ec-product-content">
                                        <div class="ec-product-inner">
                                            <div class="ec-pro-image-outer">
                                                <div class="ec-pro-image">
                                                    <a href="product-full-width.php?id=' . $product['id'] . '" class="image">
                                                        <img class="main-image" src="/img/' . $product['image'] . '" alt="' . $product['name'] . '" />
                                                        <img class="hover-image" src="/img/' . $product['image'] . '" alt="' . $product['name'] . '" />
                                                    </a>
                                                    
                                                </div>
                                            </div>
                                            <div class="ec-pro-content">
                                                <h5 class="ec-pro-title"><a href="product-full-width.php?id=' . $product['id'] . '">' . $product['name'] . '</a></h5>
                                                <span class="ec-price">
                                                    <span class="new-price">' . $product['price'] . '₽</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>';
                                }
                                ?>
                                <div class="col-sm-12 shop-all-btn"><a href="shop-full-width.php">Показать все товары</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ec Product tab Area End -->

    <!-- ec Banner Section Start -->
    <!-- ec Banner Section End -->

    <!--  Category Section Start -->
    <!-- Category Section End -->

    <!--  Feature & Special Section Start -->
    <!-- Feature & Special Section End -->

    <!--  Top Vendor Section Start -->
    <!--  Top Vendor Section End -->

    <!--  services Section Start -->

    <!--services Section End -->

    <!--  offer Section Start -->

    <!-- offer Section End -->

    <!-- New Product Start -->
    <!-- New Product end -->

    <!-- ec testmonial Start -->
    <section class="section ec-test-section section-space-ptb-100 section-space-m">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title mb-0">
                        <h2 class="ec-bg-title">Testimonial</h2>
                        <h2 class="ec-title">Отзывы клиентов</h2>
                        <p class="sub-title mb-3">Что клиенты говорят о нас</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ec-test-outer">
                    <ul id="ec-testimonial-slider">
                        <li class="ec-test-item">
                            <img src="assets/images/testimonial/top-quotes.svg" class="svg_img test_svg top" alt="" />
                            <div class="ec-test-inner">
                                <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                        src="assets/images/testimonial/profile.png" /></div>
                                <div class="ec-test-content">
                                    <div class="ec-test-desc">Уже несколько месяцев пользуюсь услугами интернет-магазина
                                        Арсенал строителя, и я полностью доволен. Ассортимент просто шикарный — от
                                        мелкого инструмента до профессионального оборудования. Заказы всегда доставляют
                                        вовремя, а качество товаров превосходит ожидания.</div>
                                    <div class="ec-test-name">Петров Алексей</div>
                                    <!-- <div class="ec-test-designation">General Manager</div> -->

                                </div>
                            </div>
                            <img src="assets/images/testimonial/bottom-quotes.svg" class="svg_img test_svg bottom"
                                alt="" />
                        </li>
                        <li class="ec-test-item">
                            <img src="assets/images/testimonial/top-quotes.svg" class="svg_img test_svg top" alt="" />
                            <div class="ec-test-inner">
                                <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                        src="assets/images/testimonial/profile.png" /></div>
                                <div class="ec-test-content">
                                    <div class="ec-test-desc">Работаю мастером по ремонту, и часто заказываю инструменты
                                        здесь. У Арсенала строителя цены ниже, чем в других магазинах, а качество не
                                        подводит. Радует удобный сайт и быстрая доставка. Заказала электрическую дрель,
                                        пришла через два дня, полностью исправная и с гарантией. Магазин определенно
                                        заслуживает доверия!</div>
                                    <div class="ec-test-name">Кузьмина Мария</div>
                                    <!-- <div class="ec-test-designation">General Manager</div> -->

                                </div>
                            </div>
                            <img src="assets/images/testimonial/bottom-quotes.svg" class="svg_img test_svg bottom"
                                alt="" />
                        </li>
                        <li class="ec-test-item">
                            <img src="assets/images/testimonial/top-quotes.svg" class="svg_img test_svg top" alt="" />
                            <div class="ec-test-inner">
                                <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                        src="assets/images/testimonial/profile.png" /></div>
                                <div class="ec-test-content">
                                    <div class="ec-test-desc">Давно искал магазин с качественными строительными
                                        инструментами, и Арсенал строителя оправдал все ожидания. Инструменты надежные,
                                        прочные и идеально подходят для работы на строительных объектах. Заказывал уже
                                        несколько раз, и всё приходит вовремя. Очень доволен.</div>
                                    <div class="ec-test-name">Никифоров Сергей</div>
                                    <!-- <div class="ec-test-designation">General Manager</div> -->

                                </div>
                            </div>
                            <img src="assets/images/testimonial/bottom-quotes.svg" class="svg_img test_svg bottom"
                                alt="" />
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ec testmonial end -->

    <!-- Ec Brand Section Start -->
    <!-- Ec Brand Section End -->

    <!-- Ec Instagram Start -->
    <!-- Ec Instagram End -->

    <!-- Footer Start -->
    <footer class="ec-footer section-space-mt">
        <div class="footer-container">

            <div class="footer-top section-space-footer-p">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-4 ec-footer-info">
                            <div class="ec-footer-widget">
                                <div class="ec-footer-logo"><a href="#"><img src="assets/images/logo/LogoInstr.jpg"
                                            alt=""><img class="dark-footer-logo" src="assets/images/logo/dark-logo.png"
                                            alt="Site Logo" style="display: none;" /></a></div>
                                <h4 class="ec-footer-heading">Свяжитесь с нами</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link"><span>Позвоните нам:</span><a href="tel:+440123456789">+7 666 326 33 44</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4 ec-footer-info">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Страницы</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link"><a href="index.php">Главная</a></li>
                                        <li class="ec-footer-link"><a href="contact-us.php">Список Товаров</a></li>
                                        <li class="ec-footer-link"><a href="cart.php">Корзина</a></li>
                                        <li class="ec-footer-link"><a href="about-us.php">О нас</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4 ec-footer-account">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Помощь</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link"><a href="#">Частые вопросы</a></li>
                                        <li class="ec-footer-link"><a href="track-order.php">Тех. поддержка:
                                                example@ec-email.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-12 col-lg-2 ec-footer-service">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Услуги</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link"><a href="#">Discount Returns</a></li>
                                        <li class="ec-footer-link"><a href="#">Policy & policy </a></li>
                                        <li class="ec-footer-link"><a href="#">Customer Service</a></li>
                                        <li class="ec-footer-link"><a href="terms-condition.php">Term & condition</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-sm-12 col-lg-3 ec-footer-news">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Newsletter</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link">Get instant updates about our new products and
                                            special promos!</li>
                                    </ul>
                                    <div class="ec-subscribe-form">
                                        <form id="ec-newsletter-form" name="ec-newsletter-form" method="post"
                                            action="#">
                                            <div id="ec_news_signup" class="ec-form">
                                                <input class="ec-email" type="email" required=""
                                                    placeholder="Enter your email here..." name="ec-email" value="" />
                                                <button id="ec-news-btn" class="button btn-primary" type="submit"
                                                    name="subscribe" value=""><i class="ecicon eci-paper-plane-o"
                                                        aria-hidden="true"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Footer social Start -->
                        <div class="col text-left footer-bottom-left">
                            <div class="footer-bottom-social">
                                <span class="social-text text-upper">Мы в социальных сетях:</span>
                                <ul class="mb-0">
                                    <li class="list-inline-item">
                                        <a class="hdr-vk" href="https://vk.com/yourpage" target="_blank">
                                            <i class="ecicon eci-vk"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="hdr-telegram" href="https://t.me/yourpage" target="_blank">
                                            <i class="ecicon eci-telegram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="hdr-whatsapp" href="https://wa.me/yourphonenumber" target="_blank">
                                            <i class="ecicon eci-whatsapp"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Footer social End -->
                        <!-- Footer Copyright Start -->
                        <div class="col text-center footer-copy">
                            <div class="footer-bottom-copy ">
                                <div class="ec-copy">Copyright © 2024-2025 <a class="site-name text-upper"
                                        href="#">Арсенал Строителя<span>.</span></a>. Все права защищены</div>
                            </div>
                        </div>
                        <!-- Footer Copyright End -->
                        <!-- Footer payment -->
                        <div class="col footer-bottom-right">
                            <div class="footer-bottom-payment d-flex justify-content-end">

                            </div>
                        </div>
                        <!-- Footer payment -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- Modal -->
    <div class="modal fade" id="ec_quickview_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <!-- Swiper -->
                            <div class="qty-product-cover">
                                <div class="qty-slide">
                                    <img class="img-responsive" src="assets/images/product-image/3_1.jpg" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="assets/images/product-image/3_2.jpg" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="assets/images/product-image/3_3.jpg" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="assets/images/product-image/3_4.jpg" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="assets/images/product-image/3_5.jpg" alt="">
                                </div>
                            </div>
                            <div class="qty-nav-thumb">
                                <div class="qty-slide">
                                    <img class="img-responsive" src="assets/images/product-image/3_1.jpg" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="assets/images/product-image/3_2.jpg" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="assets/images/product-image/3_3.jpg" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="assets/images/product-image/3_4.jpg" alt="">
                                </div>
                                <div class="qty-slide">
                                    <img class="img-responsive" src="assets/images/product-image/3_5.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="quickview-pro-content">
                                <h5 class="ec-quick-title"><a href="product-left-sidebar.php">Handbag leather purse for
                                        women</a>
                                </h5>


                                <div class="ec-quickview-desc">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s,</div>
                                <div class="ec-quickview-price">
                                    <span class="old-price">$100.00</span>
                                    <span class="new-price">$80.00</span>
                                </div>

                                <div class="ec-pro-variation">
                                    <div class="ec-pro-variation-inner ec-pro-variation-color">
                                        <span>Color</span>
                                        <div class="ec-pro-color">
                                            <ul class="ec-opt-swatch">
                                                <li><span style="background-color:#ebbf60;"></span></li>
                                                <li><span style="background-color:#75e3ff;"></span></li>
                                                <li><span style="background-color:#11f7d8;"></span></li>
                                                <li><span style="background-color:#acff7c;"></span></li>
                                                <li><span style="background-color:#e996fa;"></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="ec-pro-variation-inner ec-pro-variation-size ec-pro-size">
                                        <span>Size</span>
                                        <div class="ec-pro-variation-content">
                                            <ul class="ec-opt-size">
                                                <li class="active"><a href="#" class="ec-opt-sz"
                                                        data-tooltip="Small">S</a></li>
                                                <li><a href="#" class="ec-opt-sz" data-tooltip="Medium">M</a></li>
                                                <li><a href="#" class="ec-opt-sz" data-tooltip="Large">X</a></li>
                                                <li><a href="#" class="ec-opt-sz" data-tooltip="Extra Large">XL</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="ec-quickview-qty">
                                    <div class="qty-plus-minus">
                                        <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                                    </div>
                                    <div class="ec-quickview-cart ">
                                        <button class="btn btn-primary"><img src="assets/images/icons/cart.svg"
                                                class="svg_img pro_svg" alt="" /> Add To Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Newsletter Modal Start -->
    <!-- Newsletter Modal end -->

    <!-- Footer navigation panel for responsive display -->
    <div class="ec-nav-toolbar">
        <div class="container">
            <div class="ec-nav-panel">
                <div class="ec-nav-panel-icons">
                    <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle"><img
                            src="assets/images/icons/menu.svg" class="svg_img header_svg" alt="icon" /></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="#ec-side-cart" class="toggle-cart ec-header-btn ec-side-toggle"><img
                            src="assets/images/icons/cart.svg" class="svg_img header_svg" alt="icon" /><span
                            class="ec-cart-noti ec-header-count cart-count-lable">3</span></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="index.php" class="ec-header-btn"><img src="assets/images/icons/home.svg"
                            class="svg_img header_svg" alt="icon" /></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="wishlist.php" class="ec-header-btn"><img src="assets/images/icons/wishlist.svg"
                            class="svg_img header_svg" alt="icon" /><span class="ec-cart-noti">4</span></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="login.php" class="ec-header-btn"><img src="assets/images/icons/user.svg"
                            class="svg_img header_svg" alt="icon" /></a>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer navigation panel for responsive display end -->

    <!-- Recent Purchase Popup  -->

    <!-- Recent Purchase Popup end -->

    <!-- Cart Floating Button -->
    <div class="ec-cart-float">
        <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
            <div class="header-icon"><img src="assets/images/icons/cart.svg" class="svg_img header_svg" alt="cart" />
            </div>
            <span class="ec-cart-count cart-count-lable">3</span>
        </a>
    </div>
    <!-- Cart Floating Button end -->

    <!-- Whatsapp -->

    <!-- Whatsapp end -->

    <!-- Feature tools -->

    <!-- Feature tools end -->

    <!-- Vendor JS -->
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>

    <!--Plugins JS-->
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/countdownTimer.min.js"></script>
    <script src="assets/js/plugins/scrollup.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/slick.min.js"></script>
    <script src="assets/js/plugins/infiniteslidev2.js"></script>
    <script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Google translate Js -->
    <script src="assets/js/vendor/google-translate.js"></script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>
    <!-- Main Js -->
    <script src="assets/js/vendor/index.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>