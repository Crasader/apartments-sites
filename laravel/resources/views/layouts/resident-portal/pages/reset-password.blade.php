<?php /*
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
%>*/
?>

        @extends($extends)
        @section('page-title-span','Reset Password')
        @section('content')
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
                <?php if(isset($userIdFound)):?>
				<div class="row">
					<div class="col-md-6">
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
					<div class="col-md-6">
						<p>Please enter your User ID and we will reset your account and email you a new password to the email address you registered with at move-in. </p>
						<div class="schedule-a-tour-form form-container">
							<form role="form" id="form1" name="form1" method="post" class="validate" action="/resident-portal/reset-password">
								<?php foreach($errors->all() as $i => $errorMessage): ?>
                                    <p><span class="colored-text"><b><?php echo $errorMessage; ?></b></span></p>
                                <?php endforeach; ?>
                                <?php if(isset($userIdNotFound)): ?>
                                   <p><span class="colored-text"><b>User ID was not found</b></span></p> 
                                <?php endif;?>
								<div class="form-group">
									<label class="control-label"><i class="fa fa-user"></i> User Id</label>
									<input type="text" class="form-control" name="txtUserId" data-validate="required" data-message-required="User ID is a required field."/>
								</div>
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