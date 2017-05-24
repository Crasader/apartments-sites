<div id="exitpopup-overlay" class="exitpopup-overlay" <?php if (\App\System\Session::isCmsUser()): ?> data-localstorage="ignore"<?php endif;?>>
    <div id="exit_pop" class="exitpop-content text-center">
        <div class="exitpop-inner">
            <div class="epop-title">
                    OUR SPECIAL
            </div>
            <div class="epop-message">
            <h1 id="epop-message-h1"><?php echo $entity->getText('epopup-message-1');?></h1>
            <h3 id="epop-message-h3"><?php echo $entity->getText('epopup-message-2');?></h3>
            </div>
            <div class="epop-button">
                <a href="/apply-online" class="btn btn-brown btn-mod btn-block">Apply Now</a>
            </div>
        </div>
        <a href="#" class="fa fa-times-circle" id="epop-close"></a>
    </div>
</div>
