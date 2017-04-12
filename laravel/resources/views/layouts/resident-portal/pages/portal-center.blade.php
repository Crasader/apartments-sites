        @extends('layouts/dinapoli/main') <?php //TODO: extend dynamically ?>
        @section('page-title-span','resident portal')
        @section('content')
		<section class="content">
			<!-- Content Blocks -->
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="page-title">
							<h1>Resident Portal</h1>
							<div class="divder-teal"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h4>Welcome <?php echo $residentInfo[4] . ' ' . $residentInfo[5];?>!</h4>
						<br>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
                		<a href="https://www.amcrentpay.com/Account/Loginx" target="_blank" class="resident_btn">
                		<img src="/img/res/amc_icon_pay.png" />   <b>MAKE A PAYMENT</b> </a>
                        <p>Pay your rent or schedule automatic payments quickly and securely.</p>
            		           			
            		</div>
          		</div>
		        <div class="row">
					<div class="col-md-6">
		             	<a href="/resident-portal/maintenance-request" class="resident_btn">  
		                <img src="/img/res/amc_icon_maintenance.png" />  <b>SUBMIT A MAINTENANCE REQUEST</b> </a>
		             	<p>Have an issue in your apartment? Complete a request for maintenance and a member of our team will service your apartment as quickly as possible.</p>
            			
            		</div>
		        </div>
		        <div class="row">
					<div class="col-md-6">
		             	<a href="/resident-portal/contact-request" class="resident_btn">  
		                <img src="/img/res/amc_icon_contact.jpg" />  <b>CONTACT THE OFFICE</b> </a>
		             	<p>How can we help? Contact the leasing team with any questions or concerns.</p>
            			
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
