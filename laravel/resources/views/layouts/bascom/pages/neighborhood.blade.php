@extends('layouts/bascom/main')

    @section('after-nav')
    <!-- Page Title Section -->
    <section class="page-section bg-dark-alfa-30" data-background="<?php echo $entity->getWebPublicDirectory('');?>/page-title-bg1.jpg">
        <div class="relative container align-left">
            
            <div class="row">
                
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Eat•Play•Shop</h1>
                    <div class="hs-line-4 font-alt">
			            <?php echo $entity->getText('neighborhood-text',['oneshot' => 'Everything in your own backyard...']);?>
                    </div>
                </div>
                
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="/">Home</a>&nbsp;/&nbsp;<span>NEIGHBORHOOD</span>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </section>
    <!-- End Page Title Section -->
    @stop
            @section('content')
            <!-- About Section -->
            <section class="page-section" id="about">
                <div class="container relative">
                    <?php
                        $feature  = app()->make('App\Property\Feature');
                        foreach(array_chunk($entity->hasNeighborhood()->get()->toArray(),3) as $chunkIndex => $chunkArray):
                            echo '<div class="section-text mb-80 mb-sm-20">';
                            echo '<div class="row">';
                            foreach($chunkArray as $index => $nFeature):
                    ?>
                    <!-- Team item -->
                    <div class="col-sm-4 mb-xs-50 wow fadeInUp">
                        <div class="team-item ">
                            <div class="team-item-image">
                                <img src="<?php echo $feature->decorator($nFeature)['image'];?>" alt="" class="mb-40 mb-sm-20"/>
                                <div class="team-item-detail">
                                    <h4 class="font-alt normal"><?php echo $nFeature['name'];?></h4>
                                    <p>
                                        <?php echo $nFeature['short_description']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="text">
                                <?php echo $nFeature['description'];?>
                            </div>
                        </div>
                    </div>
                    <!-- End Team item -->
                    <?php
                            endforeach;
                            echo "</div> <!-- end row -->";
                            echo '</div>';
                        endforeach;
                    ?>
                </div>
            </section>
            <!-- End About Section -->
            
            <section class="page-section pb-0">
            	<div class="container relative">
            		<div class="section-text mb-60 mb-sm-20">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 mb-70 mb-sm-40 align-center">
                            	<h2 class="section-title font-alt">An Easier Commute</h2>
                                <div class="section-text">
                                <?php echo $entity->getText('commute-text'); ?>
                                </div>
                            </div>
                    
                        </div>
	                </div>
            	</div>
            </section>
            
            
            <!-- Google Map -->
            <section class="page-section pb-0">
                <div class="relative"> 
                    <!-- Google Map -->
                    <div class="map-block">
                        <div class="map">
                            <div class="map-container">
                                <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
                                <div style="overflow:hidden;height:537px;max-width:100%;">
                                    <div id="map-canvas" style="max-width:100%;"></div>
                                <div>
                                @include('layouts/dinapoli/pages/inc/google-maps-script')
                            </div>
                            @include('layouts/dinapoli/pages/inc/google-maps-apartment-feature')
                        </div>
                    </div>
                </div>
             </section>
            <!-- End Google Map -->
             @stop
            
            @section('action','')
            @section('contact','')


        @section('google-maps-js')
        <!-- Replace test API Key "AIzaSyAZsDkJFLS0b59q7cmW0EprwfcfUA8d9dg" with your own one below 
        **** You can get API Key here - https://developers.google.com/maps/documentation/javascript/get-api-key -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKPvpp1b3YxfaEfOZQ6ySdzcpkDSfwqs8"></script>
        @stop

            @section('schedule-a-tour')
            <!-- Schedule a Tour Section -->
                @include('layouts/bascom/pages/inc/schedule-a-tour')
            <!-- End Schedule a Tour Section -->
            @stop
        
        @section('contact','')
