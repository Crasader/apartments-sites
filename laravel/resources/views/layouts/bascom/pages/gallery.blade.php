@extends('layouts/bascom/main')
    @section('after-nav')


    @stop
    @section('content')
            <!-- Gallery Section -->
            <section class="page-section pb-0" id="portfolio">
                <div class="relative">
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                
                                <div class="section-text align-center mb-70 mb-xs-40">
                                    <?php echo $entity->getText('gallery-intro-text');
                                    ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    @include('layouts/dinapoli/pages/inc/gallery')
            </section>
            <!-- End Gallery Section -->

        @include('layouts/bascom/pages/inc/schedule-a-tour')
    @stop
                 
            @section('contact','')           
