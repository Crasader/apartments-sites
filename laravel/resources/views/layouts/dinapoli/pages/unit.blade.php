<?php
use App\Util\Util;
use App\Javascript\ApplySubmitter;

$unit = app()->make('App\AIM\Unit');
$units = $unit->getAllByType($extras['unittype']);
$js = app()->make('App\Javascript\ApplySubmitter');
$js->setCollection($units);
$js->generateIDs();

?>
@extends('layouts/dinapoli/main')
                        @section('page-title-row')
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0"><?php echo $extras['unittype'];?></h1>
                            <div class="hs-line-4 font-alt">
                                <?php echo $extras['unittype'];?> AVAILABILITY
                            </div>
                        </div>
                        @stop
                        @section('page-title-span','FLOOR PLANS')
                        @section('page-title-span-suffix')
                        &nbsp;/&nbsp;<span><?php echo $extras['unittype']; ?></span>
                        @stop
            @section('content')
            <?php //TODO: component/slot for submitUnit form ?>
			<form id="submitUnit" method="post" action="">
			  <input type="hidden" name="unittype" id="unittype" value="X">
			  <input type="hidden" name="bed" id="bed" value="X">
			  <input type="hidden" name="bath" id="bath" value="X">
			  <input type="hidden" name="sqft" id="sqft" value="X">
			  <input type="hidden" name="unitnumber" id="unitnumber" value="X">
				{{ csrf_field() }}
			</form>
 
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
                        		<div class="col-sm-6"><h3 class="uppercase mb-20"><?php echo $extras['unittype'];?></h3></div>
                        	</div>
                        	<div class="unit-description mb-40">
                        		<ul>
                                    <?php //TODO: grab bed bath sqft of unit ?>
                        			<li>BED: <?php echo $extras['bed'];?></li>
                        			<li>BATH: <?php echo $extras['bath'];?></li>
                        			<li>SQ. FEET: <?php echo $extras['sqft'];?></li>
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
                            <?php
                                $unit = app()->make('App\AIM\Unit');
                                foreach($units as $index => $object):
                            ?>
                        	<div class="row unit-table-row">
								<div class="col-md-2">
									<span class="visible-xs visible-sm"><b>Unit: </b></span><?php echo $object->UnitNumber; ?>
								</div>
								<div class="col-md-2">
									<span class="visible-xs visible-sm"><b>Rent: </b></span>$<?php echo Util::formatRentPrice($object->AskingRent);?>
								</div>
								<div class="col-md-2">
									<span class="visible-xs visible-sm"><b>Available: </b></span><?php echo $object->UnitAvailableDate;?>
								</div>
								<div class="col-md-3">
                                    <?php echo $object->SPECIAL_TEXT; ?>
								</div>
								<div class="col-md-3 unit-table-btn">
                                <?php //TODO: do this javascript mess ?>
                                    <a style="cursor:pointer" id="<?php echo $js->getGenId($index);?>" class="btn btn-mod btn-brown btn-medium btn-round">Apply Now</a>

                                   
								</div>
							</div>
                            <?php endforeach; ?>
						
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
            @section('page-specific-js')
            <script src="js/util.js" language="Javascript"></script>
            <script language="Javascript">
            $(document).ready(function(){
                var json = <?php echo $js->dumpJSON(); ?>;
                utilBindSubmitterVars(json,{
                    'unittype': 'UnitType',
                    'bed': {
                        'static': "<?php echo $extras['bed'];?>"
                    },
                    'bath': {
                        'static': "<?php echo $extras['bath'];?>"
                    },
                    'sqft': {
                        'static': "<?php echo $extras['sqft'];?>"
                    },
                    'unitnumber': 'UnitNumber'
                },{
                    'action': "<?php echo '/apartments_greenville_sc/online_application_applynow/'; //TODO: Get this value?>",
                    'form': 'submitUnit'
                });
            });
            </script>

            @stop
