		<div id="exitpopup-overlay" <?php if (\App\System\Session::isCmsUser()) {
    echo 'data-localstorage="ignore"';
}?> class="exitpopup-overlay" style="display: none;">
            <div id="exit_pop" class="exitpop-content text-center">
                <a href="/floorplans"><img src="<?php echo $entity->getWebPublicDirectory('');?>/popup.jpg" class="images-responsive"></a>
                <a href="#" class="fa fa-times-circle" id="epop-close"></a>
            </div>
        </div>
