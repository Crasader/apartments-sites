<?php 
use App\Util\Util;
$specials = app()->make('App\Property\Specials');
$data = $specials->fetchAllSpecials();
?>
			<!-- Speacials Dropdown -->
            <?php if($specials->traitHas('website')): ?>
                <?php if(Utils::isHome()): ?>
                <div id="banner-special">
                	<div class="container relative">
                		<div class="row">
            				<div class="col-md-12 text-center">
        						<div class="text">
        							<b><?php echo $data['website']; ?></b><br>
        							<a href="floor-plans" class="btn btn-mod btn-border-w btn-round">
                                 	  FIND OUT MORE
                            		</a> 
        						</div>
                                <a href="#" class="fa fa-times-circle" id="banner-special-close"></a>    				
    						</div>
            			</div>
            		</div>
    	        </div>
                <?php endif ?>
            <?php endif; ?>
            <div class="top-nav">
                <div class="full-wrapper relative clearfix">
                    <div class="row">
                        <div class="col-xs-6">
                            <ul class="top-nav-left">
                                <li class="hidden-sm hidden-xs"><i class="fa fa-phone"></i> <b>Call Today</b> : <?php echo $entity->getPhone(); ?></li>
                                <li class="hidden-sm hidden-xs"><i class="fa fa-map-marker"></i> <b>Location</b> : <?php echo $entity->getFullAddress();?></li>
                                <li class="hidden-md hidden-lg"><a href="tel:<?php //TODO: get entity->getPhoneHref(); ?>+7025666344" class="gray"><i class="fa fa-phone"></i> Call Us</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-6 text-right">
                            <ul class="top-nav-right">
                                <li class="hidden-sm hidden-xs"><a href="floor-plans"><i class="fa fa-search"></i> Apartment Search</a></li>
                                <li class="hidden-sm hidden-xs"><a href="resident-portal"><i class="fa fa-user"></i> Residents</a></li>
                                <li><a href="floor-plans" class="brown"><b>Apply Now <i class="fa fa-angle-right"></i></b></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
			<nav id="nav" class="main-nav js-stick">
                <div class="full-wrapper relative clearfix">
                    <div class="nav-logo-wrap local-scroll">
                        <a href="index" class="logo">
                            <img src="img/logo.png" alt="" />
                        </a>
                    </div>
                    <div class="mobile-nav">
                        <i class="fa fa-bars"></i>
                    </div>
                    <!-- Main Menu -->
                    <div class="inner-nav desktop-nav">
                        <ul class="clearlist scroll-nav local-scroll">
                            <li class="active hidden-md hidden-sm"><a href="index">Home</a></li>
                            <li><a href="gallery">Gallery</a></li>
                            <li><a href="amenities">Amenities</a></li>
                            <li><a href="floor-plans">Floor Plans</a></li>
                            <li><a href="neighborhood">Neighborhood</a></li>
                            <li class="hidden-md hidden-sm"><a href="contact">Contact</a></li>
                            <li class="hidden-md hidden-lg"><a href="floor-plans">Apartment Search</a></li>
                            <li class="hidden-md hidden-lg"><a href="resident-portal">Residents</a></li> 
                            <li><a href="schedule-a-tour" class="red"><b>Schedule a Tour <i class="fa fa-angle-right"></i></b></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
