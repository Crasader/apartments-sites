<%

dim EmailAddress
dim UnitNumber

Dim strRequestVerify, strResultVerify

EmailAddress = request("Email")
UnitNumber = request("UnitNumber")


    if len(Request.Form("Email"))>0 Then
    'Response.Write "<br>START<hr>"

    Set oXmlHTTP = CreateObject("Msxml2.ServerXMLHTTP")
    oXmlHTTP.Open "POST", "https://amcrentpay.com/ws/mapts.asmx", False 

   

    oXmlHTTP.setRequestHeader "Content-Type", "text/xml; charset=utf-8" 
    oXmlHTTP.setRequestHeader "SOAPAction", "http://www.AMCRentPay.com/MAPTS_ws/validEmail"

	strRequestVerify ="<?xml version=""1.0"" encoding=""utf-8""?>" _
	& "<soap:Envelope xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:soap=""http://schemas.xmlsoap.org/soap/envelope/"">" _
	& "  <soap:Body>" _
	& "    <validEmail xmlns=""http://www.AMCRentPay.com/MAPTS_ws/"">" _
	& "      <PropertyCode>638ROF</PropertyCode>" _
	& "      <sEmail>" & EmailAddress & "</sEmail>" _
	& "      <sysPassword>g3tm3s0m3pr0ps</sysPassword>" _
	& "    </validEmail>" _
	& "  </soap:Body>" _
	& "</soap:Envelope>" 


    oXmlHTTP.setOption 2, 13056
    oXmlHTTP.send strRequestVerify    

        'Response.Write oXmlHTTP.responseText

    strResultVerify=oXmlHTTP.responseText


    'get rid of double quote
    strResultVerify=Replace(strResultVerify, """","")

    'get rid of xml on the front
    strResultVerify=Replace(strResultVerify,"<?xml version=1.0 encoding=utf-8?><soap:Envelope xmlns:soap=http://schemas.xmlsoap.org/soap/envelope/ xmlns:xsi=http://www.w3.org/2001/XMLSchema-instance xmlns:xsd=http://www.w3.org/2001/XMLSchema><soap:Body><validEmailResponse xmlns=http://www.AMCRentPay.com/MAPTS_ws/><validEmailResult>","")

    'get rid of xml on the back
    strResultVerify=Replace(strResultVerify, "</validEmailResult></validEmailResponse></soap:Body></soap:Envelope>","")


    'test/view response.
	'Response.Write strResultVerify
	'Response.Write EmailAddress
	
	end if

	if strResultVerify = "FALSE" Then
    	message = "Email Address was not found"

	else 

    	Dim strRequest, strResult

	    Set oXmlHTTP2 = CreateObject("Msxml2.ServerXMLHTTP")
	    oXmlHTTP2.Open "POST", "https://amcrentpay.com/ws/mapts.asmx", False 

    	oXmlHTTP2.setRequestHeader "Content-Type", "text/xml; charset=utf-8" 
	    oXmlHTTP2.setRequestHeader "SOAPAction", "http://www.AMCRentPay.com/MAPTS_ws/FindUserID"


		strRequest ="<?xml version=""1.0"" encoding=""utf-8""?>" _
		& "<soap:Envelope xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:soap=""http://schemas.xmlsoap.org/soap/envelope/"">" _
		& "  <soap:Body>" _
		& "    <FindUserID xmlns=""http://www.AMCRentPay.com/MAPTS_ws/"">" _
		& "      <PropertyCode>638ROF</PropertyCode>" _
		& "      <EmailAddress>" & EmailAddress & "</EmailAddress>" _
		& "      <UnitNumber>1" & UnitNumber & "</UnitNumber>" _
		& "      <sysPassword>g3tm3s0m3pr0ps</sysPassword>" _
		& "    </FindUserID>" _
		& "  </soap:Body>" _
		& "</soap:Envelope>" 

		oXmlHTTP2.setOption 2, 13056
	    oXmlHTTP2.send strRequest    

	    strResult=oXmlHTTP2.responseText

	    'get rid of double quote
	    strResult=Replace(strResult, """","")

	    'get rid of xml on the front
	    strResult=Replace(strResult,"<?xml version=1.0 encoding=utf-8?><soap:Envelope xmlns:soap=http://schemas.xmlsoap.org/soap/envelope/ xmlns:xsi=http://www.w3.org/2001/XMLSchema-instance xmlns:xsd=http://www.w3.org/2001/XMLSchema><soap:Body><FindUserIDResponse xmlns=http://www.AMCRentPay.com/MAPTS_ws/><FindUserIDResult>","")

	    'get rid of xml on the back
	    strResult=Replace(strResult, "</FindUserIDResult></FindUserIDResponse></soap:Body></soap:Envelope>","")

	    'test/view response.
		'Response.Write strResult
		'response.end
	    
    
	end if 


%>
<!DOCTYPE html>
<html lang="">
	<head>
		<title>400 Rhett - Resident Portal - Find User ID</title>
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
	<body id="resident-portal">
		<!--#include virtual="/header.asp" -->
		<!-- Content -->
		<section class="content">
			<!-- Content Blocks -->
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="page-title">
							<h1>Find User ID</h1>
							<div class="divder-teal"></div>
						</div>
					</div>
				</div>				
				<%if strResultVerify = "TRUE" then%>
				
				<div class="row">
					<div class="col-md-6">
						<p>An email has been sent to the email address you registered with at move-in. </p>
						<br>
						<a href="/apartments_greenville_sc/resident_portal/"></span> Resident Portal</a>
						<p>&nbsp;</p>
						<br>
						<br>
					</div>
				</div>
				<%else%>
				<div class="row">	
					<div class="col-md-6">

						<p>Please enter your email address you registered with at move-in. </p>
						<div class="schedule-a-tour-form form-container">
							<form role="form" id="form1" name="form1" method="post" class="validate" action="resident-portal-find-userid.asp">
								<p><span class="colored-text"><b><%=message%></b></span></p>
								<div class="form-group">
									<label class="control-label">Email *</label>
									<input type="text" class="form-control" name="email" data-validate="required,email" data-message-required="Email Address is a required field."/>
									<span class="required">*</span>
								</div>
								<!--<p><a href="resetPassword.asp">Forgot your password? </a><a href="findUserId.asp">Need User Id?</a></p>-->
								<button type="submit" class="btn btn-success">Submit</button>
							</form>
						</div>
					</div>
				</div>
				<%end if%>
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
		        
        <!-- Form Validation scripts (common) -->
		<script src="/js/TweenMax.min.js"></script>
		<script src="/js/resizeable.js"></script>
		<script src="/js/neon-api.js"></script>
		<script src="/js/jquery.validate.min.js"></script>
		<script src="/js/neon-custom.js"></script>
		<script src="/js/neon-demo.js"></script>

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


