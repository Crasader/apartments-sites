<%
Dim objXMLHTTP 
Dim strRequest, strResult

dim username
dim userpass

username = request("username")
userpass = request("userpass")

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
& "      <password>5tpwsh</password>" _
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
%>
<!DOCTYPE html>
<html lang="">
	<head>
		<title>400 Rhett - Resident Portal</title>
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
		<!--#include virtual="/analytics" -->
	</head>
	<body id="resident-portal">
		<!--#include virtual="/header" -->
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
						<%
	    	'session("strResidentID") 
	    	'session("strResidentName") 
	    	'session("strResidentEmail") 
	    	'session("strResidentUnitNumber") 
	    	'session("strPropertyCode") 

						%>
						<h4>Welcome <%=session("strResidentName")%>!</h4>
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
		             	<a href="resident-maintenance-request" class="resident_btn">  
		                <img src="/img/res/amc_icon_maintenance.png" />  <b>SUBMIT A MAINTENANCE REQUEST</b> </a>
		             	<p>Have an issue in your apartment? Complete a request for maintenance and a member of our team will service your apartment as quickly as possible.</p>
            			
            		</div>
		        </div>
		        <div class="row">
					<div class="col-md-6">
		             	<a href="resident-contact-request" class="resident_btn">  
		                <img src="/img/res/amc_icon_contact.jpg" />  <b>CONTACT THE OFFICE</b> </a>
		             	<p>How can we help? Contact the leasing team with any questions or concerns.</p>
            			
            		</div>
		        </div>
			</div>
		</section>
		<!-- Footer -->
		<!--#include virtual="/footer" -->
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
