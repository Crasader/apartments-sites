        @extends($extends) @section('page-title-row') <div class="row">
			 <div class="col-md-8"> <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Resident Portal</h1> <div class="hs-line-4 font-alt"> With convenient 24/7 access, the resident portal makes it easy for you to request maintenance service and pay your rent online. Login to get started! </div> </div>                         <div class="col-md-4 mt-30">
				<div class="mod-breadcrumbs font-alt align-right">
					<a href="#">Home</a>&nbsp;/&nbsp;<span>RESIDENT / FIND USER ID</span></div>
			</div>
		</div>
        @stop
        @section('home-title','')
        @section('content')
		<!-- Content -->
		<section class="content">
			<!-- Content Blocks -->
			<div class="container">
                <br><br>
				<?php if(isset($userIdFound)): ?>
				<div class="row">
                    <div class="col-md-6 col-sm-6 col-md-offset-3 mb-sm-50 mb-xs-30 section-text">
						<p>An email has been sent to the email address you registered with at move-in. </p>
						<br>
						<a href="/resident_portal/"></span> Resident Portal</a>
						<p>&nbsp;</p>
						<br>
						<br>
					</div>
				</div>
                <?php else: ?>
				<div class="row">	
                    <div class="col-md-6 col-sm-6 col-md-offset-3 mb-sm-50 mb-xs-30 section-text">
						<p>Please enter your email address you registered with at move-in. </p>
						<div class="section-text schedule-a-tour-form form-container">
							<form role="form" id="form1" name="form1" method="post" class="validate" action="/resident-portal/find-userid">
								<p><span class="colored-text"><b><?php if(isset($userIdNotFound)): ?>Email Address was not found<?php endif;?></b></span></p>
								<div class="form-group">
									<label class="control-label">Email *</label>
									<input type="text" class="form-control" name="email" data-validate="required,email" data-message-required="Email Address is a required field."/>
								</div>
								<div class="form-group">
									<label class="control-label">Unit Number *</label>
									<input type="text" class="form-control" name="unit" data-validate="required" data-message-required="Unit number is a required field."/>
								</div>
                                {{csrf_field()}}
				                <div class="mb-20 mb-md-10">
                                    <button type="submit" class="btn btn-mod btn-brown btn-large btn-round">Find</button>
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
            amcBindValidate({
                'form': '#form1',
                'rules': {
                    'email': {
                        required: true,
                        'email': true
                    },
                    'unit':{
                        required: true
                    }
                }
            });
        
        });
        </script>
        @stop
