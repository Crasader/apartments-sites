<%
'Response.write ("hello")

dim txtUserId
dim AIMSysUserID

txtUserId = request("txtUserId")
AIMSysUserID = request("AIMSysUserID")

Dim strRequestVerifyID, strResultVerifyID

'strResultVerifyID = 1
'Response.Write strResultVerifyID
'response.write txtUserId

if len(Request.Form("txtUserId"))>0 Then
	
    'Response.Write "<br>START<hr>"


    Set oXmlHTTP = CreateObject("Msxml2.ServerXMLHTTP")
    oXmlHTTP.Open "POST", "https://amcrentpay.com/ws/mapts.asmx", FALSE

   

    oXmlHTTP.setRequestHeader "Content-Type", "text/xml; charset=utf-8" 
    oXmlHTTP.setRequestHeader "SOAPAction", "http://www.AMCRentPay.com/MAPTS_ws/validUser"

	strRequestVerifyID ="<?xml version=""1.0"" encoding=""utf-8""?>" _
	& "<soap:Envelope xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:soap=""http://schemas.xmlsoap.org/soap/envelope/"">" _
	& "  <soap:Body>" _
	& "    <validUser xmlns=""http://www.AMCRentPay.com/MAPTS_ws/"">" _
	& "      <PropertyCode>638ROF</PropertyCode>" _
	& "      <userid>" & txtUserId & "</userid>" _
	& "      <sysPassword>g3tm3s0m3pr0ps</sysPassword>" _
	& "    </validUser>" _
	& "  </soap:Body>" _
	& "</soap:Envelope>" 


    oXmlHTTP.setOption 2, 13056
    oXmlHTTP.send strRequestVerifyID    

        'Response.Write oXmlHTTP.responseText

    strResultVerifyID=oXmlHTTP.responseText


    'get rid of double quote
    strResultVerifyID=Replace(strResultVerifyID, """","")

    'get rid of xml on the front
    strResultVerifyID=Replace(strResultVerifyID,"<?xml version=1.0 encoding=utf-8?><soap:Envelope xmlns:soap=http://schemas.xmlsoap.org/soap/envelope/ xmlns:xsi=http://www.w3.org/2001/XMLSchema-instance xmlns:xsd=http://www.w3.org/2001/XMLSchema><soap:Body><validUserResponse xmlns=http://www.AMCRentPay.com/MAPTS_ws/><validUserResult>","")

    'get rid of xml on the back
    strResultVerifyID=Replace(strResultVerifyID, "</validUserResult></validUserResponse></soap:Body></soap:Envelope>","")


    'test/view response.
	'Response.Write strResultVerifyID
	'Response.Write EmailAddress
	
	end if

	if strResultVerifyID = "FALSE" Then
    	'message = "User ID was not found"

	else 

	Dim oXmlHTTP2
	Dim strRequestValid, strResultValid

   	Set oXmlHTTP2 = CreateObject("Msxml2.ServerXMLHTTP")
    oXmlHTTP2.Open "POST", "https://amcrentpay.com/ws/mapts.asmx", False 

    oXmlHTTP2.setRequestHeader "Content-Type", "text/xml; charset=utf-8" 
    oXmlHTTP2.setRequestHeader "SOAPAction", "http://www.AMCRentPay.com/MAPTS_ws/ResetUser"

	strRequestValid ="<?xml version=""1.0"" encoding=""utf-8""?>" _
	& "<soap:Envelope xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:soap=""http://schemas.xmlsoap.org/soap/envelope/"">" _
	& "  <soap:Body>" _
	& "    <ResetUser xmlns=""http://www.AMCRentPay.com/MAPTS_ws/"">" _
	& "      <sPayUserID>" & txtUserId & "</sPayUserID>" _
	& "      <AIMSysUserID>" & AIMSysUserID & "</AIMSysUserID>" _
	& "      <sysPassword>g3tm3s0m3pr0ps</sysPassword>" _
	& "    </ResetUser>" _
	& "  </soap:Body>" _
	& "</soap:Envelope>" 

    oXmlHTTP2.setOption 2, 13056
    oXmlHTTP2.send strRequestValid    

        'Response.Write oXmlHTTP.responseText

    strResultValid=oXmlHTTP2.responseText


    'get rid of double quote
    strResultValid=Replace(strResultValid, """","")

    'get rid of xml on the front
    strResultValid=Replace(strResultValid,"<?xml version=1.0 encoding=utf-8?><soap:Envelope xmlns:soap=http://schemas.xmlsoap.org/soap/envelope/ xmlns:xsi=http://www.w3.org/2001/XMLSchema-instance xmlns:xsd=http://www.w3.org/2001/XMLSchema><soap:Body><ResetUserResponse xmlns=http://www.AMCRentPay.com/MAPTS_ws/><ResetUserResult>","")

    'get rid of xml on the back
    strResultValid=Replace(strResultValid, "</ResetUserResult></ResetUserResponse></soap:Body></soap:Envelope>","")


    'test/view response.
	'Response.Write strResult
	'response.end

	Dim arrResult
	arrResult=Split(strResultValid,"||")

	'Response.Write("0:" & arrResult(0) & "<br>")
   	'Response.Write("1:" & arrResult(1) & "<br>")
   	end if
%>
<!DOCTYPE html>
<html lang="">
	<head>
		<title>400 Rhett - Resident Portal - Reset Password</title>
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
							<h1>Reset Password</h1>
							<div class="divder-teal"></div>
						</div>
					</div>
				</div>
				
				<%if strResultVerifyID = "TRUE" then%>
				
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
						<p>Please enter your User ID and we will reset your account and email you a new password to the email address you registered with at move-in. </p>
						<div class="schedule-a-tour-form form-container">
							<form role="form" id="form1" name="form1" method="post" class="validate" action="resident-portal-reset-password.asp">
								<%if strResultVerifyID = "FALSE" then%><p><span class="colored-text"><b>User ID was not found</b></span></p><%end if%>
								<div class="form-group">
									<label class="control-label">User Id *</label>
									<input type="text" class="form-control" name="txtUserId" data-validate="required" data-message-required="User ID is a required field."/>
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

