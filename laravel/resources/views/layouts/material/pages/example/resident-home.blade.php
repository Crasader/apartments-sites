@extends('layouts/bascom/main')            

            @section('content')
                        <script src="https://www.google.com/recaptcha/api.js"></script>
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
