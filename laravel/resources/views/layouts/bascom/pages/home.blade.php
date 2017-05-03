<?php
use App\Util\Util;
use App\Property\Template as PropertyTemplate;
use App\Property\Site;
try{
    $specials = app()->make('App\Property\Specials');
    $spec = $specials->fetchAllSpecials();
}catch(\Exception $e){
    $specials = $spec = null;
}
$displayOptions['dont-show-contact-details'] = true;
?>
    @extends('layouts/bascom/main')
        @section('after-nav')
                <div class="js-height-full">

                    <!-- Hero Content -->
                    <div class="home-content">

                        <div class="home-text">

                            <h1 class="hs-line-1 font-alt mb-60 mb-xs-30 mt-70 mt-sm-0">
                                <?php echo $entity->getText('live-better-slogan',['default' => 'LIVE BETTER']); ?>
                            </h1>

                            <h2 class="hs-line-5">
                                Apartment Homes in <?Php echo $entity->getCity() . ", " . $entity->getAbbreviatedState();?>
                            </h2>

                        </div>
                    </div>
                    <!-- End Hero Content -->

                    <!-- Scroll Down -->
                    <div class="local-scroll">
                        <a href="#about" class="scroll-down"><i class="fa fa-angle-down scroll-down-icon"></i></a>
                    </div>
                    <!-- End Scroll Down -->

                </div>


        @stop
        @section('content')
            <section class="page-section" id="about">
                <div class="container relative">
                    
                    <h2 class="section-title font-alt align-left mb-70 mb-sm-40">
                        <?php echo $entity->getText('home-page-about',['oneshot' => 'About 80 on Gibson']); ?>
                    </h2>
                    
                    <div class="section-text mb-50 mb-sm-20">
                        <div class="row">
                            <div class="col-md-8 col-sm-6 mb-sm-50 mb-xs-30">
                                <?php echo $entity->getText('home-page-about-description',['oneshot' => "<p>Live better at 80 On Gibson Apartments For Rent in Henderson, Nevada. Indulged by a pristine community greenbelt and overlooking Henderson's best sweeping valley views...there is no other place to call home! Striking finishes, abundant storage, elegant cabinetry, gas heat, fireplaces in select homes and spacious nine foot ceilings give you all the comforts of home, the pleasures of a resort and the appeal of the Henderson community. Work hard. Play harder. </p> 
                                <p>80 On Gibson's Henderson location and pet-friendly community gives you the most out of your day with restaurants, parks, and shopping within minutes and golfing just moments away! Make time to unwind in the spa, work out in the fitness room or play a game of racquetball in our indoor gym. Enjoy a cup of coffee in our resident lounge or take in the breathtaking views from your private deck. At 80 On Gibson, you are surrounded by life's many pleasures!</p>"]);?>
                            </div>
                            
                            <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                                <ul style="list-style-type:none; line-height: 30px;">
                        <?php
                            $features = app()->make('App\Property\Feature');
                            $features->setFeaturesLimit(['apartment' => 9]);
                            $features->loadSelectedFeatures(['apartment']);
                            $features->setFeaturesFormatter(new App\Util\Formatter('li'));
                            foreach(['apartment'] as $section):
                                echo Util::redisFetchOrUpdate('home_right_div_features',function() use($features,$section){
                                    return implode('',$features->getEntireFeaturesSection($section));
                                },false);
                            endforeach;
                        ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End About Section -->
            

            <!-- Community Section -->
            <section class="page-section pt-0 pb-30 banner-section bg-dark" data-background="<?php echo $entity->getWebPublicDirectory('slides');?>/bg2.jpg" id="community">
                <div class="container relative">

                    <div class="row">

                        <div class="col-sm-12 text-center">

                            <div class="mt-140 mt-lg-80 mb-80 mb-lg-80 mb-sm-30">
                                <div class="banner-content text-shadow">
                                    <h3 class="banner-heading font-alt">Your New Neighborhood</h3>
                                    <div class="banner-decription">
                                        <?php echo $entity->getText('home-neighborhood-description'); ?>
                                        <ul>
                                        <?php
                                            $features = Util::redisFetchOrUpdate('neighborhood_features',function() use($entity){
                                                return $entity->hasNeighborhood()->get()->toArray();
                                            },true);
                                            foreach($features as $index => $nFeature):
                                        ?>
                                                <li><a href="neighborhood"><?php echo strtoupper($nFeature['name']); ?></a></li>
                                        <?php
                                            endforeach
                                        ?>
                                        </ul>
                                    </div>
                                    <div class="local-scroll">
                                        <a href="neighborhood" class="btn btn-mod btn-brown btn-medium btn-round">SEE ALL THE ATTRACTIONS</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </section>
            <!-- End Community Section -->


            <!-- Other Features Section -->
            <section class="page-section" id="other-features">
                <div class="container relative">
                    <div class="section-text mb-50 mb-sm-20">
                        <div class="row">
                            <h2 class="section-title font-alt mb-40 mb-sm-40"><?php echo $entity->getText('other-features-title',['oneshot' => 'Other Features & Services']);?></h2>
                        <?php
                            $features = app()->make('App\Property\Feature');
                            $features->setFeaturesLimit(['apartment' => 3,'community' => 3]);
                            $features->loadSelectedFeatures(['apartment','community']);
                            $features->setFeaturesFormatter(new App\Util\Formatter('li'));
                            foreach(['apartment' => 'Apartment Features',
                                'community' => 'Community Features'
                                ] as $section => $label):
                        ?>
                            <div class="col-sm-6">
                                <div class="col-md-6">
                                     <div class="text">
                                        <ul style="list-style-type:none; line-height: 30px;">
                                            <?php echo Util::redisFetchOrUpdate('home_features_section_' . $section,function() use($features,$section){
                                                return implode('',$features->getEntireFeaturesSection($section));
                                            },false);
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php
                            endforeach;
                        ?>

                        </div>
                    </div>
                </div>
            </section>
            <!-- End Other Features Section -->

           
            <!-- Call Action Section -->
            <section class="page-section pt-0 pb-0 banner-section bg-dark" data-background="<?php echo $entity->getWebPublicDirectory('slides');?>/bg1.jpg">
                <div class="container relative">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mt-70 mt-lg-70 mb-70 mb-lg-70 mb-sm-30">
                                <div class="banner-content">
                                    <h3 class="banner-heading font-alt">Join Our community</h3>
                                    <div class="banner-decription">
                                        <?php echo $entity->getText('join-our-community-description',['oneshot'=>" Proin fringilla augue at maximus vestibulum. Nam pulvinar vitae neque et porttitor.
                                                                                Integer non dapibus diam, ac eleifend lectus."]);?>
                                    </div>
                                    <div class="local-scroll">
                                        <p><a href="floorplans" class="btn btn-mod btn-brown btn-large btn-round">SEE FLOOR PLANS</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 banner-image wow fadeInUp">
                            <img src='<?php echo $entity->getWebPublicDirectory('');?>/blue-print.png'/>
                        </div>
                    </div>

                </div>
            </section>
            <!-- End Call Action Section -->



            <!-- Gallery Section -->
            <section class="page-section pb-0 " id="portfolio">
                <div class="container relative">

                    <h2 class="section-title font-alt mb-70 mb-sm-40">
                        GALLERY
                    </h2>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">

                                <div class="section-text align-center mb-70 mb-xs-40">
                                <?php echo $entity->getText('gallery-intro-section'); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php $galleryLimit = 6;
                        $galleryOptions = [
                            'sections' => [
                                'community' => 'Exterior',
                                'main' => 'Interior'
                             ],
                             'filters' => ['community','main']
                        ];
                     ?>
                    @include('layouts/dinapoli/pages/inc/gallery')
                </div>
            </section>
            <!-- End Gallery Section -->



            <!-- Google Map -->
            <section class="page-section pb-0">
                <div class="relative">
                    <h2 class="section-title font-alt mb-70 mb-sm-40">
                        OUR LOCATION
                    </h2>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">

                                <div class="section-text align-center mb-70 mb-xs-40">
                                    <?php echo $entity->getText('gallery-our-location',['oneshot'=>'our location text goes here']); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="google-map">
                        <div data-address="<?php echo $entity->getFullAddress();?>" id="map-canvas"></div>
                    </div>
                 </div>
             </section>
            <!-- End Google Map -->
            @include('layouts/bascom/pages/inc/contact-details')    
        @stop


        @section('schedule-a-tour')
            @include('layouts/bascom/pages/inc/schedule-a-tour')
        @stop
            
        @section('page-specific-js')
        <?php //TODO: dynamically load this ?>
        <?php $key = $entity->getText('google-maps-key',['nodecorate' => 1]); ?>
        <?php if(\App\System\Session::isCmsUser()){ echo "Google maps key: " . $key = $entity->getText('google-maps-key') . "<hr>";}?>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo $entity->getText('google-maps-key',['nodecorate'=>1]);?>"></script>
        <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->
        <script type="text/javascript">
            $('#nav').addClass('transparent');
        </script>
        <script type="text/javascript">
            $(function(){
                $("#banner-special").slideDown(500);
                $("#banner-special-close").click(function(e) {
                    e.preventDefault();
                    $("#banner-special").slideUp();
                });
            });
        </script>
        @stop
