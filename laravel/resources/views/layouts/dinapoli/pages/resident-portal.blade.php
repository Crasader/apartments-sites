@extends('layouts/dinapoli/main')            
                        @section('page-title-row') 
                        <div class="col-md-8">
                            <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Resident Portal</h1>
                            <div class="hs-line-4 font-alt">
                                With convenient 24/7 access, the resident portal makes it easy for you to request maintenance service and pay your rent online. Login to get started!
                            </div>
                        </div>
                        @stop
                        @section('page-title-span','RESIDENT PORTAL')
            @section('content')
            <!-- Resident Login Form Section -->
            <section class="page-section" id="resident-login-form">
                <div class="container relative">
                    
                    <div class="section-text mb-50 mb-sm-20">
                        <div class="row">
                            
                            <div class="col-md-6 col-sm-6 col-md-offset-3 mb-sm-50 mb-xs-30">
                                <form>
                                    <div class="mb-20 mb-md-10">
                                        <label><i class="fa fa-user"></i> Username or Email</label>
                                        <input type="text" name="email" id="email" class="input-md form-control" maxlength="100">
                                    </div>
                                    <div class="mb-20 mb-md-10">
                                        <label><i class="fa fa-lock"></i> Password</label>
                                        <input type="password" name="pass" id="pass" class="input-md form-control" maxlength="100">
                                    </div>
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
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKPvpp1b3YxfaEfOZQ6ySdzcpkDSfwqs8"></script>
        @stop
