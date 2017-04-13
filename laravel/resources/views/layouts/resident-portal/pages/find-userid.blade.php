<?php
/*
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


%>*/
?>
        @extends($extends)
        @section('page-title-span','Find Your User ID')
        @section('content')
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
				<?php if(isset($userIdFound)): ?>
				<div class="row">
					<div class="col-md-6">
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
					<div class="col-md-6">
						<p>Please enter your email address you registered with at move-in. </p>
						<div class="schedule-a-tour-form form-container">
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
