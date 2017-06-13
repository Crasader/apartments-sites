<?php
use App\Property\Template as PropertyTemplate;
 ?>
@extends('layouts/bascom/main')

    @section('after-nav')
    <!-- Page Title Section -->
    <section class="page-section page-title bg-dark-alfa-30" data-background="<?php echo $entity->getWebPublicDirectory('');?>/page-title-bg1.jpg">
        <div class="relative container align-left">

            <div class="row">

                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0"><?php echo $entity->getText('neighborhood-title',['oneshot' => 'Eat•Play•Shop']);?></h1>
                    <div class="hs-line-4 font-alt">
			            <?php echo $entity->getText('neighborhood-text', ['oneshot' => 'Everything in your own backyard...']);?>
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
                        $ctr = 0;
                        $headers = [
                        0 => '<div class="align-center"><h2 class="section-title font-alt"><span class="icon-basket"></span>&nbsp;&nbsp;Dining & Shopping</h2></div>',
                        1 => '<div class="align-center"><h2 class="section-title font-alt"><span class="icon-bike"></span>&nbsp;&nbsp;Recreation</h2></div>',
                        2 => '<div class="align-center"><h2 class="section-title font-alt"><span class="icon-calendar"></span>&nbsp;&nbsp;Events</h2></div>'
                        ];
                        foreach (array_chunk($entity->hasNeighborhood()->get()->toArray(), 3) as $chunkIndex => $chunkArray):
                            echo '<div class="section-text mb-80 mb-sm-20">';
                            echo '<div class="row">';
                            foreach ($chunkArray as $index => $nFeature):
                    ?>
                    <!-- Team item -->
                    <div class="col-sm-4 mb-xs-50 wow fadeInUp">
                        <div class="team-item ">
                            <?php echo $headers[$ctr++];?>
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


                       <!-- Call Action Section -->
            <section class="page-section pt-0 pb-0 banner-section bg-dark" data-background="<?php echo $entity->getWebPublicDirectory('');?>/bg1.jpg">
                <div class="container relative">

                    <div class="row">

                        <div class="col-sm-6">

                            <div class="mt-140 mt-lg-80 mb-140 mb-lg-80">
                                <div class="banner-content">
                                    <h3 class="banner-heading font-alt">Schedule A Tour Today!</h3>
                                    <div class="banner-decription">
                                        <?php echo $entity->getText('schedule-a-tour-description', ['oneshot' =>'Proin fringilla augue at maximus vestibulum. Nam pulvinar vitae neque et porttitor.
                                        Integer non dapibus diam, ac eleifend lectus.']);?>
                                    </div>
                                    <div class="local-scroll">
                                        <a href="/schedule-a-tour" class="btn btn-mod btn-brown btn-medium btn-round">SCHEDULE A TOUR</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6 banner-image wow fadeInUp">
                            <img src="<?php echo $entity->getWebPublicDirectory('');?>/blue-print.png" alt="" />
                        </div>

                    </div>

                </div>
            </section>
            <!-- End Call Action Section -->

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
                                <?=PropertyTemplate::getGmapKey();?>
                                <div style="overflow:hidden;height:537px;max-width:100%;">
                                    <div id="map-canvas" style="max-width:100%;"></div>
                                <div>
                                @include('layouts/bascom/pages/inc/google-maps-script')
                            </div>
                            <?php //@include('layouts/dinapoli/pages/inc/google-maps-apartment-feature')?>
                        </div>
                    </div>
                </div>
             </section>
            <!-- End Google Map -->
         <!-- <section class="contact-padding page-section" id="contact"> -->
                <div class="container relative">

                    <div class="row">

                        <div class="col-md-10 col-md-offset-1">
                            <div class="row">

                                <!-- Phone -->
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-20">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            Call Us
                                        </div>
                                        <div class="ci-text">
                                            <?php echo $entity->getPhone();?>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Phone -->

                                <!-- Address -->
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-20">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            Address
                                        </div>
                                        <div class="ci-text">
                                           <?php echo $entity->getFullAddress(['city'=>'break','state'=>'abbrev']);?>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Address -->

                                <!-- Office Hours -->
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-20">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            Office Hours
                                        </div>
                                        <div class="ci-text">
                                            <?php echo $entity->getHours();?>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Office Hours-->

                            </div>
                        </div>

                    </div>

                </div>
            <!-- </section> -->

             @stop

        <?php $displayOptions['dont-show-contact-details'] = true; ?>

        @section('google-maps-js')
        <!-- Replace test API Key "AIzaSyAZsDkJFLS0b59q7cmW0EprwfcfUA8d9dg" with your own one below
        **** You can get API Key here - https://developers.google.com/maps/documentation/javascript/get-api-key -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo $entity->getText('google-map-key', ['nodecorate'=>1]);?>"></script>
        @stop

            @section('schedule-a-tour')
            <!-- Schedule a Tour Section -->
                @include('layouts/bascom/pages/inc/schedule-a-tour')
            <!-- End Schedule a Tour Section -->
            @stop

        @section('contact','')
