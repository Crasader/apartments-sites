<%
if len (Request.Form("unittype") ) = 0 then 
    response.redirect ("floor-plans.asp")
end if
' Connection to the database

' declare variables
dim unittype
dim bed
dim bath
dim sqft

unittype = request.form("unittype")
bed = request.form("bed")
bath = request.form("bath")
sqft = request.form("sqft")

dim dbConnection

Set dbConnection = Server.CreateObject( "ADODB.Connection" )

dbConnection.Open "Driver={SQL Server};" & _
           "Server=192.168.1.139;" & _
           "Address=rentegisql1,1433;" & _
           "Network=DBMSSOCN;" & _
           "Database=AIM_164MTB;" & _
           "Uid=sa;" & _
           "Pwd=mdb121bdm(("


' SQL grabs lastRecord, creates recordSetArray ********************************
        
dim sqlViewDetail
dim rsViewDetail


' Halladay - subquery added - 8/15/2003

sqlViewDetail = "WS_SP_MAPTS_GET_UNIT_AVAILABILITY_DETAIL_BY_SQFT_NO_XML '" & unittype & "'"
'Response.WRITE(sqlViewDetail)
'RESPONSE.END
      
'Response.Write( sqlViewDetail )
set rsViewDetail = dbConnection.Execute( sqlViewDetail )

' **************************************************

%>
<!DOCTYPE html>
<html>
    <head>
       <title>Martinique Bay - Apartment Homes in Henderson, NV</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/magnific-popup.css">        
		
		
        
    </head>
    <body class="appear-animate">
        
        <!-- Page Loader -->        
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <!-- End Page Loader -->
        
        <!-- Page Wrap -->
        <div class="page" id="top">
            
            <!-- Nav -->
            <!--#include virtual="/inc/nav.asp" -->
            <!-- End Nav-->
            
            <!-- Page Title Section -->
            <section class="page-section bg-dark-alfa-30" data-background="img/page-title-bg4.jpg">
                <div class="relative container align-left">
                    
                    <div class="row">
                        
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0"><%=unittype%></h1>
                            <div class="hs-line-4 font-alt">
                                <%=unittype%> AVAILABILITY
                            </div>
                        </div>
                        
                        <div class="col-md-4 mt-30">
                            <div class="mod-breadcrumbs font-alt align-right">
                                <a href="#">Home</a>&nbsp;/&nbsp;<span>FLOOR PLANS</span>&nbsp;/&nbsp;<span><%=unittype%></span>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- End Page Title Section -->
            
            <!-- Amenities Section -->
            <section class="page-section" id="about">
                <div class="container relative">
                    <div class="row">
                        
                        <!-- Col -->
                        
                        <div class="col-sm-4 mb-40">
                            
                            <!-- Floor Plan Thumbnail -->
                            <div class="row unit-thumb">
                                <a href="img/floor-plans/sands.jpg" class="lightbox-gallery-2 mfp-image"><img src="img/floor-plans/sands.jpg"></a>
                            </div>
                        </div>
                        
                        <!-- End Col -->
                        
                        <!-- Col -->
                        
                        <div class="col-sm-8 mb-40">
                        	<div class="row">
                        		<div class="col-sm-6"><h3 class="uppercase mb-20"><%=unittype%></h3></div>
                        	</div>
                        	<div class="unit-description mb-40">
                        		<ul>
                        			<li>BED: <%=bed%></li>
                        			<li>BATH: <%=bath%></li>
                        			<li>SQ. FEET: <%=sqft%></li>
                        		</ul>
                        	</div>
                        	<div class="text">		                            	
	                            Apartment features include gourmet kitchens, granite countertops, plank flooring (on select floors), nine-foot ceilings, washer and dryer, and a private balcony.
                        	</div>   
                        </div>
                        
                        <!-- End Col -->
                        
                        <div class="col-sm-12">
                        	
                        	<div class="row unit-table-header visible-md visible-lg">
								
								<div class="col-md-2">
									Unit
								</div>
								<div class="col-md-2">
									Rent
								</div>
								<div class="col-md-2">
									Available
								</div>
								<div class="col-md-3">
									Special
								</div>
								<div class="col-md-3">
								</div>
							</div>
                            <%
                            rsViewDetail.movefirst
                            do until rsViewDetail.eof 
                            %>
                        	<div class="row unit-table-row">
								<div class="col-md-2">
                                    <%
                                    unitnumber = rsViewDetail( "UnitNumber" )
                                    %>
									<span class="visible-xs visible-sm"><b>Unit: </b></span><%=unitnumber%>
								</div>
								<div class="col-md-2">
									<span class="visible-xs visible-sm"><b>Rent: </b></span>$<%=rsViewDetail( "AskingRent" )%>
								</div>
								<div class="col-md-2">
									<span class="visible-xs visible-sm"><b>Available: </b></span><%=rsViewDetail( "UnitAvailableDate" )%>
								</div>
								<div class="col-md-3">
									<%=rsViewDetail( "SPECIAL_TEXT" )%>
								</div>
								<div class="col-md-3 unit-table-btn">

                                    <a style="cursor:pointer" onclick="document.getElementById('unittype').value='<%=unittype%>';document.getElementById('bed').value='<%=bed%>';document.getElementById('bath').value='<%=bath%>';document.getElementById('sqft').value='<%=sqft%>';document.getElementById('unitnumber').value='<%=unitnumber%>';document.submitUnit.action='/apartments_greenville_sc/online_application_applynow/';document.submitUnit.submit();" class="btn btn-mod btn-brown btn-medium btn-round">Apply Now</a>

                                   
								</div>
							</div>
                            <%
                            rsViewDetail.movenext
                            loop
                            %>
						
                            <div classs="row">
                                <div class="col-sm-12">
                                    <p>
                                        *Pricing and availability are subject to change. Valid for new residents only. Square footages displayed are approximate. Discounts will be calculated upon lease execution. Minimum lease terms and occupancy guidelines may apply. Deposits may fluctuate based on credit, rental history, income, and/or other qualifying standards. Additional taxes and fees may apply and will be disclosed as per governing laws and company policies.
                                    </p>
                                </div>
                            </div>

                        </div>
                        
                     </div>
                </div>
            </section>
            <!-- End Amenities Section -->
			
			<!-- Schedule a Tour Section -->
            <?php include 'inc/schedule-tour.php'; ?>
            <!-- End Schedule a Tour Section -->
        
            <!-- Footer -->
            <!--#include virtual="/inc/footer.asp" -->
            <!-- End Footer -->
        
        
        </div>
        <!-- End Page Wrap -->
        
        
       <!-- JS -->
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="js/SmoothScroll.js"></script>
        <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="js/jquery.localScroll.min.js"></script>
        <script type="text/javascript" src="js/jquery.viewport.mini.js"></script>
        <script type="text/javascript" src="js/jquery.countTo.js"></script>
        <script type="text/javascript" src="js/jquery.appear.js"></script>
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/slippry.min.js"></script>
        <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="js/gmap3.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.simple-text-rotator.min.js"></script>
        <script type="text/javascript" src="js/all.js"></script>
        <script type="text/javascript" src="js/contact-form.js"></script>
        <script type="text/javascript" src="js/jquery.ajaxchimp.min.js"></script>       
        <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->
        <script type="text/javascript">
            $(function(){
                $("#banner-special").slideDown(500);
                $("#banner-special-close").click(function(e) {
                    e.preventDefault();
                    $("#banner-special").slideUp();
                });
            });
        </script>
        
    </body>
</html>
