<?php use App\Util\Util;

?>
@extends('layouts/bascom/main')
        @include("/layouts/{$entity->template->filesystem_id}/pages/inc/resident-portal-header",[
            'bread_crumbs' => [['Home', '/'], [ 'Resident Portal']],
            'header' => 'Resident Portal',
            'sub_header_one_shot_key' => 'resident-portal:sub-header',
            'sub_header_one_shot' => 'With convenient 24/7 access, the resident portal makes it easy for you to request maintenance service and pay your rent online. Login to get started!'
        ])
            @section('content')
                        <script src="https://www.google.com/recaptcha/api.js"></script>
            <!-- Resident Login Form Section -->
            <div class="page-title"></div>
            <section class="page-section" id="resident-login-form">
                <div class="container relative">
                    <div class="section-text mb-50 mb-sm-20">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-md-offset-3 mb-sm-50 mb-xs-30">
                                <?php if (isset($residentfailed)): ?><h1 class="error">Invalid Username/Password</h1><?php endif;?>
                                <form action="/resident-portal/post-portal-center" method="post" id='form1'>
                                    <div class="mb-20 mb-md-10">
                                        <label><i class="fa fa-user"></i> Username or Email</label>
                                        <input type="text" name="email" id="email" class="input-md form-control" maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10">
                                        <label><i class="fa fa-lock"></i> Password</label>
                                        <input type="password" name="pass" id="pass" class="input-md form-control" maxlength="100">
                                    </div>
                                    {{csrf_field()}}
                                    <p>
                                        <a class='section-text-nullify resident-links text-uppercase' href="/resident-portal/reset-password"><b>Forgot your password?</b></a><br>
                                        <a class='section-text-nullify resident-links text-uppercase' href="/resident-portal/find-userid"><b>Need User Id?</b></a>
                                    </p>
                                    <div class="mb-20 mb-md-10">
                                        <button type="submit" class="btn btn-mod btn-brown btn-large btn-round">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- End About Section -->
            @stop
        @section('contact','')
        @section('action','')

        @section('google-maps-js')
        <!-- Replace test API Key "AIzaSyAZsDkJFLS0b59q7cmW0EprwfcfUA8d9dg" with your own one below
        **** You can get API Key here - https://developers.google.com/maps/documentation/javascript/get-api-key -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo $entity->getText('google-map-key', ['nodecorate'=>1]);?>"></script>
        @stop

		@section('page-specific-js')
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
                    } /* End RULES */
                });
            }); //End document.ready
            </script>
		@stop
