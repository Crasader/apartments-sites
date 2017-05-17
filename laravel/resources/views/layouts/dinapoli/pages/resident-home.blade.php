@extends('layouts/dinapoli/main')            
                        @section('page-title-row') 
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Resident Portal</h1>
                            <div class="hs-line-4 font-alt">
                                <?php echo $entity->getText('resident-portal-title'); ?>
                            </div>
                        </div>
                        @stop
                        @section('page-title-span','RESIDENT PORTAL')
			            @section('recaptcha-js')
                        <script src="https://www.google.com/recaptcha/api.js"></script>
                        @stop

            @section('content')
            <!-- Resident Login Form Section -->
            <section class="page-section" id="resident-login-form">
                <div class="container relative">
                    <div class="section-text mb-50 mb-sm-20">
                        <div class="row">
                        </div>
                    </div>
                    
                </div>
            </section>
            <!-- End About Section -->
            @stop
        @section('contact','')
        @section('action','')
        
		@section('page-specific-js')
        <!--
		<script type="text/javascript">
            $(document).ready(function(){
                amcBindValidate({
                    'form': '#form1',
					'ignore': '.ignore',
                    'rules': {
                        email: {
                            required: true,
                            minlength: 5
                        },
                        pass: {
                            required: true
                        }
                        <?php if(ENV('DEV') == false): ?>
                        ,hiddenRecaptcha: {
                            required: function () {
                                if (grecaptcha.getResponse() == '') {
                                    return true;
                                } else {
                                    return false;
                                }
                            }
                        }
                        <?php endif;?>
                    } /* End RULES */
                });
            }); //End document.ready
            </script>
            -->
		@stop
