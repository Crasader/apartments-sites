<?php
use App\Util\Util;

$floorPlans = app()->make('App\AIM\FloorPlans');
$js = app()->make('App\Javascript\ApplySubmitter');
$fpData = $floorPlans->getFloorPlans();
$sorted = [];
$sortedIds = [];

$fpImage = app()->make('App\Assets\FloorPlanImage');
\Debugbar::info($fpData);
$ctr = 0;
foreach ($fpData as $index => $object) {
    $uniqueId = uniqid() . "_" . $object->BED;
    $object->uniqid = $uniqueId;
    if (intval($object->AVAIL) == 0) {
        $object->ACTION = 'post-limited';
        $object->TEXT = 'Limited | MORE INFO';
    } elseif (intval($object->AVAIL) == 1) {
        $object->TEXT = 'Unit Available';
        $object->ACTION = 'unit';
    } else {
        $object->TEXT = 'Units Available';
        $object->ACTION = 'unit';
    }
    $uName = Util::transformFloorplanName($object->U_MARKETING_NAME);
    $fpImageData = $fpImage->probeImageFiles($uName);
    $sorted[$ctr] = $object;
    $sorted[$ctr++]->image_data = $fpImageData;
    $sortedIds[$uniqueId] = $object;
    $sortedIds[$uniqueId]->image_data = $fpImageData;
}
$js->setCollection($sorted);
$js->generateIDs();
?>
@extends('layouts/dinapoli/main')
    @section('page-title-row')
        <div class="col-md-8">
            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Floor Plans & Availablity</h1>
        </div>
    @stop
    @section('page-title-span','Floor Plans & Availability')
    @section('content')
    <form id="submitUnit" method="post" action="">
      <input type="hidden" name="unittype" id="unittype" value="X">
      <input type="hidden" name="bed" id="bed" value="X">
      <input type="hidden" name="bath" id="bath" value="X">
      <input type="hidden" name="sqft" id="sqft" value="X">
    </form>
            <section class="page-section">
                <div class="container relative">

                    <!-- Floorplans Filter -->
                    <div class="works-filter font-alt align-center">
                        <a href="#" class="filter active" data-filter="*">All</a>
                        <?php
                            $printed = [];
                            foreach ($sorted as $bedCount => $object):
                                if (in_array($object->BED, $printed)) {
                                    continue;
                                }
                                $printed[] = $object->BED;
                        ?>
                        <a href="#<?php echo $object->BED;?>bed" class="filter" data-filter=".<?php echo $object->BED;?>bed">
                        <?php if (strtolower($object->BED) == "studio") {
                            echo "studio";
                        } else {
                            echo $object->BED . " Bedroom";
                            if ($object->BED > 1) {
                                echo "s";
                            }
                        }?>
                        </a>
                        <?php
                            endforeach;
                        ?>
                    </div>
                    <!-- End Floorplans Filter -->

                    <!-- Floor Plans Row -->
                    <?php
                        $grid = 3;
                        $col = 4;
                    ?>
                        <?php if (count($sorted) == 2) {
                        $grid = 2;
                        $col = 4;
                    } ?>
                        <?php if (count($sorted) == 1) {
                        $grid = 12;
                    } ?>
                        <div class="row multi-columns-row works-grid work-grid-<?php echo $grid;?>" id="work-grid">
                            <?php foreach ($sorted as $index => $object): ?>
                            <!-- Individual Unit -->
                            <div class="col-sm-6 col-md-<?php echo $col;?> col-lg-<?php echo $col;?> work-item mix <?php echo $object->BED;?>bed">
                                <div class="floorplan-item">
                                    <div class="floorplan-item-inner">
                                        <div class="floorplan-wrap">
                                            <!-- Floor Plan Thumbnail -->
                                            <div class="floorplan-thumb">
                                                <?php //TODO: make a function to clean this cruft?>
                                                <a href="<?php echo $entity->getFloorPlanThumbSrc($object);?>"
                                                        class="lightbox-gallery-2 mfp-image">
                                                <img src="<?php echo $entity->getFloorPlanThumbSrc($object);?>"></a>
                                            </div>

                                             <!-- Unit Title -->
                                            <div class="floorplan-title">
                                                <?php echo $object->U_MARKETING_NAME; ?><br>
                                                <?php if (strlen($object->SPECIAL_TEXT)): ?>
                                                    <span class="special red"><i class="fa fa-star"><?php echo $object->SPECIAL_TEXT;?></i></span>
                                                <?php endif; ?>

                                            </div>

                                            <!-- Unit Features -->
                                            <div class="floorplan-features font-alt">
                                                <ul class="sf-list pr-list">
                                                    <li>Sq Feet: <b><span><?php echo $object->SQFT; ?></span></b></li>
                                                    <li>Bedrooms: <b><span><?php echo $object->BED; ?></span></b></li>
                                                    <li>Bathrooms: <b><span><?php echo $object->BATH;?></span></b></li>
                                                    <li>Deposit: <b><span>$100</span></b></li>
                                                </ul>
                                            </div>

                                            <div class="floorplan-num">
                                                <sup>$</sup><?php echo round($object->RENT_FROM, 2, PHP_ROUND_HALF_UP);?>
                                            </div>

                                            <div class="pr-per">
                                                per month
                                            </div>

                                            <!-- Button -->
                                            <div class="pr-button">
                                                <?php
                                                    $text = '';
                                                    $id = $js->getGenId($index);
                                                    $href = null;
                                                    switch ($object->AVAIL) {
                                                    case '0':
                                                        $text = 'Limited | MORE INFO';
                                                        $id = "foo_" . uniqid();
                                                        $href = "href='/contact'";
                                                        break;
                                                    case '1':
                                                        $text = '1 Unit Available';
                                                        break;
                                                    default:
                                                        $text = $object->AVAIL . ' Units Available';
                                                    }
                                                ?>
                                                         <a <?php echo $href;?> style="cursor:pointer" id="<?php echo $id; ?>" class="btn btn-brown btn-mod">
                                                         <?php echo $text;?>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Individual Unit -->
                            <?php endforeach; ?>
                        </div>
                        <!-- End Floor Plans Row -->

                        <div classs="row">
                            <div class="col-sm-12">
                                <p>
                                    *Pricing and availability are subject to change. Valid for new residents only. Square footages displayed are approximate. Discounts will be calculated upon lease execution. Minimum lease terms and occupancy guidelines may apply. Deposits may fluctuate based on credit, rental history, income, and/or other qualifying standards. Additional taxes and fees may apply and will be disclosed as per governing laws and company policies.
                                </p>
                            </div>
                        </div>

                </div>
            </section>
        @stop
        @section('contact','')

        @section('epop')
            @include('layouts/dinapoli/pages/inc/epop')
        @stop
    @section('page-specific-js')
    <script language="javascript">
        $(document).ready(function(){
            var json = <?php echo $js->dumpJSON(); ?>;
            utilBindSubmitterVars(json,{
                'unittype': 'U_MARKETING_NAME',
                'bed': 'BED',
                'bath': 'BATH',
                'sqft': 'SQFT'
            },{
                'action': {
                    'fetch': 'ACTION'
                },
                'form': 'submitUnit'
            });
        });
    </script>
    @stop
