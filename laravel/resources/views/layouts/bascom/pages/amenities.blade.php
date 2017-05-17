@extends('layouts/bascom/main')
        @section('after-nav')
            <!-- Page Title Section -->
            <section class="page-section bg-dark-alfa-30" data-background="<?php echo $entity->getWebPublicDirectory('');?>/page-title-bg4.jpg">
                <div class="relative container align-left">

                    <div class="row">

                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Live Better</h1>
                            <div class="hs-line-4 font-alt">
                                More than just a place to sleep
                            </div>
                        </div>

                        <div class="col-md-4 mt-30">
                            <div class="mod-breadcrumbs font-alt align-right">
                                <a href="/">Home</a>&nbsp;/&nbsp;<span>AMENITIES</span>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- End Page Title Section -->
        @stop
            @section('content')
            <!-- Amenities Section -->
            <section class="page-section pb-0" id="about">
                <div class="container relative">
					<div class="row">
                    	<div class="col-sm-6 mb-60">
                                <h2 class="section-title font-alt align-left mb-70 mb-sm-40">
                                   <?php echo $entity->getText('basco-amenities-title',['oneshot' => 'Amenities']);?>
                                </h2>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-sm-6 mb-60">
                    		
                    		<div class="text">
                    		
                    		<?php echo $entity->getText('bascom-amenities-page-paragraph',['oneshot' => "Live better at 80 On Gibson Apartments For Rent in Henderson, Nevada. Indulged by a pristine community greenbelt and overlooking Henderson's best sweeping valley views...there is no other place to call home! Striking finishes, abundant storage, elegant cabinetry, gas heat, fireplaces in select homes and spacious nine foot ceilings give you all the comforts of home, the pleasures of a resort and the appeal of the Henderson community. Work hard. Play harder. 80 On Gibson Henderson location and pet-friendly community gives you the most out of your day with restaurants, parks, and shopping within minutes and golfing just moments away! Make time to unwind in the spa, work out in the fitness room or play a game of racquetball in our indoor gym. Enjoy a cup of coffee in our resident lounge or take in the breathtaking views from your private deck. At 80 On Gibson, you are surrounded by life's many pleasures!"]);?>
                    		
                    		</div>
                    	
                    	</div>
                    	<div class="col-sm-6 mb-60">

                            <img src="<?php echo $entity->getWebPublicDirectory('gallery')?>/ext3.jpg" alt="">
                    		
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


		@section('schedule-a-tour')
			@include('layouts/bascom/pages/inc/schedule-a-tour')
		@stop
