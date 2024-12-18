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

	<!-- No Extra plugin used -->

	<link href='assets/plugins/data-tables/datatables.bootstrap5.min.css' rel='stylesheet'>
	<link href='assets/plugins/data-tables/responsive.datatables.min.css' rel='stylesheet'>

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
										<a class="sidenav-item-link" href="product-list.php">
											<span class="nav-text">Список Товаров</span>
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
							<p class="breadcrumbs"><span><a href="index.html">Главная</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Товары
							</p>
						</div>
						<div>
							<a href="product-add.php" class="btn btn-primary"> Добавить Товар</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table" style="width:100%">
											<thead>
												<tr>
													<th>id</th>
													<th>Название</th>
													<th>Описание</th>
													<th>Цена</th>
													<th>Изображение</th>
													<th>Количество</th>
													<th>Тип</th>
													<th>Поставщик</th>
													<th>Действие</th>
												</tr>
											</thead>
											<tbody>
												<?php
												// Запрос на получение данных
												$query = "
            SELECT 
                products.id, 
                products.name AS product_name, 
                products.desc AS product_desc, 
                products.price, 
                products.image, 
                products.quantity, 
                category.name AS category_name, 
                suppliers.name AS supplier_name
            FROM 
                products
            LEFT JOIN 
                category 
                ON products.categ_id = category.id
            LEFT JOIN 
                suppliers 
                ON products.sup_id = suppliers.id
        ";

												$result = $db->query($query);

												if ($result->num_rows > 0):
													while ($row = $result->fetch_assoc()):
														// Обрезка текста описания
														$short_desc = mb_strimwidth($row['product_desc'], 0, 50, "...");
												?>
														<tr>
															<td><?php echo $row['id']; ?></td>
															<td><?php echo htmlspecialchars($row['product_name']); ?></td>
															<td>
																<span title="<?php echo htmlspecialchars($row['product_desc']); ?>">
																	<?php echo htmlspecialchars($short_desc); ?>
																</span>
															</td>
															<td><?php echo number_format($row['price'], 2, '.', ''); ?> ₽</td>
															<td>
																<img class="tbl-thumb" src="../img/<?php echo htmlspecialchars($row['image']); ?>" alt="Product Image" />
															</td>
															<td><?php echo $row['quantity']; ?></td>
															<td><?php echo htmlspecialchars($row['category_name']); ?></td>
															<td><?php echo htmlspecialchars($row['supplier_name']); ?></td>
															<td>
																<div class="btn-group mb-1">
																	<button type="button" class="btn btn-outline-success">Info</button>
																	<button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																		data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
																		<span class="sr-only">Info</span>
																	</button>
																	<div class="dropdown-menu">
																		<a class="dropdown-item" href="product-edit.php?id=<?= $row['id'] ?>">Редактировать</a>
																		<a class="dropdown-item" href="../delete-prod.php?id=<?= $row['id'] ?>" onclick="return confirm('Вы уверены, что хотите удалить этот товар?');">Удалить</a>

																	</div>
																</div>
															</td>
														</tr>
													<?php
													endwhile;
												else:
													?>
													<tr>
														<td colspan="9">Нет данных для отображения.</td>
													</tr>
												<?php endif; ?>
											</tbody>
										</table>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->


			<!-- Footer -->
			<footer class="footer mt-auto">
				<div class="copyright bg-white">
					<p>
						Copyright &copy; <span id="ec-year"></span><a class="text-primary"
							href="https://themeforest.net/user/ashishmaraviya" target="_blank"> Ekka Admin Dashboard</a>. All Rights Reserved.
					</p>
				</div>
			</footer>

		</div> <!-- End Page Wrapper -->
	</div> <!-- End Wrapper -->

	<!-- Common Javascript -->
	<script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/plugins/simplebar/simplebar.min.js"></script>
	<script src="assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
	<script src="assets/plugins/slick/slick.min.js"></script>

	<!-- Datatables -->
	<script src='assets/plugins/data-tables/jquery.datatables.min.js'></script>
	<script src='assets/plugins/data-tables/datatables.bootstrap5.min.js'></script>
	<script src='assets/plugins/data-tables/datatables.responsive.min.js'></script>

	<!-- Option Switcher -->
	<script src="assets/plugins/options-sidebar/optionswitcher.js"></script>

	<!-- Ekka Custom -->
	<script src="assets/js/ekka.js"></script>
</body>

</html>