<?php /*
<%
Dim objXMLHTTP
Dim strRequest, strResult

dim maintenance_mtype
dim ResidentName
dim maintenance_unit
dim email
dim maintenance_phone
dim maintenance_name
dim PermissionToEnterDate
dim maintenance_mrequest

maintenance_mtype = request("maintenance_mtype")
ResidentName = request("ResidentName")
maintenance_unit = request("maintenance_unit")
email = request("email")
maintenance_phone = request("maintenance_phone")
maintenance_name = request("maintenance_name")
PermissionToEnterDate = request("PermissionToEnterDate")
maintenance_mrequest = request("maintenance_mrequest")

'Note, session variables:  userID, DBName, affiliation, organization

'dim local variables here
dim formItem

dim strTo
dim strFrom
dim strSubject
dim strBody
dim objCDOMail
dim subject
dim debug

debug = FALSE


fromAddress = request.form("email")


strTo = "400rhett@amcllc.net, leasing@400rhett.com"
'strTo = "matt@marketapts.com"
strFrom = fromAddress
'strCc = "matt@marketapts.com"
strbCc = "ali@marketapts.com"
strSubject = "Resident Center Maintenance Request at 400 Rhett Apartments"

' declare mailer variables

strBody = ""


strBody = strBody & "<!DOCTYPE HTML PUBLIC -//W3C//DTD HTML 4.01 Transitional//EN><html><head><meta http-equiv=Content-Type content=text/html; charset=utf-8><link rel=stylesheet type=text/css href=http://www.400rhett.com/css/main.css><link rel=stylesheet type=text/css href=http://www.400rhett.com/css/animations.css><title></title></head><body>"
strBody = strBody & "<section class=content><div class=container><div class=row><div class=col-md-12><div class=page-title><h1>Maintenance Request</h1><div class=divder-teal></div></div></div></div>"
strBody = strBody & "<div class=row><div class=col-md-6><h4><p>Resident Center Maintenance Request has been submitted<br>Resident Name - " & ResidentName & "<br>"
strBody = strBody & "Unit Number - " & maintenance_unit & "<br>"
strBody = strBody & "Email - " & email & "<br>"
strBody = strBody & "Phone Number - " & maintenance_phone & "<br>"
strBody = strBody & "Permission to Enter by - " & maintenance_name & "<br>"
strBody = strBody & "Description - " & maintenance_mrequest & "<br>"

strBody = strBody & "</p></h4><br></div></div>"
strBody = strBody & "</body></html>"


    set objCDOMail = Server.CreateObject( "CDONTS.NewMail" )
    objCDOMail.MailFormat = CdoMailFormatMIME
    objCDOMail.BodyFormat = CdoBodyFormatHTML

    objCDOMail.From = strFrom
    objCDOMail.Cc = strCc
    objCDOMail.bCc = strbCc
    objCDOMail.To = strTo

    objCDOMail.Subject = strSubject
    objCDOMail.Body = strBody

    on error resume next

    objCDOMail.Send
    on error goto 0

            'Set the object to nothing
    set objCDOMail = nothing





'Response.Write("maintenance_mtype:" & maintenance_mtype & "<br>")
'Response.Write("ResidentName:" & ResidentName & "<br>")
'Response.Write("maintenance_unit:" & maintenance_unit & "<br>")
'Response.Write("email:" & email & "<br>")
'Response.Write("maintenance_phone:" & maintenance_phone & "<br>")
'Response.Write("maintenance_name:" & maintenance_name & "<br>")
'Response.Write("PermissionToEnterDate:" & PermissionToEnterDate & "<br>")
'Response.Write("maintenance_mrequest:" & maintenance_mrequest & "<br>")

'Response.End
    'Response.Write "<br>START<hr>"

    Set oXmlHTTP = CreateObject("Microsoft.XMLHTTP")
    oXmlHTTP.Open "POST", "http://192.168.1.135:8088/MApts_com.asmx", False

    oXmlHTTP.setRequestHeader "Content-Type", "text/xml; charset=utf-8"
    oXmlHTTP.setRequestHeader "SOAPAction", "http://tempuri.org/InsertWorkOrder"

strRequest ="<?xml version=""1.0"" encoding=""utf-8""?>" _
& "<soap:Envelope xmlns:xsi=""http://www.w3.org/2001/XMLSchema-instance"" xmlns:xsd=""http://www.w3.org/2001/XMLSchema"" xmlns:soap=""http://schemas.xmlsoap.org/soap/envelope/"">" _
& "  <soap:Body>" _
& "    <InsertWorkOrder xmlns=""http://tempuri.org/"">" _
& "      <sPropertyCode>780RTT</sPropertyCode>" _
& "      <Unit>"& maintenance_unit & "</Unit>" _
& "      <WorkOrderCategory>" & maintenance_mtype & "</WorkOrderCategory>" _
& "      <Description>" & maintenance_mrequest & "</Description>" _
& "      <Phone>" & maintenance_phone & "</Phone>" _
& "      <PermissionToEnterGivenBy>" & maintenance_name & "</PermissionToEnterGivenBy>" _
& "      <PermissionToEnterDate>" & PermissionToEnterDate & "</PermissionToEnterDate>" _
& "      <sysPassword>g3tm3s0m3pr0ps</sysPassword>" _
& "    </InsertWorkOrder>" _
& "  </soap:Body>" _
& "</soap:Envelope>"



    oXmlHTTP.send strRequest

        'Response.Write oXmlHTTP.responseText

    strResult=oXmlHTTP.responseText

    'get rid of double quote
    strResult=Replace(strResult, """","")



    'get rid of xml on the front
    strResult=Replace(strResult, "version1.0","")



    'get rid of xml on the back
    'strResult=Replace(strResult, "</InsertWorkOrderResult></InsertWorkOrderResponse></soap:Body></soap:Envelope>","")

    'strResult=Replace(strResult, "WorkOrder","")
    'strResult=Replace(strResult, "Number","")
    'strResult=Replace(strResult, "Status","")
    'strResult=Replace(strResult, "SUCCESS","")
    'strResult=Replace(strResult, "=","")


    'strResult=Replace(strResult, " Status=SUCCESS/>","")

Dim Position
Position=instr(strResult, "WorkOrderNumber=")

Dim WorkOrderNumber
WorkOrderNumber= mid(strResult,crap+Position,len(strResult)-16)
WorkOrderNumber=Replace(WorkOrderNumber,"WorkOrderNumber=","")

Position=instr(WorkOrderNumber, " Status")
WorkOrderNumber=rtrim(ltrim(Left(WorkOrderNumber,position)))

'Response.write("#:" & WorkOrderNumber & "<br>")

%>
*/?>
<!DOCTYPE html>
<html lang="">
	<head>
		<title>400 Rhett - Resident Portal - Maintenance Request Confirmation</title>
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
							<h1>Maintenance Request</h1>
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
						<h4><p>Your maintenance request has been sent.
						<br>Maintenance request # is:  <%=WorkOrderNumber %></p></h4>
						<br>
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
