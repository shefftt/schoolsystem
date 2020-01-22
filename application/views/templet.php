<!DOCTYPE html>
<html lang="en" direction="rtl" style="direction: rtl;">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<meta charset="utf-8" />
	<title>
		<?php if (isset($title)) echo $title;
		else echo "لوحه التحكم مدرسه جدو"; ?>
	</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--begin::Fonts -->
	<script src="<?= base_url() ?>assets/js/vue.js"></script>
	<script src="<?= base_url() ?>assets/js/vue-router.js"></script>
	<script src="<?= base_url() ?>assets/js/axios.min.js"></script>
	<script src="<?= base_url() ?>assets/js/toastr.min.js"></script>
	<script src="<?= base_url() ?>assets/js/moment.js"></script>
	<style>
		body {
			font-family: 'Cairo', sans-serif;
			color: #000 !important;
			font-weight: bold !important;
		}

		a {
			/* color: black !important; */
		}

		.item {
			background-color: #3ce474;
			/* background-color: #007bff; */
			padding: 14px;
			border-radius: 6px;
			color: #FFF !important;
		}

		.item_a {
			color: #FFF !important;
			font-size: 12px;
		}

		.item_bandage{
			background-color:red;
			padding: 2px;
			border-radius: 20px;
			width: 25px;
			display: inline;
			font-size: 14px;
			position: absolute;
			margin: -21px 119px 0 0;
			height: 25px;
			align-content: center;
			text-align: center;
		}

		.item_bandage-green{
			background-color:var(--teal);
			padding: 2px;
			border-radius: 20px;
			width: 25px;
			display: inline;
			font-size: 14px;
			position: absolute;
			margin: -21px 119px 0 0;
			height: 25px;
			align-content: center;
			text-align: center;
		}

		.item_m {
			margin: 2px !important;
		}
	</style>

	<!--end::Fonts -->
	<!--begin::Page Vendors Styles(used by this page) -->
	<link href="<?= base_url() ?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<!--end::Page Vendors Styles -->
	<!--begin::Global Theme Styles(used by all pages) -->
	<link href="<?= base_url() ?>assets/vendors/global/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/css/demo6/style.bundle.rtl.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/css/demo6/wizard-1.rtl.css" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles -->
	<!--begin::Layout Skins(used by all pages) -->
	<!--end::Layout Skins -->
	<link rel="shortcut icon" href="<?= base_url() ?>assets/media/logos/favicon.ico" />
</head>
<!-- end::Head -->
<!-- begin::Body -->

