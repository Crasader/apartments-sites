<div id="exitpopup-overlay" class="exitpopup-overlay" <?php if (\App\System\Session::isCmsUser()): ?> data-localstorage="ignore"<?php endif;?>>
    <div id="exit_pop" class="exitpop-content text-center">
        <div class="exitpop-inner">
            <div class="epop-title">
                MOVE IN SPECIAL
            </div>
            <div class="epop-message">
            <h1 id="epop-message-h1"><?php echo $entity->getText('epopup-message-1', ['oneshot' => 'Awesome new special goes here :)']);?></h1>
            <p id="epop-message-p"><?php echo $entity->getText('epopup-message-2', ['oneshot' => 'Sub text goes here']);?></p>
            </div>
            <div class="epop-button">
                <a href="/floorplans" class="btn btn-brown btn-mod btn-block">See Floor plans</a>
            </div>
        </div>
        <a href="#" class="fa fa-times-circle" id="epop-close"></a>
    </div>
</div>
