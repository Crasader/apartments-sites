        <?php use App\Util\Util;

/* If residentInfo is not set, that means the session most likely timed out */
            if (!isset($residentInfo)) {
                die(Util::scriptRedirect('/resident-portal'));
            }
        ?>
        @extends($extends)
        @section('page-title-span','resident portal')
        @section('content')

		<section class="content">
        <meta http-equiv="cache-control" content="private, max-age=0, no-cache">
        <meta http-equiv="pragma" content="no-cache">
        <meta http-equiv="expires" content="0">
			<!-- Content Blocks -->
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="page-title">
							<h1>Resident Portal</h1>
							<div class="divder-teal"></div>
                            <?php
                                if (session('maint-sent')) {
                                    echo "<h1 class='notice'>Your maintenance request has been successfully submitted</h1>";
                                }
                            ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4>Welcome <?php echo Util::arrayGet($residentInfo, 4) . ' ' . Util::arrayGet($residentInfo, 5);?>!</h4>
						<br>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
                		<a href="https://www.amcrentpay.com/Account/Loginx" target="_blank" class="resident_btn">
                		<img src="<?php echo $entity->getWebPublicCommon('amc_icon_pay.png');?>" />   <b>MAKE A PAYMENT</b> </a>
                        <p>Pay your rent or schedule automatic payments quickly and securely.</p>

            		</div>
          		</div>
		        <div class="row">
					<div class="col-md-6">
		             	<a href="/resident-portal/maintenance-request" class="resident_btn">
		                <img src="<?php echo $entity->getWebPublicCommon('amc_icon_maintenance.png');?>" />  <b>SUBMIT A MAINTENANCE REQUEST</b> </a>
		             	<p>Have an issue in your apartment? Complete a request for maintenance and a member of our team will service your apartment as quickly as possible.</p>

            		</div>
		        </div>
		        <div class="row">
					<div class="col-md-6">
		             	<a href="/resident-portal/contact-request" class="resident_btn">
		                <img src="<?php echo $entity->getWebPublicDirectory('common') . '/amc_icon_contact.png';?>" />  <b>CONTACT THE OFFICE</b> </a>
		             	<p>How can we help? Contact the leasing team with any questions or concerns.</p>

            		</div>
		        </div>
		        <div class="row">
					<div class="col-md-6">
		             	<a href="/resident-portal/logout" class="resident_btn">
		                <img src="<?php echo $entity->getWebPublicDirectory('common') . '/amc_icon_logout.png';?>" />  <b>LOGOUT</b> </a>
		             	<p>Log out of resident portal</p>

            		</div>
		        </div>
			</div>
		</section>
        @stop
        @section('page-specific-js')
		<script type='text/javascript'>
        $(document).ready(function() {
            $(".nav-main-right a").on("click", function(){
               $(".nav-main-right").find(".active").removeClass("active");
               $(this).parent().addClass("active");
            });
        });
        </script>
        @stop