<body style="font-family: 'Cairo', sans-serif;" class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">
	<!-- begin:: Page -->
	<!-- begin:: Header Mobile -->
	<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
		<div class="kt-header-mobile__logo">
			<a href="index.html">
				<img alt="Logo" src="<?= base_url() ?>assets/media/logos/logo-6-sm.png" />
			</a>
		</div>
		<div class="kt-header-mobile__toolbar">
			<div class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler">
				<span></span>
			</div>
			<!-- <div class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler">
			<span></span>
			</div> -->
			<div class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler">
				<i class="flaticon-more"></i>
			</div>
		</div>
	</div>
	<!-- end:: Header Mobile -->
	<div class="kt-grid kt-grid--hor kt-grid--root">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
			<!-- begin:: Aside -->
			<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>

			<!-- end:: Aside -->
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
				<!-- begin:: Header -->
				<div id="kt_header" class="kt-header kt-grid kt-grid--ver  kt-header--fixed ">
					<!-- begin:: Aside -->
					<div class="kt-header__brand kt-grid__item  " id="kt_header_brand">
						<div class="kt-header__brand-logo">
							<a href="index.html">
								<img alt="Logo" src="<?= base_url() ?>assets/media/logos/logo-6.png" />
							</a>
						</div>
					</div>
					<!-- end:: Aside -->
					<!-- begin:: Title -->
					<h3 class="kt-header__title kt-grid__item">
						<?= get_school_info(auth_user()->school_id)->name ?>
					</h3>
					<!-- end:: Title -->
					<!-- begin: Header Menu -->
					<?php include 'HeaderMenu.php'; ?>

					<!-- end: Header Menu -->
					<!-- begin:: Header Topbar -->
					<div class="kt-header__topbar">
						<!--begin: Search -->

						<!--end: Search -->
						<!--begin: Notifications -->


						<!--end: Notifications -->

						<!--begin: Language bar -->

						<!--end: Language bar -->
						<!--begin: User bar -->
						<div class="kt-header__topbar-item kt-header__topbar-item--user">
							<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
								<span class="kt-hidden kt-header__topbar-welcome">Hi,</span>
								<span class="kt-hidden kt-header__topbar-username">Nick</span>
								<img class="kt-hidden" alt="Pic" src="<?= base_url() ?>assets/media/users/300_21.jpg" />
								<span class="kt-header__topbar-icon kt-hidden-"><i class="flaticon2-user-outline-symbol"></i></span>
							</div>
							<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
								<!--begin: Head -->
								<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(<?= base_url() ?>assets/media/misc/bg-1.jpg)">
									<div class="kt-user-card__avatar">
										<img class="kt-hidden" alt="Pic" src="<?= base_url() ?>assets/media/users/300_25.jpg" />
										<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
										<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span>
									</div>
									<div class="kt-user-card__name">
										Sean Stone
									</div>
									<div class="kt-user-card__badge">
										<span class="btn btn-success btn-sm btn-bold btn-font-md">23 messages</span>
									</div>
								</div>
								<!--end: Head -->
								<!--begin: Navigation -->
								<div class="kt-notification">
									<a href="#" class="kt-notification__item">
										<div class="kt-notification__item-icon">
											<i class="flaticon2-calendar-3 kt-font-success"></i>
										</div>
										<div class="kt-notification__item-details">
											<div class="kt-notification__item-title kt-font-bold">
												My Profile
											</div>
											<div class="kt-notification__item-time">
												Account settings and more
											</div>
										</div>
									</a>
									<a href="#" class="kt-notification__item">
										<div class="kt-notification__item-icon">
											<i class="flaticon2-mail kt-font-warning"></i>
										</div>
										<div class="kt-notification__item-details">
											<div class="kt-notification__item-title kt-font-bold">
												My Messages
											</div>
											<div class="kt-notification__item-time">
												Inbox and tasks
											</div>
										</div>
									</a>
									<a href="#" class="kt-notification__item">
										<div class="kt-notification__item-icon">
											<i class="flaticon2-rocket-1 kt-font-danger"></i>
										</div>
										<div class="kt-notification__item-details">
											<div class="kt-notification__item-title kt-font-bold">
												My Activities
											</div>
											<div class="kt-notification__item-time">
												Logs and notifications
											</div>
										</div>
									</a>
									<a href="#" class="kt-notification__item">
										<div class="kt-notification__item-icon">
											<i class="flaticon2-hourglass kt-font-brand"></i>
										</div>
										<div class="kt-notification__item-details">
											<div class="kt-notification__item-title kt-font-bold">
												My Tasks
											</div>
											<div class="kt-notification__item-time">
												latest tasks and projects
											</div>
										</div>
									</a>
									<a href="#" class="kt-notification__item">
										<div class="kt-notification__item-icon">
											<i class="flaticon2-cardiogram kt-font-warning"></i>
										</div>
										<div class="kt-notification__item-details">
											<div class="kt-notification__item-title kt-font-bold">
												Billing
											</div>
											<div class="kt-notification__item-time">
												billing & statements <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill kt-badge--rounded">2
													pending</span>
											</div>
										</div>
									</a>
									<div class="kt-notification__custom kt-space-between">
										<a href="custom/user/login-v2.html" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
										<a href="custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a>
									</div>
								</div>
								<!--end: Navigation -->
							</div>
						</div>
						<!--end: User bar -->
						<!--begin: Quick panel toggler -->
						<div class="kt-header__topbar-item kt-header__topbar-item--quickpanel" data-toggle="kt-tooltip" title="Quick panel" data-placement="top">
							<div class="kt-header__topbar-wrapper">
								<span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn"><i class="flaticon2-cube-1"></i></span>
							</div>
						</div>
						<!--end: Quick panel toggler -->
					</div>
					<!-- end:: Header Topbar -->
				</div>
				<!-- end:: Header -->
				<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor col-md-12" id="kt_content">
					<?php if (isset($page)) include $page . ".php"; ?>
					<!-- end:: Content -->
				</div>
				<!-- begin:: Footer -->
				<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
					<div class="kt-container  kt-container--fluid ">
						<div class="kt-footer__copyright">
							2019&nbsp;&copy;&nbsp;<a href="http://keenthemes.com/metronic" target="_blank" class="kt-link">panda180</a>
						</div>
						<div class="kt-footer__menu">
							<a href="#" target="_blank" class="kt-footer__menu-link kt-link">ahmed hmed</a>
						</div>
					</div>
				</div>
				<!-- end:: Footer -->
			</div>
		</div>
	</div>
	<!-- end:: Page -->
	<!-- begin::Quick Panel -->
	<div id="kt_quick_panel" class="kt-quick-panel">
		<a href="#" class="kt-quick-panel__close" id="kt_quick_panel_close_btn"><i class="flaticon2-delete"></i></a>
		<div class="kt-quick-panel__nav">
			<ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
				<li class="nav-item active">
					<a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_tab_notifications" role="tab">Notifications</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_logs" role="tab">Audit Logs</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_settings" role="tab">Settings</a>
				</li>
			</ul>
		</div>
		<div class="kt-quick-panel__content">
			<div class="tab-content">
				<div class="tab-pane fade show kt-scroll active" id="kt_quick_panel_tab_notifications" role="tabpanel">
					<div class="kt-notification">
						<a href="#" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-line-chart kt-font-success"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title">
									New order has been received
								</div>
								<div class="kt-notification__item-time">
									2 hrs ago
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-box-1 kt-font-brand"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title">
									New customer is registered
								</div>
								<div class="kt-notification__item-time">
									3 hrs ago
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-chart2 kt-font-danger"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title">
									Application has been approved
								</div>
								<div class="kt-notification__item-time">
									3 hrs ago
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-image-file kt-font-warning"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title">
									New file has been uploaded
								</div>
								<div class="kt-notification__item-time">
									5 hrs ago
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-bar-chart kt-font-info"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title">
									New user feedback received
								</div>
								<div class="kt-notification__item-time">
									8 hrs ago
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-pie-chart-2 kt-font-success"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title">
									System reboot has been successfully completed
								</div>
								<div class="kt-notification__item-time">
									12 hrs ago
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-favourite kt-font-danger"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title">
									New order has been placed
								</div>
								<div class="kt-notification__item-time">
									15 hrs ago
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification__item kt-notification__item--read">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-safe kt-font-primary"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title">
									Company meeting canceled
								</div>
								<div class="kt-notification__item-time">
									19 hrs ago
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-psd kt-font-success"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title">
									New report has been received
								</div>
								<div class="kt-notification__item-time">
									23 hrs ago
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="flaticon-download-1 kt-font-danger"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title">
									Finance report has been generated
								</div>
								<div class="kt-notification__item-time">
									25 hrs ago
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="flaticon-security kt-font-warning"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title">
									New customer comment recieved
								</div>
								<div class="kt-notification__item-time">
									2 days ago
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-pie-chart kt-font-warning"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title">
									New customer is registered
								</div>
								<div class="kt-notification__item-time">
									3 days ago
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="tab-pane fade kt-scroll" id="kt_quick_panel_tab_logs" role="tabpanel">
					<div class="kt-notification-v2">
						<a href="#" class="kt-notification-v2__item">
							<div class="kt-notification-v2__item-icon">
								<i class="flaticon-bell kt-font-brand"></i>
							</div>
							<div class="kt-notification-v2__itek-wrapper">
								<div class="kt-notification-v2__item-title">
									5 new user generated report
								</div>
								<div class="kt-notification-v2__item-desc">
									Reports based on sales
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification-v2__item">
							<div class="kt-notification-v2__item-icon">
								<i class="flaticon2-box kt-font-danger"></i>
							</div>
							<div class="kt-notification-v2__itek-wrapper">
								<div class="kt-notification-v2__item-title">
									2 new items submited
								</div>
								<div class="kt-notification-v2__item-desc">
									by Grog John
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification-v2__item">
							<div class="kt-notification-v2__item-icon">
								<i class="flaticon-psd kt-font-brand"></i>
							</div>
							<div class="kt-notification-v2__itek-wrapper">
								<div class="kt-notification-v2__item-title">
									79 PSD files generated
								</div>
								<div class="kt-notification-v2__item-desc">
									Reports based on sales
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification-v2__item">
							<div class="kt-notification-v2__item-icon">
								<i class="flaticon2-supermarket kt-font-warning"></i>
							</div>
							<div class="kt-notification-v2__itek-wrapper">
								<div class="kt-notification-v2__item-title">
									$2900 worth producucts sold
								</div>
								<div class="kt-notification-v2__item-desc">
									Total 234 items
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification-v2__item">
							<div class="kt-notification-v2__item-icon">
								<i class="flaticon-paper-plane-1 kt-font-success"></i>
							</div>
							<div class="kt-notification-v2__itek-wrapper">
								<div class="kt-notification-v2__item-title">
									4.5h-avarage response time
								</div>
								<div class="kt-notification-v2__item-desc">
									Fostest is Barry
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification-v2__item">
							<div class="kt-notification-v2__item-icon">
								<i class="flaticon2-information kt-font-danger"></i>
							</div>
							<div class="kt-notification-v2__itek-wrapper">
								<div class="kt-notification-v2__item-title">
									Database server is down
								</div>
								<div class="kt-notification-v2__item-desc">
									10 mins ago
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification-v2__item">
							<div class="kt-notification-v2__item-icon">
								<i class="flaticon2-mail-1 kt-font-brand"></i>
							</div>
							<div class="kt-notification-v2__itek-wrapper">
								<div class="kt-notification-v2__item-title">
									System report has been generated
								</div>
								<div class="kt-notification-v2__item-desc">
									Fostest is Barry
								</div>
							</div>
						</a>
						<a href="#" class="kt-notification-v2__item">
							<div class="kt-notification-v2__item-icon">
								<i class="flaticon2-hangouts-logo kt-font-warning"></i>
							</div>
							<div class="kt-notification-v2__itek-wrapper">
								<div class="kt-notification-v2__item-title">
									4.5h-avarage response time
								</div>
								<div class="kt-notification-v2__item-desc">
									Fostest is Barry
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="tab-pane kt-quick-panel__content-padding-x fade kt-scroll" id="kt_quick_panel_tab_settings" role="tabpanel">
					<form class="kt-form">
						<div class="kt-heading kt-heading--sm kt-heading--space-sm">Customer Care</div>
						<div class="form-group form-group-xs row">
							<label class="col-8 col-form-label">Enable Notifications:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--success kt-switch--sm">
									<label>
										<input type="checkbox" checked="checked" name="quick_panel_notifications_1">
										<span></span>
									</label>
								</span>
							</div>
						</div>
						<div class="form-group form-group-xs row">
							<label class="col-8 col-form-label">Enable Case Tracking:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--success kt-switch--sm">
									<label>
										<input type="checkbox" name="quick_panel_notifications_2">
										<span></span>
									</label>
								</span>
							</div>
						</div>
						<div class="form-group form-group-last form-group-xs row">
							<label class="col-8 col-form-label">Support Portal:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--success kt-switch--sm">
									<label>
										<input type="checkbox" checked="checked" name="quick_panel_notifications_2">
										<span></span>
									</label>
								</span>
							</div>
						</div>
						<div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
						<div class="kt-heading kt-heading--sm kt-heading--space-sm">Reports</div>
						<div class="form-group form-group-xs row">
							<label class="col-8 col-form-label">Generate Reports:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--sm kt-switch--danger">
									<label>
										<input type="checkbox" checked="checked" name="quick_panel_notifications_3">
										<span></span>
									</label>
								</span>
							</div>
						</div>
						<div class="form-group form-group-xs row">
							<label class="col-8 col-form-label">Enable Report Export:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--sm kt-switch--danger">
									<label>
										<input type="checkbox" name="quick_panel_notifications_3">
										<span></span>
									</label>
								</span>
							</div>
						</div>
						<div class="form-group form-group-last form-group-xs row">
							<label class="col-8 col-form-label">Allow Data Collection:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--sm kt-switch--danger">
									<label>
										<input type="checkbox" checked="checked" name="quick_panel_notifications_4">
										<span></span>
									</label>
								</span>
							</div>
						</div>
						<div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
						<div class="kt-heading kt-heading--sm kt-heading--space-sm">Memebers</div>
						<div class="form-group form-group-xs row">
							<label class="col-8 col-form-label">Enable Member singup:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--sm kt-switch--brand">
									<label>
										<input type="checkbox" checked="checked" name="quick_panel_notifications_5">
										<span></span>
									</label>
								</span>
							</div>
						</div>
						<div class="form-group form-group-xs row">
							<label class="col-8 col-form-label">Allow User Feedbacks:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--sm kt-switch--brand">
									<label>
										<input type="checkbox" name="quick_panel_notifications_5">
										<span></span>
									</label>
								</span>
							</div>
						</div>
						<div class="form-group form-group-last form-group-xs row">
							<label class="col-8 col-form-label">Enable Customer Portal:</label>
							<div class="col-4 kt-align-right">
								<span class="kt-switch kt-switch--sm kt-switch--brand">
									<label>
										<input type="checkbox" checked="checked" name="quick_panel_notifications_6">
										<span></span>
									</label>
								</span>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end::Quick Panel -->
	<!-- begin::Scrolltop -->
	<div id="kt_scrolltop" class="kt-scrolltop">
		<i class="fa fa-arrow-up"></i>
	</div>
	<!-- end::Scrolltop -->

	<!-- begin::Global Config(global config for global JS sciprts) -->
	<script>
		var KTAppOptions = {
			"colors": {
				"state": {
					"brand": "#22b9ff",
					"light": "#ffffff",
					"dark": "#282a3c",
					"primary": "#5867dd",
					"success": "#34bfa3",
					"info": "#36a3f7",
					"warning": "#ffb822",
					"danger": "#fd3995"
				},
				"base": {
					"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
					"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
				}
			}
		};
	</script>
	<!-- end::Global Config -->
	<!--begin::Global Theme Bundle(used by all pages) -->
	<script src="<?= base_url() ?>assets/vendors/global/vendors.bundle.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>jquery.dataTables.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/js/demo6/scripts.bundle.js" type="text/javascript"></script>
	<!--end::Global Theme Bundle -->
	<!--begin::Page Vendors(used by this page) -->
	<script src="<?= base_url() ?>assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript">
	</script>
	<script src="<?= base_url() ?>assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>
	<!--end::Page Vendors -->
	<!--begin::Page Scripts(used by this page) -->
	<script src="<?= base_url() ?>assets/js/demo6/pages/dashboard.js" type="text/javascript"></script>
	
	<!--end::Page Scripts -->
	<script>
		$(document).ready(function() {
// 			$('#myTable').DataTable();
		});
	</script>
</body>
<!-- end::Body -->

</html>
