<?php 
$floorPlans = app()->make('App\AIM\FloorPlans');
$js = app()->make('App\Javascript\ApplySubmitter');
$fpData = $floorPlans->getFloorPlans();
$sorted = [];
$sortedIds = [];

foreach($fpData as $index => $object){
    $uniqueId = uniqid() . "_" . $object->BED;
    $object->uniqid = $uniqueId;
    if(intval($object->AVAIL) == 0){
        $object->ACTION = 'contact';
        $object->TEXT = 'Limited | MORE INFO';
    }elseif(intval($object->AVAIL) == 1){
        $object->TEXT = 'Unit Available';
        $object->ACTION = 'unit';
    }else{
        $object->TEXT = 'Units Available';
        $object->ACTION = 'unit';
    }
    $sorted[$object->BED] = $object;
    $sortedIds[$uniqueId] = $object;
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
        {{ csrf_field() }}
    </form>
            <section class="page-section">
                <div class="container relative">
                    
                    <!-- Floorplans Filter -->                    
                    <div class="works-filter font-alt align-center">
                        <a href="#" class="filter active" data-filter="*">All</a>
                        <?php 
                            foreach($sorted as $bedCount => $object):
                        ?>
                        <a href="#<?php echo $bedCount;?>bed" class="filter" data-filter=".<?php echo $bedCount;?>bed">
                        <?php echo $bedCount; ?> Bedroom<?php if($bedCount > 1){ echo "s"; }?>
                        </a>
                        <?php
                            endforeach;
                        ?>
                    </div>                    
                    <!-- End Floorplans Filter -->
                    
                    <!-- Floor Plans Row -->
                        <div class="row multi-columns-row works-grid work-grid-3" id="work-grid">
                            <?php foreach($sorted as $index => $object): ?>
                            <!-- Individual Unit -->
                            <div class="col-sm-6 col-md-4 col-lg-4 work-item mix <?php echo $object->BED;?>bed">
                                <div class="floorplan-item">
                                    <div class="floorplan-item-inner">
                                        <div class="floorplan-wrap">
                                            
                                            <!-- Floor Plan Thumbnail -->
                                            <div class="floorplan-thumb">
                                                <a href="img/floorplans/sands.jpg" class="lightbox-gallery-2 mfp-image"><img src="img/floorplans/sands.jpg"></a>
                                            </div>

                                             <!-- Unit Title -->
                                            <div class="floorplan-title">
                                                <?php echo $object->U_MARKETING_NAME; ?><br>
                                                <?php if(strlen($object->SPECIAL_TEXT)): ?>
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
                                                <sup>$</sup><?php echo round($object->RENT_FROM,2,PHP_ROUND_HALF_UP);?>
                                            </div>
                                            
                                            <div class="pr-per">
                                                per month
                                            </div>                                          
                                            
                                            <!-- Button -->                                         
                                            <div class="pr-button">
                                                <?php 
                                                    $text = '';
                                                    switch($object->AVAIL){
                                                    case '0':
                                                        $text = 'Limited | MORE INFO';
                                                        break;
                                                    case '1':
                                                        $text = 'Unit Available';
                                                        break;
                                                    default:
                                                        $text = 'Units Available';
                                                    }
                                                ?>
                                                         <a style="cursor:pointer" id="<?php echo $js->getGenId($index); ?>" class="btn btn-brown btn-mod">
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

        @section('schedule-a-tour')
            @include('layouts/dinapoli/pages/inc/schedule-a-tour')
        @stop
        @section('epop')
            @include('layouts/dinapoli/pages/inc/epop')
        @stop
    @section('page-specific-js')
    <script src="js/util.js" language="Javascript"></script>
    <script language="javascript">
        $(document).ready(function(){
            var json = <?php $js->dumpJSON(); ?>;
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
