<?php 
use App\Util\Util;

$env = env('ENVIRONMENT');
   if (strlen($env) != 0 && $env != 'live') {
       echo "<b>$env</b>";
   }
?>
            <!-- Home Section -->
        <section class="home-section bg-dark-alfa-30 parallax-2" data-background="<?php echo $entity->getWebPublicDirectory('')?>/slide1.jpg" id="home">
                <!-- Nav -->
        <?php 

            try {
                $specials = app()->make('App\Property\Specials');
                $foo = $specials->traitGet('specials');
                $data = [];
                foreach ($foo as $index => $object) {
                    $data[$object->U_MARKETING_NAME] = $object->SPECIAL_TEXT;
                }
            } catch (\Exception $e) {
                $data = [];
            }
            ?>
            <?php if (isset($data['SpecialWebsite']) && strlen(trim($data['SpecialWebsite']))): ?>
                <?php if (Util::isHome()): ?>
			<div id="banner-special" style="display: block;"> 
				<div class="container relative">
            		<div class="row">
        				<div class="col-md-12 text-center">
    						<div class="text">
                                        <b>MOVE IN SPECIAL</b> <?php echo $data['SpecialWebsite'];?><br>
    							<button type="submit" class="btn btn-mod btn-border-w btn-round" onclick='window.location="/floorplans";'>
                             	  FIND OUT MORE
                        		</button> 
    						</div>
                            <a href="#" class="fa fa-times-circle" id="banner-special-close"></a>    				
						</div>
        			</div>
        		</div>
			</div>
				<?php endif; ?>
			<?php endif; ?>
            <div class="top-nav">
                <div class="full-wrapper relative clearfix">
                    <div class="row">
                        <div class="col-xs-6">
                            <ul class="top-nav-left">
                                <li class="hidden-sm hidden-xs"><i class="fa fa-phone"></i> <b>Call Today</b> : <?php echo $entity->getPhone();?></li>
                                <li class="hidden-sm hidden-xs"><i class="fa fa-map-marker"></i> <b>Location</b> : <?php echo $entity->getFullAddress(['state' => 'abbrev']); ?></li>
                                <li class="hidden-md hidden-lg"><a href="tel:+<?php echo preg_replace("|[^0-9]+|", "", $entity->getPhone());?>" class="gray"><i class="fa fa-phone"></i> Call Us</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-6 text-right">
                            <ul class="top-nav-right">
                                <li class="hidden-sm hidden-xs"><a href="/floorplans"><i class="fa fa-search"></i> Apartment Search</a></li>
                                <li class="hidden-sm hidden-xs"><a href="/resident-portal"><i class="fa fa-user"></i> Residents</a></li>
                                <li><a href="/apply-online" class="brown"><b>Apply Now <i class="fa fa-angle-right"></i></b></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <nav id="nav" class="main-nav dark js-stick">
                <div class="full-wrapper relative clearfix">
                    <div class="nav-logo-wrap local-scroll">
                        <a href="/" class="logo">
                            <img src="<?php echo $entity->getWebPublicDirectory('');?>/logo.png" alt="" />
                        </a>
                    </div>
                    <div class="mobile-nav">
                        <i class="fa fa-bars"></i>
                    </div>
                    <!-- Main Menu -->
                    <div class="inner-nav desktop-nav">
                        <ul class="clearlist scroll-nav local-scroll">
                            <li class="active"><a href="/">Home</a></li>
                            <li><a href="/gallery">Gallery</a></li>
                            <li><a href="/amenities">Amenities</a></li>
                            <li><a href="/floorplans">Floor Plans</a></li>
                            <li><a href="/neighborhood">Neighborhood</a></li>
                            <li><a href="/contact">Contact</a></li>
                            <li class="hidden-md hidden-lg"><a href="/floorplans">Apartment Search</a></li>
                            <li class="hidden-md hidden-lg"><a href="/resident-portal">Residents</a></li>
                            <li><a href="/schedule-a-tour" class="brown"><b>Schedule a Tour <i class="fa fa-angle-right"></i></b></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Nav-->
            @yield('after-nav')
            </section>
            <!-- End Home Section -->
