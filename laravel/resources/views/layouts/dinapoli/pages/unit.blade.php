@extends('layouts/dinapoli/main')
                        @section('page-title-row')
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0"><%=unittype%></h1>
                            <div class="hs-line-4 font-alt">
                                <%=unittype%> AVAILABILITY
                            </div>
                        </div>
                        @stop
                        @section('page-title-span','FLOOR PLANS')
                        <?php //TODO: do the rest of this
                        /*
                        <div class="col-md-4 mt-30">
                            <div class="mod-breadcrumbs font-alt align-right">
                                <a href="#">Home</a>&nbsp;/&nbsp;<span>FLOOR PLANS</span>&nbsp;/&nbsp;<span><%=unittype%></span>
                            </div>
                            
                        </div>
                        */
                        ?>
            @section('content')
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
                                    <?php //TODO: grab bed bath sqft of unit ?>
                        			<li>BED: <%=bed%></li>
                        			<li>BATH: <%=bath%></li>
                        			<li>SQ. FEET: <%=sqft%></li>
                        		</ul>
                        	</div>
                        	<div class="text">		                            	
                                <?php //TODO: grab apartment features ?>
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
                            <?php //TODO: replace this with php. do unit, rent, available ?>
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
            @stop
			
            @section('schedule-a-tour')
			<!-- Schedule a Tour Section -->
                @include('layouts/dinapoli/pages/inc/schedule-a-tour')
            <!-- End Schedule a Tour Section -->
            @stop
            @section('contact','')
