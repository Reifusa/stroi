 <!DOCTYPE html>
 <html lang="en">
 <?
    require "../connect.php";
    ?>

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="x-ua-compatible" content="ie=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

     <title>Ekka - Ecommerce HTML Template.</title>
     <meta name="keywords" content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops" />
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
     <link rel="stylesheet" href="assets/css/plugins/nouislider.css" />
     <link rel="stylesheet" href="assets/css/plugins/bootstrap.css" />

     <!-- Main Style -->
     <link rel="stylesheet" href="assets/css/style.css" />
     <link rel="stylesheet" href="assets/css/responsive.css" />

     <!-- Background css -->
     <link rel="stylesheet" id="bg-switcher-css" href="assets/css/backgrounds/bg-4.css">

 </head>

 <body class="register_page">

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
                                    <input class="form-control" name="search" placeholder="Введите название товара..." type="text" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                                    <button class="submit" type="submit">
                                        <img src="assets/images/icons/search.svg" class="svg_img header_svg" alt="" />
                                    </button>
                                    <?php if (isset($_GET['search']) && !empty($_GET['search'])): ?>
                                        <a href="shop-full-width.php" class="btn btn-outline-secondary" style="margin-left: 10px;">Сбросить</a>
                                    <?php endif; ?>
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
                                <li><a href="about-us.php">О нас</a></li>
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

     <!-- Ec breadcrumb start -->
     <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <div class="row ec_breadcrumb_inner">
                         <div class="col-md-6 col-sm-12">
                             <h2 class="ec-breadcrumb-title">Регистрация</h2>
                         </div>
                         <div class="col-md-6 col-sm-12">
                             <!-- ec-breadcrumb-list start -->
                             <ul class="ec-breadcrumb-list">
                                 <li class="ec-breadcrumb-item"><a href="index.php">Главная</a></li>
                                 <li class="ec-breadcrumb-item active">Регистрация</li>
                             </ul>
                             <!-- ec-breadcrumb-list end -->
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Ec breadcrumb end -->

     <!-- Start Register -->
     <section class="ec-page-content section-space-p">
         <div class="container">
             <div class="row">
                 <div class="col-md-12 text-center">
                     <div class="section-title">
                         <h2 class="ec-bg-title">Регистрация</h2>
                         <h2 class="ec-title">Регистрация</h2>
                     </div>
                 </div>

                 <div class="ec-register-wrapper">
    <div class="ec-register-container">
        <div class="ec-register-form">
            <form action="../register-handler.php" method="post">
                <span class="ec-register-wrap ec-register-half">
                    <label>Имя</label>
                    <input type="text" name="firstname" required />
                </span>
                <span class="ec-register-wrap ec-register-half">
                    <label>Фамилия</label>
                    <input type="text" name="lastname" required />
                </span>
                <span class="ec-register-wrap ec-register-half">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="world@gmail.com" required />
                </span>
                <span class="ec-register-wrap ec-register-half">
                    <label>Номер телефона</label>
                    <input type="text" name="phonenumber" placeholder="+7 999 333 22 99" required />
                </span>
                <span class="ec-register-wrap">
                    <label>Адрес</label>
                    <input type="text" name="address" placeholder="г.Город, р-н Район (опицонально), ул. Улица, д. №Дома, кв.№Квартиры" />
                </span>
                <span class="ec-register-wrap ec-register-half">
                    <label>Пароль</label>
                    <input type="password" name="pass" required />
                </span>
                <span class="ec-register-wrap ec-register-half">
                    <label>Подтверждение пароля</label>
                    <input type="password" name="pass_confirm" required />
                </span>
                <span class="ec-register-wrap ec-register-btn">
                    <button class="btn btn-primary" type="submit">Регистрация</button>
                </span>
            </form>
        </div>
    </div>
</div>

             </div>
         </div>
     </section>
     <!-- End Register -->

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
                                         <li class="ec-footer-link"><span>Позвоните нам:</span><a
                                                 href="tel:+440123456789">+7 666 326 33 44</a></li>
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


     <!-- Footer navigation panel for responsive display -->
     <div class="ec-nav-toolbar">
         <div class="container">
             <div class="ec-nav-panel">
                 <div class="ec-nav-panel-icons">
                     <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle"><img
                             src="assets/images/icons/menu.svg" class="svg_img header_svg" alt="" /></a>
                 </div>
                 <div class="ec-nav-panel-icons">
                     <a href="#ec-side-cart" class="toggle-cart ec-header-btn ec-side-toggle"><img
                             src="assets/images/icons/cart.svg" class="svg_img header_svg" alt="" /><span
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
             <div class="header-icon"><img src="assets/images/icons/cart.svg" class="svg_img header_svg" alt="" /></div>
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