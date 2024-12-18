<!DOCTYPE html>
<html lang="ru" dir="ltr">

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

	<!-- Data Tables -->
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
									<!-- <li class="">
										<a class="sidenav-item-link" href="vendor-profile.php">
											<span class="nav-text">Vendors Profile</span>
										</a>
									</li> -->
								</ul>
							</div>
						</li>

						<!-- Users -->
						<li class="has-sub active expand">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-account-group"></i>
								<span class="nav-text">Пользователи</span> <b class="caret"></b>
							</a>
							<div class="collapse show">
								<ul class="sub-menu" id="users" data-parent="#sidebar-menu">
									<li class="active">
										<a class="sidenav-item-link" href="user-list.php">
											<span class="nav-text">Список Пользователей</span>
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
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-palette-advanced"></i>
								<span class="nav-text">Товары</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="products" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="product-add.php">
											<span class="nav-text">Добавить Товар</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="product-list.php">
											<span class="nav-text">Список Продуктов</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="product-grid.php">
											<span class="nav-text">Сетка Продуктов</span>
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
						<div class="input-group">
							<input type="text" name="query" id="search-input" class="form-control"
								placeholder="Поиск.." autofocus autocomplete="off" />
							<button type="button" name="search" id="search-btn" class="btn btn-flat">
								<i class="mdi mdi-magnify"></i>
							</button>
						</div>
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
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Список пользвоателей</h1>
							<p class="breadcrumbs"><span><a href="index.html">Главная</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Список пользователей
							</p>
						</div>
						<!-- <div>
							<button type="button" class="btn btn-primary" data-bs-toggle="modal"
								data-bs-target="#addUser"> Add User
							</button>
						</div> -->
					</div>
					<div class="row">
						<div class="col-12">
							<div class="ec-vendor-list card card-default">
								<div class="card-body">
									<div class="">
										<?php
										// Подключение к базе данных

										// Выполнение запроса к таблице пользователей
										$query = "SELECT id, name, last_name, email, phone, address, role FROM users";
										$result = $db->query($query);

										// Проверка наличия записей
										if ($result->num_rows > 0):
										?>
											<table id="responsive-data-table" class="table">
												<thead>
													<tr>
														<th>id</th>
														<th>Имя</th>
														<th>Фамилия</th>
														<th>Email</th>
														<th>Номер</th>
														<th>Адрес</th>
														<th>Роль</th>
														<th>Действия</th>
													</tr>
												</thead>
												<tbody>
													<?php while ($row = $result->fetch_assoc()): ?>
														<tr>
															<td><?php echo htmlspecialchars($row['id']); ?></td>
															<td><?php echo htmlspecialchars($row['name']); ?></td>
															<td><?php echo htmlspecialchars($row['last_name']); ?></td>
															<td><?php echo htmlspecialchars($row['email']); ?></td>
															<td><?php echo htmlspecialchars($row['phone']); ?></td>
															<td><?php echo htmlspecialchars($row['address']); ?></td>
															<td><?php echo htmlspecialchars($row['role']); ?></td>
															<td>
    <div class="btn-group mb-1">
	<a href="user-open.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-outline-success">Открыть</a>

        <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
            <span class="sr-only">Info</span>
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="edit_user.php?id=<?php echo $row['id']; ?>">Редактировать</a>
            <a class="dropdown-item" href="delete_user.php?id=<?php echo $row['id']; ?>"
               onclick="return confirm('Вы уверены, что хотите удалить этого пользователя?');">Удалить</a>
        </div>
    </div>
</td>

														</tr>
													<?php endwhile; ?>
												</tbody>
											</table>
										<?php else: ?>
											<p>Пользователи не найдены.</p>
										<?php endif; ?>

									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Add User Modal  -->
					<div class="modal fade modal-add-contact" id="addUser" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<form>
									<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Add New User</h5>
									</div>

									<div class="modal-body px-4">
										<div class="form-group row mb-6">
											<label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">User
												Image</label>

											<div class="col-sm-8 col-lg-10">
												<div class="custom-file mb-1">
													<input type="file" class="custom-file-input" id="coverImage"
														required>
													<label class="custom-file-label" for="coverImage">Choose
														file...</label>
													<div class="invalid-feedback">Example invalid custom file feedback
													</div>
												</div>
											</div>
										</div>

										<div class="row mb-2">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="firstName">First name</label>
													<input type="text" class="form-control" id="firstName" value="John">
												</div>
											</div>

											<div class="col-lg-6">
												<div class="form-group">
													<label for="lastName">Last name</label>
													<input type="text" class="form-control" id="lastName" value="Deo">
												</div>
											</div>

											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="userName">User name</label>
													<input type="text" class="form-control" id="userName"
														value="johndoe">
												</div>
											</div>

											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="email">Email</label>
													<input type="email" class="form-control" id="email"
														value="johnexample@gmail.com">
												</div>
											</div>

											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="Birthday">Birthday</label>
													<input type="text" class="form-control" id="Birthday"
														value="10-12-1991">
												</div>
											</div>

											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="event">Address</label>
													<input type="text" class="form-control" id="event"
														value="Address here">
												</div>
											</div>
										</div>
									</div>

									<div class="modal-footer px-4">
										<button type="button" class="btn btn-secondary btn-pill"
											data-bs-dismiss="modal">Cancel</button>
										<button type="button" class="btn btn-primary btn-pill">Save Contact</button>
									</div>
								</form>
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
							href="https://themeforest.net/user/ashishmaraviya" target="_blank"> Ekka Admin
							Dashboard</a>. All Rights Reserved.
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

	<!-- Data Tables -->
	<script src='assets/plugins/data-tables/jquery.datatables.min.js'></script>
	<script src='assets/plugins/data-tables/datatables.bootstrap5.min.js'></script>
	<script src='assets/plugins/data-tables/datatables.responsive.min.js'></script>

	<!-- Option Switcher -->
	<script src="assets/plugins/options-sidebar/optionswitcher.js"></script>

	<!-- Ekka Custom -->
	<script src="assets/js/ekka.js"></script>
</body>

</html>