
<!DOCTYPE html>
<html lang="">
	<head>
		<title>Contact our Community in Greenville | 400 Rhett</title>
		<meta name="description" content="Contact us to learn more about 400 Rhett in Greenville, SC">
		<meta name="keywords" content=" Apartment Rentals in Greenville South Carolina, Apartment Rentals on 400 Rhett Street Greenville">

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<LINK REL="SHORTCUT ICON" HREF="/img/400.ico">
		<!-- CSS -->
		<link href="/css/jquery-ui.min.css" rel="stylesheet">
		<link href="/css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/animations.css" rel="stylesheet">
		<link href="/css/main.css" rel="stylesheet">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!--#include virtual="/analytics.asp" -->
	</head>
	<body id="schedule-a-tour contact">
		<!--#include virtual="/header.asp" -->
		<!-- Content -->
		<section class="content">
			<!-- Content Blocks -->
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="page-title">
							<h1>Contact us</h1>
							<div class="divder-teal"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p>Contact the property and we will get your concern taken care of as quickly as possible.</p>
						<div class="schedule-a-tour-form form-container">
							<form class="form-horizontal" action="resident-contact-mailer.asp" name="form1" method="post">
								<div class="form-group">
									<label>Name</label>
									<input type="hidden" name="ActionRequested" id="ActionRequested" value="Contact">
									<input type="text" class="form-control" name="ResidentName" id="ResidentName" value="<%=session("strResidentName")%>">
									<span class="required">*</span>
								</div>
							
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" name="email" id="email" value="<%=session("strResidentEmail")%>">
									<span class="required">*</span>
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input type="text" class="form-control" name="phone" id="phone">
								</div>
								<div class="form-group">
									<label>Memo</label><br>
									<textarea name="memo" id="memo"></textarea>
								</div>
								
								<input type="submit" value="Submit" class="btn submit-btn">
							</form>
						</div>
					</div>
					<div class="col-md-4 col-md-offset-2">
						<div class="contact-right-container">
							<div class="map">
								<div class="embed-responsive embed-responsive-4by3">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3274.454756233728!2d-82.4098738844121!3d34.84479908039779!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8858303520e7b549%3A0xd5cd3705dfa142fd!2s400+Rhett+St%2C+Greenville%2C+SC+29601!5e0!3m2!1sen!2sus!4v1465319930295" class="embed-responsive-item" frameborder="0" style="border:0" allowfullscreen></iframe>
								</div>
							</div>
							<div class="location">
								<b>Greenville, SC</b>
								<p>
									400 Rhett St<br>
									Greenville, SC 29601<br>
									(864) 232-0717
								</p>
							</div>
							<div class="hours">
								<b>Office Hours</b>
								<p>
									Monday - Friday<br>
									9:00 am - 6:00 pm
								</p>
								<p>
									Saturday - Sunday<br>
									10:00 am - 5:00 pm
								</p>
							</div>
							<div class="social-icons">
								<ul>
									<li><a href="https://www.facebook.com/400Rhett/" target="_blank"><i class="fa fa-facebook social-icon" aria-hidden="true"></i></a></li>
									<li><a href="https://twitter.com/400_rhett" target="_blank"><i class="fa fa-twitter social-icon" aria-hidden="true"></i></a></li>
									<li><a href="https://www.instagram.com/400rhett/" target="_blank"><i class="fa fa-instagram social-icon" aria-hidden="true"></i></a></li>
									<li><a href="https://plus.google.com/112787648808345205276/about" target="_blank"><i class="fa fa-google-plus social-icon" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Footer -->
		<!--#include virtual="/footer.asp" -->
		<!-- Scripts -->
		<script src="/js/jquery-1.12.0.min.js"></script>
		<script src="/js/jquery-ui.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/responsive-tabs.js"></script>
		<script src="/js/animate.js"></script>
		<script src="/js/slippry.min.js"></script>
		<script src="/js/jquery.fancybox.js"></script>
		<script src="/js/bootstrap-datepicker.js"></script>
		<script src="/js/custom.js"></script>
		<script type='text/javascript'>
        
        $(document).ready(function() {
        
            $(".nav-main-right a").on("click", function(){
   $(".nav-main-right").find(".active").removeClass("active");
   $(this).parent().addClass("active");
});
        
        });
        
        </script>
		</div>
		</div>
	</body>
</html>