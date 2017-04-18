        @extends($extends)
        @section('page-title-row')
            @include('layouts/resident-portal/pages/inc/header')
        @stop
        @section('page-title-span','Resident / Reset Password')
        @section('content')
		<!-- Content -->
		<section class="content">
			<!-- Content Blocks -->
			<div class="container">
            <br><br>
                <?php if(isset($userIdFound)):?>
				<div class="row">
                    <div class="col-md-6 col-sm-6 col-md-offset-3 mb-sm-50 mb-xs-30">
						<p>An email has been sent to the email address you registered with at move-in. </p>
						<br>
						<a href="/resident-portal/"></span> Resident Portal</a>
						<p>&nbsp;</p>
						<br>
						<br>
					</div>
				</div>
                <?php else: ?>
				<div class="row">
					<div class="col-md-6 col-sm-6 col-md-offset-3 mb-sm-50 mb-xs-30">
						<p>Please enter your User ID and we will reset your account and email you a new password to the email address you registered with at move-in. </p>
						<div class="mb-20 mb-md-10 schedule-a-tour-form form-container section-text">
							<form role="form" id="form1" name="form1" method="post" class="validate" action="/resident-portal/reset-password">
								<?php foreach($errors->all() as $i => $errorMessage): ?>
                                    <p><span class="colored-text"><b><?php echo $errorMessage; ?></b></span></p>
                                <?php endforeach; ?>
                                <?php if(isset($userIdNotFound)): ?>
                                   <p><span class="colored-text"><b>User ID was not found</b></span></p> 
                                <?php endif;?>
								<div class="form-group">
                                    <label><i class="fa fa-user"></i> User Id</label>
									<input type="text" class="form-control" name="txtUserId" data-validate="required" data-message-required="User ID is a required field."/>
								</div>
                                <div class='form-grou'>
                                    <a class='section-text-nullify resident-links' href='/resident-portal/find-userid'>Need User Id?</a>
                                </div>
                                <br>
                                {{csrf_field()}}
                                <div class="mb-20 mb-md-10">
                                    <button type="submit" class="btn btn-mod btn-brown btn-large btn-round">Reset</button>
                                </div>
                                                         
							</form>
						</div>
					</div>
				</div>
                <?php endif; ?>
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
