<%

dim datesToShow
dim test2

test2 = date() 
datesToShow = cdate( test2 )
%>
<!DOCTYPE html>
<html lang="">
	<head>
		<title>400 Rhett - Resident Portal - Maintenance Request</title>
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
							<h1>Maintenance Request</h1>
							<div class="divder-teal"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p>Have an issue in your apartment? Complete a request for maintenance and a member of our team will service your apartment as quickly as possible.<br><br>

						To ensure that your issue is resolved promptly, please do not submit emergency service requests via the resident portal. If you are experiencing a maintenance emergency, please call our office at (864) 232-0717 and select the emergency maintenance line.</p>
						<div class="schedule-a-tour-form form-container">
							<form class="form-horizontal" action="resident-maintenance-submit.asp" name="form1" method="post">
								<div class="form-group">
									<label>Name</label>
									<input type="hidden" name="maintenance_mtype" id="maintenance_mtype" value="Website - To Be Determined">
									<input type="text" class="form-control" name="ResidentName" id="ResidentName" value="<%=session("strResidentName")%>">
									<span class="required">*</span>
								</div>

								<div class="form-group">
									<label>Unit Number</label>
									<input type="text" class="form-control" name="maintenance_unit" id="maintenance_unit" value="<%=session("strResidentUnitNumber")%>">
									<span class="required">*</span>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="text" class="form-control" name="email" id="email" value="<%=session("strResidentEmail")%>" >
									<span class="required">*</span>
								</div>
								<div class="form-group">
									<label>Contact Phone</label>
									<input type="text" class="form-control" name="maintenance_phone" id="maintenance_phone" required>
									<span class="required">*</span>
								</div>
								<div class="form-group">
									<label>Permission To Enter Given By</label>
									<input type="text" class="form-control" name="maintenance_name" id="maintenance_name" required>
								</div>
								<div class="form-group">
									<label><input type="checkbox">&nbsp;Permission To Enter</label>
									<input type="hidden" class="form-control datepicker" data-date-format="yyyy-mm-dd" value="<%=datesToShow%>" name="PermissionToEnterDate" id="PermissionToEnterDate">
								</div>
								

								<div class="form-group">
									<label>Describe the Problem</label><br>
									<textarea name="maintenance_mrequest" id="maintenance_mrequest" required></textarea>
								</div>



								
								
								<input type="submit" value="Submit" class="btn submit-btn">
							</form>
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