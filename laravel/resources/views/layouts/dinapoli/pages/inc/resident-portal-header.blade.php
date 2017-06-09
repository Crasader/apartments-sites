        <?php
        use App\Util\Util;
         ?>
                        @section('page-title-row')
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">{{ $header }}</h1>
                            <div class="hs-line-4 font-alt">
							<?php
                            echo $entity->getText($sub_header_one_shot_key,
                                ['oneshot' =>$sub_header_one_shot]
                            )
                            ;?>
                            </div>
                        </div>

                        <?php
                        $breadCrumbsArray = [];
                        array_forget($bread_crumbs, '0');
                        foreach($bread_crumbs as $bread_crumb){
                            if(array_get($bread_crumb, 1)){
                                //has anchor tag
                                $breadCrumbArray[] = "<a href='{$bread_crumb[1]}'>{$bread_crumb[0]}</a>";

                            } else {
                                $breadCrumbArray[] = "<span>{$bread_crumb[0]}</span>";
                            }
                            $breadCrumbString = implode("&nbsp/&nbsp;", $breadCrumbArray);

                        }
                        ?>
                        @stop
                        @section('page-title-span')
                        <?=$breadCrumbString;?>
                        @stop
			            @section('recaptcha-js')
                        <script src="https://www.google.com/recaptcha/api.js"></script>
                        @stop
