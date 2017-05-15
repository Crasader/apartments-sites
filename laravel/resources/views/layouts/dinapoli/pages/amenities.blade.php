@extends('layouts/dinapoli/main')
                        @section('page-title-row')
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">AMENITIES</h1>
                        </div>
                        @stop
                        @section('page-title-span','AMENITIES')
            @section('content')
            <!-- Amenities Section -->
            <section class="page-section pb-0" id="about">
                <div class="container relative">
                    <div class="row">
                    	<div class="col-sm-12">
                    		<h2 class="section-title font-alt align-left mb-20 mb-sm-20">
                               <?php echo $entity->getText('slogan'); ?>
                            </h2>
                    	</div>

                    </div>
                    <div class="row">
                    	<div class="col-sm-12 mb-60">
                    		
                    		<div class="text">
                    		<?php echo $entity->getText('amenities-welcome');?>
                    		</div>
                    	
                    	</div>
                    
                    </div>
                    <hr class="mb-40">
                    <div class="row">
                    	<div class="col-sm-12 mb-10">
                    		<h2 class="section-title font-alt align-left mb-20 mb-sm-20">Apartment Features</h2>
                    	</div>
                        <?php 
                            $rows = 2;
                            $features = app()->make('App\Property\Feature');
                            $features->setFeaturesFormatter(new App\Util\Formatter('li'));
                            $features->setFeaturesChunkCount($rows);
                            $features->loadAllFeatures();
                            for($i=0;$i < $rows;$i++){
                        ?>
                    	<div class="col-md-6 mb-40">
                    		<div class="text">
                    			<ul class='dash-list'>
                                    <?php echo $features->getFeaturesChunk('apartment',$i,'amenities'); ?>
                                </ul>
                    		</div>
                    	</div>
                        <?php
                            }   //End for
                        ?>
                    </div>
                    <hr class="mb-40">
                    <div class="row">
                    	<div class="col-sm-12 mb-10">
                    		<h2 class="section-title font-alt align-left mb-20 mb-sm-20">Community Features</h2>
                    	</div>
                        <?php
                            $rows = 3;
                            $features->setFeaturesChunkCount($rows);
                            for($i=0; $i < $rows;$i++){
                        ?>
                    	<div class="col-sm-4 mb-40">
                    		<div class="text">
                    			<ul class='dash-list'> 
                                    <?php 
                                        echo $features->getFeaturesChunk('community',$i,'amenities');
                                    ?>
                                </ul>
                    		</div>
                    	</div>
                        <?php
                            }   //End for loop
                        ?>
                    </div>
                    <hr class="mb-40">
                    <?php //TODO: if other features exist... ?>
                    <div class="row">
                    	<div class="col-sm-12 mb-10">
                    		<h2 class="section-title font-alt align-left mb-20 mb-sm-20">Other Features & Services</h2>
                    	</div>
                        <?php
                            $rows = 2;
                            $features->setFeaturesChunkCount($rows);
                            for($i=0;$i < $rows;$i++){
                        ?>
                                <div class="col-sm-4 mb-40">
                                    <div class="text">
                                        <ul class='dash-list'>
                                            <?php echo $features->getFeaturesChunk('other',$i); ?>
                                        </ul>
                                    </div>
                                </div>
                        <?php
                            }   //End for
                        ?>
                    </div>
                </div>
            </section>
            <!-- End Amenities Section -->
           @stop

			@section('action')
			<!-- Call Action Section -->
            <section class="page-section pt-0 pb-0 banner-section bg-dark-alfa-70" data-background="<?php echo $entity->getWebPublicDirectory('slides');?>/home-top-slide2a.jpg">
                <div class="container relative">

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="mt-70 mt-lg-70 mb-70 mb-lg-70 mb-sm-30">
                                <div class="banner-content">
                                    <h3 class="banner-heading font-alt text-shadow mt-sm-70 mt-xs-70"><b>Join Our community</b></h3>
									<div class="banner-decription">
										<?php echo $entity->getText('join-community-description');?>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mt-50 mt-lg50 mb-70 mb-lg-70 mb-sm-30">
                                <div class="banner-content text-right">
                                    <div class="local-scroll">
                                        <p><a href="floorplans" class="btn btn-mod btn-brown btn-large btn-round">SEE FLOOR PLANS</a></p>
                                        <p><a href="schedule-a-tour" class="btn btn-mod  btn-large btn-round">SCHEDULE A TOUR</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- End Call Action Section -->
			@stop
