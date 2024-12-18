<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
session_start();
require "../connect.php"; // Подключение к базе данных

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
	// Пользователь не авторизован, перенаправляем на страницу входа
	header("Location: /ekka-html/login.php");
	exit;
}

// Получаем ID пользователя из сессии
$user_id = $_SESSION['user_id'];

// Извлекаем информацию о пользователе из базы данных
$query = "SELECT name, last_name, email, phone, role FROM users WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Проверяем, является ли пользователь администратором
if (!$user || $user['role'] !== 'admin') {
	header("Location: /ekka-html/index.php");
	exit;
}

?>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Ekka - Admin Dashboard HTML Template.">

	<title>Ekka - Admin Dashboard HTML Template.</title>

	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

	<link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

	<!-- PLUGINS CSS STYLE -->
	<link href="assets/plugins/simplebar/simplebar.css" rel="stylesheet" />

	<!-- ekka CSS -->
	<link id="ekka-css" rel="stylesheet" href="assets/css/ekka.css" />

	<!-- FAVICON -->
	<link href="assets/img/favicon.png" rel="shortcut icon" />
</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-dark ec-header-light" id="body">

	<!-- WRAPPER -->
	<div class="wrapper">
		<!-- LEFT MAIN SIDEBAR -->
		<div class="ec-left-sidebar ec-bg-sidebar">
			<div id="sidebar" class="sidebar ec-sidebar-footer">

				<div class="ec-brand">
					<a href="index.php" title="Арсенал Стротеля">
						<img class="ec-brand-icon" src="assets/img/logo/LogoInstr.jpg" alt="" />
					</a>
				</div>

				<!-- begin sidebar scrollbar -->
				<div class="ec-navigation" data-simplebar>
					<!-- sidebar menu -->
					<ul class="nav sidebar-inner" id="sidebar-menu">
						<!-- Dashboard -->

						<!-- Vendors -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-account-group-outline"></i>
								<span class="nav-text">Поставщики</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">

									<li class="">
										<a class="sidenav-item-link" href="vendor-list.php">
											<span class="nav-text">Список Поставщиков</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<!-- Users -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-account-group"></i>
								<span class="nav-text">Пользователи</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="users" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="user-list.php">
											<span class="nav-text">Список Пользователей</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="user-profile.php">
											<span class="nav-text">Профиль Пользователя</span>
										</a>
									</li>
								</ul>
							</div>
							<hr>
						</li>

						<!-- Category -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-dns-outline"></i>
								<span class="nav-text">Категории</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="main-category.php">
											<span class="nav-text">Главная Категория</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="sub-category.php">
											<span class="nav-text">Посторонние Категории</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<!-- Products -->
						<li class="has-sub active expand">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-palette-advanced"></i>
								<span class="nav-text">Товары</span> <b class="caret"></b>
							</a>
							<div class="collapse show">
								<ul class="sub-menu" id="products" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="product-add.php">
											<span class="nav-text">Добавить Товар</span>
										</a>
									</li>
									<li class="active">
										<a class="sidenav-item-link" href="product-grid.php">
											<span class="nav-text">Список Товаров</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="product-detail.php">
											<span class="nav-text">Детали Продукта</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<!-- Orders -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-cart"></i>
								<span class="nav-text">Заказы</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="new-order.php">
											<span class="nav-text">Новый Заказ</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="order-history.php">
											<span class="nav-text">История Заказов</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="order-detail.php">
											<span class="nav-text">Детали Заказов</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="invoice.php">
											<span class="nav-text">Детали Заказов 2</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<!-- Reviews -->
						<li>
							<a class="sidenav-item-link" href="review-list.php">
								<i class="mdi mdi-star-half"></i>
								<span class="nav-text">Отзывы</span>
							</a>
						</li>

						<!-- Authentication -->

						<!-- Icons -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-diamond-stone"></i>
								<span class="nav-text">Иконки</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="icons" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="material-icon.php">
											<span class="nav-text">Material Icon</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="font-awsome-icons.php">
											<span class="nav-text">Font Awsome Icon</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- PAGE WRAPPER -->
		<div class="ec-page-wrapper">

			<!-- Header -->
			<header class="ec-main-header" id="header">
				<nav class="navbar navbar-static-top navbar-expand-lg">
					<!-- Sidebar toggle button -->
					<button id="sidebar-toggler" class="sidebar-toggle"></button>
					<!-- search form -->
					<div class="search-form d-lg-inline-block">
						<div id="search-results-container">
							<ul id="search-results"></ul>
						</div>
					</div>

					<!-- navbar right -->
					<div class="navbar-right">
						<ul class="nav navbar-nav">
							<!-- User Account -->
							<li class="dropdown user-menu">
								<button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown"
									aria-expanded="false">
									<img src="assets/img/user/profile.png" class="user-image" alt="User Image" />
								</button>
								<ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu">
									<!-- User image -->
									<li class="dropdown-header">
										<img src="assets/img/user/profile.png" class="img-circle" alt="User Image" />
										<div class="d-inline-block">
											<?php echo htmlspecialchars($user['name'] . " " . $user['last_name']); ?><small class="pt-1"><?php echo htmlspecialchars($user['email']); ?></small>
										</div>
									</li>
									<li>
										<a href="user-profile.php">
											<i class="mdi mdi-account"></i> Мой Профиль
										</a>
									</li>
									<li class="dropdown-footer">
										<a href="../logout.php"> <i class="mdi mdi-logout"></i> Выход </a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>

			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>Товары</h1>
							<p class="breadcrumbs"><span><a href="index.php">Главная</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Список товаров
							</p>
						</div>
						<div>
							<a href="product-add.php" class="btn btn-primary"> Добавить товар</a>
						</div>
					</div>

					<div class="row">
						<? $result = $db->query("SELECT * FROM products");
						while ($product = $result->fetch_assoc()) { ?>
							<div class="col-lg-3 col-md-4 col-sm-6">
								<div class="card-wrapper">
									<div class="card-container">
										<div class="card-top">
											<img class="card-image" src="/img/<?= $product['image'] ?>" alt="image" />
										</div>
										<div class="card-bottom">
											<h3><?= $product['name'] ?></h3>
											<p><?= $product['price'] ?> ₽</p>
										</div>
										<div class="card-action">
											<!-- Кнопка редактирования -->
											<a href="product-edit.php?id=<?= $product['id'] ?>" class="card-edit">
												<i class="mdi mdi-circle-edit-outline"></i>
											</a>
											<!-- Кнопка удаления -->
											<a href="../delete-prod.php?id=<?= $product['id'] ?>" class="card-remove"
												onclick="return confirm('Вы уверены, что хотите удалить этот товар?');">
												<i class="mdi mdi mdi-delete-outline"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						<? } ?>
					</div>

				</div>
			</div>
			<a href="product-edit.php"></a>
			<!-- Footer -->
			<footer class="footer mt-auto">
				<div class="copyright bg-white">
					<p>
						Copyright © 2024-2025 <a class="text-primary"
							href="https://themeforest.net/user/ashishmaraviya" target="_blank"> Арсенал Строителя</a>. Все права защищены.
					</p>
				</div>
			</footer>

		</div> <!-- End Content -->
	</div> <!-- End Content Wrapper -->

	<!-- Common Javascript -->
	<script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/plugins/simplebar/simplebar.min.js"></script>
	<script src="assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
	<script src="assets/plugins/slick/slick.min.js"></script>

	<!-- Option Switcher -->
	<script src="assets/plugins/options-sidebar/optionswitcher.js"></script>

	<!-- Ekka Custom -->
	<script src="assets/js/ekka.js"></script>

</body>

</html>