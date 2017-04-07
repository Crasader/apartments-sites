@extends('layouts/dinapoli/main')
    @section('page-title-row')
            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">GALLERY</h1>
            </div>
    @stop
    @section('page-title-span','GALLERY')
    @section('content')
            <!-- Gallery Section -->
            <section class="page-section pb-0" id="portfolio">
                <div class="relative">
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                
                                <div class="section-text align-center mb-70 mb-xs-40">
                                    <?php echo $entity->getText('gallery-intro-text','
                                    In&nbsp;auctor ex&nbsp;id&nbsp;urna faucibus porttitor. Lorem ipsum dolor sit amet, 
                                    consectetur adipiscing elit. In&nbsp;maximus ligula semper metus pellentesque mattis.  
                                    Maecenas volutpat, diam enim sagittis quam, id&nbsp;porta quam. Sed id&nbsp;dolor 
                                    consectetur fermentum nibh volutpat, accumsan purus.
                                    ');
                                    ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @include('layouts/dinapoli/pages/inc/gallery')
            </section>
            <!-- End Gallery Section -->

            <!-- Call Action Section -->
            <section class="page-section pt-0 pb-0 banner-section bg-dark" data-background="img/slides/home-top-slide2.jpg">
                <div class="container relative">
                    
                    <div class="row">
                        
                        <div class="col-sm-6">
                            <div class="mt-70 mt-lg70 mb-70 mb-lg-70 mb-sm-30">
                                <div class="banner-content text-shadow">
                                    <h3 class="banner-heading font-alt"><?php echo $entity->getPhone(); ?></h3>
                                    <div class="banner-decription">
                                        <?php echo $entity->getText('gallery-action-banner-description','
                                        Call or email us to schedule a tour today.<br>
                                        Come see your new home and the community features in person.
                                        ');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mt-100 mt-lg100 mb-70 mb-lg-70 mb-sm-30">
                                <div class="banner-content text-right">
                                    <div class="local-scroll">
                                        <a href="#" class="btn btn-mod btn-brown btn-medium btn-round">Schedule a Tour</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- End Call Action Section -->
@stop
                 
            @section('contact','')           
            @section('schedule-a-tour')
            <!-- Schedule a Tour Section -->
                @include('layouts/dinapoli/pages/inc/schedule-a-tour')
            <!-- End Schedule a Tour Section -->
            @stop
