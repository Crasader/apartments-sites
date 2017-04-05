<?php /*
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
*/
?>
@extends('layouts/dinapoli/main')
    @section('page-title-row')
        <div class="col-md-8">
            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Floor Plans & Availablity</h1>
        </div>
    @stop
    @section('page-title-span','Floor Plans & Availability') 
    @section('content')
    <form name="submitUnit" method="post" action="">
      <input type="hidden" name="unittype" id="unittype" value="X">
      <input type="hidden" name="bed" id="bed" value="X">
      <input type="hidden" name="bath" id="bath" value="X">
      <input type="hidden" name="sqft" id="sqft" value="X">
    </form>
                    
            <section class="page-section">
                <div class="container relative">
                    
                    <!-- Floorplans Filter -->                    
                    <div class="works-filter font-alt align-center">
                        <?php //TODO: grab floor plans and display them here ?>
                        <a href="#" class="filter active" data-filter="*">All</a>
                        <a href="#2bed" class="filter" data-filter=".2bed">2 Bedrooms</a>
                        <a href="#3bed" class="filter" data-filter=".3bed">3 Bedrooms</a>
                    </div>                    
                    <!-- End Floorplans Filter -->
                    
                    <!-- Floor Plans Row -->
                        <div class="row multi-columns-row works-grid work-grid-3" id="work-grid">
                        <?php //TODO: grab unit features ?>
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
                                                <a style="cursor:pointer" onclick="document.getElementById('unittype').value='<%=det_arr(0,rc)%>';document.getElementById('bed').value='<%=det_arr(1,rc)%>';document.getElementById('bath').value='<%=det_arr(2,rc)%>';document.getElementById('sqft').value='<%=det_arr(3,rc)%>';document.submitUnit.action='contact';document.submitUnit.submit();" class="btn btn-brown btn-mod">Limited | MORE INFO</a>
                                            <%elseif det_arr(4,rc) = "1" then%>
                                                <a style="cursor:pointer" onclick="document.getElementById('unittype').value='<%=det_arr(0,rc)%>';document.getElementById('bed').value='<%=det_arr(1,rc)%>';document.getElementById('bath').value='<%=det_arr(2,rc)%>';document.getElementById('sqft').value='<%=det_arr(3,rc)%>';document.submitUnit.action='unit';document.submitUnit.submit();" class="btn btn-brown btn-mod"><%=det_arr(4,rc)%> Unit Available</a>
                                            <%else%>
                                            <a style="cursor:pointer" onclick="document.getElementById('unittype').value='<%=det_arr(0,rc)%>';document.getElementById('bed').value='<%=det_arr(1,rc)%>';document.getElementById('bath').value='<%=det_arr(2,rc)%>';document.getElementById('sqft').value='<%=det_arr(3,rc)%>';document.submitUnit.action='unit';document.submitUnit.submit();" class="btn btn-brown btn-mod"><%=det_arr(4,rc)%> Units Available</a>
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
        </div>
        <!-- End Page Wrap -->
            
        @stop
        @section('contact','')

        @section('schedule-a-tour')
            @include('layouts/dinapoli/pages/inc/schedule-a-tour')
        @stop
        @section('epop')
            @include('layouts/dinapoli/pages/inc/epop')
        @stop
