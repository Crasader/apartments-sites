<!-- Content -->
<div class="content_outter">
	<div class="content_inner">
		<div class="content_params">

			<div class="page_title_shell">
				<div style="width:130px;" class="page_title_params_secondary">
					RESIDENTS
				</div>
			</div>

			<div class="content_secondary">
				Resident Login Coming Soon
			</div>

		</div>
	</div>
</div>

<?php slot('header') ?>
<!-- Header -->
<div class="header_outter">
	<div class="header_inner">
		<div class="logo_container">
			<div class="logo_params">
				<a href="<?php echo url_for("default/index")?>"><img src="/images/acacia/<?php echo $property->getCode()?>/logo.png" /></a>
			</div>
		</div>
		<div class="header_right_container">
			<div class="header_right_inner">
				<div class="header_right_login">
					<a href="<?php echo url_for("residents/login")?>"><img src="/images/acacia/btn_login.png" border="0" /></a>
				</div>
				<div class="header_right_resident">
					Already a resident?
				</div>
			</div>
			<div class="header_right_nav">
				<div class="header_right_params">
					<a href="<?php echo url_for("floorplans/index")?>" class="nav_item">FLOOR PLANS</a>
					<a href="<?php echo url_for("photos/index")?>" class="nav_item">PHOTOS</a>
					<a href="<?php echo url_for("features/index")?>" class="nav_item">FEATURES</a>
					<a href="<?php echo url_for("community/index")?>" class="nav_item">COMMUNITY</a>
					<a href="<?php echo url_for("contact/min")?>" class="nav_item">CONTACT</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php end_slot() ?>

<?php slot('banner') ?>
<!-- Banner -->
<div class="banner_secondary_outter">
	<div class="banner_secondary_inner" style="background:url('/images/acacia/banner_community.png') "></div>
</div>
<?php end_slot() ?>

<?php slot('logo-grey') ?>
<div class="footer_logo">
	<img src="/images/acacia/<?php echo $property->getCode()?>/footerlogo.png" />
</div>
<?php end_slot() ?>

<?php slot('address') ?>
<div class="footer_info_left">
<strong>address</strong><br />
<?php echo $property->getAddress()?><br />
<?php echo $property->getCity()?>, <?php echo $property->getState()->getName()?> <?php echo $property->getZip()?><br /><br />

<strong>hours</strong><br />
<?php echo nl2br($property->getHours())?>
</div>
<div class="footer_info_right">
<strong>phone</strong><br />
<?php echo $property->getPhone()?><br /><br />
<strong>fax</strong><br />
<?php echo $property->getFax()?><br /><br />
<strong>email</strong><br />
<a href="<?php echo url_for('contact/index')?>"><?php echo $property->getEmail()?></a><br />
</div>
<?php end_slot() ?>
