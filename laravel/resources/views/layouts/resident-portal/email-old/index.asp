<%

const hasNotBeenSet = 0

if ( ( VarType( Session( "strResidentID" ) ) = hasNotBeenSet ) or  cStr(Session( "strResidentID" )) = "0"  or len( Session( "strResidentID" ) ) = 0 ) then
	

Dim objXMLHTTP 
Dim strRequest, strResult

dim username
dim userpass


username = request("username")
userpass = request("userpass")

    if len(Request.Form("username"))>0 Then
    'Response.Write "<br>START<hr>"

    Set oXmlHTTP = CreateObject("Microsoft.XMLHTTP")
    oXmlHTTP.Open "POST", "http://192.168.1.135:8088/MApts_com.asmx", False 

    oXmlHTTP.setRequestHeader "Content-Type", "text/xml; charset=utf-8" 
    oXmlHTTP.setRequestHeader "SOAPAction", "http://tempuri.org/ValidateUserLogin"

strRequest ="<?xml version=""1.0"" encoding=""utf-8""?>" _
& "<soap:Envelope xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:soap=""http://schemas.xmlsoap.org/soap/envelope/"">" _
& "  <soap:Body>" _
& "    <ValidateUserLogin xmlns=""http://tempuri.org/"">" _
& "      <username>" & username & "</username>" _
& "      <password>" & userpass & "</password>" _
& "      <sysPassword>g3tm3s0m3pr0ps</sysPassword>" _
& "    </ValidateUserLogin>" _
& "  </soap:Body>" _
& "</soap:Envelope>" 

    
    oXmlHTTP.send strRequest    

        'Response.Write oXmlHTTP.responseText

    strResult=oXmlHTTP.responseText


    'get rid of double quote
    strResult=Replace(strResult, """","")

    'get rid of xml on the front
    strResult=Replace(strResult,"<?xml version=1.0 encoding=utf-8?><soap:Envelope xmlns:soap=http://schemas.xmlsoap.org/soap/envelope/ xmlns:xsi=http://www.w3.org/2001/XMLSchema-instance xmlns:xsd=http://www.w3.org/2001/XMLSchema><soap:Body><ValidateUserLoginResponse xmlns=http://tempuri.org/><ValidateUserLoginResult>","")

    'get rid of xml on the back
    strResult=Replace(strResult, "</ValidateUserLoginResult></ValidateUserLoginResponse></soap:Body></soap:Envelope>","")

    'test/view response.
	'Response.Write strResult

	Dim arrResult
	arrResult=Split(strResult,"|")

	'Response.Write("0:" & arrResult(0) & "<br>")
   	'Response.Write("1:" & arrResult(1) & "<br>")
   	'Response.Write("2:" & arrResult(2)& "<br>")
   	'Response.Write("3:" & arrResult(3)& "<br>")
   	'Response.Write("4:" & arrResult(4)& "<br>")
   	'Response.Write("5:" & arrResult(5)& "<br>")
   	'Response.Write("6:" & arrResult(6)& "<br>")
   	'Response.Write("7:" & arrResult(7)& "<br>")
   
    'Response.Write "<br>END<hr>"

    'Response.Write "<br>END<hr>"


	    if arrResult(0) = "True" then 
	    	session("strResidentID") = arrResult(2)
	    	session("strResidentName") = arrResult(4) & " " & arrResult(5)
	    	session("strResidentEmail") = arrResult(7) 
	    	session("strResidentUnitNumber") = arrResult(3)
	    	session("strPropertyCode") = arrResult(6)
	    	'Response.Write("arr:" & arrResult(2))
	    	'Response.Write("session" & session("strName"))
	    	'Response.end

	    	Response.Redirect("resident-portal-center.asp")
	    else arrResult(0) = "False"
	    	message = arrResult(1)
	    end if
	end if 'end if len(Request.Form("username"))>0 Then'

else
	Response.Redirect("resident-portal-center.asp")
end if 'end session id check'
%>
<!DOCTYPE html>
<html lang="">
	<head>
		<title>400 Rhett - Resident Portal</title>
		<meta name="description" content="400 Rhett Apartments offers a Resident Portal for your convenience. Pay rent online, submit maintenance request or contact the property staff!">
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
							<h1>Resident Portal</h1>
							<div class="divder-teal"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p>With convenient 24/7 access, the resident portal makes it easy for you to request maintenance service and pay your rent online. Login to get started!</p>
						<div class="schedule-a-tour-form form-container">
							<form role="form" id="form1" name="form1" action="/apartments_greenville_sc/resident_portal/" class="validate" method="post">
								<p><span class="colored-text"><b><%=message%></b></span></p>
								<div class="form-group">
									<label>Username or Email *</label>
									<input type="text" class="form-control" name="username" id="username" data-validate="required" data-message-required="Username or Email is a required field.">
									
								</div>
								<div class="form-group">
									<label>Password *</label>
									<input type="password" class="form-control" name="userpass" id="userpass" data-validate="required" data-message-required="Password is a required field.">
								</div>
								<p><a href="resident-portal-reset-password.asp">Forgot your password?</a><br><a href="resident-portal-find-userid.asp">Need User Id?</a></p>
								
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

		<!-- Form Validation scripts (common) -->
		<script src="/js/TweenMax.min.js"></script>
		<script src="/js/resizeable.js"></script>
		<script src="/js/neon-api.js"></script>
		<script src="/js/jquery.validate.min.js"></script>
		<script src="/js/neon-custom.js"></script>
		<script src="/js/neon-demo.js"></script>
		<script src="/js/jquery.inputmask.bundle.js"></script>

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

