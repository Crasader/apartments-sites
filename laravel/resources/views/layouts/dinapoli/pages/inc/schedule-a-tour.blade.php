<!-- Schedule a Tour Section -->
<section class="page-section schedule-a-tour-section bg-dark-alfa-70" data-background="<?php echo $entity->getWebPublicDirectory('slides');?>/home-top-slide1a.jpg">
    <div class="container relative">
        <form class="form align-center" >
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="newsletter-label font-alt text-shadow">
                       <?php echo $entity->getText('schedule-tour-newsletter');?>
                    </div>
                    <div class="mb-20">
                        <form class="form contact-form" id="contact_form">
                            <div class="clearfix">
                                <div class="cf-left-col">
                                    <!-- Name -->
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" class="input-md round form-control" placeholder="Enter Your Name" pattern=".{3,100}" required="">
                                    </div>
                                    <!-- Email -->
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="input-md round form-control" placeholder="Enter Your Email" pattern=".{5,100}" required="">
                                    </div>
                                </div>
                                <div class="cf-right-col">
                                    <!-- Message -->
                                    <div class="form-group">                                            
                                        <textarea name="message" id="message" class="input-md round form-control" style="height: 84px;" placeholder="Message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="cf-left-col">
                                    
                                    <!-- Inform Tip -->                                        
                                    <div class="form-tip pt-20">
                                        <i class="fa fa-info-circle"></i> All the fields are required
                                    </div>
                                    
                                </div>
                                <div class="cf-right-col">
                                    
                                    <!-- Send Button -->
                                    <div class="align-right pt-10">
                                        <button class="btn btn-mod btn-brown btn-medium btn-round mb-xs-10" id="submit_btn">SUBMIT</button>
                                    </div>
                                    
                                </div>
                            </div>
                            <div id="result"></div>
                        </form>
                    </div>                           
                </div>
            </div>
        </form>
    </div>
</section>
<!-- End Schedule a Tour Section -->
