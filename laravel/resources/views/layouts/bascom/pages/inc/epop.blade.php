<style type='text/css'>
.exitpop-inner {
    display: block;
    margin: 0 auto;
    position: relative;
    text-align: center;
    background-size: cover
}

.exitpop-inner .epop-title {
    background: #85cebc;	/* needs to change */
    color: #fff;			/* needs to change */
    padding: 15px;
    font-size: 40px
}

.exitpop-inner .epop-message {
   color: #CF5300; /* Needs to change */
}

.exitpop-inner .epop-message h1 {
    font-size: 80px;
    margin: 80px 0 0;
    padding: 0;
    line-height: 60px;
    font-weight: 800;
    letter-spacing: -1px;
    text-transform: uppercase
}

.exitpop-inner .epop-message h3 {
    font-size: 30px;
    letter-spacing: -1px
}

.exitpop-inner .epop-button {
    padding: 30px
}

.exitpop-inner .epop-button .btn {
    padding: 15px;
    font-size: 40px;
    font-weight: 700
}
</style>
<div id="exitpopup-overlay" class="exitpopup-overlay" <?php if (\App\System\Session::isCmsUser()): ?> data-localstorage="ignore"<?php endif;?>>
    <div id="exit_pop" class="exitpop-content text-center">
        <div class="exitpop-inner">
            <div class="epop-title">
                    OUR SPECIAL
            </div>
            <div class="epop-message">
            <h1 id="epop-message-h1"><?php echo $entity->getText('epopup-message-1',['oneshot' => 'Awesome new special goes here :)']);?></h1>
            <h3 id="epop-message-h3"><?php echo $entity->getText('epopup-message-2',['oneshot' => 'Sub text goes here']);?></h3>
            </div>
            <div class="epop-button">
                <a href="/apply-online" class="btn btn-brown btn-mod btn-block">See Floorplans</a>
            </div>
        </div>
        <a href="#" class="fa fa-times-circle" id="epop-close"></a>
    </div>
</div>
