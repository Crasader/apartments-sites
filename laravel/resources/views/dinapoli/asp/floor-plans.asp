<%
' Connection to the database

' declare variables

dim dbConnection


Set dbConnection = Server.CreateObject( "ADODB.Connection" )


dbConnection.Open "Driver={SQL Server};" & _
           "Server=192.168.1.139;" & _
           "Address=rentegisql1,1433;" & _
           "Network=DBMSSOCN;" & _
           "Database=AIM_164MTB;" & _
           "Uid=sa;" & _
           "Pwd=mdb121bdm(("

'==============================================================================
' SQL grabs lastRecord, create an array                                       =
'==============================================================================

' Declare variables for SQL and array
dim det_sql
dim det_res
dim det_arr
dim det_str



det_sql = "[WS_SP_MAPTS_GET_UNIT_AVAILABILITY_NOXML]"
            

' Create a recordset
set det_res = dbconnection.execute(det_sql)


' If recordset is not empty then create the array, else flag empty string
if NOT det_res.eof then
    det_arr = det_res.getrows()
else
    det_str = "empty"
end if

dim rc
dim nor

' Find the size of the array
nor = ubound(det_arr, 2)
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
        <link rel="stylesheet" href="css/magnific-popup.css"> 
        
    </head>
    <form name="submitUnit" method="post" action="">
      <input type="hidden" name="unittype" id="unittype" value="X">
      <input type="hidden" name="bed" id="bed" value="X">
      <input type="hidden" name="bath" id="bath" value="X">
      <input type="hidden" name="sqft" id="sqft" value="X">
    </form>
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
            <section class="page-section bg-dark-alfa-30" data-background="img/bg1.jpg">
                <div class="relative container align-left">
                    
                    <div class="row">
                        
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Floor Plans & Availablity</h1>
                        </div>
                        
                        <div class="col-md-4 mt-30">
                            <div class="mod-breadcrumbs font-alt align-right">
                                <a href="#">Home</a>&nbsp;/&nbsp;<span>Floor Plans & Availablity</span>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- End Page Title Section -->
            
            <section class="page-section">
                <div class="container relative">
                    
                    <!-- Floorplans Filter -->                    
                    <div class="works-filter font-alt align-center">
                        <a href="#" class="filter active" data-filter="*">All</a>
                        <a href="#2bed" class="filter" data-filter=".2bed">2 Bedrooms</a>
                        <a href="#3bed" class="filter" data-filter=".3bed">3 Bedrooms</a>
                    </div>                    
                    <!-- End Floorplans Filter -->
                    
                    <!-- Floor Plans Row -->
                        <div class="row multi-columns-row works-grid work-grid-3" id="work-grid">
                            <%for rc = 0 to nor%>
                            <!-- Individual Unit -->
                            <div class="col-sm-6 col-md-4 col-lg-4 work-item mix <%Response.Write ( det_arr(1,rc) )%>bed">
                                <div class="floorplan-item">
                                    <div class="floorplan-item-inner">
                                        <div class="floorplan-wrap">
                                            
                                            <!-- Floor Plan Thumbnail -->
                                            <div class="floorplan-thumb">
                                                <a href="img/floor-plans/sands.jpg" class="lightbox-gallery-2 mfp-image"><img src="img/floor-plans/sands.jpg"></a>
                                            </div>

                                             <!-- Unit Title -->
                                            <div class="floorplan-title">
                                                <%Response.Write ( det_arr(0,rc) )%><br>
                                                <%if det_arr(7,rc) = "" then%>
                                                    
                                                <%else%>
                                                    <span class="special red"><i class="fa fa-star"><%Response.Write ( det_arr(7,rc) )%></i></span>
                                                <%end if%>
                                                
                                            </div>
                                            
                                            <!-- Unit Features -->
                                            <div class="floorplan-features font-alt">
                                                <ul class="sf-list pr-list">
                                                    <li>Sq Feet: <b><span><%Response.Write ( det_arr(3,rc) )%></span></b></li>
                                                    <li>Bedrooms: <b><span><%Response.Write ( det_arr(1,rc) )%></span></b></li>
                                                    <li>Bathrooms: <b><span><%Response.Write ( det_arr(2,rc) )%></span></b></li>
                                                    <li>Deposit: <b><span>$100</span></b></li>
                                                </ul>
                                            </div>
                                            
                                            <div class="floorplan-num">
                                                <sup>$</sup><%=Replace( det_arr(5,rc),".00","")%>
                                            </div>
                                            
                                            <div class="pr-per">
                                                per month
                                            </div>                                          
                                            
                                            <!-- Button -->                                         
                                            <div class="pr-button">
                                                <%if det_arr(4,rc) = "0" then%>
                                                <a style="cursor:pointer" onclick="document.getElementById('unittype').value='<%=det_arr(0,rc)%>';document.getElementById('bed').value='<%=det_arr(1,rc)%>';document.getElementById('bath').value='<%=det_arr(2,rc)%>';document.getElementById('sqft').value='<%=det_arr(3,rc)%>';document.submitUnit.action='contact.asp';document.submitUnit.submit();" class="btn btn-brown btn-mod">Limited | MORE INFO</a>
                                            <%elseif det_arr(4,rc) = "1" then%>
                                                <a style="cursor:pointer" onclick="document.getElementById('unittype').value='<%=det_arr(0,rc)%>';document.getElementById('bed').value='<%=det_arr(1,rc)%>';document.getElementById('bath').value='<%=det_arr(2,rc)%>';document.getElementById('sqft').value='<%=det_arr(3,rc)%>';document.submitUnit.action='unit.asp';document.submitUnit.submit();" class="btn btn-brown btn-mod"><%=det_arr(4,rc)%> Unit Available</a>
                                            <%else%>
                                            <a style="cursor:pointer" onclick="document.getElementById('unittype').value='<%=det_arr(0,rc)%>';document.getElementById('bed').value='<%=det_arr(1,rc)%>';document.getElementById('bath').value='<%=det_arr(2,rc)%>';document.getElementById('sqft').value='<%=det_arr(3,rc)%>';document.submitUnit.action='unit.asp';document.submitUnit.submit();" class="btn btn-brown btn-mod"><%=det_arr(4,rc)%> Units Available</a>
                                            <%end if%>

                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Individual Unit -->
                            <%NEXT%>
                            
                        </div>
                        <!-- End Floor Plans Row -->

                        <div classs="row">
                            <div class="col-sm-12">
                                <p>
                                    *Pricing and availability are subject to change. Valid for new residents only. Square footages displayed are approximate. Discounts will be calculated upon lease execution. Minimum lease terms and occupancy guidelines may apply. Deposits may fluctuate based on credit, rental history, income, and/or other qualifying standards. Additional taxes and fees may apply and will be disclosed as per governing laws and company policies.
                                </p>
                            </div>
                        </div>
                    
                </div>
            </section>
            
            
            <!-- Schedule a Tour Section -->
            <?php include 'inc/schedule-tour.php'; ?>
            <!-- End Schedule a Tour Section -->
            
            
            <!-- Footer -->
            <!--#include virtual="/inc/footer.asp" -->
            <!-- End Footer -->
        
            <!-- Exit Pop -->
            <!--#include virtual="/inc/epop.asp" -->
            
            <!-- End Exit Pop -->
        
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
