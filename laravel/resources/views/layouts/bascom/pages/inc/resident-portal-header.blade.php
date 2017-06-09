       	@section('after-nav')

        <!-- Page Title Section -->
        <section class="page-section page-title bg-dark-alfa-30" data-background="<?php echo $entity->getWebPublicDirectory('');?>/page-title-bg5.jpg">
            <div class="relative container align-left">

                <div class="row">

                    <div class="col-md-8">
                        <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">{{ $header }}</h1>
                        <div class="hs-line-4 font-alt">
							<?php echo $entity->getText($sub_header_one_shot_key, ['oneshot' =>$sub_header_one_shot]);?>
                        </div>
                    </div>

                    <div class="col-md-4 mt-30">
                        <div class="mod-breadcrumbs font-alt align-right">

                            <?php
                            $breadCrumbsArray = [];
                            foreach($bread_crumbs as $bread_crumb){
                                if(array_get($bread_crumb, 1)){
                                    //has anchor tag
                                    $breadCrumbArray[] = "<a href='{$bread_crumb[1]}'>{$bread_crumb[0]}</a>";

                                } else {
                                    $breadCrumbArray[] = "<span>{$bread_crumb[0]}</span>";
                                }
                                $breadCrumbString = implode("&nbsp/&nbsp;", $breadCrumbArray);

                            }
                            echo $breadCrumbString;
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title Section -->

		@stop
