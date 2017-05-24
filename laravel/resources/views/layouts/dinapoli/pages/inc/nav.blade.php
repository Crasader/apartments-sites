<?php 
use App\Util\Util;

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
			<!-- Speacials Dropdown -->
            <?php if (isset($data['SpecialWebsite'])): ?>
                <?php if (Util::isHome()): ?>
                <div id="banner-special">
                	<div class="container relative">
                		<div class="row">
            				<div class="col-md-12 text-center">
        						<div class="text">
        							<b><?php echo $data['SpecialWebsite']; ?></b><br>
        							<a href="floorplans" class="btn btn-mod btn-border-w btn-round">
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
			<nav id="nav" class="main-nav js-stick">
                <div class="full-wrapper relative clearfix">
                    <div class="nav-logo-wrap local-scroll">
                        <a href="/" class="logo">
                            <img src="<?php echo $entity->getWebPublicDirectory('logo');?>/logo.png" alt="" />
                        </a>
                    </div>
                    <div class="mobile-nav">
                        <i class="fa fa-bars"></i>
                    </div>
                    <!-- Main Menu -->
                    <div class="inner-nav desktop-nav">
                        <ul class="clearlist scroll-nav local-scroll">
                            <?php
                                use App\System\Settings;

$galleryItems = [
                                    [
                                        'li-attributes' => [
                                            'class' => 'active hidden-md hidden-sm',
                                         ],
                                         'href' => '',
                                        'label' => 'Home'
                                    ],
                                    [
                                        'label' => 'Gallery'
                                    ],
                                    [
                                        'label' => 'Floor Plans'
                                    ],
                                    [
                                        'label' => 'Neighborhood'
                                    ],
                                    [
                                        'li-attributes' => [
                                            'class' => 'hidden-md hidden-sm'
                                        ],
                                        'label' => 'Contact'
                                    ],
                                    [
                                        'li-attributes' => [
                                            'class' => 'hidden-md hidden-lg'
                                        ],
                                        'href' => 'floorplans',
                                        'label' => 'Apartment Search',
                                    ],
                                    [
                                        'li-attributes' => [
                                            'class' => 'hidden-md hidden-lg'
                                        ],
                                        'href' => 'resident-portal',
                                        'label' => 'Residents'
                                    ],
                                    [
                                        'a-attributes' => [
                                            'class' => 'red',
                                        ],
                                        'href' => 'schedule-a-tour',
                                        'label' => '<b>Schedule a Tour <i class="fa fa-angle-right"></i></b>'
                                    ]
                                ];
                                $settings = Settings::site($forceGet=true);
                                $newItems = Settings::addCustomNavItemsToArray($galleryItems);

                                foreach ($newItems as $index => $navElement) {
                                    echo "<li";
                                    if (isset($navElement['li-attributes'])) {
                                        foreach ($navElement['li-attributes'] as $attribute => $attributeValue) {
                                            if (empty($attribute) || empty($attributeValue)) {
                                                continue;
                                            }
                                            echo " $attribute=\"$attributeValue\"";
                                        }
                                    }
                                    echo "><a href=\"";
                                    if (!isset($navElement['href'])) {
                                        echo "/" . strtolower(preg_replace("|[ ]+|", "", $navElement['label']));
                                    } else {
                                        echo "/" . $navElement['href'];
                                    }
                                    echo "\"";
                                    if (isset($navElement['a-attributes'])) {
                                        foreach ($navElement['a-attributes'] as $attribute => $attributeValue) {
                                            if (empty($attribute) || empty($attributeValue)) {
                                                continue;
                                            }
                                            echo " $attribute=\"$attributeValue\"";
                                        }
                                    }
                                    echo ">{$navElement['label']}</a></li>";
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
