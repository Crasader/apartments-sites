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
                        @stop
                        @section('page-title-span',$bread_crumbs[count($bread_crumbs) - 1][0])
			            @section('recaptcha-js')
                        <script src="https://www.google.com/recaptcha/api.js"></script>
                        @stop
